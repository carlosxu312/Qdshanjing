<?php


namespace App\GraphQL\Type;

use App\Model\Message;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class MessageType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Message',
        'description' => '留言',
        'model' => Message::class
    ];

    /**
     * 定义返回的字段接口
     * @return array
     */
    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => '留言id'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => '用户名'
            ],
            'content' => [
                'type' => Type::string(),
                'description' => '留言内容'
            ]
        ];
    }
}