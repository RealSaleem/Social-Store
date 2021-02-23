@section('style')
<link href="{{asset('assets/global_assets/js/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@php
$ads_images = '';
if(isset($ads))
{
$ads_images = $ads->images;
}
@endphp
<style>
    .dropzone .dz-default.dz-message {
        position: initial;
        height: 2rem;
    }
</style>
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
    <label>{{trans('site.select_user')}} :</label>
    <select class="form-control form-control-select2" name="app_user_id" form="ads_form">
        <option value="">{{trans('site.select')}}</option>
        @foreach($appusers as $appusers)
        <option value="{{$appusers->id}}" {{ isset($ads) && ( $ads->app_user_id == $appusers->id) ? 'Selected' : ''}}>{{$appusers->user_name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label>{{trans('site.product_name_en')}} :</label>
    <input type="text" name="product_name_en" class="form-control" placeholder="{{trans('site.enter_product_name')}}" value="{{old('product_name_en', isset($ads) ? $ads->product_name_en : null)}}" form="ads_form">
</div>
<div class="form-group">
    <label>{{trans('site.product_name_ar')}} :</label>
    <input type="text" name="product_name_ar" class="form-control" placeholder="{{trans('site.enter_product_name')}}" value="{{old('product_name_ar', isset($ads) ? $ads->product_name_ar : null)}}" form="ads_form">
</div>
<div class="form-group">
    <label>{{trans('site.price')}} :</label>
    <input type="text" name="price" class="form-control" placeholder="{{trans('site.enter_price')}}" value="{{old('price', isset($ads) ? $ads->price : null)}}" form="ads_form">
</div>
<div class="form-group">
    <label>{{trans('site.type')}} :</label>
    <select class="form-control form-control-select2" name="type" id="type" form="ads_form">
        <option value="normal" @if (isset($ads) && $ads->type == 'normal') selected="selected" @endif>{{trans('site.normal')}}</option>
        <option value="promoted" @if (isset($ads) && $ads->type == 'promoted') selected="selected" @endif>{{trans('site.promoted')}}</option>
    </select>
</div>
@if(!isset($ads))
<div class="form-group d-none" id="duration">
    @else
    <div class="form-group {{ isset($ads) && $ads->type != 'promoted' ? 'd-none' : null}}" id="duration">
        @endif
        <label>{{trans('site.duration_days')}} :</label>
        <select class="form-control form-control-select2" name="duration" id="durations" form="ads_form">
            <option value="0">{{trans('site.select')}}</option>
            @for ($i = 1; $i <=10 ; $i++) <option value="{{$i}}" @if (isset($ads) && $ads->duration == $i) selected="selected" @endif>{{$i}} {{trans('site.days')}} </option>
                @endfor
        </select>
    </div>
    <div class="form-group">
        <label>{{trans('site.description_en')}} :</label>
        <textarea rows="8" cols="5" class="form-control" name="description_en" placeholder="{{trans('site.enter_description')}}" form="ads_form">{{old('description_en', isset($ads) ? $ads->description_en : null)}}</textarea>
    </div>
    <div class="form-group">
        <label>{{trans('site.description_ar')}} :</label>
        <textarea rows="8" cols="5" class="form-control" name="description_ar" placeholder="{{trans('site.enter_description')}}" form="ads_form">{{old('description_ar', isset($ads) ? $ads->description_ar : null)}}</textarea>
    </div>
    <div class="form-group">
        <label>{{trans('site.image')}} :</label>
        <form name="ads_images" action="/file-upload" class="dropzone" id="my-awesome-dropzone" enctype="multipart/form-data" form="ads_form">
            <div class="fallback" required>
                <input name="file" type="file" style="display: none;">
            </div>
        </form>
        <div class="hidden">
            <div id="hidden-images">
                @if(isset($ads))
                @foreach($ads->images as $image)
                <input type="hidden" form="product_form" name="images[{{ $loop->index }}][name]" value="{{ $image['name'] }}" />
                <input type="hidden" form="product_form" name="images[{{ $loop->index }}][path]" value="{{ $image['url'] }}" />
                <input type="hidden" form="product_form" name="images[{{ $loop->index }}][size]" value="{{ $image['size'] }}" />
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="text-right">
        <button type="submit" class="btn btn-primary" form="ads_form">{{trans('site.submit_form')}}<i class="icon-paperplane ml-2"></i></button>
    </div>
    @section('script')
    <script type="text/javascript">
        var image_upload_path = {!! json_encode(url('/')) !!} + '/image_upload';
        var form_id = 'ads_form';
        var p_images = JSON.parse('{!! json_encode($ads_images) !!}');
        var allow_max_files = 10;
    </script>

    <script src="{{asset('assets/js/my-dropzone.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $("#type").change(function() {
                if ($(this).val() == "promoted") {
                    $("#duration").removeClass('d-none');
                } else {
                    $("#duration").addClass('d-none');
                }
            });
        });
    </script>
    @endsection