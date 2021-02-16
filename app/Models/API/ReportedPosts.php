<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportedPosts extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['app_user_id' , 'item_id'];

    public function appuser()
    {
        return $this->belongsTo(AppUser::class, 'app_user_id' , 'id');
    }

    public function ads()
    {
        return $this->belongsTo(Ads::class, 'ads_id' , 'id');
    }
}
