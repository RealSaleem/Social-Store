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
    <label>{{trans('site.product_name')}} :</label>
    <input type="text" name="product_name" class="form-control" placeholder="{{trans('site.enter_product_name')}}" value="{{old('product_name', isset($ads) ? $ads->product_name : null)}}">
</div>
<div class="form-group">
    <label>{{trans('site.price')}} :</label>
    <input type="text" name="price" class="form-control" placeholder="{{trans('site.enter_price')}}" value="{{old('price', isset($ads) ? $ads->price : null)}}">
</div>
<div class="form-group">
    <label>{{trans('site.type')}} :</label>
    <select class="form-control form-control-select2" name="type">
        <option value="normal" @if (isset($ads) && $ads->type == 'normal') selected="selected" @endif>{{trans('site.normal')}}</option>
        <option value="promoted" @if (isset($ads) && $ads->type == 'promoted') selected="selected" @endif>{{trans('site.promoted')}}</option>
    </select>
</div>
<div class="form-group">
    <label>{{trans('site.duration_days')}} :</label>
    <input type="number" name="duration" class="form-control" placeholder="{{trans('site.enter_duration')}}" value="{{old('duration', isset($ads) ? $ads->duration : null)}}">
</div>
<div class="form-group">
    <label>{{trans('site.description')}} :</label>
    <textarea rows="8" cols="5" class="form-control" name="description" placeholder="{{trans('site.enter_description')}}">{{old('description', isset($ads) ? $ads->description : null)}}</textarea>
</div>
<div class="form-group">
    <label>{{trans('site.image')}} :</label>
    @if(isset($ads) && $ads->image != null)
    <input type="file" id="input-file-now" name="image" class="dropify" data-default-file="{{asset('storage/'.$ads->image)}}" data-max-file-size="2M" />
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