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
use Illuminate\Support\Facades\Auth;

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
        $words = $this->wordService->getAll();
        return  view('words.index', ['words' => $words]);
    }

    public function create()
    {
        return view('words.add');
    }

    public function store(WordRequest $request)
    {
        $successMessage = "Słowo i definicja zostały zapisane pomyślnie.";
        $tags = $this->convertTagsToJson($request->tags);
        
        $dto = new WordDTO(
            null,
            $request->word,
            $tags
        );
        $id = $this->wordService->create($dto);
        
        $this->definitionController->store($id, $request->definition);
        return redirect()->route('index')->with('success', $successMessage);
    }

    public function edit(int $id)
    {
        $word = Word::find($id);
        if($this->wordService->isUpdatePossible($id, Auth::id())) {
            $word = Word::mapToDto($word);
            return view('words.edit', ['word' => $word]);
        }
        $errorMessage = "Próbujesz edytować słowo, które nie jesteś autorem!";
        return redirect()->route('index')->with('error', $errorMessage);
    }

    public function update(WordRequest $request)
    {
        if($this->wordService->isAccessPossible($request->id, Auth::id())) {
            $successMessage = "Edycja danych pomyślna.";
            $tags = $this->convertTagsToJson($request->tags);

            $dto = new WordDTO(
                $request->id,
                $request->word,
                $tags,
            );

            $this->wordService->update($dto);
            $this->definitionController->update($request->id, $request->definition);
            return redirect()->route('index')->with('success', $successMessage);
        }
        $errorMessage = "Próbujesz edytować słowo, które nie jesteś autorem!";
        return redirect()->route('index')->with('error', $errorMessage);
    }

    public function destroy(int $id)
    {
        if($this->wordService->isAccessPossible($id, Auth::id())) {
            $successMessage = "Usuwanie słowa pomyślne.";

            $this->wordService->delete($id);
            return redirect()->route('index')->with('success', $successMessage);
        }
        $errorMessage = "Próbujesz usunąć słowo, którego nie jesteś autorem!";
        return redirect()->route('index')->with('error', $errorMessage);
    }

    private function convertTagsToJson(?string $tags)
    {
        $tagsArray = explode(',', $tags);
        $tagsJson = $tagsArray[0] == "" ? null : json_encode($tagsArray);

        return $tagsJson;
    }
}
