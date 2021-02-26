<?php

namespace App\Http\Controllers;

use App\Models\CleaningListW;
use Illuminate\Http\Request;

class LittleCleaningsWController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = CleaningListW::all();
        return response()->json([
            'message' => 'OK',
            'data' => $items
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new CleaningListW;
        $item->user_id = $request->user_id;
        $item->spot = $request->spot;
        $item->done = $request->done;
        $item->save();
        return response()->json([
            'message' => 'Created successfully',
            'data' => $item
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CleaningListW  $cleaningListW
     * @return \Illuminate\Http\Response
     */
    public function show(CleaningListW $cleaningListW)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CleaningListW  $cleaningListW
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CleaningListW $cleaningListW)
    {
        $item = new CleaningListW;
        $item->user_id = $request->user_id;
        $item->spot = $request->spot;
        $item->done = $request->done;
        $item->save();
        if ($item) {
            return response()->json([
                'message' => $item,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CleaningListW  $cleaningListW
     * @return \Illuminate\Http\Response
     */
    public function destroy(CleaningListW $cleaningListW)
    {
        $item = CleaningListW::where('id', $cleaningListW->id)->delete();
        if ($item) {
            return response()->json([
                'message' => $item,
            ], 200);
        } else {
            return response()->json([
                'message' => $item,
            ], 404);
        }
    }
    
}
