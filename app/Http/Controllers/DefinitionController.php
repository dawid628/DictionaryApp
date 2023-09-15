<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Interfaces\IDefinitionController;
use App\Models\Dtos\DefinitionDTO;
use App\Http\Services\DefinitionService;


class DefinitionController extends Controller implements IDefinitionController
{
    private DefinitionService $definitionService;

    public function __construct()
    {
        $this->definitionService = new DefinitionService();
    }
    
    public function store(int $id, string $body)
    {
        $dto = new DefinitionDTO(
            $body,
            $id
        );

        $this->definitionService->create($dto);
    }

    public function update(int $id, string $body)
    {
        $dto = new DefinitionDTO(
            $body,
            $id
        );
        $this->definitionService->update($dto);
    }
}
