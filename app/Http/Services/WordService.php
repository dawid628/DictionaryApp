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
        $word = $word->mapFromDto($dto);
        $word->user_id = Auth::id();
        
        try {
            $word->save();
            return $word->id;
        } catch(\PDOException  $e) {
            throw new \PDOException ($e->getMessage());
        }
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
}