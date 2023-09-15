<?php

namespace App\Models\Dtos;

class WordDTO
{
    public $name;
    public $tags;
    public $active;
    public $definition;
    public $user_id;
    public $created_at;
    public $updated_at;

    public function __construct($name, $tags, $active = null, $definition = null, $user_id = null, $created_at = null, $updated_at = null)
    {
        $this->name = $name;
        $this->tags = $tags;
        $this->active = $active;
        $this->definition = $definition;
        $this->user_id = $user_id;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
}