<?php

namespace App\Repositories\Eloquent;

use App\Enums\CommonEnum;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Interfaces\BaseRepositoryInterface;


class BaseRepository implements BaseRepositoryInterface
{
    public $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll(?bool $is_paginate = false, ?array $wheres = [], ?array $wheresIn = [], ?array $with = [], ?array $withCount = [], ?array $orWhere = [], ?array $has = [], ?array $orHas = [])
    {
        if (count($wheres)) {
            $this->model = $this->model->where($wheres);
        }
        if (count($orWhere)) {
            $this->model = $this->model->orWhere($orWhere);
        }
        if (count($wheresIn)) {
            foreach ($wheresIn as $key => $wIn) {
                $this->model = $this->model->whereIn($key, $wIn);
            }
        }
        if (count($with)) {
            $this->model = $this->model->with($with);
        }
        if (count($withCount)) {
            $this->model = $this->model->withCount($withCount);
        }
        if (count($has)) {
            foreach ($has as $relation => $closure) {
                $this->model = $this->model->whereHas($relation, $closure);
            }
        }
        if (count($orHas)) {
            foreach ($has as $relation => $closure) {
                $this->model = $this->model->orWhereHas($relation, $closure);
            }
        }
        if ($is_paginate) {
            $records = $this->model->paginate(CommonEnum::PAGINATE);
        } else {
            $records = $this->model->get();
        }
        return $records;
    }

    public function store(array $data): ?Model
    {
        return $this->model->create($data);
    }

    public function updateOrStore(array $model_id, array $data): ?Model
    {
        return $this->model->updateOrCreate($model_id, $data);
    }

    public function show(int $model_id): ?Model
    {
        return $this->model->whereId($model_id)->firstOrFail();
    }

    public function checkExists(array $conditions): ?bool
    {
        return $this->model->where($conditions)->exists();
    }

    public function getByCondition(array $conditions): ?Model
    {
        return $this->model->where($conditions)->first();
    }

    public function showByColumn(string $column, $id): ?Model
    {
        return $this->model->where($column, $id)->firstOrFail();
    }

    public function update(int $model_id, array $data): ?bool
    {
        return $this->model->whereId($model_id)->update($data);
    }

    public function softDelete(int $model_id): ?bool
    {
        return $this->model->whereId($model_id)->delete();
    }

    public function hardDelete(int $model_id): ?bool
    {
        return $this->model->whereId($model_id)->forceDelete();
    }
}
