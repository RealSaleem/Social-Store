<?php

namespace App\Models\API;

use App\Models\Category;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class AppUser extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable, SoftDeletes;
    // protected $table = 'app_users';
    protected $fillable = [
        'first_name', 'last_name', 'user_name', 'email', 'password', 'phone', 'password', 'country_id', 'category_id', 'image', 'verified_token'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
