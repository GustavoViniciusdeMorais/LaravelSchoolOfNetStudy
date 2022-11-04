<?php

namespace App\Services;

use App\Repositories\ModuleRepository;

class ModuleService
{

    protected $moduleRepository;

    public function __construct(ModuleRepository $repository)
    {
        $this->moduleRepository = $repository;
    }

    public function getAllModules()
    {
        return $this->moduleRepository->getAllModules();
    }

    public function createModule($data)
    {
        return $this->moduleRepository->createModule($data);
    }
}
