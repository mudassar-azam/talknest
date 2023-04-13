@extends('layouts.admin.base')
@section('content')
<div class="main-panel">
    <div class="content-wrapper pb-0">
        <div class="page-header flex-wrap">
            <h3 class="mb-0">Home page section 1
            </h3>

        </div>

        <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                {{-- <label for="id" class="col-md-4 col-form-label text-md-right">ID</label> --}}
                <div class="col-md-6">
                    <input id="id" type="hidden" class="form-control @error('id') is-invalid @enderror" name="id" value="1" autocomplete="id" autofocus>
                    @error('id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="heading" class="col-md-4 col-form-label text-md-right">Heading</label>
                <div class="col-md-6">
                    <input id="heading" type="text" class="form-control @error('heading') is-invalid @enderror" name="heading" value="{{ old('heading') }}" autocomplete="heading" autofocus>
                    @error('heading')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                <div class="col-md-6">
                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description" autofocus>{{ old('description') }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>
                <div class="col-md-6">
                    <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image">
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Submit') }}
                    </button>
                </div>
            </div>
        </form>



        </div>
    </div>
@endsection
