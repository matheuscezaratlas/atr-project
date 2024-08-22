<?php

namespace App\Repositories;

use App\Repositories\Contracts\BaseRepositoryContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class BaseRepository implements BaseRepositoryContract
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * {@inheritDoc}
     */
    public function all(): Collection
    {
        return $this->model::all();
    }

    /**
     * {@inheritDoc}
     */
    public function findBy(string $attribute, $value): Model
    {
        return $this->model::where($attribute, $value)->firstOrFail();
    }

    /**
     * {@inheritDoc}
     */
    public function findByFilters(array $filters): Model
    {
        $query = $this->model::query();
        foreach ($filters as $attribute => $value) {
            $query->where($attribute, $value);
        }

        return $query->firstOrFail();
    }

    /**
     * {@inheritDoc}
     */
    public function delete(Model|int $model): ?bool
    {
        if ($model instanceof Model) {
            return $model->delete();
        }

        return $this->model::findOrFail($model)->delete();
    }

    /**
     * {@inheritDoc}
     */
    public function store(array $data): Model
    {
        return $this->model::create($data);
    }

    /**
     * {@inheritDoc}
     */
    public function update(int|Model $model, array $attributes = [], array $options = []): bool
    {
        if ($model instanceof Model) {
            return $model->update($attributes, $options);
        }

        return $this->model::query()
            ->whereKey($model)
            ->update($attributes, $options);
    }

    /**
     * {@inheritDoc}
     */
    public function updateMany(array|Collection $models, array $attributes = [], array $options = []): bool
    {
        if ($models instanceof Collection) {
            $models = $models->toArray();
        }

        $keys = array_map(
            fn ($model) => is_int($model) ? $model : $model['id'],
            $models
        );

        return (bool) $this->model::query()
            ->whereKey($keys)
            ->update($attributes);
    }

    /**
     * {@inheritDoc}
     */
    public function exists(string $attribute, $value): bool
    {
        return $this->model::where($attribute, $value)->exists();
    }
}
