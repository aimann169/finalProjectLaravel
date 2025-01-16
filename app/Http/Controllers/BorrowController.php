<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Equipment;

class BorrowController extends Controller
{
    public function index()
    {
        $datas = Borrow::with('user','equipment')->paginate();
        return view('borrow.manage', compact('datas'));
    }

    public function edit($id)
    {
        $data = Borrow::findOrFail($id);
        $users = User::all();
        $equipments = Equipment::all();

        return view('borrow.edit', compact('data', 'users', 'equipments'));
    }

    public function destroy($id)
    {
        Borrow::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }

    public function create()
    {
        $users = User::all();
        $equipments = Equipment::all();

        return view('borrow.create', compact('users', 'equipments'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'equipment_id' => ['required', 'exists:equipments,id'], // Ensure the equipment exists
            'quantity' => ['required', 'integer', 'min:1'], // Ensure quantity is valid
        ]);

        // Retrieve the equipment
        $equipment = Equipment::findOrFail($request->equipment_id);

        // Check if the requested quantity exceeds the available quantity
        if ($request->quantity > $equipment->quantity) {
            return back()->withErrors(['quantity' => 'Quantity cannot exceed available stock.']);
        }

        // Add the authenticated user's ID to the request data
        $request->merge(['user_id' => auth()->user()->id]);

        // Create the borrow record
        Borrow::create($request->all());

        // Optionally, decrease the equipment's available quantity
        $equipment->decrement('quantity', $request->quantity);

        // Redirect with success message
        return redirect()->route('borrow.index')
            ->with('success', 'Borrow Successfully Added');
    }


    public function update(Request $request, $id)
    {
        Borrow::findOrFail($id)->update($request->all());
        return redirect()->route('borrow.index')
            ->with('success', 'Borrow Successfully Updated');
    }

    public function show($id)
    {
        $data = Borrow::findOrFail($id);
        return view('borrow.show', compact('data'));
    }
}
