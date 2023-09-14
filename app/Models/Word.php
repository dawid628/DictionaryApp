<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dtos\WordDTO;

class Word extends Model
{
    use HasFactory;

    public function definition()
    {
        return $this->hasOne(Definition::class);
    }

    public function mapFromDto(WordDTO $dto)
    {
        $word = new Word();
        
        $word->name = $dto->name;
        if($dto->tags != null) {
            $word->tags = $dto->tags;
        }
        
        return $word;
    }
}
