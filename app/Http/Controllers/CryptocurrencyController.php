<?php

namespace App\Http\Controllers;

use App\Models\Cryptocurrency;
use Illuminate\Http\Request;

class CryptocurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sortBy = $request->input('sort_by', 'name');
        $sortOrder = $request->input('sort_order', 'asc');
        $perPage = $request->input('per_page', 10);
    
        $query = Cryptocurrency::query();
    
        if ($search) {
            $query->where('name', 'like', "%$search%");
        }
    
        $cryptos = $query->orderBy($sortBy, $sortOrder)->paginate($perPage);
    
        return response()->json(['Cryptocurrency' => $cryptos]);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'symbol' => 'required'
        ]);
        $crypto = Cryptocurrency::create($validatedData);
        return response()->json(['message' => 'Cryptocurrency created successfully', 'Cryptocurrency' => $crypto]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $crypto = Cryptocurrency::find($id);

        if (!$crypto) {
            return response()->json(['Message' => 'Cryptocurrency not found'], 404);
        }
        return response()->json(['Cryptocurrency' => $crypto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'symbol' => 'required'
        ]);
        $crypto = Cryptocurrency::find($id);
        if (!$crypto) {
            return response()->json(['Message' => 'Cryptocurrency not found'], 404);
        }

        $crypto->update($validatedData);
        return response()->json(['Message' => 'Cryptocurrency updated successfully', "Cryptocurrency" => $crypto]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $crypto = Cryptocurrency::find($id);
        if (!$crypto) {
            return response()->json(['Message' => 'Failed to delete Cryptocurrency'], 404);
        } else {
            $crypto->delete();
            return response()->json(['Message' => 'Cryptocurrency deleted succcesfully', 'Cryptocurrency' => $crypto]);
        }
    }
}