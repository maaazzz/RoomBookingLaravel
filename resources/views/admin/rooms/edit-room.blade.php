@extends('admin.layouts.master')
@section('title', 'Edit Users')
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
                        <div class="card-body">
                            <h4 class="card-title mb-1">Edit Room</h4>
                            <form class="ps-3 pe-3" action="{{ route('room.update',$room->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="title">Title</label>
                                    <input class="form-control" name="title" type="text" id="title" required placeholder="Room Title" value="{{ $room->title }}">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="price">Price</label>
                                    <input class="form-control" name="price" type="text" id="price" required placeholder="Room Price" value="{{ $room->price }}">
                                    @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="address">Address</label>
                                    <input class="form-control" name="address" type="text" id="address" required placeholder="Room address" value="{{ $room->address }}">
                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea class="summernote" name="description" required>{{ $room->description }}</textarea>
                                    @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="categories">Categories</label>
                                    <select class="form-control" name="category">
                                        <option value="" selected>Select Category</option>
                                            @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}" {{ $room->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                            @endforeach
                                    </select>
                                    @error('category')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div> --}}
                                <div class="mb-3">
                                    @php
                                        $attributes = explode(',',$room->attributes);
                                    @endphp

                                    <label for="attributes" >Attributes</label>
                                    <select class="form-control select2-with-tags" multiple=""  name="attributes[]"  style="width: 100%" >
                                        @foreach ($attributes as $i)
                                        <option value="{{ $i }}" {{ $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endforeach
                                    </select>
                                    @error('attributes')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                @php
                                $aminities = explode(',',$room->aminities);
                                @endphp
                                <div class="mb-3">
                                    <label for="Aminities" >Aminities</label>
                                    <select class="form-control select2-with-tags" multiple="" name="aminities[]"  style="width: 100%">
                                        @foreach ($aminities as $i)
                                    <option value="{{ $i }}"  @if ($i == $i)
                                            selected="selected"
                                        @endif
                                        >
                                        {{ $i }}
                                    </option>
                                        @endforeach
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
                                    <button class="btn btn-warning text-light font-weight-medium" type="submit">Update Room</button>
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
