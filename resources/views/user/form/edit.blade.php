@extends('layouts.app')
@section('content')
<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-users4"></i> <span class="font-weight-semibold">{{trans('site.edit_app_user')}}</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
    <!-- Dashboard content -->
    <div class="row">
        <div class="col-md-12">
            <div class="actions mb-2">
                <div class="text-left">
                    <a class="btn btn-primary" href="{{route('user.index')}}"><i class="icon-undo2"></i> &nbsp; {{trans('site.back')}}</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <form action="{{route('user.update',$appusers->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
                                <input type="hidden" name="hidden_image" id="hidden_image" value="{{ $appusers->image }}" />
                                @include('user.form.form')
                            </form>
                        </div>
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
<script src="{{asset('assets/global_assets/js/plugins/dropify/js/dropify.min.js')}}"></script>
<script>
    $('.dropify').dropify();
</script>

<script>
    $(".toggle-password").click(function() {

        $(this).toggleClass("icon-eye-blocked");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>
@endsection