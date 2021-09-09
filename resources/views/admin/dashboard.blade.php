@extends('admin.layouts.master')

@section('title')
    Dashboard
@endsection
@section('content-header')
    Dashboard
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="round round-lg text-white d-flex justify-content-center align-items-center rounded-circle bg-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield fill-white feather-lg"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                        </div>
                        <div class="ms-2 align-self-center">
                            <h3 class="mb-0">{{ $bookings }}</h3>
                            <h6 class="text-muted mb-0">Total Bookings</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
