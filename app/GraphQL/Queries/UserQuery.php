<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Models\User;

class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'user',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('user'));
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'User ID'
            ],
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
        /** @var SelectFields $fields */
        // $fields = $getSelectFields();
        // $select = $fields->getSelect();
        // $with = $fields->getRelations();
        $result = null;

        if (isset($args['id'])) {
            $result = User::where('id', $args['id'])->get();
        } elseif (isset($args['paginate'])) {

            $page = 1;

            if (isset($args['page'])) {
                $page = $args['page'];
            }

            $result = User::paginate($args['paginate'], ['*'], 'page', $page);
        }

        return $result;
    }
}
