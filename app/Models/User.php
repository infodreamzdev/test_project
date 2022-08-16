<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = true;

    protected $guarded = [];

    /**
     * Interact with the user's city name
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function city(): Attribute
    {
        return Attribute::make(
            get: function ($value){
                if($this->city_id){
                    $details = City::find($this->city_id);
                   return $details->name;
                }else{         
                    return null;
                }
            }
        );
    }

    /**
     * Interact with the user's state name
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function state(): Attribute
    {
        return Attribute::make(
            get: function ($value){
                if($this->state_id){
                    $details = State::find($this->state_id);
                   return $details->name;
                }else{         
                    return null;
                }
            }
        );
    }

    /**
     * Interact with the user's country name
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function Country(): Attribute
    {
        return Attribute::make(
            get: function ($value){
                if($this->country_id){
                    $details = Country::find($this->country_id);                   
                   return $details->name;
                }else{                   
                    return null;
                }
            }
        );
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
