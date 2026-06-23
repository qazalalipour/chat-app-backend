<?php

namespace App\Services;

use App\Models\Room;
use App\Repositories\Contracts\RoomRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class RoomService
{
    public function __construct(private readonly RoomRepositoryInterface $roomRepo)
    {
    }
    public function getAllRooms(): Collection
    {
        return $this->roomRepo->all();
    }
    public function createRoom(array $data): Room
    {
        $room = $this->roomRepo->create($data);
        $room->load('user');
        return $room;
    }
}
