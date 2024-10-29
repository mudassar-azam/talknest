@extends('layouts.front.main')
@section('content')
<!-- Sec Title -->
<div class="sec-title">
    <div class="d-flex justify-content-center align-items-center flex-wrap stocksourceshead">
        <div class="left-box">
            <h2 class="sec-title_heading ">Edit Post</h2>
        </div>
    </div>
</div>
@if(session()->has('message'))
<div style="margin:30px 30px;" class="alert alert-success" id="flash-message">
    {{session()->get('message')}}
    <button style="float:right;" type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
</div>
@endif
<div style="display: flex; justify-content: center; align-items: center; height: 85vh;">
    <div>
        <form id="editPostForm" action="{{ route('postEdit', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="margin-bottom: 10px;">
                <label style="font-size: 20px; display: block;"><b>Name :</b></label>
                <input style="border: 1px solid black; border-radius: 8px; padding: 5px; width: 100%;" type="text"
                    name="name" required value="{{$post->name}}">
            </div>
            @php 
             $id = Auth::user()->id;
            @endphp
            @if($post->user_id == $id)
                <div style="margin-bottom: 2rem;">
                    <label style="font-size: 20px; display: block;"><b>Status :</b></label>
                    <select name="status" required
                        style="border: 1px solid black; border-radius:  8px; padding: 5px; color:black; width: 100%;">
                        @if($post->status == 1)
                            <option selected disabled>Public</option>
                        @else
                            <option selected disabled>Private</option>
                        @endif
                            <option style="color:black;" value="1">Public</option>
                            <option style="color:black;" value="0">Private</option>
                    </select>
                </div>
            @endif
            <div style="margin-bottom: 10px;">
                <label style="font-size: 20px; display: block;"><b>Current Image :</b></label>
                <img style="display: block; margin-top: 5px; width: 290px; height: 200px;" src="/posts/{{$post->image}}"
                    alt="">
            </div>
            <div style="margin-bottom: 10px;">
                <label style="font-size: 20px; display: block;"><b>Add new Image if you want :</b></label>
                <input style="margin-top: 5px; width: 100%;" type="file" name="image">
            </div>
            <button style="margin-top: 10px; background-color: #2EAAA6; display: block; width: 100%;" class="btn"
                type="submit">Submit</button>
        </form>
    </div>
</div>
<script>
setTimeout(function() {
    document.getElementById('flash-message').style.display = 'none';
}, 3000);
</script>
@endsection