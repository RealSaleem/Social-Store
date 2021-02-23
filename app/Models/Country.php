<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name_en', 'name_ar'];

    public function getImageAttribute()
    {
        $image = $this->attributes['image'];
        if ($image == null) {
            return null;
        }
        $image_path = Config('app.uploads_url') . $image;
        return $image_path;
    }
}
