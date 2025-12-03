<?php

namespace App\Http\Resources\Notification;

use App\Core\Support\Date;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            "id" => $this->resource->id,
            "title" => $this->title($this->resource->data),
            "description" => $this->content($this->resource->data),
            "is_read" => $this->resource->read_at != null,
            "read_at" => $this->resource->read_at?->format('Y-m-d H:i:s'),
            "read_at_for_humans" => $this->resource->read_at?->diffForHumans(),
            "created_at" => $this->resource->created_at,
            "created_at_for_humans" => $this->resource->created_at->diffForHumans(),
        ];
    }

    private function title($data): string
    {
        return $data["title"][app()->getLocale()] ?? "";
    }

    private function content($data): string
    {
        return $data["description"][app()->getLocale()] ?? "";
    }
}
