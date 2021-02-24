@extends('layouts.app')
@section('content')
<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-file-eye2"></i> <span class="font-weight-semibold">{{trans('site.view_ads_details')}}</h4>
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
                    <a class="btn btn-primary" href="{{route('ads.index')}}"><i class="icon-undo2"></i> &nbsp; {{trans('site.back')}}</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <h6><strong>{{trans('site.user_name')}} :</strong></h6>
                        {{$ads->appuser->user_name}}
                    </div>
                    <hr class="mt-3 mb-4">
                    <div class="form-group">
                        <h6><strong>{{trans('site.product_name_en')}} :</strong></h6>
                        {{$ads->product_name_en}}
                        <hr class="mt-2 mb-4">
                        <h6><strong>{{trans('site.product_name_ar')}} :</strong></h6>
                        {{$ads->product_name_ar}}
                    </div>
                    <hr class="mt-3 mb-4">
                    <div class="form-group">
                        <h6><strong>{{trans('site.price')}} :</strong></h6>
                        {{$ads->price}}
                    </div>
                    <hr class="mt-3 mb-4">
                    <div class="form-group">
                        <h6><strong>{{trans('site.type')}} :</strong></h6>
                        {{$ads->type}}
                        <hr class="mt-2 mb-4">
                        <h6><strong>{{trans('site.duration_days')}} :</strong></h6>
                        {{$ads->duration}} {{trans('site.days')}}
                    </div>
                    <hr class="mt-3 mb-4">
                    <div class="form-group">
                        <h6><strong>{{trans('site.description_en')}} :</strong></h6>
                        {{$ads->description_en}}
                        <hr class="mt-2 mb-4">
                        <h6><strong>{{trans('site.description_ar')}} :</strong></h6>
                        {{$ads->description_ar}}
                    </div>
                    <hr class="mt-3 mb-4">
                    <div class="form-group">
                        <h6><strong>{{trans('site.sold_to')}} :</strong></h6>
                        {{$ads->user_id_sold}}
                    </div>
                    <hr class="mt-3 mb-4">
                    <div class="form-group">
                        <h6><strong>{{trans('site.selling_price')}} :</strong></h6>
                        {{$ads->sold_price}}
                    </div>
                    <hr class="mt-3 mb-4">
                    <div class="form-group">
                        <h6><strong>{{trans('site.images')}} :</strong></h6>
                        @foreach($ads->images as $image)
                        <img src="{{$image->url}}" style="width: 200px; height: auto;" />
                        @endforeach
                    </div>
                    <hr class="mt-3 mb-4">
                    <div class="form-group">
                        <h6><strong>{{trans('site.date')}} :</strong></h6>
                        {{date('d M Y h:i:s A',strtotime($ads->date))}}
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