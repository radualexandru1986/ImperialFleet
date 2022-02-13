<?php

namespace App\Repositories;
use App\Contracts\BaseContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Boolean;

abstract class BaseRepository implements BaseContract
{
    protected $model;

    protected array $data;

    /**
     * Stores a resource
     *
     * @param array $data
     * @return string
     */
    public function store(): string|Model
    {
        try {
            DB::beginTransaction();
            $newResource = $this->model->create($this->data);
            DB::commit();
        }catch(\Exception $e) {
            DB::rollBack();
            return  $e->getMessage();
        }

        return $newResource;
    }

    /**
     * Updates a resource
     *
     * @param int $id
     * @param array $data
     */
    public function edit(int $id): string|Model
    {
        try {
            DB::beginTransaction();
            $updatedModel = $this->model->find($id)->update($this->data);
            DB::commit();
        }catch(ModelNotFoundException $e) {
            DB::rollBack();
            return  $e->getMessage();
        }

        return $updatedModel;
    }

    /**
     * Deletes a model
     *
     * @param int $id
     * @return string|null
     */
    public function delete(int $id): Boolean|string
    {
        try {
            DB::beginTransaction();
            $this->model->destroy($id);
            DB::commit();
        }catch (ModelNotFoundException $e) {
            DB::rollback();
            return $e->getMessage();
        }

        return true;
    }
}
