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

    public static function mapToDto(Word $word)
    {
        $tags = $word->tags;
    
        if (!is_null($tags)) {
            $tags = json_decode($tags);
        }
    
        return new WordDTO(
            $word->name,
            $tags,
            $word->active,
            isset($word->definition) ? $word->definition->body : "",
            $word->created_at,
            $word->updated_at
        );
    }
}
