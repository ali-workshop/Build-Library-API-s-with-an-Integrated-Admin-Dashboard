<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return 
        [


            'id'=>$this->id,
            'category_id'=>$this->category_id,
            'author_id' =>$this->author_id,
            'rate_id' =>$this->rate_id,
            'title' => $this->title,
            'favorite' => $this->favorite,
            'publication_date' => $this->publicationDate,
            'src' => $this->src,
            'brief_description' => $this->briefDescription,
         

        ];
    }
}
