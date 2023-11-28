<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'studentId' => $this->student_id,
            'name' => $this->name,
            'regNo' => $this->reg_no,
            'nic' => $this->nic,
            'address' => $this->address,
            'contact' => $this->contact,
            'email' => $this->email,
        ];
    }
}
