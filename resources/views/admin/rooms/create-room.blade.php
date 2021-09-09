@extends('admin.layouts.master')
@section('title', 'Add Room')
@section('styles')
      <!-- This Page CSS -->
      <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/assets/libs/select2/dist/css/select2.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css">
      <style>
          .select2-container--default .select2-selection--multiple .select2-selection__choice{
              background-color: #1e88e5 !important;
          }
          .select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
              color: #fff;
          }
      </style>
@endsection
@section('content-header')
    Room Managment
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @if (session()->has('success'))
                        <div class="alert customize-alert alert-dismissible text-success alert-light-success fade show remove-close-icon" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x fill-white text-success feather-sm"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </button>
                            <div class="d-flex align-items-center font-weight-medium me-3 me-md-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info text-success fill-white feather-sm me-2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="8"></line></svg>
                                {{ session('success') }}
                            </div>
                        </div>
                        @endif
                        <div class="card-body">
                            <h4 class="card-title mb-2">Add Room</h4>
                            <form class="ps-3 pe-3" action="{{ route('room.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="title">Title</label>
                                    <input class="form-control" name="title" type="text" id="title" required placeholder="Room Title" value="{{ old('title') }}">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="price">Price</label>
                                    <input class="form-control" name="price" type="text" id="price" required placeholder="Room Price" value="{{ old('price') }}">
                                    @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="address">Address</label>
                                    <input class="form-control" name="address" type="text" id="address" required placeholder="Room Address" value="{{ old('price') }}">
                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea class="summernote" name="description" required></textarea>
                                    @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="categories">Categories</label>
                                    <select class="form-control" name="category">
                                        <option value="" selected>Select Category</option>
                                            @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                    </select>
                                    @error('category')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div> --}}
                                <div class="mb-3">
                                    <label for="attributes" >Attributes</label>
                                    <select class="form-control select2-with-tags" multiple="" name="attributes[]"  style="width: 100%" placeholder="Please type any attributes" >

                                    </select>
                                    @error('attributes')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="Aminities" >Aminities</label>
                                    <select class="form-control select2-with-tags" multiple="" name="aminities[]"  style="width: 100%">
                                    </select>
                                    @error('aminities')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <input class="form-control" name="images[]" type="file" id="formFile" multiple>
                                    @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 text-center">
                                    <a href="{{ route('room.index') }}" class="btn btn-light-warning text-dark font-weight-medium" >Back</a>
                                    <button class="btn btn-warning text-dark font-weight-medium" type="submit">Add Room</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
          <!-- This Page JS -->
          <script src="{{ asset('admin') }}/assets/libs/select2/dist/js/select2.full.min.js"></script>
          <script src="{{ asset('admin') }}/assets/libs/select2/dist/js/select2.min.js"></script>
          <script src="{{ asset('admin') }}/dist/js/pages/forms/select2/select2.init.js"></script>

           <!-- This Page JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        /************************************/
        //default editor
        /************************************/
        $('.summernote').summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });

        // /************************************/
        // //inline-editor
        // /************************************/
        // $('.inline-editor').summernote({
        //     airMode: true
        // });

        // /************************************/
        // //edit and save mode
        // /************************************/
        // window.edit = function () {
        //     $(".click2edit").summernote()
        // },
        //     window.save = function () {
        //         $(".click2edit").summernote('destroy');
        //     }

        // var edit = function () {
        //     $('.click2edit').summernote({ focus: true });
        // };

        // var save = function () {
        //     var markup = $('.click2edit').summernote('code');
        //     $('.click2edit').summernote('destroy');
        // };

        // /************************************/
        // //airmode editor
        // /************************************/
        // $('.airmode-summer').summernote({
        //     airMode: true
        // });
    </script>
@endsection
