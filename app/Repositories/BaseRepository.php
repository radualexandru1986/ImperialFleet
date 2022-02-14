<?php

namespace App\Repositories;
use App\Contracts\BaseContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Boolean;

abstract class BaseRepository implements BaseContract
{
    /**
     * @var array
     */
    protected array $data;

    /**
     * @var
     */
    protected $model;

    /**
     * Store a resource
     *
     * @return string|Model
     */
    public function store(): string|Model
    {
            DB::beginTransaction();
        try {
            $newResource = $this->model->create($this->data);
            DB::commit();
        }catch(\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
        return $newResource;
    }

    /**
     * Updates a resource
     *
     * @param int $id
     * @return string|Model
     */
    public function update(int $id): string|Model
    {
            DB::beginTransaction();
        try {
            $updatedModel = $this->model->find($id)->update($this->data);
            DB::commit();
        }catch(\Exception $e) {
            DB::rollBack();
           return $e->getMessage();
        }

        return $updatedModel;
    }

    /**
     * Deletes a model
     *
     * @param int $id
     * @return bool|string
     */
    public function delete(int $id): Boolean|string
    {
            DB::beginTransaction();
        try {
            $this->model->destroy($id);
            DB::commit();
        }catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }

        return true;
    }
}
