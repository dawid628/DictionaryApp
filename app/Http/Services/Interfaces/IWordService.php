<?php

namespace App\Http\Services\Interfaces;

use App\Models\Dtos\WordDTO;

interface IWordService
{
    public function create(WordDTO $dto);
    public function update(WordDTO $dto);
    public function getAll();
    public function isAccessPossible(int $wordId, int $userId);
    public function delete(int $id);
}