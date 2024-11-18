<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $image
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 * @property $trusted
 *
 * @property CommunityLinkUsers[] $communityLinkUsers
 * @property CommunityLink[] $communityLinks
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'image', 'trusted', 'password'];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function communityLinkUsers()
    {
        return $this->hasMany(\App\Models\CommunityLinkUsers::class, 'id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function communityLinks()
    {   
        return $this->hasMany(CommunityLink::class);
    }

    public function isTrusted()
    {
        if ($this->trusted == 0)
            return false;
        return true;
    }

    public function votes()
    {
        return $this->belongsToMany(CommunityLink::class, 'community_link_users');
    }

    public function votedFor(CommunityLink $link)
    {
        return $this->votes->contains($link); //votes tiene que ser un metodo no una propiedad ??
    }
}
