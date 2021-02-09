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
    <label>{{trans('site.name_en')}} :</label>
    <input type="text" name="name_en" class="form-control" placeholder="{{trans('site.enter_category')}}" value="{{old('name_en', isset($category) ? $category->name_en : null)}}">
</div>
<div class="form-group">
    <label>{{trans('site.name_ar')}} :</label>
    <input type="text" name="name_ar" class="form-control" placeholder="{{trans('site.enter_category')}}" value="{{old('name_ar', isset($category) ? $category->name_ar : null)}}">
</div>

<div class="form-group">
<label>{{trans('site.category_image')}} :</label>
    @if(isset($category) && $category->image != null)
    <input type="file" id="input-file-now" name="image" class="dropify" data-default-file="{{asset('storage/'.$category->image)}}" data-max-file-size="2M" />
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
@endsection