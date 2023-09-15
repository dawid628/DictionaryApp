<?php

namespace App\Http\Services;

use App\Models\Dtos\WordDTO;
use App\Models\Word;
use App\Http\Services\Interfaces\IWordService;
use Illuminate\Support\Facades\Auth;

class WordService implements IWordService
{

    public function create(WordDTO $dto)
    {
        $word = new Word();
        $word = Word::mapFromDto($dto);
        $word->user_id = Auth::id();
        
        $word->save();
        return $word->id;
    }

    public function update(WordDTO $dto)
    {
        $word = Word::find($dto->id);
        if($word) {
            $word->name = $dto->name;
            $word->tags = $dto->tags;
            
            $word->save();
        };
    }

    public function getAll()
    {
        $words = Word::with('definition')->get();
        $wordDtos = [];
        foreach($words as $word) {
            $wordDtos[] = Word::mapToDto($word);
        }
        return $wordDtos;
    }

    public function isAccessPossible(int $wordId, int $userId)
    {
        $word = Word::find($wordId);
        if($word && $word->user_id == $userId) {
            return true;
        }
        return false;
    }

    public function delete(int $id)
    {
        Word::destroy($id);
    }
}