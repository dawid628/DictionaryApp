<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Interfaces\IWordController;
use App\Http\Requests\WordRequest;
use App\Models\Dtos\WordDTO;
use App\Models\Word;
use App\Models\Dtos\DefinitionDTO;
use App\Http\Services\WordService;
use App\Http\Controllers\DefinitionController;

class WordController extends Controller implements IWordController
{

    private WordService $wordService;
    private DefinitionController $definitionController;

    public function __construct()
    {
        $this->wordService = new WordService();
        $this->definitionController = new DefinitionController();
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(WordRequest $request)
    {
        $successMessage = "Słowo i definicja zostały zapisane pomyślnie.";

        $dto = new WordDTO(
            $request->word,
            $this->convertTagsToJson($request->tags)
        );
        $id = $this->wordService->create($dto);
        
        $this->definitionController->store($id, $request->definition);
        return redirect()->route('index')->with('success', $successMessage);
    }

    public function edit()
    {
        //
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy(int $id)
    {
        //
    }

    private function convertTagsToJson(?string $tags)
    {
        $tagsArray = explode(',', $tags);
        $tagsJson = $tagsArray[0] == "" ? null : json_encode($tagsArray);
    }
}
