@extends('admin.layouts.master')
@section('title','Booking')
@section('styles')
     <!-- This page plugin CSS -->
     <link href="{{ asset('admin') }}/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css">


@endsection

@section('content-header')
    Feedback Managment
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User Name</th>
                                            <th>User Email</th>
                                            <th>Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($feedbacks as $feedback)
                                        <tr>
                                            <td>{{ $feedback->id }}</td>
                                            <td>{{ $feedback->name }}</td>
                                            <td>{{ $feedback->email }}</td>
                                            <td style="width:50%">{{ $feedback->message }}</td>
                                        </tr>
                                        @endforeach
                                    </tfoot>
                                </table>
                                <div class="d-flex justify-content-end mt-1">
                                    {{ $feedbacks->links() }}
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
