<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Message\StoreMessageRequest;
use App\Http\Resources\MessageResource;
use App\Services\MessageService;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct(private readonly MessageService $messageService)
    {
    }
    public function index(int $room)
    {
        return MessageResource::collection($this->messageService->getRoomMessage($room));
    }
    public function store(StoreMessageRequest $request)
    {
        $message = $this->messageService->sendMessage([
            ...$request->validated(),
            'user_id' => Auth::id(),
        ]);
        return new MessageResource($message);
    }
}
