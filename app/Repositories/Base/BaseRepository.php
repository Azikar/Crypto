<?php

declare(strict_types=1);

namespace App\Repositories\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class BaseRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     *
     * @return Model
     */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * @param int $id
     * @return Model
     */
    public function find(int $id): ?Model
    {
        return $this->model->find($id);
    }

    public function baseQuery(): Builder
    {
        return $this->model->newQuery();
    }

    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        $model = $this->find($id);
        if ($model) {
            $model->delete();
        }
    }

    public function update(int $id, array $attributes): void
    {
        $model = $this->find($id);
        if ($model) {
            $model->update($attributes);
        }
    }
}
