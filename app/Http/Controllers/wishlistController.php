<?php

namespace App\Http\Controllers;

use App\Models\wishlist;
use App\Models\dashboard_comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class wishlistController extends Controller
{
    public function addwishlist(Request $request){
        if(Auth::check() == false ){

            return redirect('/')->with("error","Please login first");
        }


        wishlist::updateOrCreate(
            [
                "user_id" => Auth::user()->id,
                'name' => $request->title,
                'description' => $request->description,
            ],
            [
                "user_id" => Auth::user()->id,
                'name' => $request->title,
                'description' => $request->description,
            ],
        );
        return redirect()->route('dashboard')->with("success","Added into Wishlist");
    }

public function tslaComment(Request $request)
    {
        $request->validate([
            'tslaComment' => 'required|string',
        ]);
        $symbol1 = $request->input('Symbol1');
        $comment = new dashboard_comment();
        $comment->user_id = Auth::id();
        $comment->user_name = Auth::user()->name;
        $comment->comment_message = $request->tslaComment;
        $comment->name = $symbol1;
        $comment->save();
        return response()->json(['success' => true, 'user_name' => Auth::user()->name]);
    }

    public function fetchtslaComments()
    {
        $comments = dashboard_comment::where('name', 'TSLA')
            ->orderBy('created_at', 'desc')
            ->get();
        return response()->json(['comments' => $comments]);
    }   

     
    
    public function msftComment(Request $request)
    {
        $request->validate([
            'msftComment' => 'required|string',
        ]);
        $symbol1 = $request->input('Symbol1');
        $comment = new dashboard_comment();
        $comment->user_id = Auth::id();
        $comment->user_name = Auth::user()->name;
        $comment->comment_message = $request->input('msftComment');
        $comment->name = $symbol1;
        $comment->save();
        return response()->json(['success' => true, 'user_name' => Auth::user()->name]);
    }

    public function fetchmsftComments()
    {
        $comments = dashboard_comment::where('name', 'MSFT')->orderBy('created_at', 'desc')
            ->get();
        return response()->json(['comments' => $comments]);
    }  

    public function brkComment(Request $request)
    {
        $request->validate([
            'brkComment' => 'required|string',
        ]);
        $symbol1 = $request->input('Symbol1');
        $comment = new dashboard_comment();
        $comment->user_id = Auth::id();
        $comment->user_name = Auth::user()->name;
        $comment->comment_message = $request->input('brkComment');
        $comment->name = $symbol1;
        $comment->save();
        return response()->json(['success' => true, 'user_name' => Auth::user()->name]);
    }

    public function fetchbrkComments()
    {
        $comments = dashboard_comment::where('name', 'BRK')->orderBy('created_at', 'desc')
            ->get();
        return response()->json(['comments' => $comments]);
    } 

    public function vtiComment(Request $request)
    {
        $request->validate([
            'vtiComment' => 'required|string',
        ]);
        $symbol1 = $request->input('Symbol1');
        $comment = new dashboard_comment();
        $comment->user_id = Auth::id();
        $comment->user_name = Auth::user()->name;
        $comment->comment_message = $request->input('vtiComment');
        $comment->name = $symbol1;
        $comment->save();
        return response()->json(['success' => true, 'user_name' => Auth::user()->name]);
    }

    public function fetchvtiComments()
    {
        $comments = dashboard_comment::where('name', 'VTI')->orderBy('created_at', 'desc')
            ->get();
        return response()->json(['comments' => $comments]);
    } 
    
    public function googlComment(Request $request)
    {
        $request->validate([
            'googlComment' => 'required|string',
        ]);
        $symbol1 = $request->input('Symbol1');
        $comment = new dashboard_comment();
        $comment->user_id = Auth::id();
        $comment->user_name = Auth::user()->name;
        $comment->comment_message = $request->input('googlComment');
        $comment->name = $symbol1;
        $comment->save();
        return response()->json(['success' => true, 'user_name' => Auth::user()->name]);
    }

    public function fetchgooglComments()
    {
        $comments = dashboard_comment::where('name', 'GOOGL')->orderBy('created_at', 'desc')
            ->get();
        return response()->json(['comments' => $comments]);
    } 

    public function aaplComment(Request $request)
    {
        $request->validate([
            'aaplComment' => 'required|string',
        ]);
        $symbol1 = $request->input('Symbol1');
        $comment = new dashboard_comment();
        $comment->user_id = Auth::id();
        $comment->user_name = Auth::user()->name;
        $comment->comment_message = $request->input('aaplComment');
        $comment->name = $symbol1;
        $comment->save();
        return response()->json(['success' => true, 'user_name' => Auth::user()->name]);
    }

    public function fetchaaplComments()
    {
        $comments = dashboard_comment::where('name', 'AAPL')->orderBy('created_at', 'desc')
            ->get();
        return response()->json(['comments' => $comments]);
    } 

    public function amznComment(Request $request)
    {
        $request->validate([
            'amznComment' => 'required|string',
        ]);
        $symbol1 = $request->input('Symbol1');
        $comment = new dashboard_comment();
        $comment->user_id = Auth::id();
        $comment->user_name = Auth::user()->name;
        $comment->comment_message = $request->input('amznComment');
        $comment->name = $symbol1;
        $comment->save();
        return response()->json(['success' => true, 'user_name' => Auth::user()->name]);
    }

    public function fetchamznComments()
    {
        $comments = dashboard_comment::where('name', 'AMZN')->orderBy('created_at', 'desc')
            ->get();
        return response()->json(['comments' => $comments]);
    } 

    public function vooComment(Request $request)
    {
        $request->validate([
            'vooComment' => 'required|string',
        ]);
        $symbol1 = $request->input('Symbol1');
        $comment = new dashboard_comment();
        $comment->user_id = Auth::id();
        $comment->user_name = Auth::user()->name;
        $comment->comment_message = $request->input('vooComment');
        $comment->name = $symbol1;
        $comment->save();
        return response()->json(['success' => true, 'user_name' => Auth::user()->name]);
    }

    public function fetchvooComments()
    {
        $comments = dashboard_comment::where('name', 'VOO')->orderBy('created_at', 'desc')
            ->get();
        return response()->json(['comments' => $comments]);
    } 


    public function comment(Request $request){

        if(Auth::check() == false ){
            return redirect("/")->with("error","Please Login First");
        }

        $dashboard_comment = new dashboard_comment;
        $dashboard_comment->user_id = Auth::user()->id;
        $dashboard_comment->name = $request->name;
        $dashboard_comment->comment_message = $request->comment;
        $dashboard_comment->save();

        return redirect()->route('dashboard')->with("success","Added into Wishlist");

    }

   public function removefav($id , Request $request){

        $wishlist = wishlist::find($id);

        if(!$wishlist){
            return redirect()->back()->with('error' , 'Not Found');
        }else{
            $wishlist->delete();

            return redirect()->back()->with('Success' , 'Remove Successfully');

        }


    }


}

