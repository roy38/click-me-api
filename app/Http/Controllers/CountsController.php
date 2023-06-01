<?php

namespace App\Http\Controllers;

use App\Counts;
use Illuminate\Http\Request;
Use Carbon\Carbon;

class CountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCount()
    {
        $counts = Counts::where('created_at', '>=', Carbon::today())->get();
        $counts = $counts->first();
        return response()->json($counts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insertCount(Request $request)
    {
        $request->validate([
            'counts' => 'required'
        ]);
  
        $row = Counts::create($request->all());
   
        if ($row) {
            return response()->json(array('message'=>'success'));
        } else {
            return response()->json(array('message'=>'fail'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Counts  $counts
     * @return \Illuminate\Http\Response
     */
    public function updateCount(Request $request, Counts $counts)
    {
        $request->validate([
            'counts' => 'required'
        ]);
  
        $row = $counts->update($request->all());
  
        if ($row) {
            return response()->json(array('message'=>'success'));
        } else {
            return response()->json(array('message'=>'fail'));
        }
    }
}
