<?php

namespace App\Models\Dtos;

class WordDTO
{
    public $name;
    public $tags;
    public $active;
    public $definition;
    public $created_at;
    public $updated_at;

    public function __construct($name, $tags, $active = null, $definition = null, $created_at = null, $updated_at = null)
    {
        $this->name = $name;
        $this->tags = $tags;
        $this->active = $active;
        $this->definition = $definition;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
}