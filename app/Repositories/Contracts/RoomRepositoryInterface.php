<?php

namespace App\Repositories\Contracts;

use App\Models\Room;
use Illuminate\Database\Eloquent\Collection;

interface RoomRepositoryInterface
{
    public function all(): Collection;
    public function create(array $data): Room;
}
