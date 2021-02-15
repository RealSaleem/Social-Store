<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportedUser extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'against_id'];


    public function appuser()
    {
        return $this->belongsTo(AppUser::class, 'user_id' , 'id');
    }

    public function againstuser()
    {
        return $this->belongsTo(AppUser::class, 'against_id' , 'id');
    }
}
