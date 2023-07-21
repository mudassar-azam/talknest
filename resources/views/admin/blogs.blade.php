@extends('layouts.admin.base')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
                <h2 class="mb-0">Blogs</h2>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-section-modal">
                    Add Blog
                </button>

                <!-- Add section modal -->
                <div class="modal fade" id="add-section-modal" tabindex="-1" aria-labelledby="add-section-modal-label"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="add-section-modal-label">Add Blog</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="/addblog" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name">Title</label>
                                        <input type="text" class="form-control" id="heading" name="heading" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Feature Image</label>
                                        <input type="file" class="form-control-file" id="feature_image"
                                            name="feature_image" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Detail</label>
                                        <textarea class="form-control" id="detail" name="detail" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Content Images</label>
                                        <input type="file" class="form-control" name="images[]" multiple>
                                    </div>
                                    @php
                                        $cats = DB::table('categories')->get();
                                    @endphp
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select class="form-control" id="category" name="category">
                                            @foreach ($cats as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Posted By</label>
                                        <input type="text" class="form-control" id="posted_by" name="posted_by" required>
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

            </div>
            @php
                $posts = DB::table('blogs')
                    ->orderby('id', 'desc')
                    ->paginate(3);
            @endphp

            <div class="row justify-content-center">
                @foreach ($posts as $post)
                    <div class="col-sm-9">
                        <hr>
                        <h2>{{ $post->heading }}</h2>
                        <h5><span class="glyphicon glyphicon-time"></span> Post by {{ $post->posted_by }},
                            {{ \Carbon\Carbon::parse($post->updated_at)->format('Y-m-d H:i') }}.</h5>
                        <h5><span class="glyphicon glyphicon-time"></span> Published on :
                            {{ \App\Models\Category::find($post->category_id)->name }}</h5>
                        <p>{{ $post->detail }}</p>
                        <a href="#" class="btn btn-link text-danger p-0" title="Delete"
                            onclick="event.preventDefault();
            swal({
                title: 'Are you sure?',
                text: 'Once deleted, you will not be able to recover this post!',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    document.getElementById('delete-form-{{ $post->id }}').submit();
                }
            });">
                            <i class="fa fa-trash"></i>
                        </a>
                        <form id="delete-form-{{ $post->id }}" method="POST"
                            action="{{ route('blog.deleteblog', $post->id) }}" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        <br><br>
                        <a href="#" class="fa fa-edit" data-toggle="modal" data-target="#editModal"></a>
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                            aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Edit Blog Post</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Edit Blog Post Form -->
                                        <form action="{{ route('blog.edit', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="blog_id" value="">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="name">Title</label>
                                                    <input type="text" class="form-control" id="heading"
                                                        name="heading" value="{{$post->heading}}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="image">Feature Image</label>
                                                    <input type="file" class="form-control-file" id="feature_image"
                                                        name="feature_image" value="{{$post->feature_image}}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Detail</label>
                                                    <textarea class="form-control" id="detail" name="detail" required>{!! $post->detail !!}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="name">Content Images</label>
                                                    <input type="file" class="form-control" name="images[]" multiple>
                                                </div>
                                                @php
                                                    $cats = DB::table('categories')->get();
                                                @endphp
                                                <div class="form-group">
                                                    <label for="category">Category</label>
                                                    <select class="form-control" id="category" name="category">
                                                        @foreach ($cats as $cat)
                                                            <option value="{{ $cat->id }}">{{ $cat->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Posted By</label>
                                                    <input type="text" class="form-control" id="posted_by"
                                                        name="posted_by" value="{{$post->posted_by}}" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update Blog</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            <div class="row justify-content-center">
                <div class="col-sm-4 mx-auto">
                    {{ $posts->links('pagination::bootstrap-4') }}
                </div>
            </div>


        </div>
    </div>
@endsection
