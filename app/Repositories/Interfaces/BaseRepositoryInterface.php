<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    public function getAll(?bool $is_paginate = false, ?array $wheres = [], ?array $wheresIn = [], ?array $with = [], ?array $withCount = [], ?array $has = [], ?array $orHas = []);

    public function store(array $data): ?Model;

    public function updateOrStore(array $model_id, array $data): ?Model;

    public function show(int $model_id): ?Model;

    public function getByCondition(array $conditions): ?Model;

    public function checkExists(array $conditions): ?bool;

    public function showByColumn(string $column, $id): ?Model;

    public function update(int $model_id, array $data): ?bool;

    public function softDelete(int $model_id): ?bool;

    public function hardDelete(int $model_id): ?bool;
}
