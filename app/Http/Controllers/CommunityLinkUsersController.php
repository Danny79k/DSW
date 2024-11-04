<?php

namespace App\Http\Controllers;

use App\Models\CommunityLinkUsers;
use Illuminate\Http\Request;
use App\Models\CommunityLink;
use Illuminate\Support\Facades\Auth;


class CommunityLinkUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommunityLink $link)
    {
        CommunityLinkUsers::firstOrNew(['user_id' => Auth::id(), 'community_link_id' => $link->id])->toggle();
        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(CommunityLinkUsers $communityLinkUsers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommunityLinkUsers $communityLinkUsers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommunityLinkUsers $communityLinkUsers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommunityLinkUsers $communityLinkUsers)
    {
        //
    }
}
