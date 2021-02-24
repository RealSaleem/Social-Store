@extends('layouts.app')
@section('content')
<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-file-eye2"></i> <span class="font-weight-semibold">{{trans('site.view_contactus_details')}}</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
    @include('layouts.flash-message')
    <!-- Dashboard content -->
    <div class="row">
        <div class="col-xl-12">
            <div class="actions mb-2">
                <div class="text-left">
                    <a class="btn btn-primary" href="{{route('contact.index')}}"><i class="icon-undo2"></i> &nbsp; {{trans('site.back')}}</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <h6><strong>{{trans('site.submission_id')}} :</strong></h6>
                        {{$contact->id}}
                    </div>
                    <hr class="mt-3 mb-4">
                    <div class="form-group">
                        <h6><strong>{{trans('site.Submission_date_time')}} :</strong></h6>
                        {{date('d M Y h:i:s A',strtotime($contact->created_at))}}
                    </div>
                    <hr class="mt-3 mb-4">
                    <div class="form-group">
                        <h6><strong>{{trans('site.customer_name')}} :</strong></h6>
                        {{$contact->customer_name}}
                    </div>
                    <hr class="mt-3 mb-4">
                    <div class="form-group">
                        <h6><strong>{{trans('site.email')}} :</strong></h6>
                        {{$contact->email}}
                    </div>
                    <hr class="mt-3 mb-4">
                    <div class="form-group">
                        <h6><strong>{{trans('site.phone')}} :</strong></h6>
                        {{$contact->phone}}
                    </div>
                    <hr class="mt-3 mb-4">
                    <div class="form-group">
                        <h6><strong>{{trans('site.status')}} :</strong></h6>
                        {{$contact->status}}
                    </div>
                    <hr class="mt-3 mb-4">
                    <div class="form-group">
                        <h6><strong>{{trans('site.message')}} :</strong></h6>
                        {{$contact->message}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /dashboard content -->
</div>
<!-- /content area -->
@endsection
@section('script')
@endsection