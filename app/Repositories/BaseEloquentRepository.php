<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Exception;

class BaseEloquentRepository implements RepositoryInterface
{

    public function getAll()
    {
        return $this->resolveEntity()->all();
    }

    public function store($data)
    {
        return $this->resolveEntity()->create($data);
    }

    public function update($id, $data)
    {
        return $this->resolveEntity()->where('id', $id)->update($data);
    }

    public function findById($id)
    {
        return $this->resolveEntity()->where('id', $id)->first();
    }

    public function resolveEntity(): Model
    {
        if (!method_exists($this, 'entity')) {
            throw new Exception('Implement the entity method, please!');
        }
        
        return app($this->entity());
    }
}
