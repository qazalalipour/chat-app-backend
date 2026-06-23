<?php

namespace App\Repositories;

use App\Models\Room;
use App\Repositories\Contracts\RoomRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class RoomRepository implements RoomRepositoryInterface
{
    public function all(): Collection
    {
        return Room::with('user:id,name')->latest()->get();
    }
    public function create(array $data): Room
    {
        return Room::create($data);
    }
}
