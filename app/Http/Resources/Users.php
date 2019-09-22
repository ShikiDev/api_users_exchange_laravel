<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Users extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        if ($this->created_at instanceof \DateTime) $this->created_at = $this->created_at->format('Y-m-d H:i:s');
        if ($this->updated_at instanceof \DateTime) $this->updated_at = $this->updated_at->format('Y-m-d H:i:s');

        return [
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
