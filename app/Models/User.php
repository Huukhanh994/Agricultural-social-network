<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Rennokki\Befriended\Traits\CanFollow;
use Rennokki\Befriended\Contracts\Follower;
use Rennokki\Befriended\Traits\CanBeFollowed;
use Rennokki\Befriended\Contracts\Followable;
use Rennokki\Befriended\Traits\Follow;
use Rennokki\Befriended\Contracts\Following;
use Rennokki\Befriended\Traits\CanBlock;
use Rennokki\Befriended\Contracts\Blocker;
use Rennokki\Befriended\Traits\CanBeBlocked;
use Rennokki\Befriended\Contracts\Blockable;
use Rennokki\Befriended\Traits\Block;
use Rennokki\Befriended\Contracts\Blocking;
class User extends Authenticatable implements Follower, Followable, Following, Blocker, Blockable, Blocking
{
    use Notifiable, CanFollow, CanBeFollowed, Follow;
    use CanBeBlocked, CanBlock, Block;
    use HasRoles;
    // use HasFactory;
    protected $primaryKey = 'id';
    protected $guard_name = 'web';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'birth','gender','is_block','tel','status','is_connect','ward_id', 'user_avatar','provider','provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function wards()
    {
        return $this->belongsTo('App\Models\Ward', 'ward_id', 'ward_code');
    }

    // # whereHas and with of Model
    public function scopeWithAndWhereHas($query, $relation, $constraint)
    {
        return $query->whereHas($relation, $constraint)
            ->with([$relation => $constraint]);
    }

    public function posts()
    {
        return $this->hasMany(Post::class,'user_id','id');
    }

    public function senderRelationships()
    {
        return $this->hasMany(Relationship::class, 'sender_id');
    }

    public function receiverRelationships()
    {
        return $this->hasMany(Relationship::class, 'receiver_id');
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class,'group_users','id','group_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function postLikers()
    {
        return $this->hasMany(PostLike::class,'user_id','id');
    }

    public function saves()
    {
        return $this->hasMany(Save::class,'user_id','id');
    }

    public function experience_farm()
    {
        return $this->hasOne(ExperienceFarm::class,'id','user_id');
    }
}
