<?php


namespace App\GraphQL\Query;

use App\Model\Message;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class MessageQuery extends Query
{
    protected $attributes = [
        'name' => 'message'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('message'));
    }

    /**
     * 接收参数的类型定义
     * @return array
     */
    public function args(): array
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::int()],
            'name' => ['name' => 'name', 'type' => Type::string()],
        ];
    }

    /**
     * 查询操作
     * @param $root
     * @param $args array 传入参数
     *
     * @return mixed
     */
    public function resolve($root, $args)
    {
        $message = new Message();

        if(isset($args['id'])) {
            $message = $message->where('id' , $args['id']);
        }

        if(isset($args['name'])) {
            $message = $message->where('name', $args['name']);
        }

        return $message->get();
    }
}