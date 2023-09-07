<?php

namespace App\Http\Controllers\Interfaces;

use Illuminate\Http\Request;

interface IDefinitionController
{
    public function store(Request $request);
    public function update(int $id, string $body);
}