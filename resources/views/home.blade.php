@extends('layouts.app')
@section('content')
<style>
.box-bordr{
    box-shadow: 5px 10px;
}
.txt-sz{
    font-size: 16px;
}
</style>
<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-home4"></i> <span class="font-weight-semibold">{{trans('site.dashboard')}}</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>
</div>
<!-- /page header -->
<!-- Content area -->
<div class="content">
    <!-- Dashboard content -->
    <div class="row">
        <div class="col-xl-4">
            <div class="box-bordr card text-center">
                <div class="card-body">
                    <i class="icon-users4 icon-4x border-blue  p-1 mb-1"></i>
                    <h2 class="card-title"><strong>{{trans('site.app_users')}}</strong></h2>
                    <p class="mb-2">{{trans('site.you_have')}} <strong class="txt-sz">{{ $users->count() }} {{trans('site.app_users')}}</strong> {{trans('site.in_database')}}</br>{{trans('site.click_button')}}</p>
                    <a href="{{route('user.index')}}">
                        <button type="submit" class="btn btn-primary"><i class="icon-arrow-right14 mr-2"></i>{{trans('site.view_all_users')}}</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="box-bordr card text-center">
                <div class="card-body">
                    <i class="icon-list2 icon-4x border-blue  p-1 mb-1"></i>
                    <h2 class="card-title"><strong>{{trans('site.ads')}}</strong></h2>
                    <p class="mb-2">{{trans('site.you_have')}} <strong class="txt-sz">{{ $ads->count() }} {{trans('site.ads')}}</strong> {{trans('site.in_database')}}</br>{{trans('site.click_button')}}</p>
                    <a href="{{route('ads.index')}}">
                        <button type="submit" class="btn btn-primary"><i class="icon-arrow-right14 mr-2"></i>{{trans('site.view_all_ads')}}</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="box-bordr card text-center">
                <div class="card-body">
                    <i class="icon-stack4 icon-4x border-blue  p-1 mb-1"></i>
                    <h2 class="card-title"><strong>{{trans('site.reported_posts')}}</strong></h2>
                    <p class="mb-2">{{trans('site.you_have')}} <strong class="txt-sz">{{ $reportedposts->count() }} {{trans('site.reported_posts')}}</strong> {{trans('site.in_database')}}</br>{{trans('site.click_button')}}</p>
                    <a href="{{route('reportedposts.index')}}">
                        <button type="submit" class="btn btn-primary"><i class="icon-arrow-right14 mr-2"></i>{{trans('site.view_all_reported_posts')}}</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="box-bordr card text-center">
                <div class="card-body">
                    <i class="icon-user-cancel icon-4x border-blue  p-1 mb-1"></i>
                    <h2 class="card-title"><strong>{{trans('site.reported_users')}}</strong></h2>
                    <p class="mb-2">{{trans('site.you_have')}} <strong class="txt-sz">{{ $reportedusers->count() }} {{trans('site.reported_users')}}</strong> {{trans('site.in_database')}}</br>{{trans('site.click_button')}}</p>
                    <a href="{{route('reportedusers.index')}}">
                        <button type="submit" class="btn btn-primary"><i class="icon-arrow-right14 mr-2"></i>{{trans('site.view_all_reported_users')}}</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="box-bordr card text-center">
                <div class="card-body">
                    <i class="fas fa-book fa-4x border-blue  p-1 mb-1"></i>
                    <h2 class="card-title"><strong>{{trans('site.stories')}}</strong></h2>
                    <p class="mb-2">{{trans('site.you_have')}} <strong class="txt-sz">0 {{trans('site.stories_database')}}</strong> {{trans('site.in_database')}}</br>{{trans('site.click_button')}}</p>
                    <a href="{{route('stories.index')}}">
                        <button type="submit" class="btn btn-primary"><i class="icon-arrow-right14 mr-2"></i>{{trans('site.view_all_stories')}}</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="box-bordr card text-center">
                <div class="card-body">
                    <i class="fas fa-gavel fa-4x border-blue  p-1 mb-1"></i>
                    <h2 class="card-title"><strong>{{trans('site.bids')}}</strong></h2>
                    <p class="mb-2">{{trans('site.you_have')}} <strong class="txt-sz">0 {{trans('site.bids_database')}}</strong> {{trans('site.in_database')}}</br>{{trans('site.click_button')}}</p>
                    <a href="{{route('bids.index')}}">
                        <button type="submit" class="btn btn-primary"><i class="icon-arrow-right14 mr-2"></i>{{trans('site.view_all_bids')}}</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /dashboard content -->
</div>
<!-- /content area -->
@endsection