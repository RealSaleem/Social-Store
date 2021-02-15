@extends('layouts.app')

@section('content')
<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-cogs"></i> <span class="font-weight-semibold">{{trans('site.settings')}}</h4>
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
            <div class="actions mb-2" hidden>
                <div class="text-right">
                    <a class="btn btn-primary" href="{{route('setting.create')}}"><i class="icon-cogs"></i> &nbsp; {{trans('site.add_setting')}}</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    @foreach($setting as $sett)
                    <div class="text-right">
                        <a class="btn btn-primary" href="{{route('setting.edit',$sett->id)}}"><i class="icon-cogs"></i> &nbsp; {{trans('site.edit_setting')}}</a>
                    </div>
                    <div class="form-group">
                        <h4><strong>{{trans('site.facebook')}}</strong></h4>
                        {{$sett->facebook_url}}
                    </div>
                    <hr class="mt-3 mb-4">
                    <div class="form-group">
                        <h4><strong>{{trans('site.twitter')}}</strong></h4>
                        {{$sett->twitter_url}}
                    </div>
                    <hr class="mt-3 mb-4">
                    <div class="form-group">
                        <h4><strong>{{trans('site.Instagram')}}</strong></h4>
                        {{$sett->instagram_url}}
                    </div>
                    <hr class="mt-3 mb-4">
                    <div class="form-group">
                        <h4><strong>{{trans('site.promotion_price')}}</strong></h4>
                        {{$sett->promotion_price}}
                    </div>
                    <hr class="mt-3 mb-4">
                    <div class="form-group">
                        <h4><strong>{{trans('site.created_at')}}</strong></h4>
                        {{date('d M Y h:i:s A',strtotime($sett->created_at))}}
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