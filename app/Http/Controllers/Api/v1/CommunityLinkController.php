<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommunityLinkForm;
use App\Models\Channel;
use App\Models\CommunityLink;
use App\Queries\CommunityLinkQuery;
use Auth;
use Illuminate\Http\Request;

class CommunityLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
    public function store(CommunityLinkForm $request)
    {
        $data = $request->validated();
        $link = new CommunityLink($data);

        if ($link->hasAlreadyBeenSubmitted()) {
            $response = [
                'status' => 'success',
                'message' => 'Link already submitted',
                'data' => $link,
                ];
            return response()->json($response, 409 );
        } else {
            $link->user_id = Auth::id();
            $link->approved = Auth::user()->trusted ?? false;
            $link->save();
            $response = [
                'status' => 'success',
                'message' => 'Link submitted succesfully',
                'data' => $link,
                ];

            if (Auth::user()->trusted) {
                return response()->json($response, 200);
            } else {
                return response()->json($response, 202);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CommunityLink $communitylink)
    {
        $link = (new CommunityLinkQuery())->getById($communitylink);
        // dd($link);
        $response = [
            'data' => $link,
            'status' => 'success'
        ];
        return response()->json($response, 200);
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
