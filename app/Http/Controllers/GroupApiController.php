<?php

namespace App\Http\Controllers;

use App\Models\group;
use App\Models\Groupcomment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use function Pest\Expectations\json;
use function Pest\Plugins\Parallel\Support\errors;
use Illuminate\Support\Facades\URL;
use App\Models\category;


class GroupApiController extends Controller
{
    public function index()
    {
        $categories = Category::get();

        // Append base URL to image names
        foreach ($categories as $category) {
            $category->image = url('/posts/' . $category->image);
        }

        return response()->json([
            'categories' => $categories,
            'message' => 'success'
        ]);
    }


    public function create(Request $request)
    {


        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'errors' => $validate->errors(),
            ]);
        } else {

            $category = new category;
            $category->user_id = $request->user_id;
            $category->name = $request->name;
                        
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $newName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            
                // Move the image to the public directory
                $image->move(public_path('posts/'), $newName);
            
                // Generate the URL for the image
                $imageUrl = url('posts/' . $newName);
            
                // Now you can use $imageUrl to store in the database or return as a response
            }


                $category->image = $newName;

            }

            $category->save();

            $imagepath = $newName ? url('posts/' . $newName) : null;
            return response()->json([
                'message' => 'Category added Successfully',
                'category' => $category,
                'image_path' => $imagepath ?? null,
            ]);
        }
    

    public function edit(Request $request, $id)
    {

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required'
        ]);


        $category = category::find($id);


        if ($validate->fails()) {

            return response()->json([
                "errors" => $validate->errors(),
            ]);
        }
        if ($category) {

            $category->name = $request->name;


            if ($request->hasFile('image')) {

                if (file_exists(public_path('posts/' . $category->image))) {
                    unlink(public_path('posts/' . $category->image));
                }

                $image = $request->file('image');
                $newName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                $destpath = public_path('posts/');


                $image->move($destpath, $newName);

                $category->image = $newName;

            }

            $category->save();


            $imagepath = $newName ? url('posts/' . $newName) : null;

            return response()->json([
                'message' => 'Category Added Successfully',
                'Data' => $category,
                'Path' => $imagepath ?? null,
            ]);




        } else {
            return response()->json([
                'message' => 'Category Not founded'
            ]);
            $category->save();

            return response()->json([
                'message' => 'Category Edit Successfully',
            ]);

        }

    }

    public function delete($id)
    {

        $category = category::find($id);

        if ($category) {
            if (file_exists(public_path('posts/' . $category->image))) {
                unlink(public_path('posts/' . $category->image));
            }
            $category->delete();

            return response()->json([
                'message' => 'Category deleted Successfully',
            ]);
        } else {
            return response()->json([
                'error' => 'Category not Found',
            ]);
        }

    }

    public function groupindex($id)
    {
        $groups = group::where('category_id', $id)->get();

        foreach ($groups as $group) {
          $group->image = url('/blogphotos/' . $group->image);
        }

        return response()->json([
            'caterory' => $groups,
        ]);
    }

public function commentindeex()
{
    // Eager load groups with their related category, group comments, replies, and user data
    $groups = Group::with([
        'category.user',                   // Load the related category with user data
        'groupComments.replies.user',      // Load replies with user data
        'groupComments.user',              // Load group comment user data
        'user'                             // Load group user data
    ])->get();

    // Helper function to get the full URL for profile images
    $getProfileImageUrl = function ($imagePath) {
        if ($imagePath && !str_starts_with($imagePath, 'http')) {
            return URL::to("storage/profileimage/{$imagePath}");
        }
        return $imagePath;
    };
    
    $getGroupImageUrl = function ($imagePath) {
        if ($imagePath && !str_starts_with($imagePath, 'http')) {
            return URL::to("blogphotos/{$imagePath}");
        }
        return $imagePath;
    };

    // Helper function to get the full URL for general images
    $getImageUrl = function ($imagePath) {
        if ($imagePath && !str_starts_with($imagePath, 'http')) {
            return URL::to("/posts/{$imagePath}");
        }
        return $imagePath;
    };

    // Process groups to add full URL for images and replace category_id with category data
    $groups->each(function ($group) use ($getImageUrl, $getProfileImageUrl, $getGroupImageUrl) {
        
        // Handle the group's image
        $group->image = $getGroupImageUrl($group->image);

        // Handle the group's user image
        if ($group->user->image) {
            $group->user->image = $getProfileImageUrl($group->user->image);
        }

        // Extract and modify category data
        $category = $group->category;
        if ($category) {
            $category->image = $getImageUrl($category->image);

            if ($category->user && $category->user->image) {
                $category->user->image = $getProfileImageUrl($category->user->image);
            }
            
            unset($category->user_id);

            // Assign the modified category data back to the group
            $group->setRelation('category', $category);
        }

        unset($group->category_id);

        // Process each group comment within the group
        $group->groupComments->each(function ($groupcomment) use ($getProfileImageUrl) {
            if ($groupcomment->user->image) {
                $groupcomment->user->image = $getProfileImageUrl($groupcomment->user->image);
            }

            // Generate URL for groupcomment's user_image
            $groupcomment->user_image = $getProfileImageUrl($groupcomment->user_image);

            unset($groupcomment->user_id);
            unset($groupcomment->user_image);
            unset($groupcomment->user_name);

            // Process each reply within the group comment
            $groupcomment->replies->each(function ($reply) use ($getProfileImageUrl) {
                if ($reply->user->image) {
                    $reply->user->image = $getProfileImageUrl($reply->user->image);
                }

                // Generate URL for reply's user_image
                $reply->user_image = $getProfileImageUrl($reply->user_image);

                unset($reply->user_id);
                unset($reply->user_image);
                unset($reply->user_name);
            });
        });
    });

    return response()->json([
        'posts' => $groups,
        'message' => 'success'
    ]);
}

public function groupcreate(Request $request)
{
    $validator = Validator::make($request->all(), [
        'category_id' => 'required',
        'group_name' => 'required',
        'status' => 'required',
        'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image if present
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors(),
        ], 422); // Provide HTTP status code for validation errors
    }

      // Function to get the full URL for an image
    function getFullUrl($imagePath, $directory)
    {
        if ($imagePath && !str_starts_with($imagePath, 'http')) {
            return URL::to("/{$imagePath}");
        }
        return $imagePath;
    }


    $group = new Group(); // Ensure class name starts with an uppercase letter
    $group->user_id = $request->user_id;
    $group->category_id = $request->category_id;
    $group->group_name = $request->group_name;
    $group->status = $request->status;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $newName = time() . '.' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('blogphotos/'), $newName);
        $group->image = $newName;
    }

    $group->save();

    // Construct the base URL for the image
    $imagepath = getFullUrl($group->image, 'blogphotos'); // Use the same URL function as in commentindeex

    return response()->json([
        'message' => 'Group Added Successfully',
        'group' => $group,
        'image_path' => $imagepath,
    ]);
}


    public function groupedit($id, Request $request)
    {
        $group = group::find($id);
//        dd($group);
        if ($group) {

            $validate = Validator::make($request->all(), [
                'group_name' => 'required',
                'status' => 'required',
            ]);
            if ($validate->fails()) {
                return response()->json([
                    'error' => $validate->errors(),
                ]);
            } else {

                $group->group_name = $request->group_name;
                $group->status = $request->status;


                if ($request->hasFile('image')) {
                    if (file_exists(public_path('blogphotos/' . $group->image))) {
                        unlink(public_path('blogphotos/' . $group->image));
                    }

                    $image = $request->file('image');
                    $newName = time() . '.' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $destpath = public_path('blogphotos/');

                    $image->move($destpath, $newName);


                    $group->image = $newName;
                }


                $group->save();

                $imagepath = $newName ? url('blogphotos/' . $newName) : null;


                return response()->json([
                    'message' => 'Group Edit Successfully',
                    'data' =>$group,
                    'path' => $imagepath
                ]);


            }

        }else{
            return response()->json([
               'error' => 'Group not Found'
            ]);
    }


    }

    public function groupdelete($id)
    {
        $group = group::find($id);

        if ($group) {
            if (file_exists(public_path('blogphotos/' . $group->image))) {
                unlink(public_path('blogphotos/' . $group->image));
            }

            $group->delete();

            return response()->json([
                'message' => 'Group Deleted Succcessfully',
            ]);
        }
        return response()->json([
            'message' => 'Group Not Found',
        ]);

    }


public function commentIndex($id)
{
    // Eager load a single group with related comments, replies, and their associated user data
    $group = Group::with([
        'groupComments.replies.user',  // Load replies with user data
        'groupComments.user'           // Load group comment user data
    ])->findOrFail($id);

    // Helper function to get the full URL for profile images
    $getProfileImageUrl1 = function ($imagePath) {
        if ($imagePath && !str_starts_with($imagePath, 'http')) {
            return URL::to("storage/profileimage/{$imagePath}");
        }
        return $imagePath;
    };

    // Process each group comment to format image URLs
    $group->groupComments->each(function ($groupcomment) use ($getProfileImageUrl1) {
        if ($groupcomment->user && $groupcomment->user->image) {
            $groupcomment->user->image = $getProfileImageUrl1($groupcomment->user->image);
        }

        // Generate URL for groupcomment's user_image
        $groupcomment->user_image = $getProfileImageUrl1($groupcomment->user_image);

        unset($groupcomment->user_id);
        unset($groupcomment->user_image);
        unset($groupcomment->user_name);

        // Process each reply within the group comment
        $groupcomment->replies->each(function ($reply) use ($getProfileImageUrl1) {
            if ($reply->user && $reply->user->image) {
                $reply->user->image = $getProfileImageUrl1($reply->user->image);
            }

            // Generate URL for reply's user_image
            $reply->user_image = $getProfileImageUrl1($reply->user_image);

            unset($reply->user_id);
            unset($reply->user_image);
            unset($reply->user_name);
        });
    });

    return response()->json([
        'comments' => $group->groupComments,
        'message' => 'success'
    ]);
}



    public function createcomments(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'comment' => 'required'
        ]);
        if ($validate->fails()) {
            return response()->json([
                'error' => $validate->errors(),
            ]);
        }

        $comment = new Groupcomment;
        $comment->user_id = $request->user_id;
        $comment->group_id = $request->group_id;
        $comment->user_name = $request->user_name;
        $comment->comment = $request->comment;
        $comment->save();

        return response()->json([
            'message' => 'Comment Added Successfully',
            'comment' => $comment
        ]);

    }


    public function editcomment($id, Request $request)
    {

        $comments = Groupcomment::find($id);

        if (!$comments) {
            return response()->json([
                'message' => 'Comments Not Found',
            ]);

        }
        $comments->comment = $request->comment;
        $comments->save();

        return response()->json([
            'message' => 'Comment Update Successfully',
        ]);
    }


    public function deletecomment($id)
    {
        $comment = Groupcomment::find($id);
//        dd($comment);

        if (!$comment) {
            return response()->json([
                'message' => 'Comment Not Founded',

            ]);
        }

        $comment->delete();
        return response()->json([
            'message' => 'Comment Deleted Successfully'
        ]);
    }

}
