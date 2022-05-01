<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;
use App\Models\User;
use App\Models\Topic;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = Entry::all();
        $entriesWithUser = $entries->map(function($item, $key) { 
            $user = User::find($item->userid);
            return array_merge($item->toArray(), ['user' => $user]);
        });

        return $entriesWithUser;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'entry' => 'required'
        ]);

        Topic::where('id', $request['topicid'],$request['userid'])->update(['numberofentries' => Topic::raw('numberofentries + 1')]);

        return Entry::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Entry::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $entry = Entry::find($id);
        $entry->update($request->all());
        return $entry;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Entry::find($id)->delete();
    }

    
}
