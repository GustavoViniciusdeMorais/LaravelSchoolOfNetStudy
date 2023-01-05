<?php

namespace App\Repositories\EloquentRepositories;

use App\Repositories\BaseEloquentRepository;
use App\Models\Product;

class ProductEloquentRepository extends BaseEloquentRepository
{
    public function entity()
    {
        return Product::class;
    }
}
