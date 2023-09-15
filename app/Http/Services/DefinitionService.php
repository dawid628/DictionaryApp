<?php

namespace App\Http\Services;

use App\Models\Dtos\DefinitionDTO;
use App\Models\Definition;
use App\Http\Services\Interfaces\IDefinitionService;


class DefinitionService implements IDefinitionService
{

    public function create(DefinitionDTO $dto)
    {
        $definition = new Definition();
        $definition = $definition->mapFromDto($dto);
        
        $definition->save();
    }

    public function update(DefinitionDTO $dto)
    {
        $definition = Definition::where('word_id', $dto->word_id)->first();
        
        if($definition) {
            $definition->body = $dto->body;
            $definition->save();
        }
    }
}