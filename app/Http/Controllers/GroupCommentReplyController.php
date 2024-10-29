<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class GroupCommentReplyController extends Controller
{
    public function commentReply(Request $request){
        $commentId = $request->input('id');
        $userId = auth()->id();
        $replyText = $request->input('reply');
        $user_image = Auth::user()->image;
        $user_name = Auth::user()->name;

        DB::table('group_comment_replies')->insert([
            'comment_id' => $commentId,
            'user_id' => $userId,
            'reply' => $replyText,
            'user_image' => $user_image,
            'user_name' => $user_name,
        ]);

        return redirect()->back();
    }
}
