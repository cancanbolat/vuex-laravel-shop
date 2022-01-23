<?php

namespace App\Repositories\Generic;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use PHPUnit\Exception;

class GenericRepository implements GenericRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    function bulkInsert(array $datas)
    {
        foreach ($datas as $data){
            return $this->model->create($data);
        }
    }

    public function update(array $data, $id)
    {
        $exist = $this->model->findOrFail($id);
        return $exist->update($data);
    }

    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    public function delete($id)
    {
        try {
            return $this->model->destroy($id);
        } catch (Exception $e) {
            Log::info($e->getMessage());

            throw new \InvalidArgumentException("Id not found");
        }
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function setModel($model): Model
    {
        $this->model = $model;
        return $this;
    }

    public function with($relations)
    {
        return $this->model->width($relations);
    }
}
