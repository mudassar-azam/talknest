<?php

namespace App\Http\Controllers;

use App\Events\CommentDeleted;
use App\Events\CommentEdited;
use App\Events\CommentPosted;
use App\Events\MessageSent;
use App\Events\ReplayDeleted;
use App\Events\ReplayPosted;
use App\Events\ReplayUpdated;
use App\Mail\ContactFormSubmission;
use App\Models\blog;
use App\Models\Chat;
use App\Models\CommentReplay;
use App\Models\User;
use App\Models\Comment;
use App\Models\message;
use App\Models\category;
use App\Models\memberpost;
use App\Events\PostComment;
use Illuminate\Http\Request;
use App\Events\ChatMessageSent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\returnSelf;

class APIController extends Controller
{

    public function register(Request $request)
    {
        // Validate the input data for name, email, password, nickname, image, and cover_image
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'nickname' => ['required'],
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 400); // 400 Bad Request status code
        }

        // Handle image and cover_image uploads
        // Handle image and cover_image uploads if they exist
          $imageFileName = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageFileName = time() . '.' . $image->getClientOriginalExtension();
        // Move the file to the storage/profileimage directory
        $image->move(public_path('storage/profileimage'), $imageFileName);
        // Generate the full URL for the image
        $imageFileName = url('storage/profileimage/' . $imageFileName);
    }

    $coverImageFileName = null;
    if ($request->hasFile('cover_image')) {
        $cover_image = $request->file('cover_image');
        $coverImageFileName = time() . '.' . $cover_image->getClientOriginalExtension();
        // Move the file to the storage/cover_image directory
        $cover_image->move(public_path('storage/cover_image'), $coverImageFileName);
        // Generate the full URL for the cover image
        $coverImageFileName = url('storage/cover_image/' . $coverImageFileName);
    }
        // Create a new user record
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'nickname' => $request->input('nickname'),
            'image' => $imageFileName,
            'cover_image' => $coverImageFileName,
        ]);

        $user->save();

        // You can also generate an access token and return it for user authentication

        return response([
            'message' => 'User registered successfully',
            'status' => 'Ok',
            'user' => $user,
        ], 200); // 200 OK status code for a successful request
    }


    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'error' => ["Email or password not matched"]
            ], 401);
        }

        return response([
            'message' => "Login successful",
            'status'  =>  "Ok",
             'user' => $user
        ], 200);
    }


    public function update(Request $request, $id)
    {
        // Find the user by ID
        $user = User::find($id);
        if (!$user) {
            return response(['message' => 'User not found'], 404); // 404 Not Found status code
        }

        // Validate the input data for name, email, and other updates
        $validator = Validator::make($request->all(), [
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'email' => ['sometimes', 'required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'nickname' => ['sometimes', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 400); // 400 Bad Request status code
        }

        // Handle image and cover_image uploads (if provided)
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('storage/profileimage');
            $image->move($path, $name);
            $user->image = $name;
        }

        if ($request->hasFile('cover_image')) {
            $cover_image = $request->file('cover_image');
            $covername = time() . '.' . $cover_image->getClientOriginalExtension();
            $path = public_path('storage/cover_image');
            $cover_image->move($path, $covername);
            $user->cover_image = $covername;
        }

        if ($request->has('nickname')) {
            $user->nickname = $request->input('nickname');
        }

        // Use the update method to update user attributes
        $user->update($request->only('name', 'email'));

        // Return a response indicating successful update with a status of 200 OK
        return response([
            'message' => 'User updated successfully',
            'status' => 'Ok',
            'user' => $user
        ], 200); // 200 OK status code for a successful request
    }

//category
public function getCategoryData()
{
    $categories = Category::select('id', 'name', 'image')->get();

    return response([
        'message' => 'Category data retrieved successfully',
        'status' => 'Ok',
        'categories' => $categories
    ], 200);
}


public function getBlogsByCategory($categoryId)
{
    // Retrieve blogs for the specified category and include the category name
    $blogs = Blog::where('category_id', $categoryId)
        ->join('categories', 'blogs.category_id', '=', 'categories.id')
        ->select('blogs.*', 'categories.name as category_name')
        ->get();

    return response([
        'message' => 'Blogs retrieved by category successfully',
        'status' => 'Ok',
        'blogs' => $blogs
    ], 200);
}


public function getBlog($blogId)
{
    $blog = blog::with('comments')->find($blogId);

    if (!$blog) {
        return response([
            'message' => 'Blog not found',
        ], 404); // 404 Not Found status code
    }

    return response([
        'message' => 'Blog retrieved successfully',
        'status' => 'Ok',
        'blog' => $blog
    ], 200);
}

public function getallblogs()
{
    $blogs = blog::all();
    if (!$blogs) {
        return response([
            'message' => 'Blog not found',
        ], 404); // 404 Not Found status code
    }

    return response([
        'message' => 'Blogs retrieved successfully',
        'status' => 'Ok',
        'blog' => $blogs
    ], 200);
}

public function aboutus(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required',
        'subject' => 'required',
        'message' => 'required',
    ]);

    if ($validator->fails()) {
        return response(['errors' => $validator->errors()], 400); // 400 Bad Request status code
    }

    // Create a new about us record and save it to the database
    message::create($request->all());

    return response(['message' => 'About us information saved successfully'], 200);
}

    public function apostComment(Request $request)
    {
        // Define validation rules
        $rules = [
            'username' => 'required',
            'email' => 'required|email',
            'text' => 'required',
        ];

        // Run validation
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Validation passed, create comment
        $comment = Comment::create([
            'blog_id' => $request->blog_id,
            'user_id' => $request->user_id,
            'username'=> $request->username,
            'email' => $request->email,
            'text' => $request->text,
        ]);

        // Broadcast the comment using Pusher
        broadcast(new CommentPosted($comment))->toOthers();


        return response()->json([
            'message' => 'Comment added successfully',
            'data' => $comment,
            'success'=>true
        ]);
    }
    public function postComment(Request $request)
    {
        // Define validation rules
        $rules = [
            'post_id' => 'nullable',
            'blog_id' => 'nullable',
            'user_id' => 'nullable',
            'text' => 'required|string',
        ];

        // Run validation
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Validation passed, create comment
        $comment = Comment::create([
            'post_id' => $request->post_id,
            'user_id' => $request->user_id,
            'blog_id' => $request->blog_id,
            'text' => $request->text,
        ]);

        // Broadcast the comment using Pusher
        broadcast(new CommentPosted($comment))->toOthers();

        $comment->load('replies');
        return response()->json([
            'message' => 'Comment added successfully',
            'data' => $comment,
            'success'=>true
        ]);
    }

    public function allcomments()
{
    $comments = Comment::with('replies')->get();

    if ($comments->isEmpty()) {
        return response()->json([
            'message' => 'Comments not found',
        ], 404); // 404 Not Found status code
    }

    return response()->json([
        'message' => 'Comments retrieved successfully',
        'status' => 'Ok',
        'comments' => $comments
    ], 200);
}
    public function updateComment(Request $request, $id)
    {

        $comment = Comment::find($id);
        if(!$comment){
            return response()->json([
                'message' => 'Comment not found',
                'success'=>false
            ]);
        }

        // Define validation rules
        $rules = [
            'text' => 'required|string',
        ];

        // Run validation
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Update the comment
        $comment->text = $request->comment;
        $comment->save();

        // Broadcast the edited comment using Pusher
        broadcast(new CommentEdited($comment))->toOthers();




        return response()->json([
            'message' => 'Comment updated successfully',
            'data' => $comment,
            'success' => true
        ]);
    }

            public function deleteComment($id)
            {
                $comment = Comment::find($id);

                if (!$comment) {
                    return response()->json([
                        'success'=> false,
                        'error' => 'Comment not found'
                    ], 404);
                }

                $comment->delete();

                // Broadcast the CommentDeleted event
                broadcast(new CommentDeleted($id))->toOthers();

                return response()->json(['success' => true, 'message' => 'Comment deleted successfully'], 200);
            }
            
            public function getCategoryDataWithCommentsAndReplies()
            {
                $categories = Category::with(['blogs.comments.replies'])->get();
            
                $categoryData = $categories->map(function ($category) {
                    return [
                        'id' => $category->id,
                        'name' => $category->name,
                        'image' => $category->image,
                        'comments' => $category->blogs->flatMap(function ($blog) {
                            return $blog->comments->map(function ($comment) {
                                return [
                                    'id' => $comment->id,
                                    'text' => $comment->text,
                                    'replies' => $comment->replies->map(function ($reply) {
                                        return [
                                            'id' => $reply->id,
                                            'reply' => $reply->reply,
                                            'user_id' => $reply->user_id,
                                            'comment_id' => $reply->comment_id,
                                        ];
                                    }),
                                    'user_id' => $comment->user_id,
                                    'blog_id' => $comment->blog_id,
                                ];
                            });
                        })->values(),
                    ];
                });
            
                return response()->json([
                    'message' => 'Categories with comments and replies retrieved successfully',
                    'status' => 'Ok',
                    'categories' => $categoryData
                ], 200);
            }



    public function sendMessage(Request $request)
    {


        $request->validate([
            'message' => 'required|string',
            'attachment' => 'nullable|file',
        ]);



        $message = new Chat();
        $message->from_id = $request->from_id;
        $message->to_id = $request->to_id;
        $message->roomid = $request->room_id ?? null;
        $message->message = $request->message;
        if ($request->hasFile('attachment')) {

            $attachment = $request->file('attachment');
            $attachmentName = time() . '_' . $attachment->getClientOriginalName();
            Storage::disk('public')->putFileAs('chat_attachments', $attachment, $attachmentName);
            $message->attachment = $attachmentName;
        }


        $message->save();




        broadcast(new MessageSent($message))->toOthers();

        return response()->json($message);
    }

    public function room_messages($id)
    {
        $chats = Chat::where('roomid', $id)->get();
        return response()->json($chats);
    }

public function getallchat()
{
    $chats = Chat::all();

    return response()->json($chats);
}

public function getalluser()
{
    $users = User::all();

    return response([
        'message' => 'Users data retrieved successfully',
        'status' => 'Ok',
        'categories' => $users
    ], 200);
}
    public function show($id)
    {
        $user = User::with('posts')->find($id);

        if (!$user) {
            return response()->json([
                'success'=> false,
                'message' => 'User not found'], 404);
        }

        return response([

            'success' => true,
            'data' => $user
        ], 200);
    }

public function getChatsBetweenUsers($from_id, $to_id)
{


    $chats = Chat::where(function ($query) use ($from_id, $to_id) {
                $query->where('from_id', $from_id)
                      ->where('to_id', $to_id);
            })
            ->orWhere(function ($query) use ($from_id, $to_id) {
                $query->where('from_id', $to_id)
                      ->where('to_id', $from_id);
            })
            ->get();

    if ($chats->isEmpty()) {
        return response([
            'message' => 'No chats found',
            'status' => 'Ok',
            'chats' => []
        ], 200);
    }

    return response([
        'message' => 'Chats between users retrieved successfully',
        'status' => 'Ok',
        'chats' => $chats
    ], 200);
}

public function memberpost(Request $request)
{
    // Save the blog post to the database
    $blog = new memberpost; // Assuming your model is named 'Blog'
    $blog->user_id = $request->user_id;
    $blog->heading = $request->heading;
    $blog->seen = $request->seen;
    $blog->posted_by = $request->posted_by;

    $images = array();
    if ($request->hasFile('images')) {
        $files = $request->file('images');
        foreach ($files as $file) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $file->move('memberpost', $image_full_name);
            $images[] = $image_full_name;
        }
    }
    $blog->images = json_encode($images);

    $blog->save();

    return response()->json(['message' => 'Post added successfully.']);
}



public function getallmemberpost()
{
    $posts = DB::table('memberposts')
        ->join('users', 'memberposts.user_id', '=', 'users.id')
        ->select('memberposts.*', 'users.*')
        ->get();

    if ($posts->isEmpty()) {
        return response([
            'message' => 'No posts found',
            'status' => 'Ok',
            'Posts' => []
        ], 200);
    }

    return response([
        'message' => 'Posts retrieved successfully',
        'status' => 'Ok',
        'Posts' => $posts
    ], 200);
}


    public function postCommentReplay(Request $request)
    {
        // Define validation rules
        $rules = [
            'blog_id' => 'required|exists:blogs,id',
            'user_id' => 'required|exists:users,id',
            'comment_id' => 'required|exists:comments,id',
            'replay' => 'required|string',
        ];

        // Run validation
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Validation passed, create comment
        $replay = CommentReplay::create([
            'blog_id' => $request->blog_id,
            'user_id' => $request->user_id,
            'comment_id' => $request->comment_id,
            'replay'=> $request->replay
        ]);

        // Broadcast the comment using Pusher
        broadcast(new ReplayPosted($replay))->toOthers();
        return response()->json([
            'message' => 'replay added successfully',
            'data' => $replay,
            'success'=>true
        ]);
    }
    public function updateReplay(Request $request, $id)
    {
        $replay = CommentReplay::findOrFail($id);

        // Define validation rules
        $rules = [
            'replay' => 'required|string',
        ];

        // Run validation
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Update the comment reply
        $replay->update([
            'replay' => $request->replay,
        ]);

        // Broadcast the updated comment reply using Pusher
        broadcast(new ReplayUpdated($replay))->toOthers();

        return response()->json([
            'success' => true,
            'message' => 'Comment reply updated successfully'
        ], 200);
    }
    public function deleteReplay($id)
    {
        $replay = CommentReplay::find($id);
        if (!$replay) {
            return response()->json([
                'success'=> false,
                'error' => 'replay not found'
            ], 404);
        }

        // Delete the comment reply
        $replay->delete();

        // Broadcast the deleted comment reply using Pusher
        broadcast(new ReplayDeleted($id))->toOthers();

        return response()->json(['success' => true, 'message' => 'Comment reply deleted successfully'], 200);
    }

    public function submitForm(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Process the form data (you can store it in a database or send an email)
        // For example, you can use Eloquent to store in the database
        // Contact::create($request->all());

        // Send email to admin
        $adminEmail = '786aq1bhan1f@gmail.com'; // Replace with the admin's email
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ];


        Mail::to($adminEmail)->send(new ContactFormSubmission($data));

        return response()->json(['message' => 'Email sent successfully'], 200);
        
        
        
    }
public function commentindeex($id)
{
    // Eager load comments and their replies along with the user for each
    $group = Group::with([
        'comments.replies.user', // Replies to comments with user info
        'comments.user' // User who made the comments
    ])->find($id);

    if (!$group) {
        return response()->json(['message' => 'Group not found'], 404);
    }

    return response()->json([
        'group' => $group,
        'message' => 'success'
    ]);
}





}
