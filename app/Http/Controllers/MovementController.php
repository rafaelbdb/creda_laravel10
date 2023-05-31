<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovementRequest;
use App\Http\Requests\UpdateMovementRequest;
use App\Models\Movement;

class MovementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movements = Movement::all();

        return view('movements.index', compact('movements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovementRequest $request)
    {
        $validated = $request->validated();

        $movement = new Movement();
        $movement->name = $validated['name'];
        $movement->description = $validated['description'];
        $movement->type = $validated['type'];
        $movement->amount = $validated['amount'];
        $movement->date = $validated['date'];
        $movement->category_id = $validated['category_id'];
        $movement->user_id = $validated['user_id'];

        $movement->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Movement $movement)
    {
        return view('movements.show', compact('movement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movement $movement)
    {
        $this->authorize('update', $movement);

        return view('movements.edit', compact('movement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovementRequest $request, Movement $movement)
    {
        $validated = $request->validated();

        $movement->name = $validated['name'];
        $movement->description = $validated['description'];
        $movement->type = $validated['type'];
        $movement->amount = $validated['amount'];
        $movement->date = $validated['date'];
        $movement->category_id = $validated['category_id'];
        $movement->user_id = $validated['user_id'];

        $movement->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movement $movement)
    {
        $this->authorize('delete', $movement);

        $movement->delete();

        return redirect()->route('movements.index');
    }
}
