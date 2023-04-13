<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\category;
use App\Models\Comment;
use Illuminate\Http\Request;

class FrontController extends Controller
{
   public function blogdetail($id)
   {
    $detail = blog::findOrFail($id);
    return view('front.blogdetail', compact('detail'));
   }

   public function addComment(Request $request) {
    dd($request);
    $this->validate($request, [
        'username' => 'required',
        'email' => 'required|email',
        'text' => 'required',
    ]);

    $comment = new Comment;
    $comment->username = $request->input('username');
    $comment->email = $request->input('email');
    $comment->mobile = $request->input('mobile');
    $comment->text = $request->input('text');
    $comment->save();

    return redirect()->back()->with('success', 'Comment added successfully.');
}

}
