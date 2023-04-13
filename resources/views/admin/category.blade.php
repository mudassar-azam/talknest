@extends('layouts.admin.base')
@section('content')
    <style>
        body {
            min-height: 100vh;
            background: #fafafa;
        }

        .social-link {
            width: 30px;
            height: 30px;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            border-radius: 50%;
            transition: all 0.3s;
            font-size: 0.9rem;
        }

        .social-link:hover,
        .social-link:focus {
            background: #ddd;
            text-decoration: none;
            color: #555;
        }

        .progress {
            height: 10px;
        }
    </style>

    <div class="main-panel">
        <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
                <h2 class="mb-0">Categories
                </h2>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-section-modal">
                    Add Category
                </button>

                <!-- Add section modal -->
                <div class="modal fade" id="add-section-modal" tabindex="-1" aria-labelledby="add-section-modal-label"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="add-section-modal-label">Add section</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="/addcategory" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control-file" id="image" name="image"
                                            required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="container py-5">
                    <div class="row pb-5 mb-4">
                        @foreach ($posts as $post)
                            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 py-3">
                                <!-- Card-->
                                <div class="card shadow-sm border-0 rounded position-relative">
                                    <div class="card-body p-0">
                                        <img src="{{ asset('catimage') }}/{{ $post->image }}" alt=""
                                            class="w-100 card-img-top">
                                        <div class="p-4">
                                            <h5 class="mb-0">{{ $post->name }}</h5>
                                        </div>
                                    </div>
                                    <div class="position-absolute top-0 start-0 bg-white">
                                        <a href="#" class="delete-icon text-danger p-2"
                                            onclick="event.preventDefault();
                                        swal({
                                            title: 'Are you sure?',
                                            text: 'Once deleted, you will not be able to recover this category!',
                                            icon: 'warning',
                                            buttons: true,
                                            dangerMode: true,
                                        })
                                        .then((willDelete) => {
                                            if (willDelete) {
                                                document.getElementById('delete-form-{{ $post->id }}').submit();
                                            } else {
                                                swal('Your category is safe!');
                                            }
                                        });">
                                            <i class="fa fa-trash"></i>
                                        </a>



                                        <form id="delete-form-{{ $post->id }}" method="POST"
                                            action="{{ route('category.destroycategory', $post->id) }}"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>


                                        <a href="{{ route('editcategory', $post->id) }}" class="text-success p-2" data-toggle="modal" data-target="#editCategoryModal">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                  <!-- Form goes here -->

                                                  <form method="POST" action="/editcategory/{{ $post->id }}" enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="form-group">
                                                        <label for="name">Name:</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="{{ $post->name }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="image">Image:</label>
                                                        <input type="file" class="form-control" id="image" name="image" value="{{$post->image}}">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </form>


                                                </div>
                                              </div>
                                            </div>
                                          </div>



                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
