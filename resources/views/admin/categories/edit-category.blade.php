@extends('admin.layouts.master')
@section('title', 'Edit Users')

@section('content-header')
    Category Managment
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-1">Edit Category</h4>
                            <form class="" action="{{ route('category.update',$category->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" placeholder="category name" name="name" value="{{ $category->name }}">
                                    <label><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user feather-sm text-dark fill-white me-2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>Category Name</label>
                                </div>
                                <div class="d-md-flex align-items-center">
                                    <div class="mt-3 mt-md-0 ms-auto">
                                        <a href="{{ route('category.index') }}" class="btn btn-warning font-weight-medium rounded-pill px-4">
                                            <div class="d-flex align-items-center">
                                                Back
                                            </div>
                                        </a>
                                        <button type="submit" class="btn btn-primary font-weight-medium rounded-pill px-4">
                                            <div class="d-flex align-items-center">
                                                Update
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
