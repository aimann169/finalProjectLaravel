<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Equipment;

class BorrowApiController extends BaseApiController
{
    public function index()
    {
        DB::beginTransaction();
        try {
            $data = Borrow::with('user')->get();

            DB::commit();
            return $this->success($data, message: 'Borrows fetched successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error('An error occurred while fetching borrows: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        DB::beginTransaction();
        try {
            $data = Borrow::with(relations: 'user')->findOrFail($id);

            DB::commit();
            return $this->success($data, 'Borrow fetched successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error('An error occurred while fetching the borrow: ' . $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = Borrow::create($request->all());

            DB::commit();
            return $this->success($data, 'Borrow successfully created.');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error('An error occurred while creating the borrow: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = Borrow::findOrFail($id);
            $data->update($request->all());

            DB::commit();
            return $this->success($data, 'Borrow successfully updated.');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error('An error occurred while updating the borrow: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            Borrow::findOrFail($id)->delete();

            DB::commit();
            return $this->success([], 'Borrow successfully deleted.');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error('An error occurred while deleting the borrow: ' . $e->getMessage());
        }
    }
}
