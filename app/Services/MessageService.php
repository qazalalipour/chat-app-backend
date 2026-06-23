<?php

namespace App\Services;

use App\Events\MessageSent;
use App\Models\Message;
use App\Repositories\Contracts\MessageRepositoryInterface;

class MessageService
{
    public function __construct(private readonly MessageRepositoryInterface $messageRepo)
    {
    }
    public function sendMessage(array $data): Message
    {
        $message = $this->messageRepo->create($data);
        $message->load('user:id,name');
        broadcast(new MessageSent($message))->toOthers();
        return $message;
    }
    public function getRoomMessage(int $roomId)
    {
        return $this->messageRepo->getByRoom($roomId);
    }
}
