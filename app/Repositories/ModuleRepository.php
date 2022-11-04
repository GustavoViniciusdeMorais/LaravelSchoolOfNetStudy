<?php

namespace App\Repositories;

use App\Models\Module;
use Illuminate\Support\Str;

class ModuleRepository
{

    protected $entity;

    public function __construct(Module $module)
    {
        $this->entity = $module;
    }

    public function getAllModules()
    {
        return $this->entity->with(['course'])->get();
    }

    public function createModule($data)
    {
        $data['uuid'] = Str::uuid()->toString();
        return $this->entity->create($data);
    }
}
