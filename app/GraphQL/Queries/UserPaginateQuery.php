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

class UserPaginateQuery extends Query
{
    protected $attributes = [
        'name' => 'userPaginate',
        'description' => 'Paginated list of users'
    ];

    public function type(): Type
    {
        return GraphQL::paginate('user');
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
        /** @var SelectFields $fields */
        // $fields = $getSelectFields();
        // $select = $fields->getSelect();
        // $with = $fields->getRelations();
        $result = null;

        if (isset($args['paginate'])) {
            $page = 1;

            if (isset($args['page'])) {
                $page = $args['page'];
            }

            $result = User::paginate($args['paginate'], ['*'], 'page', $page);
        } else {
            $result = User::paginate();
        }

        return $result;
    }
}
