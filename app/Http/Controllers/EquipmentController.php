<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;


class EquipmentController extends Controller
{
    public function index()
    {
        $datas = Equipment::paginate();
        return view('equipment.manage', compact('datas'));
    }

    public function edit($id)
    {
        $data = Equipment::findOrFail($id);

        return view('equipment.edit', compact('data'));
    }

    public function destroy($id)
    {
        Equipment::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }

    public function create()
    {

        return view('equipment.create');
    }

    public function store(Request $request)
    {
        Equipment::create($request->all());
        return redirect()->route('equipment.index')
            ->with('success', 'Equipment Successfully Added');
    }

    public function update(Request $request, $id)
    {
        Equipment::findOrFail($id)->update($request->all());
        return redirect()->route('equipment.index')
            ->with('success', 'Equipment Successfully Updated');
    }

    public function show($id)
    {
        $data = Equipment::findOrFail($id);
        return view('equipment.show', compact('data'));
    }
}
