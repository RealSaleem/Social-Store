@extends('layouts.app')
@section('content')
<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-address-book"></i> <span class="font-weight-semibold">{{trans('site.edit_contact_us')}}</h4>
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
                    <a class="btn btn-primary" href="{{route('contact.index')}}"><i class="icon-undo2"></i> &nbsp; {{trans('site.back')}}</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <form action="{{route('contact.update',$contacts->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="form-group">
                                    <label>{{trans('site.status')}} :</label>
                                    <select class="form-control form-control-select2" name="status">
                                        <option value="new">{{trans('site.new')}}</option>
                                        <option value="viewed">{{trans('site.viewed')}}</option>
                                    </select>
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