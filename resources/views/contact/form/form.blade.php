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
    <label>{{trans('site.customer_name')}} :</label>
    <input type="text" name="customer_name" class="form-control" placeholder="{{trans('site.enter_customer_name')}}" value="{{old('name_en', isset($category) ? $category->name_en : null)}}">
</div>
<div class="form-group">
    <label>{{trans('site.email')}} :</label>
    <input type="text" name="email" class="form-control" placeholder="{{trans('site.enter_email')}}" value="{{old('name_ar', isset($category) ? $category->name_ar : null)}}">
</div>
<div class="form-group">
    <label>{{trans('site.phone')}} :</label>
    <input type="text" name="phone" class="form-control" placeholder="{{trans('site.enter_phone')}}" value="{{old('name_ar', isset($category) ? $category->name_ar : null)}}">
</div>
<div class="form-group">
    <label>{{trans('site.message')}} :</label>
    <input type="text" name="message" class="form-control" placeholder="{{trans('site.enter_message')}}" value="{{old('name_ar', isset($category) ? $category->name_ar : null)}}">
</div>
<div class="text-right">
    <button type="submit" class="btn btn-primary">{{trans('site.submit_form')}}<i class="icon-paperplane ml-2"></i></button>
</div>

@section('script')
<script src="{{asset('assets/global_assets/js/plugins/dropify/js/dropify.min.js')}}"></script>
<script>
    $('.dropify').dropify();
</script>
@endsection