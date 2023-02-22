<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'completed' => (bool)$this->is_completed,
            'deadline' => $this->deadline,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
            'project' => $this->project,
            'owner' => $this->user,
        ];
    }
}
