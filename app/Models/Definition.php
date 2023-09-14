<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dtos\DefinitionDTO;

class Definition extends Model
{
    use HasFactory;

    public function mapFromDto(DefinitionDTO $dto)
    {
        $definition = new Definition();
        
        $definition->word_id = $dto->word_id;
        $definition->body = $dto->body;

        return $definition;
    }
}
