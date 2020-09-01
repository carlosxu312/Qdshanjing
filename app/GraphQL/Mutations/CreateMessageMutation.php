<?php


namespace App\GraphQL\Mutations;

use App\Model\Message;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class CreateMessageMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createMessage'
    ];

    public function type():Type
    {
        return GraphQL::type('message');
    }

    /**
     * 接收参数的类型定义
     * @return array
     */
    public function args():array
    {
        return [
            'name' => [
                'name' => 'name',
                'type' => Type::nonNull(Type::string())
            ],
            'content' => [
                'name' => 'content',
                'type' => Type::nonNull(Type::string())
            ]
        ];
    }

    /**
     * 验证规则
     * @param array $args
     * @return array
     */
    protected function rules(array $args = []): array
    {
        return [
            'name' => ['required','string','max:500','min:1'],
            'content' => ['required','string','max:50'],
        ];
    }

    /**
     * 入库操作
     * @param $root
     * @param $args
     * @return |null
     */
    public function resolve($root, $args)
    {
        $message = Message::create($args);
        if (!$message) {
            return null;
        }
        return $message;
    }
}
