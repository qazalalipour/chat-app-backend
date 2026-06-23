<?php

namespace App\Repositories;

use App\Models\Message;
use App\Repositories\Contracts\MessageRepositoryInterface;

class MessageRepository implements MessageRepositoryInterface
{
    public function create(array $data): Message
    {
        return Message::create($data);
    }
    public function getByRoom(int $roomId)
    {
        return Message::query()
            ->with('user:id,name')
            ->where('room_id', $roomId)
            ->latest()
            ->paginate(20);
    }
}
