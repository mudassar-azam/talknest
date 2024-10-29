<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\blog;
use App\Models\Comment;
use App\Models\category;
use App\Models\Bolgcomment;
use App\Models\Groupcomment;
use App\Models\group;
use Illuminate\Http\Request;
use App\Models\Access;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class FrontController extends Controller
{

 public function addToFav($id){
        try {
            // Find the category by id
            $category = category::find($id);

            if (!$category) {
                return response()->json(['message' => 'Category not found'], 404);
            }

            // Update the add_to_fav field to true
            $category->update(['add_to_fav' => true]);

            return redirect()->back()->with('message','Fav added  Successfully');

        } catch (\Exception $e) {
            // Handle any exceptions
            return response()->json(['message' => 'Failed to add category to favorites', 'error' => $e->getMessage()], 500);
        }
    }
    public function removeFromFav($id){
        try {
            // Find the category by id
            $category = category::find($id);

            if (!$category) {
                return response()->json(['message' => 'Category not found'], 404);
            }

            // Update the add_to_fav field to true
            $category->update(['add_to_fav' => false]);

            return redirect()->back()->with('message','Fav Removed');

        } catch (\Exception $e) {
            // Handle any exceptions
            return response()->json(['message' => 'Failed to add category to favorites', 'error' => $e->getMessage()], 500);
        }
    }
     public function addPost(Request $request)
   {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'status' => 'required',
        ]);
        $post = new category;
        $post->user_id = Auth::user()->id;
        $post->name = $request->name;

        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('posts',$imagename);
        $post->image = $imagename;
        $post->status = $request->status;

        $post->save();

        return response()->json(['success' => true]);
   }
   public function fetchtPosts()
   {
       $posts = category::all();
       $authenticated = Auth::check();
       return response()->json([
        'posts' => $posts,
        'authenticated' => $authenticated
    ]);
   }
   public function deletePost(Request $request , $id)
    {

        $userId = auth()->id();
        $postId = $id;
        $post = category::find($postId);
        if ($post && $post->user_id == $userId) {
            $post->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Unauthorized or post not found']);
    }

    public function editpost($id)
    {
        $post = category::find($id);
        $userId1 = $post->user_id;
        $userId2 = auth()->id();
        if($userId1 == $userId2){
            return view('front.editpost', compact('post'));
        }
        else{
            return redirect()->back()->with('failure','You cannot edit this post !');
        }
    }
 public function postEdit(Request $request , $id)
    {
        $post = category::find($id);
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $post = category::find($id);
        $post->name = $request->name;
        if ($request->hasFile('image')) {
            $image=$request->image;
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('posts',$imagename);
            $post->image=$imagename;
        }
        $post->status = $request->status;
        $post->save();
        return redirect()->back()->with('message','Post Edited Successfully');
    }

   public function blogdetail($id)
   {
    $detail = blog::findOrFail($id);
    $blog = DB::table('blogs')->where('id', $id)->first();
    $comments = DB::table('comments')->where('blog_id', $id)->get();
    $commentsCount = $comments->count();
    return view('front.blogdetail', compact('detail','blog', 'comments', 'commentsCount'));
   }

       public function addCatComment(Request $request)
   {
       $this->validate($request, [
           'username' => 'required',
           'email' => 'required|email',
           'text' => 'required',
       ]);
       $id = $request->input('blog_id');
       $comment = new Comment;
       $comment->blog_id  = $request->input('blog_id');
       $comment->user_id  = $request->input('user_id');
       $comment->username = $request->input('username');
       $comment->email = $request->input('email');
       $comment->mobile = $request->input('mobile');
       $comment->text = $request->input('text');
       $comment->save();

       return response()->json(['success' => true , 'id' => $id ,'user_name' => Auth::user()->name]);
   }

   public function fetchCatComment($id)
   {
       $comments = Comment::where('blog_id',$id)->get();
       $noc = $comments->count();
       return response()->json(['comments' => $comments , 'noc' => $noc]);
   } 

   public function addComment(Request $request)
   {
       $this->validate($request, [
           'username' => 'required',
           'email' => 'required|email',
           'text' => 'required',
       ]);

       $comment = new Comment;
       $comment->blog_id  = $request->input('blog_id');
       $comment->user_id  = $request->input('user_id');
       $comment->username = $request->input('username');
       $comment->email = $request->input('email');
       $comment->mobile = $request->input('mobile');
       $comment->text = $request->input('text');
       $comment->save();

       return response()->json(['success' => true]);
   }

   public function profile()
   {
       $filename = Auth()->user()->image;
       $filePath = asset($filename);
       return view('front.profile', ['filePath' => $filePath]);
   }
   
   
   
 public function addGroupName(Request $request)
{
    // Validate request
    $this->validate($request, [
        'name' => 'required',
        'visibility' => 'required',
    ]);

    // Create new group instance
    $group = new Group;
    $group->category_id = $request->input('blog_id');
    $group->user_id = Auth::user()->id;
    $group->group_name = $request->input('name');
    $group->status = $request->input('visibility');


// Handle file upload
if ($request->hasFile('image')) {
    $photo = $request->file('image');
    $fileName = uniqid() . '.' . $photo->getClientOriginalExtension();
    $destinationPath = public_path('blogphotos');
    $photo->move($destinationPath, $fileName);

    // Store only the relative path in the database
    $group->image = 'blogphotos/' . $fileName;
} else {
    // Handle the case where there is no image
    $group->image = $group->image; // Or set it to some default value if needed
}

// Save the group object
$group->save();


// Save the group object
$group->save();

// Save the group object
$group->save();

    // Save group
    $group->save();

    // Generate image URL
    $imageUrl = url('blogphotos/' . $group->image);

    return redirect()->back();
}


    public function blogcomment(Request $request){


       $validate = Validator::make($request->all() , [
           'comment' => 'required',
       ]);

    //   dd($request->comment);
        if($validate->fails()){

//            dd($validate->errors());
            return redirect()->back();
        }
      else
        {
            $bolgcomment = new Groupcomment;
            $bolgcomment->user_id = Auth::user()->id;
            $bolgcomment->group_id = $request->group_id;
            $bolgcomment->user_name = Auth::user()->name;
            $bolgcomment->user_image = Auth::user()->image;
            $bolgcomment->comment = $request->comment;
            $bolgcomment->save();
            return redirect()->back();
        }




    }

    public function updatecomment(Request $request){

//dd($request->all());
       $comment = Groupcomment::find($request->id);

       if(!$comment){
           return redirect()->back()->with('error', 'Comment not found.');
       }

        $comment->comment = $request->comment;
        $comment->save();


        return redirect()->back()->with('success', 'Comment Updated successfully.');

    }
    public function deletecomment($id){
        $comment = Groupcomment::find($id);
        if (!$comment) {
            return redirect()->back()->with('error', 'Comment not found.');
        }
        $comment->delete();
        DB::table('group_comment_replies')->where('comment_id', $id)->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }

    public function editblog(Request $request){


        $group = group::find($request->id);
//        dd($group);
        if(!$group){
             return redirect()->back()->with('error', 'Group not found.');
        }
        else{
            $group->group_name = $request->name;
            $group->status = $request->visibility;

            if ($request->hasFile('image')) {

                $imagePath = public_path('blogphotos/' . $group->image);
                if (file_exists($imagePath) && is_file($imagePath)) {
                    // Delete the image file
                    unlink($imagePath);
                }


                $photo = $request->file('image');

                $fileName = uniqid() . '.' . $photo->getClientOriginalExtension();

                $destinationPath = public_path('blogphotos');

                $photo->move($destinationPath, $fileName);
                $group->image = $fileName;
            }

            $group->save();

            return redirect()->back()->with('success', 'Group Updated successfully.');
        }


    }

    public function deleteblog($id){


        $group = group::find($id);

        if (!$group) {
            return redirect()->back()->with('error', 'Group not found.');
        }

        $imagePath = public_path('blogphotos/' . $group->image);
        if (file_exists($imagePath) && is_file($imagePath)) {
            // Delete the image file
            unlink($imagePath);
        }

        $comments = Groupcomment::where('group_id' , $id);
        $comments->delete();

        $group->delete();

        return redirect()->back()->with('success', 'Group deleted successfully.');

    }


   public function joinGroup(Request $request)
    {
        $userId = auth()->id();
        $access = new Access();
        $access->group_id = $request->input('blog_id');
        $access->user_id = $userId;
        $access->save();
        return redirect()->back()->with('success', 'You have joined this group !');
    }

    public function leaveGroup(Request $request)
    {
        $userId = auth()->id();
        $blog_id =  $request->input('blog_id');
        $access = Access::where('group_id', $blog_id)
                ->where('user_id', $userId)
                ->first();
        $access->delete();
        return redirect()->back()->with('success', 'You have leaved this group !');
    }
}
