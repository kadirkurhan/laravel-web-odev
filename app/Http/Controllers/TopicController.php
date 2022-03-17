<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use App\Models\Entry;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Topic::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'topicname' => 'required'
        ]);

        return Topic::create([
            'userid' => $request['userid'],
            'topicname' => $request['topicname'],
            'numberofentries' => 0,
            
        ]);


        //return Topic::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Topic::find($id);
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
        $topic = Topic::find($id);
        $topic->update($request->all());
        return $topic;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Topic::find($id)->delete();
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  str  $topicname
     * @return \Illuminate\Http\Response
     */
    public function search($topicname)
    {
        return Topic::where('topicname','like','%'.$topicname.'%')->get();
    }

            /**
     * Remove the specified resource from storage.
     *
     * @param  int  $topicid
     * @return \Illuminate\Http\Response
     */
    public function entriesOfTopic($topicid)
    {
        return Entry::where('topicid',$topicid)->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function myFunc()
    {
        return Topic::orderBy('id','desc')->take(10)->get();
        //return Topic::all();

    }


}
