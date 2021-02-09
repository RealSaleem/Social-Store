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
    <input type="text" name="user_name" class="form-control" placeholder="{{trans('site.enter_user_name')}}" value="{{old('first_name', isset($appusers) ? $appusers->user_name : null)}}">
</div>
<div class="form-group">
    <label>{{trans('site.first_name')}} :</label>
    <input type="text" name="first_name" class="form-control" placeholder="{{trans('site.enter_first_name')}}" value="{{old('first_name', isset($appusers) ? $appusers->first_name : null)}}">
</div>
<div class="form-group">
    <label>{{trans('site.last_name')}} :</label>
    <input type="text" name="last_name" class="form-control" placeholder="{{trans('site.enter_last_name')}}" value="{{old('last_name', isset($appusers) ? $appusers->last_name : null)}}">
</div>
<div class="form-group">
    <label>{{trans('site.email')}} :</label>
    <input type="text" name="email" class="form-control" placeholder="{{trans('site.enter_email')}}" value="{{old('email', isset($appusers) ? $appusers->email : null)}}">
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
    <input type="text" name="phone" class="form-control" placeholder="{{trans('site.enter_phone')}}" value="{{old('phone', isset($appusers) ? $appusers->phone : null)}}">
</div>
<div class="form-group">
    <label>{{trans('site.select_country')}} :</label>
    <select class="form-control form-control-select2" name="country_id">
        <option value="">{{trans('site.select')}}</option>
        @foreach($countries as $country)
        <option value="{{$country->id}}">{{$country->name_en}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label>{{trans('site.select_category')}} :</label>
    <select class="form-control form-control-select2" name="category_id">
        <option value="">{{trans('site.select')}}</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name_en}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>{{trans('site.user_image')}} :</label>
    @if(isset($appusers) && $appusers->image != null)
    <input type="file" id="input-file-now" name="image" class="dropify" data-default-file="{{asset('storage/'.$appusers->image)}}" data-max-file-size="2M" />
    @else
    <input type="file" id="input-file-now" name="image" class="dropify" data-default-file="" data-max-file-size="2M" />
    @endif
</div>

<div class="text-right">
    <button type="submit" class="btn btn-primary">{{trans('site.submit_form')}}<i class="icon-paperplane ml-2"></i></button>
</div>

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