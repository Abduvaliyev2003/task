<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Http\Requests\StoreHistoryRequest;
use App\Http\Requests\UpdateHistoryRequest;
use App\Models\Category;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = History::with('catergories', 'types')->paginate(request('limit') ?? 20);

        return [
           'data' => $data ?? [],
           'status' => true
        ];
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
    public function store(StoreHistoryRequest $request)
    {  
        $request->validated();
        $user = auth()->user();
        $validated = $request->all();
        if($request->category !== null)
        {
            $cate =  $user->category()->create([
                'name'=> $request->category ?? null
            ]);
            $validated['category_id'] = $cate->id ?? null;
        }
       
        
        $data = $user->history()->create($validated);

        return [
            'status' => true,
            'data' => $data
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(History $history)
    {
        return response()->json([
          'status' => true,
          'data' => $history       
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHistoryRequest $request, History $history)
    {
        $history->update($request->all());

        return response()->json([
            'status' => true,
            'data' => $history       
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(History $history)
    {
        $history->delete();

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $history       
        ]);
    }
}
