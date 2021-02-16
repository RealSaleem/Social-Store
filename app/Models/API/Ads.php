<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ads extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['product_name' , 'price' , 'description' , 'duration' , 'type' , 'app_user_id'];

    public function appuser()
    {
        return $this->belongsTo(AppUser::class, 'app_user_id' , 'id');
    }
}
