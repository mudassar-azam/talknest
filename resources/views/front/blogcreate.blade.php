@extends('layouts.front.main')
@section('content')
    <style>
        textarea {
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            font-size: 16px;
            color: #333;
            resize: none;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        /* Hide the default file input */
        input[type="file"] {
            display: none;
        }

        /* Style the label to look like a button */
        label.upload-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Style label when hovering */
        label.upload-btn:hover {
            background-color: #45a049;
        }

        /* Style label when it has focus */
        label.upload-btn:focus {
            outline: none;
        }

        /* Style label text */
        label.upload-btn-text {
            font-size: 16px;
        }

        /* Style the file name text */
        span.file-name {
            margin-left: 10px;
        }
    </style>


    @auth

        <div class="commentArea">


            <div>


                <div class="comment-form">
                    <div class="group-title">
                        <h5 class="comment-heading offset-md-3">Post A Comment</h5>
                    </div>

                    <!-- Comment Form -->


                    <form id="blogform" method="POST" action="">
                        @csrf
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-4 col-sm-4 form-group offset-md-3">
                                <input type="hidden" name="category_id" value="{{ $id }}">
                                <input type="text" name="title" placeholder="Title*" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 form-group offset-md-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="feature-image-upload" class="upload-btn">
                                            <span class="upload-btn-text">Choose feature image</span>
                                            <input type="file" name="feature_image" id="feature-image-upload"
                                                   accept=".img,.jpg,.png" onchange="showFileName(this)">
                                        </label>

                                        <span class="file-name" id="file-name-display"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 form-group offset-md-3">
                                <textarea name="detail">


                                </textarea>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 form-group offset-md-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="photo-upload" class="upload-btn">
                                            <span class="upload-btn-text">Choose images</span>
                                            <!-- Add multiple attribute to allow multiple file selection -->
                                            <input type="file" name="photo[]" id="photo-upload" accept=".img,.jpg,.png"
                                                   multiple onchange="showFileNames(this)">
                                        </label>

                                        <span class="file-name" id="file-name-display"></span>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4 col-md-12 col-sm-12  form-group offset-8">
                                <button class="btn-style-one theme-btn" type="submit">
                                    Post
                                </button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>


        </div>





    @else
        <div class="else">
            You Must Login First
        </div>
    @endauth

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        jQuery(document).ready(function ($) {
            // Your jQuery code here

            $('#blogform').submit(function (event) {
                event.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    url: '{{ route('front.blog.store')}}',
                    type: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {

                        if (response["status"] == true) {

                            window.location.href = '/blogdetail/' + response.blog_id;

                            $('#name').removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback').html("");


                            $('#price').removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback').html("");

                        } else {


                            let error = response['errors'];
                            if (error['name']) {
                                $('#name').addClass('is-invalid')
                                    .siblings('p')
                                    .addClass('invalid-feedback').html(error['name']);
                            } else {
                                $('#name').removeClass('is-invalid')
                                    .siblings('p')
                                    .removeClass('invalid-feedback').html("");
                            }
                            if (error['price']) {
                                $('#price').addClass('is-invalid')
                                    .siblings('p')
                                    .addClass('invalid-feedback').html(error['price']);
                            } else {
                                $('#price').removeClass('is-invalid')
                                    .siblings('p')
                                    .removeClass('invalid-feedback').html("");
                            }
                            if (error['detail']) {
                                $('#detail').addClass('is-invalid')
                                    .siblings('p')
                                    .addClass('invalid-feedback').html(error['detail']);
                            } else {
                                $('#detail').removeClass('is-invalid')
                                    .siblings('p')
                                    .removeClass('invalid-feedback').html("");
                            }
                        }

                    }, error: function (jqXHR, exception) {
                        console.log('Something went wrong')
                    }
                });
            });
        });

    </script>


@endsection

