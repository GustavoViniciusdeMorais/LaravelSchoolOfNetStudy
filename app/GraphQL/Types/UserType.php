<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'user',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'ID do usuário'
            ],
            'name' => [
                'type' => Type::string(),
                'Nome do usuário'
            ],
            'email' => [
                'type' => Type::string(),
                'Email do usuário'
            ],
            'posts' => [
                'type' => Type::listOf(GraphQL::type('post'))
            ]
        ];
    }
}
