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
    <label>{{trans('site.title_en')}} :</label>
    <input type="text" name="title_en" class="form-control" placeholder="{{trans('site.enter_title')}}" value="{{old('title_en', isset($privacy) ? $privacy->title_en : null)}}">
</div>
<div class="form-group">
    <label>{{trans('site.title_ar')}} :</label>
    <input type="text" name="title_ar" class="form-control" placeholder="{{trans('site.enter_title')}}" value="{{old('title_ar', isset($privacy) ? $privacy->title_ar : null)}}">
</div>
<div class="form-group">
	<label>{{trans('site.description_en')}} :</label>
	<textarea rows="8" cols="5" class="form-control" name="description_en" placeholder="{{trans('site.enter_description')}}">{{old('description_en', isset($privacy) ? $privacy->description_en : null)}}</textarea>
</div>
<div class="form-group">
	<label>{{trans('site.description_ar')}} :</label>
	<textarea rows="8" cols="5" class="form-control" name="description_ar" placeholder="{{trans('site.enter_description')}}">{{old('description_ar', isset($privacy) ? $privacy->description_ar : null)}}</textarea>
</div>
<div class="text-right">
    <button type="submit" class="btn btn-primary">{{trans('site.submit_form')}}<i class="icon-paperplane ml-2"></i></button>
</div>