<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sortBy = $request->input('sort_by', 'user_id');
        $sortOrder = $request->input('sort_order', 'asc');
        $perPage = $request->input('per_page', 5);
    
        $query = Portofolio::query();
    
        if ($search) {
            $query->where('user_id', 'like', "%$search%");
        }
    
        $portofolio = $query->orderBy($sortBy, $sortOrder)->paginate($perPage);
    
        return response()->json(['Portofolio' => $portofolio]);
        // contoh untuk menampilkan langsung nama feil tablenya
        // $portofolio = Portofolio::with(['user', 'cryptocurrency'])->get();
        
        // return response()->json([
        //     'Message' => 'Portofolio fetched successfully',
        //     'Portofolio' => $portofolio->map(function ($item) {
        //         return [
        //             'id' => $item->id,
        //             'user_name' => $item->user->name, 
        //             'cryptocurrency_name' => $item->cryptocurrency->name, 
        //             'amount' => $item->amount,
        //             'created_at' => $item->created_at,
        //             'updated_at' => $item->updated_at
        //         ];
        //     })
        // ]);(
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'cryptocurrency_id' => 'required',
            'amount' => 'required'
        ]);
        $porto = Portofolio::create($validatedData);
        return response()->json(['message' => 'Portofolio created successfully', 'Portofolio' => $porto]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $porto = Portofolio::find($id);

        if (!$porto) {
            return response()->json(['Message' => 'Portofolio not found'], 404);
        }
        return response()->json(['Portofolio' => $porto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portofolio $portofolio)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'cryptocurrency_id' => 'required',
            'amount' => 'required'
        ]);
        $portofolio->update($validatedData);
        if (!$portofolio) {
            return response()->json(['Message' => 'Portofolio not found'], 404);
        } else {
            return response()->json(['Message' => 'Portofolio updated successfully', "Portofolio" => $portofolio]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $porto = Portofolio::find($id);
        if (!$porto) {
            return response()->json(['Message' => 'Failed to delete Portofolio'], 404);
        } else {
            $porto->delete();
            return response()->json(['Message' => 'Portofolio deleted succcesfully', 'Portofolio' => $porto]);
        }
    }
}