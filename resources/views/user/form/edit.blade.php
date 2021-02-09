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
                                @section('style')
                                <link href="{{asset('assets/global_assets/js/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css">
                                @endsection
                                @if (isset($errors) && count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <div class="form-group">
                                    <label>{{trans('site.user_name')}} :</label>
                                    <input type="text" name="user_name" class="form-control" placeholder="{{trans('site.enter_user_name')}}" value="{{old('first_name', isset($appusers) ? $appusers->user_name : null)}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>{{trans('site.first_name')}} :</label>
                                    <input type="text" name="first_name" class="form-control" placeholder="{{trans('site.enter_first_name')}}" value="{{old('first_name', isset($appusers) ? $appusers->first_name : null)}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>{{trans('site.last_name')}} :</label>
                                    <input type="text" name="last_name" class="form-control" placeholder="{{trans('site.enter_last_name')}}" value="{{old('last_name', isset($appusers) ? $appusers->last_name : null)}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>{{trans('site.email')}} :</label>
                                    <input type="text" name="email" class="form-control" placeholder="{{trans('site.enter_email')}}" value="{{old('email', isset($appusers) ? $appusers->email : null)}}" readonly>
                                </div>
                                <label>{{trans('site.password')}} :</label>
                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <input id="password-field" type="password" name="password" class="form-control" placeholder="{{trans('site.enter_password')}}" value="{{old('password', isset($appusers) ? $appusers->password : null)}}">
                                    <div class="form-control-feedback form-control-feedback-sm">
                                        <span toggle="#password-field" class="icon-eye field-icon toggle-password"></span>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
    <label>{{trans('site.password')}} :</label>
    <input id="password-field" type="password" name="password" class="form-control" placeholder="{{trans('site.enter_password')}}" value="{{old('password', isset($appusers) ? $appusers->password : null)}}">
    <span toggle="#password-field" class="icon-eye field-icon toggle-password"></span>
</div> -->
                                <div class="form-group">
                                    <label>{{trans('site.phone')}} :</label>
                                    <input type="text" name="phone" class="form-control" placeholder="{{trans('site.enter_phone')}}" value="{{old('phone', isset($appusers) ? $appusers->phone : null)}}" readonly>
                                </div>
                             
                                
                              
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">{{trans('site.submit_form')}}<i class="icon-paperplane ml-2"></i></button>
                                </div>
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