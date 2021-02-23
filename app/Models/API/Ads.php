<?php

namespace App\Models\API;

use App\Models\AdsImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ads extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['product_name_en' , 'product_name_ar' , 'price' , 'description' , 'duration' , 'type' , 'app_user_id'];

    public function appuser()
    {
        return $this->belongsTo(AppUser::class, 'app_user_id' , 'id');
    }

    public function images()
    {
        return $this->hasMany(AdsImage::class);
    }

    public function getImageAttribute()
    {
        $image = $this->attributes['image'];
        if($image == null){
            return null;
        }
        $image_path = Config('app.uploads_url').$image;
        return $image_path;
    }
}
