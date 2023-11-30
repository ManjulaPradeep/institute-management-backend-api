<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'courseID' => $this->course_id,
            'name' => $this->name,
            'credits' => $this->credits,
            'startDate' => $this->start,
            'endDate' => $this->end,
            'no_of_students' => $this->no_of_students
        ];
    }
}
