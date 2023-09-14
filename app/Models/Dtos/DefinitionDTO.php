<?php

namespace App\Models\Dtos;

class DefinitionDTO
{
    public $word_id;
    public $body;

    public function __construct($definition, $wordId)
    {
        $this->body = $definition;
        $this->word_id = $wordId;
    }
}