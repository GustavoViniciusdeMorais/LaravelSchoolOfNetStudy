<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class PostType extends GraphQLType
{
    protected $attributes = [
        'name' => 'post',
        'description' => 'It is a post'
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'Post ID'
            ],
            'title' => [
                'type' => Type::string(),
                'description' => 'Post title'
            ],
            'body' => [
                'type' => Type::string(),
                'description' => 'Post body'
            ],
            'active' => [
                'type' => Type::boolean(),
                'description' => 'Post actived'
            ]
        ];
    }
}
