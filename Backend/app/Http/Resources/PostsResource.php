<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PostsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => (string)$this->id,
            'attributes' => [
                'title' => $this->Title,
                'topic' => $this->Topic,
                'image' => asset(Storage::url($this->Image)),
                'created_at' => $this->created_at
            ],
            'relationships' => [
                'creator' => $this->user->name,
                'category' => $this->category->Category,
                'category_id' => $this->category->id,
                'user_id' => $this->user->id,
            ]
        ];
    }
}
