<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LecturerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'LecturerId' => $this->lecturer_id,
            'name' => $this->name,
            'nic' => $this->nic,
            'address' => $this->address,
            'contact' => $this->contact,
            'email' => $this->email
        ];

        // return [
        //     'lecturers' => $this->collection->map(function ($lecturer) {
        //         return [
        //             'LecturerId' => $lecturer->lecturer_id,
        //             'name' => $lecturer->name,
        //             'nic' => $lecturer->nic,
        //             'address' => $lecturer->address,
        //             'contact' => $lecturer->contact,
        //             'email' => $lecturer->email,
        //         ];
        //     }),
        // ];
    }
}
