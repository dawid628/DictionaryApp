<?php

namespace App\Http\Services\Interfaces;

use App\Models\Dtos\WordDTO;

interface IWordService
{
    public function create(WordDTO $dto);
}