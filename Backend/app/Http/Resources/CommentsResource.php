<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (string)$this->id,
            'attributes' => [
                'comment' => $this->Comment,
                'post_id' => $this->Post_id,
                'created_at' => $this->created_at
            ],
            'relationships' => [
                'creator' => $this->user->name
            ]
        ];
    }
}
