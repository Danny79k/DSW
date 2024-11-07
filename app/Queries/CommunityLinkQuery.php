<?php

namespace App\Queries;

use App\Models\Channel;
use App\Models\CommunityLink;
class CommunityLinkQuery
{
    public function getByChannel(Channel $channel)
    {
        $links = $channel->comLinks()->where('approved', 1)->latest('updated_at')->paginate(15);
        return $links;
    }

    public function getAll()
    {
        $links = CommunityLink::where('approved', 1)->latest('updated_at')->paginate(15);
        return $links;
    }

    public function getMostPopular()
    {
        $links = CommunityLink::where('approved', 1)->withCount('users')->orderBy('users_count', 'desc')->paginate(15);
        return $links;
    }
}