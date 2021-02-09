@extends('layouts.app')

@section('content')
<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-bubble-notification"></i> <span class="font-weight-semibold">{{trans('site.about_us')}}</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">

    <!-- Dashboard content -->
    <div class="row">
        <div class="col-xl-12">
            <div class="actions mb-2">
                <div class="text-right" hidden>
                    <a class="btn btn-primary" href="{{route('about.create')}}"><i class="icon-bubble-notification"></i> &nbsp; {{trans('site.add_aboutus')}}</a>
                </div>

            </div>
            <div class="card">
                <div class="card-body">
                    @foreach($aboutus as $about)
                    <div class="text-right">
                        <a class="btn btn-primary" href="{{route('about.edit',$about->id)}}"><i class="icon-bubble-notification"></i> &nbsp; {{trans('site.edit_aboutus')}}</a>
                    </div>
                    <div class="form-group">
                        <h4><strong>{{trans('site.title_en')}}</strong></h4>
                        {{$about->title_en}}
                    </div>
                    <hr class="mt-3 mb-4">
                    <div class="form-group">
                        <h4><strong>{{trans('site.title_ar')}}</strong></h4>
                        {{$about->title_ar}}
                    </div>
                    <hr class="mt-3 mb-4">
                    <div class="form-group">
                        <h4><strong>{{trans('site.description_en')}}</strong></h4>
                        {{$about->description_en}}
                    </div>
                    <hr class="mt-3 mb-4">
                    <div class="form-group">
                        <h4><strong>{{trans('site.description_ar')}}</strong></h4>
                        {{$about->description_ar}}
                    </div>
                    <hr class="mt-3 mb-4">
                    <div class="form-group">
                        <h4><strong>{{trans('site.created_at')}}</strong></h4>
                        {{date('d M Y h:i:s A',strtotime($about->created_at))}}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- /dashboard content -->
</div>
<!-- /content area -->
@endsection
