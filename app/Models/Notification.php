<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = ['title' , 'description' , 'url' , 'date'];

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
