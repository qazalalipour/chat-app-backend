<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Room\StoreRoomRequest;
use App\Http\Resources\RoomResource;
use App\Services\RoomService;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function __construct(private readonly RoomService $roomService)
    {
    }
    public function index()
    {
        return RoomResource::collection($this->roomService->getAllRooms());
    }
    public function store(StoreRoomRequest $request)
    {
        $room = $this->roomService->createRoom([
            ...$request->validated(),
            'user_id' => Auth::id(),
        ]);
        return new RoomResource($room);
    }
}
