@extends('layouts.front.main')
@section('content')
<style>
/* Style the dropdown container */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Style the dots button */
.dots-btn {
    background-color: white;
    font-size: 2rem;
    padding: 8px;
    border-radius: 5px;
    color: #2EAAA6;
}

/* Style the dropdown content (hidden by default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

/* Style the links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color on hover */
.dropdown-content a:hover {
    background-color: #ddd;
}

/* Show the dropdown content on hover */
.dropdown:hover .dropdown-content {
    display: block;
}
</style>
<!-- Sec Title -->
<div class="sec-title">
    <div class="d-flex justify-content-center align-items-center flex-wrap stocksourceshead">
        <div class="left-box">
            <h2 class="sec-title_heading ">Nests</h2>
        </div>
    </div>
</div>
<!-- Team Three -->
<section class="news-seven" style="background-image:url(assets/images/background/pattern-5.png);">
    <div class="auto-container" style="display: flex;justify-content: flex-end;max-width: 100%;width: 95%;">


        @auth
        <a id="showForm"
            style="background-color: #2EAAA6; color:#f5f3f0; padding: 15px; border-radius: 10px; font-size: 20px; cursor: pointer;align:center!important;">
            + Add
            a Nest</a>
        @endauth


        <style>
        #postModal {
            width: 50%;
            display: none;
        }

        #postModal .wrapper {
            display: flex;
            background-color: rgba(0, 0, 0, 0.5);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 999;
            align-items: center;
            justify-content: center;
        }

        #postModal .wrapper .inner-wrapper {
            background-color: #fff;
            border-radius: 10px;
            position: relative;
            width: 50%;
        }

        #postModal .wrapper .nav {
            width: 100%;
            border-bottom: 1px solid lightgrey;
            padding: 0.5em 1em;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #postModal .wrapper .nav .close-btn {
            color: #000;
            font-size: 30px;
            cursor: pointer;
        }

        #postModal .wrapper .main {
            display: flex;
            align-items: center;
            /*padding: 2em 0;*/
        }

        #postModal .wrapper .main img {
            border-radius: 50%;
            width: 32px;
            height: 30px;
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
            margin-top: 28px;
            border: 2px solid
        }

        #postModal .wrapper .main .input-title-container {
            display: flex;
            justify-content: center;
            flex-direction: column;
            color: #2EAAA6;
            flex: 1;

        }

        #postModal .wrapper .main .input-title-container input {
            border: 1px solid #2EAAA6;
            border-radius: 8px;
            padding: 5px;
        }

        #postModal .wrapper .footer {
            display: flex;
            justify-content: center;
            border-top: 1px solid lightgrey;
        }

        #postModal .wrapper .footer .btn-submit {
            margin-top: 10px;
            background-color: #2EAAA6;
            color: white;
        }

        /*input file style*/
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

        .upload-files-container {
            background-color: #f7fff7;
            width: 100%;
            padding: 30px 60px;
            border-radius: 40px;
        }

        .drag-file-area {
            border: 2px dashed #2EAAA6;
            border-radius: 40px;
            margin: 10px 0 15px;
            padding: 20px 20px;
            width: 300px;
            text-align: center;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 10px 20px, rgba(0, 0, 0, 0.28) 0px 6px 6px;

        }

        .drag-file-area .upload-icon {
            font-size: 1.5rem;
        }

        .drag-file-area h3 {
            font-size: 1rem;
            margin: 15px 0;
        }

        .drag-file-area label {
            font-size: 19px;
            display: block;
        }

        .drag-file-area label .browse-files-text {
            color: #2EAAA6;
            font-weight: bolder;
            cursor: pointer;
        }

        .browse-files span {
            position: relative;
            top: -25px;
        }

        .default-file-input {
            opacity: 0;
        }

        .cannot-upload-message {
            background-color: #ffc6c4;
            font-size: 17px;
            display: flex;
            align-items: center;
            margin: 5px 0;
            padding: 5px 10px 5px 30px;
            border-radius: 5px;
            color: #BB0000;
            display: none;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .cannot-upload-message span,
        .upload-button-icon {
            padding-right: 10px;
        }

        .cannot-upload-message span:last-child {
            padding-left: 20px;
            cursor: pointer;
        }

        .file-block {
            color: #f7fff7;
            background-color: #2EAAA6;
            transition: all 1s;
            width: 390px;
            position: relative;
            display: none;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            margin: 10px 0 15px;
            padding: 10px 20px;
            border-radius: 25px;
            cursor: pointer;
        }

        .file-info {
            display: flex;
            align-items: center;
            font-size: 15px;
        }

        .file-icon {
            margin-right: 10px;
        }

        .file-name,
        .file-size {
            padding: 0 3px;
        }

        .remove-file-icon {
            cursor: pointer;
        }

        .progress-bar {
            display: flex;
            position: absolute;
            bottom: 0;
            left: 10%;
            width: 80%;
            height: 5px;
            border-radius: 25px;
            background-color: white;
        }

        .upload-button {
            font-family: 'Montserrat';
            background-color: #2EAAA6;
            color: #f7fff7;
            display: flex;
            align-items: center;
            font-size: 18px;
            border: none;
            border-radius: 20px;
            margin: 10px;
            padding: 7.5px 50px;
            cursor: pointer;
        }
        </style>

        <!-- Form displayed as a modal -->
        <div id="postModal">

            <div class='wrapper'>
                <div class='inner-wrapper'>
                    <div class="nav">
                        <h6>Create a topic</h6>
                        <a id="hideForm" class="close-btn">&times;</a>
                    </div>
                    <form id="postDataForm" action="{{ route('addPost') }}" method="POST" enctype="multipart/form-data"
                        style="padding: 20px;">
                        @csrf
                        <div class="main">
                            <img src="./assets/images/user.png" />
                            <div class="input-title-container">
                                <label style="font-size:20px;" for="name">
                                    <h6>Post Title:</h6>
                                </label>
                                <input type="text" name="name" required />

                            </div>
                        </div>
                        <div class="main">
                            <div class="input-title-container">
                                <div style="display:flex; justify-content:center; margin-top:3px;">
                                    <label style="font-size:20px;" for="status">
                                        <h6>Select Privacy Status:</h6>
                                    </label>
                                    <select name="status" required style="border: 1px solid #2EAAA6; border-radius: 25px; color:#2EAAA6; width: 10rem;">
                                        <option selected disabled> add status</option>
                                        <option style="color:#2EAAA6;" value="1">Public</option>
                                        <option style="color:#2EAAA6;" value="0">Private</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined"
                            rel="stylesheet">

                        <div class="upload-files-container"
                            style="	display: flex;align-items: center;justify-content: center;flex-direction: column;">
                            <div class="drag-file-area">
                                <span class="material-icons-outlined upload-icon"> file_upload </span>
                                <h3 class="dynamic-message"> Drag & drop any file here </h3>
                                <label class="label"> or
                                    <span class="browse-files">
                                        <input type="file" class="default-file-input" name="image" require />
                                        <span class="browse-files-text">browse file</span>
                                        <span>from device</span>
                                    </span>
                                </label>
                            </div>
                            <span class="cannot-upload-message">
                                <span class="material-icons-outlined">error</span>
                                Please select a file first
                                <span class="material-icons-outlined cancel-alert-button">cancel</span>
                            </span>
                            <div class="file-block">
                                <div class="file-info">
                                    <span class="material-icons-outlined file-icon">description</span>
                                    <span class="file-name"> </span> | <span class="file-size"> </span>
                                </div>
                                <!--<span class="material-icons remove-file-icon">delete</span>-->
                                <div class="progress-bar"> </div>
                            </div>
                        </div>

                        <script>

                        </script>
                        <div class="footer">
                            <button style="" class="btn upload-button" type="submit">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
    <div class="row clearfix" style="margin: 0 auto;">
        @if(session()->has('failure'))
        <div style="margin:30px 30px;" class="alert alert-danger" id="flash-message">
            {{session()->get('failure')}}
            <button style="float:right;" type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
        </div>
        @endif
        <div class="container py-2">
            <div class="row pb-5 mb-4" id="myPostContainer" style="margin:0!important;">
            </div>
        </div>
    </div>
    </div>
    </div>

</section>
<script>
setTimeout(function() {
    document.getElementById('flash-message').style.display = 'none';
}, 3000);
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {

    // Event listener for showing the modal
    document.getElementById('showForm').addEventListener('click', function() {
        document.getElementById('postModal').style.display = 'block';
    });

    // Event listener for hiding the modal
    document.getElementById('hideForm').addEventListener('click', function() {
        var uploadButton = document.querySelector(".upload-button");
        let uploadedFile = document.querySelector(".file-block");


        document.getElementById('postModal').style.display = 'none';
        uploadButton.innerHTML = `Post`;
        uploadedFile.style.display = "none";

    });
});
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetchtPosts();
    });
</script>
<script>
var imageBaseUrl = "{{ asset('posts/') }}";
var routeUrl = "{{ route('frontblog', ['id' => ':id']) }}";
var routeUrl2 = "{{ route('editpost', ['id' => ':id']) }}";
</script>
<!--for input type file-->

<script>
document.addEventListener('DOMContentLoaded', function() {
    let draggableFileArea = document.querySelector(".drag-file-area");
    let uploadIcon = document.querySelector(".upload-icon");
    let dragDropText = document.querySelector(".dynamic-message");
    let fileInput = document.querySelector(".default-file-input");
    let cannotUploadMessage = document.querySelector(".cannot-upload-message");
    let uploadedFile = document.querySelector(".file-block");
    let fileName = document.querySelector(".file-name");
    let fileSize = document.querySelector(".file-size");
    let progressBar = document.querySelector(".progress-bar");
    let removeFileButton = document.querySelector(".remove-file-icon");
    let uploadButton = document.querySelector(".upload-button");
    let fileFlag = 0;

    fileInput.addEventListener("click", () => {
        fileInput.value = '';
    });

    fileInput.addEventListener("change", e => {
        if (fileInput.value) {
            uploadIcon.innerHTML = 'check_circle';
            dragDropText.innerHTML = 'File Dropped Successfully!';
            fileName.innerHTML = fileInput.files[0].name;
            fileSize.innerHTML = (fileInput.files[0].size / 1024).toFixed(1) + " KB";
            uploadedFile.style.cssText = "display: flex;";
            progressBar.style.width = 0;
            fileFlag = 0;
        }
    });

    uploadButton.addEventListener("click", () => {
        let isFileUploaded = fileInput.value;
        if (isFileUploaded) {
            if (fileFlag === 0) {
                fileFlag = 1;
                var width = 0;
                var id = setInterval(frame, 50);

                function frame() {
                    if (width >= 300) {
                        clearInterval(id);
                        uploadButton.innerHTML =
                            `<span class="material-icons-outlined upload-button-icon"> check_circle </span> Uploaded`;
                    } else {
                        width += 5;
                        progressBar.style.width = width + "px";
                    }
                }
            }
        } else {
            cannotUploadMessage.style.cssText = "display: flex; animation: fadeIn linear 1.5s;";
        }
    });

    cancelAlertButton.addEventListener("click", () => {
        cannotUploadMessage.style.cssText = "display: none;";
    });
});
</script>

@endsection