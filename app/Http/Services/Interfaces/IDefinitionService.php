<?php

namespace App\Http\Services\Interfaces;

use App\Models\Dtos\DefinitionDTO;

interface IDefinitionService
{
    public function create(DefinitionDTO $dto);
}