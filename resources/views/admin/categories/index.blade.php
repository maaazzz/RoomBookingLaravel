@extends('admin.layouts.master')
@section('title','Categories')
@section('styles')
     <!-- This page plugin CSS -->
     <link href="{{ asset('admin') }}/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css">


@endsection

@section('content-header')
    Category Managment
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
            <div class="row">
                <div class="col-12">
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
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary text-light  btn-lg px-4 fs-4 font-weight-medium" data-bs-toggle="modal" data-bs-target="#signup-modal">
                                Add Category
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $cat)
                                        <tr>
                                            <td>{{ $cat->id }}</td>
                                            <td>{{ $cat->name }}</td>
                                            <td>
                                                <a href="{{ route('category.edit',$cat->id) }}">
                                                    <i class="mdi mdi-account-edit md-22"></i>
                                                </a>
                                                <a href="{{ route('category.destroy',$cat->id) }}"
                                                    onclick="return confirm('Are you sure to delete this category')">
                                                    <i class="mdi mdi-delete-circle md-22 text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tfoot>
                                </table>
                                <div class="d-flex justify-content-end mt-1">
                                    {{ $categories->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@include('admin.categories.add-category-modal')
@endsection
@section('scripts')
      <!--This page plugins -->
      <script src="{{ asset('admin') }}/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="{{ asset('admin') }}/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
      <script src="{{ asset('admin') }}/dist/js/pages/datatable/datatable-basic.init.js"></script>
@endsection
