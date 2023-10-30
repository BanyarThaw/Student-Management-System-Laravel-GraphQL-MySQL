<?php

namespace App\GraphQL\Queries;

use App\Models\Student;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;

class StudentsQuery extends Query
{
    protected $attributes = [
        'name' => 'students'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Student'));
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'name' => [
                'name' => 'name',
                'type' => Type::string()
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::string()
            ],
            'age' => [
                'name' => 'age',
                'type' => Type::int()
            ],
            'country' => [
                'name' => 'country',
                'type' => Type::string()
            ]
        ];
    }

    public function resolve($root, $args)
    {
        if (isset($args['id'])) {
            return Student::where('id', $args['id'])->get();
        }

        if (isset($args['name'])) {
            return Student::where('name', $args['name'])->get();
        }

        if (isset($args['email'])) {
            return Student::where('email', $args['email'])->get();
        }

        if (isset($args['age'])) {
            return Student::where('age', $args['age'])->get();
        }

        if (isset($args['country'])) {
            return Student::where('country', $args['country'])->get();
        }

        return Student::all();
    }
}