<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JuegosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name_game' => $this->name_game,
            'image_url' => $this->image_url,
            'plataforma' => $this->plataforma,
            'estado' => $this->estado,
        ];
    }
}
