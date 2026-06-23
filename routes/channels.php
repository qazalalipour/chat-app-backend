<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('room.{roomId}', function (User $user, int $roomId) {
    return true;
}, ['guards' => ['sanctum']]);



