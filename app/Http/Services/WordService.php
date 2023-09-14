<?php

namespace App\Http\Services;

use App\Models\Dtos\WordDTO;
use App\Models\Word;
use App\Http\Services\Interfaces\IWordService;


class WordService implements IWordService
{

    public function create(WordDTO $dto)
    {
        $word = new Word();
        $word = $word->mapFromDto($dto);
        
        try {
            $word->save();
            return $word->id;
        } catch(\PDOException  $e) {
            throw new \PDOException ($e->getMessage());
        }
    }
}