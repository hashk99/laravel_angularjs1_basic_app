<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Comment extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
         return [
            'id' => $this->id,
            'comment_text' => $this->comment_text,
            'user_email' => ($this->show_email ? $this->user_email : null),  
            'display_name' => $this->display_name,
            'show_email' => $this->show_email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
        //return parent::toArray($request);
    }
} 