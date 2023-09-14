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
        
        try {
            $definition->save();
        } catch(\PDOException  $e) {
            throw new \PDOException ($e->getMessage());
        }
    }
}