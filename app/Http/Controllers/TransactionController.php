<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sortBy = $request->input('sort_by', 'portofolio_id');
        $sortOrder = $request->input('sort_order', 'asc');
        $perPage = $request->input('per_page', 5);

        $query = Transaction::query();

        if (!$search) {
            $query->where('portofolio_id', 'like', "%$search%");
        }

        $transaction = $query->orderBy($sortBy, $sortOrder)->paginate($perPage);

        return response()->json(['Transaction' => $transaction]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'portofolio_id' => 'required',
            'transaction_type' => 'required',
            'amount' => 'required',
            'price' => 'required'
        ]);
        $transaction = Transaction::create($validatedData);
        return response()->json(['message' => 'Transaction created successfully', 'Transaction' => $transaction]);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['Message' => 'Transaction not found'], 404);
        }
        return response()->json(['Transaction' => $transaction]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'portofolio_id' => 'required',
            'transaction_type' => 'required',
            'amount' => 'required',
            'price' => 'required'
        ]);
        $transaction = Transaction::find($id);
        if (!$transaction) {
            return response()->json(['Message' => 'Transaction not found'], 404);
        }
        $transaction->update($validatedData);
        return response()->json(['message' => 'Transaction updated successfully', 'Transaction' => $transaction]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        if (!$transaction) {
            return response()->json(['Message' => 'Failed to delete Transaction'], 404);
        } else {
            $transaction->delete();
            return response()->json(['Message' => 'Transaction deleted succcesfully', 'Transaction' => $transaction]);
        }
    }
}