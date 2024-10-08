<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;

interface BaseRepositoryContract
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return Model
     *
     * @throws ModelNotFoundException
     */
    public function findBy(string $attribute, $value): Model;

    /**
     * @param  array  $filters
     * @return Model
     */
    public function findByFilters(array $filters): Model;

    /**
     * @param  Model|int  $model
     * @return bool|null
     *
     * @throws ModelNotFoundException
     */
    public function delete(Model|int $model): ?bool;

    /**
     * @param  array  $data
     * @return Model
     */
    public function store(array $data): Model;

    /**
     * @param  int|Model  $model
     * @param  array  $attributes
     * @param  array  $options
     * @return bool
     */
    public function update(int|Model $model, array $attributes = [], array $options = []): bool;

    /**
     * @param  array<int|Model>|Collection<int|Model>  $models
     * @param  array  $attributes
     * @param  array  $options
     * @return bool
     */
    public function updateMany(array|Collection $models, array $attributes = [], array $options = []): bool;

    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function exists(string $attribute, $value): bool;
}
