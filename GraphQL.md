# GraphQL

### Command
```

composer require rebing/graphql-laravel

php artisan make:graphql:query UserQuery

php artisan make:graphql:type UserType

php artisan make:graphql:query UserPaginateQuery

php artisan make:model Post -m

php artisan make:factory PostFactory

php artisan make:seed PostSeeder

php artisan db:seed

php artisan tinker

App\Models\Post::factory()->times(5)->create();

php artisan make:graphql:query PostQuery

php artisan make:graphql:type PostType

```

### Chrome Extension
```

ChromeiQL, endpoint = http://localhost/graphql

```

### ./config/graphql.php
```

use App\GraphQL\Queries\UserQuery;
use App\GraphQL\Types\UserType;

'schemas' => [
    'default' => [
        'query' => [
            'user' => UserQuery::class,
        ],
        'method' => ['GET', 'POST'],
    ],
],

'types' => [
        'user' => UserType::class,
    ],

```

### ./app/GraphQL/Queries/UserQuery.php
```

use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use App\Models\User;

class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'user',
        'description' => 'A query'
    ];

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
            ]
        ];
    }

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('user'));
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return User::all();
    }
}

```

### ./app/GraphQL/Types/UserType.php
```

use GraphQL\Type\Definition\Type;

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
                'type' => Type::int(),
                'ID do usuário'
            ],
            'name' => [
                'type' => Type::string(),
                'Nome do usuário'
            ],
            'email' => [
                'type' => Type::string(),
                'Email do usuário'
            ]
        ];
    }
}

```

![graphQL](/imgs/graphQL.png)
![graphQL](/imgs/paginate.png)
![graphQL](/imgs/page.png)
![graphQL](/imgs/paginatedUsers.png)
![graphQL](/imgs/userPosts.png)
