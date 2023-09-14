<?php

namespace App\Http\Controllers\Interfaces;

use Illuminate\Http\Request;

interface IDefinitionController
{
    public function store(int $id, string $body);
    public function update(int $id, string $body);
}