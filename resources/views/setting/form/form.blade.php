@if (isset($errors) && count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card">
    <div class="card-body">
        <h1>{{trans('site.social_media_links')}}</h1>
        <div class="form-group">
            <label>{{trans('site.facebook')}} :</label>
            <input type="text" name="facebook_url" class="form-control" placeholder="{{trans('site.enter_fb_url')}}" value="{{old('facebook_url', isset($setting) ? $setting->facebook_url : null)}}">
        </div>
        <div class="form-group">
            <label>{{trans('site.twitter')}} :</label>
            <input type="text" name="twitter_url" class="form-control" placeholder="{{trans('site.enter_twt_url')}}" value="{{old('twitter_url', isset($setting) ? $setting->twitter_url : null)}}">
        </div>
        <div class="form-group">
            <label>{{trans('site.Instagram')}} :</label>
            <input type="text" name="instagram_url" class="form-control" placeholder="{{trans('site.enter_insta_url')}}" value="{{old('instagram_url', isset($setting) ? $setting->instagram_url : null)}}">
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label>{{trans('site.promotion_price')}} :</label>
            <input type="text" name="promotion_price" class="form-control" placeholder="{{trans('site.enter_promotion_price')}}" value="{{old('promotion_price', isset($setting) ? $setting->promotion_price : null)}}">
        </div>
    </div>
</div>
<div class="text-right">
    <button type="submit" class="btn btn-primary">{{trans('site.submit_form')}}<i class="icon-paperplane ml-2"></i></button>
</div>