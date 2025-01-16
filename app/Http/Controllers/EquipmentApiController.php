<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EquipmentApiController extends BaseApiController
{
    public function index()
    {
        DB::beginTransaction();
        try {
            $data = Equipment::all();

            DB::commit();
            return $this->success($data, 'Equipments fetched successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error('An error occurred while fetching equipments: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        DB::beginTransaction();
        try {
            $data = Equipment::findOrFail($id);

            DB::commit();
            return $this->success($data, 'Equipment fetched successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error('An error occurred while fetching the equipment: ' . $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = Equipment::create($request->all());

            DB::commit();
            return $this->success($data, 'Equipment successfully created.');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error('An error occurred while creating the equipment: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = Equipment::findOrFail($id);
            $data->update($request->all());

            DB::commit();
            return $this->success($data, 'Equipment successfully updated.');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error('An error occurred while updating the equipment: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            Equipment::findOrFail($id)->delete();

            DB::commit();
            return $this->success([], 'Equipment successfully deleted.');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error('An error occurred while deleting the equipment: ' . $e->getMessage());
        }
    }
}
