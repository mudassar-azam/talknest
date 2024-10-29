@extends('layouts.front.main')
@section('content')
<style>
.active>.page-link,
.page-link.active {
    background-color: #93B74B;
    border-color: #93B74B;
}

.page-link {
    color: #93B74B;
}

.page-link:hover {
    color: #5A5A5A;
}

.paginator .page-item {
    color: rgb(0, 0, 0);
}

* {
    margin: 0;
    padding: 0;
}

a.button {
    position: relative;
    font-size: 1rem;
    font-weight: bold;
    margin-left: 20%;
}

a.button:hover {
    color: #C7D8AA;
}

.file-input {
    position: relative;
    overflow: hidden;
    display: inline-block;
    cursor: pointer;
    padding: 10px 20px;
    border: 2px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
    color: #333;
    font-size: 16px;
}

/* Hide default file input */
.file-input input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    cursor: pointer;
}

/* Style for file input text */
.file-input-text {
    display: inline-block;
    vertical-align: middle;
}

/* Style for file input icon (optional) */
.file-input-icon {
    display: inline-block;
    vertical-align: middle;
    margin-right: 10px;
}

.main {
    display: flex;
    align-items: center;
    justify-content: flex-start;
}

.main img {
    width: 10vh;
    height: 10vh;
}

.custom-select {
    position: relative;
    font-family: Arial, sans-serif;
    /*width: 200px;*/
    /*margin: 20px;*/
}

select {
    width: 100%;
    padding: 5px;
    border: none;
    border-radius: 5px;
    appearance: none;
    background-color: #f1f1f1;
    cursor: pointer;
    padding-left: 10px;
}

select:focus {
    outline: none;
    box-shadow: 0 0 5px rgba(81, 203, 238, 1);
}

.custom-textarea {
    font-family: Arial, sans-serif;
    width: 100%;
}

textarea {
    width: 100%;
    height: 100px;
    padding: 10px;
    border: 1px solid transparent;
    border-radius: 5px;
    resize: none;
    font-size: 16px;
    line-height: 1.5;
}

textarea:focus {
    outline: none;
    /* Remove outline on focus */
    border-color: #ccc;
    /* Show border when focused */
}

.attachment-container {
    font-family: Arial, sans-serif;
    align-content: center;
}

.attachment-icon {

    width: 36px;
    height: 36px;
    cursor: pointer;
    overflow: hidden;
    display: flex !important;
    align-content: center !important;
    justify-content: center !important;
    background-color: none;
    border-radius: 5px;
}

.attachment-icon input[type="file"] {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    display: flex !important;
    align-content: center !important;
    justify-content: center !important;
    cursor: pointer;
}


.attachment-icon:hover {
    opacity: 0.8;
}

.icon {
    color: #666;
}

.dropdown {
    position: relative;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #e5e5e5;
    min-width: 1vh;
    z-index: 1;
}

.dropdown-content a {
    color: #92ab59;
    padding: 2vh;
    display: block;
    text-align: center;
}

.dropdown-content a:hover {
    border: 1px solid #92ab59;
    border-radius: 10px;
}

.dropdown:hover .dropdown-content {
    display: block;
    border-radius: 10px;
}
</style>

@if(session()->has('message'))
<div style="margin:30px 30px;" class="alert alert-success" id="flash-message">
    {{session()->get('message')}}
    <button style="float:right;" type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
</div>
@endif
<section class="news-seven"
    {{--             style="background-image:url({{ asset('assets/images/background/pattern-5.png') }})" --}}>
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="left-box">
                    <h5 class="sec-title_heading">
                        <a href="/stock">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0,0,256,256" width="30px" height="30px">
                                <g fill="#93b74b" fill-rule="nonzero" stroke="none" stroke-width="1"
                                    stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                    stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                    font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                    <g transform="scale(10.66667,10.66667)">
                                        <path d="M12,2.09961l-11,9.90039h3v9h6v-7h4v7h6v-9h3z"></path>
                                    </g>
                                </g>
                            </svg>
                        </a>
                        <img style="height: 2vh; width: 2vh" src="{{  asset('arrow.png') }}">
                        {{ $blog->name }}
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <!-- End Feature One -->
    <div class="col-md-8" style="display:flex;justify-content:flex-end;margin:0 auto;">
        @php
        $filename = Auth()->user()->image;
        $userId = auth()->id();
        $groupId = $blog->id;
        $user_id = $blog->user_id;
        if($blog->user_id == $userId){
        $forAccess = true;
        }else{
        $forAccess = DB::table('accesses')->where('group_id', $groupId)->where('user_id', $userId)->exists();
        }
        @endphp
        @if($blog->status == 1)
        <a id="showTalkForm"
            style=" background-color: #2EAAA6; color:#f5f3f0; padding: 15px; border-radius: 10px; font-size: 20px; cursor: pointer;">
            + Add a Post
        </a>
        @elseif($blog->status == 0)
        @if($forAccess)
        <a id="showTalkForm"
            style=" background-color: #2EAAA6; color:#f5f3f0; padding: 15px; border-radius: 10px; font-size: 20px; cursor: pointer;">
            + Add a Post
        </a>
        @if($userId != $user_id)
        <a id="showTalkFormLeave"
            style=" background-color: #2EAAA6; color:#f5f3f0; padding: 15px; border-radius: 10px; font-size: 20px; cursor: pointer; margin-left:1%;">
            + Leave
        </a>
        @endif
        @else
        <a id="showTalkFormJoin"
            style=" background-color: #2EAAA6; color:#f5f3f0; padding: 15px; border-radius: 10px; font-size: 20px; cursor: pointer;">
            + Request To Join Group
        </a>
        @endif
        @endif
    </div>



    <!-- Form displayed as a modal -->


    <div id="talkPostModal"
        style="display: none; background-color: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; width: 100%; height: 100vh; z-index: 999; align-items: center; justify-content: center;">
        <div style="background-color: #fff; border: 1px solid transparent ; border-radius: 5px; position: relative;
            width: 50%;">


            <h6 style="padding-left: 10px; top: 10px;">Create a post</h6>
            <a id="hideTalkForm"
                style="position: absolute; top: 0px; right: 0px; color: #000; font-size: 45px; cursor: pointer; padding: 15px;">&times;</a>
            <hr>
            @auth
            <form action="{{ route('addGroupName') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="blog_id" value="{{ $blog->id  }}">
                <div class="main">
                    @if(\Illuminate\Support\Facades\Auth::user()->image)
                    <img style="border-radius: 50px" src="{{ asset($filename) }}" alt="error">
                    @else
                    <img style="border-radius: 50px" src="{{asset('profile.jpg')}}" alt="error">

                    @endif
                    <div>
                        <h4 style="padding-left: 10px;">{{ \Illuminate\Support\Facades\Auth::user()->name  }}</h4>
                        <div class="custom-select">
                            <select name="visibility">
                                <option selected value="1">Public</option>
                                <option value="0">Private</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="custom-textarea">
                    <textarea name="name" placeholder="Share what's on your mind "></textarea>
                </div>
                <hr>
                <div style="
                                align-items: center;
                                display: flex;
                                justify-content: space-between;">
                    <div class="attachment-container">
                        <!-- Style the label to look like a button -->
                        <label for="attachment-input" class="attachment-icon">
                            <i class="fas fa-paperclip icon"></i> <!-- Font Awesome paperclip icon -->

                        </label>
                        <!-- Separate the file input -->
                        <input name="image" type="file" id="attachment-input" style="display: none;">
                    </div>


                    <div>
                        <button id="submitPostButton" type="submit" style="background-color: #4CAF50;

                                    border: none;
                                    color: white;
                                    padding: 10px;
                                    margin-bottom: 10px;
                                    margin-right: 10px;
                                    text-align: center;
                                    text-decoration: none;
                                    display: inline-block;
                                    font-size: 16px;
                                    cursor: pointer;
                                    border-radius: 8px;">
                            Post
                        </button>
                    </div>
                </div>
            </form>
            @endauth

        </div>
    </div>

    <div id="talkPostModalJoin"
        style="display: none; background-color: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; width: 100%; height: 100vh; z-index: 999; align-items: center; justify-content: center;">
        <div style="background-color: #fff; border: 1px solid transparent ; border-radius: 5px; position: relative;
            width: 50%;">
            <h6 style="padding-left: 10px; top: 10px;">Join Group</h6>
            <a id="hideTalkFormJoin"
                style="position: absolute; top: 0px; right: 0px; color: #000; font-size: 45px; cursor: pointer; padding: 15px;">&times;</a>
            <hr>
            @auth
            <form action="{{ route('joinGroup') }}" method="POST">
                @csrf
                <input type="hidden" name="blog_id" value="{{ $blog->id  }}">
                <div class="main">
                    @if(\Illuminate\Support\Facades\Auth::user()->image)
                    <img style="border-radius: 50px" src="{{ asset($filename) }}" alt="error">
                    @else
                    <img style="border-radius: 50px" src="{{asset('profile.jpg')}}" alt="error">

                    @endif
                    <div>
                        <h4 style="padding-left: 10px;">{{ \Illuminate\Support\Facades\Auth::user()->name  }}</h4>

                    </div>
                </div>
                <div>
                    <div class="d-flex justify-content-center">
                        <button class="btn " id="submitPostButton" type="submit"
                            style="background-color: #4CAF50;border: none;color: white; margin-bottom:1rem;">
                            Join
                        </button>
                    </div>
                </div>
            </form>
            @endauth

        </div>
    </div>
    <div id="talkPostModalLeave"
        style="display: none; background-color: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; width: 100%; height: 100vh; z-index: 999; align-items: center; justify-content: center;">
        <div style="background-color: #fff; border: 1px solid transparent ; border-radius: 5px; position: relative;
            width: 50%;">
            <h6 style="padding-left: 10px; top: 10px;">Leave Group</h6>
            <a id="hideTalkFormLeave"
                style="position: absolute; top: 0px; right: 0px; color: #000; font-size: 45px; cursor: pointer; padding: 15px;">&times;</a>
            <hr>
            @auth
            <form action="{{ route('leaveGroup') }}" method="POST">
                @csrf
                <input type="hidden" name="blog_id" value="{{ $blog->id  }}">
                <div class="main">
                    @if(isset($filename))
                    <img style="border-radius: 50px" src="{{ asset($filename) }}">
                    @else
                    <img style="border-radius: 50px" src="{{asset('profile.jpg')}}" alt="error">

                    @endif
                    <div>
                        <h4 style="padding-left: 10px;">{{ \Illuminate\Support\Facades\Auth::user()->name  }}</h4>

                    </div>
                </div>
                <div>
                    <div class="d-flex justify-content-center">
                        <button class="btn " id="submitPostButton" type="submit"
                            style="background-color: #4CAF50;border: none;color: white; margin-bottom:1rem;">
                            Leave
                        </button>
                    </div>
                </div>
            </form>
            @endauth

        </div>
    </div>

    @if($blog->status == 1 || $blog->user_id == $userId || $forAccess == true)
    <div class="row" style="justify-content:center;margin:0 auto;">
        @foreach ($groups as $group)
        @php
        $commentdatas = \App\Models\Groupcomment::where('group_id', $group->id)->paginate(2);
        @endphp

        <div class=" col-md-8" style="margin-top: 2rem; margin-bottom: 1rem">


            <div class="titlemodel"
                style="display: none; background-color: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; width: 100%; height: 100vh; z-index: 999; align-items: center; justify-content: center;">
                <div style="background-color: #fff; border: 1px solid transparent ; border-radius: 5px; position: relative;
                width: 50%;">
                    <h6 style="padding-left: 10px; top: 10px;">Create a post</h6>
                    <a class="hidetitle"
                        style="position: absolute; top: 0px; right: 0px; color: #000; font-size: 45px; cursor: pointer; padding: 15px;">&times;</a>
                    <hr>
                    <form action="{{ route('edit.blog') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $group->id  }}">
                        @auth
                        <div class="main">
                            @if(\Illuminate\Support\Facades\Auth::user()->image)
                            <img style="border-radius: 50px" src="{{ asset($filename) }}" alt="error">
                            @else
                            <img style="border-radius: 50px" src="{{asset('profile.jpg')}}">

                            @endif
                            <div>
                                <h4 style="padding-left: 10px;">{{ \Illuminate\Support\Facades\Auth::user()->name  }}
                                </h4>
                                <div class="custom-select">
                                    <select name="visibility">
                                        <option {{ ($group->status == 1) ? 'selected' : '' }} value="1">
                                            Public
                                        </option>
                                        <option {{ ($group->status == 0) ? 'selected' : '' }} value="0">
                                            Private
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        @endauth

                        <div class="custom-textarea">
                            <textarea name="name"
                                placeholder="Share what's on your mind ">{{ $group->group_name  }}</textarea>
                        </div>
                        <hr>
                        <div style="
            align-items: center;
            display: flex;
            justify-content: space-between;">
                            <div class="attachment-container">
                                <!-- Style the label to look like a button -->
                                <label for="attachment-type-input-{{ $group->id }}" class="attachment-icon">
                                    <i class="fas fa-paperclip icon"></i> <!-- Font Awesome paperclip icon -->
                                </label>
                                <input name="image" type="file" id="attachment-type-input-{{ $group->id }}"
                                    style="display: none;">
                            </div>

                            <div>
                                <button id="submitPostButton" type="submit" style="background-color: #4CAF50;

                                        border: none;
                                        color: white;
                                        padding: 10px;
                                        margin-bottom: 10px;
                                        margin-right: 10px;
                                        text-align: center;
                                        text-decoration: none;
                                        display: inline-block;
                                        font-size: 16px;
                                        cursor: pointer;
                                        border-radius: 8px;">
                                    Post
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>


        </div>





        <div class="col-sm-8">
            <div class="comment-form">

                <!-- Comment Form -->


                <form method="POST" action="{{ route('blog.comment') }}">


                    <div style="display: flex">
                        @if ($group->image)
                        <div style="flex:0.8;">
                            <img src="{{ asset('blogphotos/' . $group->image) }}"
                                style="height: auto; max-height: 350px; width: 100%; border-radius: 10px;" alt="error">
                        </div>
                        @endif
                        <div class="row" style="flex:1;">
                            <div class=" col-md-11">
                                <h6 style="background-color: white; padding: 1rem">{{ $group->group_name }}</h6>
                            </div>
                            <div class="col-md-1" style="display: flex; justify-content: end;align-items: center">
                                <li class="dropdown">
                                    <a href="#" class="dropbtn"><i style="font-size: 1.5rem"
                                            class="fa-solid fa-ellipsis-vertical"></i></a>
                                    <div class="dropdown-content">


                                        @auth

                                        @if ($group->user_id == Auth::user()->id)
                                        <div>
                                            <a href="#" class="edittitle">edit</a>
                                            <a href="{{ route('group.delete', $group->id) }}">Delete</a>
                                        </div>
                                        @endif
                                        @endauth

                                    </div>
                                </li>
                            </div>

                        </div>


                    </div>


 @auth
    @if($group->status == 1)
        <div class="group-title mt-5">
            <p style="font-size: 13.5px;" class="">Post A Comment</p>
        </div>
        @csrf
        <div class="row clearfix">
            <input type="hidden" name="group_id" value="{{ $group->id }}">
            
            <div class="col-lg-12 col-md-12 col-sm-12 form-group" style="height: 7vh">
                <textarea class="rounded" style="height: 7vh" name="comment" required placeholder="Your Comment here..."></textarea>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 form-group">
                <button class="btn-style-one theme-btn" style="padding: 0.5rem; border-radius: 5px" type="submit">
                    Post
                </button>
            </div>
        </div>
    @else
        <div class="group-title mt-5" style="display: none;">
            <p style="font-size: 13.5px;" class="">Post A Comment</p>
        </div>
        
    @endif
@endauth

                    
                <style>
                .avatar {
                    position: relative;
                    display: inline-block;
                    width: 3rem;
                    height: 3rem;
                    font-size: 1.25rem;
                }

                .avatar-img,
                .avatar-initials,
                .avatar-placeholder {
                    width: 100%;
                    height: 100%;
                    border-radius: inherit;
                }

                .avatar-img {
                    display: block;
                    -o-object-fit: cover;
                    object-fit: cover;
                }

                .avatar-initials {
                    position: absolute;
                    top: 0;
                    left: 0;
                    display: -ms-flexbox;
                    display: flex;
                    -ms-flex-align: center;
                    align-items: center;
                    -ms-flex-pack: center;
                    justify-content: center;
                    color: #fff;
                    line-height: 0;
                    background-color: #a0aec0;
                }

                .avatar-placeholder {
                    position: absolute;
                    top: 0;
                    left: 0;
                    background: #a0aec0 url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='%23fff' d='M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z'/%3e%3c/svg%3e") no-repeat center/1.75rem;
                }

                .avatar-indicator {
                    position: absolute;
                    right: 0;
                    bottom: 0;
                    width: 20%;
                    height: 20%;
                    display: block;
                    background-color: #a0aec0;
                    border-radius: 50%;
                }

                .avatar-group {
                    display: -ms-inline-flexbox;
                    display: inline-flex;
                }

                .avatar-group .avatar+.avatar {
                    margin-left: -0.75rem;
                }

                .avatar-group .avatar:hover {
                    z-index: 1;
                }

                .avatar-sm,
                .avatar-group-sm>.avatar {
                    width: 2.125rem;
                    height: 2.125rem;
                    font-size: 1rem;
                }

                .avatar-sm .avatar-placeholder,
                .avatar-group-sm>.avatar .avatar-placeholder {
                    background-size: 1.25rem;
                }

                .avatar-group-sm>.avatar+.avatar {
                    margin-left: -0.53125rem;
                }

                .avatar-lg,
                .avatar-group-lg>.avatar {
                    width: 4rem;
                    height: 4rem;
                    font-size: 1.5rem;
                }

                .avatar-lg .avatar-placeholder,
                .avatar-group-lg>.avatar .avatar-placeholder {
                    background-size: 2.25rem;
                }

                .avatar-group-lg>.avatar+.avatar {
                    margin-left: -1rem;
                }

                .avatar-light .avatar-indicator {
                    box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.75);
                }

                .avatar-group-light>.avatar {
                    box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.75);
                }

                .avatar-dark .avatar-indicator {
                    box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.25);
                }

                .avatar-group-dark>.avatar {
                    box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.25);
                }

                / Font not working in <textarea>for this version of bs / textarea {
                    font-family: inherit;
                }
                </style>

                <div>
                    @if ($commentdatas->count() > 0)
                    <div style="background-color: #FFFFFF; color: black; padding: 1rem;box-shadow: 0px 0px 7px 0px;">
                        @foreach ($commentdatas as $commentdata)
                        @php
                        $commentreplies = DB::table('group_comment_replies')->where('comment_id',
                        $commentdata->id)->get();
                        @endphp
                        <div class="row">
                            <div class="flex-shrink-0" style="display: flex;align-items: center;">
                                @if($commentdata->user_image != null)
                                <div class="avatar avatar-sm rounded-circle">
                                    <img class="avatar-img" src="{{ asset($commentdata->user_image) }}">
                                </div>
                                @else
                                <div class="avatar avatar-sm rounded-circle">
                                    <img class="avatar-img" src="{{asset('profile.jpg')}}">
                                </div>
                                @endif
                                <h5 class="font-bold" style="margin-left: 1rem">
                                    {{ $commentdata->user_name }}
                                </h5>
                            </div>
                            <div style="margin-left: 3rem; margin-bottom: 1rem;font-size:1.2rem;width: 87%;">
                                {{ $commentdata->comment }}
                            </div>

                            @auth

                            <div class="col-1">
                                <li class="dropdown">
                                    <a href="#" class="dropbtn"><i style="font-size: 1.5rem"
                                            class="fa-solid fa-ellipsis-vertical"></i></a>
                                    @if ($commentdata->user_id == Auth::user()->id)

                                    <div class="dropdown-content">
                                        <div>
                                            <a href="#" class="editcomment">edit</a>
                                            <a href="{{ route('comment.delete', $commentdata->id) }}">Delete</a>
                                        </div>
                                    </div>


                                    @endif
                            </div>
                            <div style="margin-left:2%">
                                @if($commentreplies->count() > 0)
                                <div class="comment-replies bg-light p-3 mt-3 rounded">
                                    <h6 class="comment-replies-title mb-4 text-muted text-uppercase">
                                        {{$commentreplies->count()}} replies</h6>
                                    @foreach($commentreplies as $commentreplie)
                                    <div class="reply d-flex mb-4">
                                        @if($commentreplie->user_image != null)
                                        <div class="flex-shrink-0">
                                            <div class="avatar avatar-sm rounded-circle">
                                                <img class="avatar-img" src="{{ asset($commentreplie->user_image) }}">
                                            </div>
                                        </div>
                                        @else
                                        <div class="flex-shrink-0">
                                            <div class="avatar avatar-sm rounded-circle">
                                                <img class="avatar-img" src="{{asset('profile.jpg')}}">
                                            </div>
                                        </div>
                                        @endif
                                        <div class="flex-grow-1 ms-2 ms-sm-3">
                                            <div class="reply-meta d-flex align-items-baseline">
                                                <h6 class="mb-0 me-2"> {{$commentreplie->user_name}}</h6>
                                            </div>
                                            <div class="reply-body">
                                                {{$commentreplie->reply}}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            <div style="display:flex;aign-item:center;justify-content:end;padding:2%;">
                                <button class="btn btn-success replyToComment">reply</button>
                            </div>
                        </div>
                        <div class="replyToCommentModel"
                            style="display: none; background-color: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 999; align-items: center; justify-content: center;">
                            <div
                                style="background-color: #fff; padding: 20px; border-radius: 10px; position: relative; width: 50%;">
                                <a class="hidereplyComment"
                                    style="position: absolute; top: 10px; right: 10px; color: #000; font-size: 30px; cursor: pointer;">&times;</a>
                                <form method="POST" action="{{ route('comment.reply') }}">

                                    <div class="group-title">
                                        <h5 class="comment-heading">Reply</h5>
                                    </div>
                                    @csrf
                                    <div class="row clearfix">
                                        <input type="hidden" name="id" value="{{ $commentdata->id }}">
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group" style="height: 7vh">
                                            <textarea style="height: 8vh" name="reply" required
                                                placeholder="Your reply here..."></textarea>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12 form-group">
                                            <button class="btn-style-one theme-btn"
                                                style="padding: 0.5rem; border-radius: 5px" type="submit">
                                                submit
                                            </button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                        @endauth

                        <div class="comentmodel"
                            style="display: none; background-color: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 999; align-items: center; justify-content: center;">
                            <div
                                style="background-color: #fff; padding: 20px; border-radius: 10px; position: relative;">
                                <a class="hidecomment"
                                    style="position: absolute; top: 10px; right: 10px; color: #000; font-size: 30px; cursor: pointer;">&times;</a>
                                <form method="POST" action="{{ route('update.comment') }}">

                                    <div class="group-title">
                                        <h5 class="comment-heading">Update Comment</h5>
                                    </div>
                                    @csrf
                                    <div class="row clearfix">
                                        <input type="hidden" name="id" value="{{ $commentdata->id }}">
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group" style="height: 7vh">
                                            <textarea style="height: 8vh" name="comment" required
                                                placeholder="Your Comment here..."> {{ $commentdata->comment }}</textarea>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12 form-group">
                                            <button class="btn-style-one theme-btn"
                                                style="padding: 0.5rem; border-radius: 5px" type="submit">
                                                Update
                                            </button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>


                        <hr
                            style="background-color: black; height: 2px; border: none; margin: 20px 0; font-size: 2rem;">
                        @endforeach
                    </div>
                    @endif
                    {{ $commentdatas->links()  }}
                </div>

            </div>
        </div>
        @endforeach

    </div>
    @endif

</section>



<script>
function showLorem(sectionId) {
    var loremSection = document.getElementById(sectionId);
    if (loremSection.style.display === "block") {
        loremSection.style.display = "none";
    } else {
        loremSection.style.display = "block";
    }
}

function showTeslaDescription(groupId) {
    showLorem("dd-" + groupId);
}
</script>
</section>
<script>
document.addEventListener('DOMContentLoaded', function() {

    // Event listener for showing the modal
    document.getElementById('showTalkForm').addEventListener('click', function() {
        document.getElementById('talkPostModal').style.display = 'flex';
    });

    // Event listener for hiding the modal
    document.getElementById('hideTalkForm').addEventListener('click', function() {
        document.getElementById('talkPostModal').style.display = 'none';
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('showTalkFormJoin').addEventListener('click', function() {
        document.getElementById('talkPostModalJoin').style.display = 'flex';
    });
    document.getElementById('hideTalkFormJoin').addEventListener('click', function() {
        document.getElementById('talkPostModalJoin').style.display = 'none';
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('showTalkFormLeave').addEventListener('click', function() {
        document.getElementById('talkPostModalLeave').style.display = 'flex';
    });
    document.getElementById('hideTalkFormLeave').addEventListener('click', function() {
        document.getElementById('talkPostModalLeave').style.display = 'none';
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {

    // Event listeners for showing and hiding the modal for each comment
    var editButtons = document.querySelectorAll('.editcomment');
    var hideButtons = document.querySelectorAll('.hidecomment');
    var commentModels = document.querySelectorAll('.comentmodel');

    editButtons.forEach(function(button, index) {
        button.addEventListener('click', function() {
            commentModels[index].style.display = 'flex';

        });
    });

    hideButtons.forEach(function(button, index) {
        button.addEventListener('click', function() {
            commentModels[index].style.display = 'none';
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {

    // Event listeners for showing and hiding the modal for each comment
    var edittitle = document.querySelectorAll('.edittitle');
    var hidetitle = document.querySelectorAll('.hidetitle');
    var titlemodel = document.querySelectorAll('.titlemodel');

    edittitle.forEach(function(button, index) {
        button.addEventListener('click', function() {
            titlemodel[index].style.display = 'flex';

        });
    });

    hidetitle.forEach(function(button, index) {
        button.addEventListener('click', function() {
            titlemodel[index].style.display = 'none';
        });
    });
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function(event) {
    var scrollpos = localStorage.getItem('scrollpos');
    if (scrollpos) window.scrollTo(0, scrollpos);
});

window.onbeforeunload = function(e) {
    localStorage.setItem('scrollpos', window.scrollY);
};
</script>
<script>
setTimeout(function() {
    document.getElementById('flash-message').style.display = 'none';
}, 3000);
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {

    // Event listeners for showing and hiding the modal for each comment
    var editButtons = document.querySelectorAll('.replyToComment');
    var hideButtons = document.querySelectorAll('.hidereplyComment');
    var commentModels = document.querySelectorAll('.replyToCommentModel');

    editButtons.forEach(function(button, index) {
        button.addEventListener('click', function() {
            commentModels[index].style.display = 'flex';

        });
    });

    hideButtons.forEach(function(button, index) {
        button.addEventListener('click', function() {
            commentModels[index].style.display = 'none';
        });
    });
});
</script>
@endsection