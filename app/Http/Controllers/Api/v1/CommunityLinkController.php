<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Models\CommunityLink;
use App\Queries\CommunityLinkQuery;
use Illuminate\Http\Request;

class CommunityLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Channel $channel = null)
    {
        if (request()->exists('popular')) {
            $links = (new CommunityLinkQuery())->getMostPopular();
        } else if (request()->exists("search")) {
            $search = request("search");
            $links = (new CommunityLinkQuery())->getSearch($search);
        } else {
            $links = (new CommunityLinkQuery())->getAll();
        }
        $response = [
            'data' => $links,
            'status' => 'success'
        ];
        $channels = Channel::orderBy('title', 'asc')->get();
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CommunityLink $communityLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommunityLink $communityLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommunityLink $communityLink)
    {
        //
    }
}
