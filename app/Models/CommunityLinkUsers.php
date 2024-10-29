<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityLinkUsers extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];

    public function alreadyLiked()
    {
        return $this->where('user_id', auth()->id())->exists();
    }
}
