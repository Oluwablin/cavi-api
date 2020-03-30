<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'context' => $this->context,
            'text' => $this->text,
            'date' => $this->date,
            'select' => $this->select,
            'radio_button' => $this->radio_button,
            'check_boxes' => $this->check_boxes,
            'text_area' => $this->text_area,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
          ];
    }
}
