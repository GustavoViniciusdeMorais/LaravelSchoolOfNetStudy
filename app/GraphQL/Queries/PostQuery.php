<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Models\Post;

class PostQuery extends Query
{
    protected $attributes = [
        'name' => 'post',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return GraphQL::paginate('post');
    }

    public function args(): array
    {
        return [
            'paginate' => [
                'type' => Type::int(),
                'description' => 'Paginate results'
            ],
            'page' => [
                'type' => Type::int(),
                'description' => 'Page number'
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $result = null;

        if (isset($args['paginate'])) {
            $page = 1;

            if (isset($args['page'])) {
                $page = $args['page'];
            }

            $result = Post::paginate($args['paginate'], ['*'], 'page', $page);
        } else {
            $result = Post::paginate();
        }
        
        return $result;
    }
}
