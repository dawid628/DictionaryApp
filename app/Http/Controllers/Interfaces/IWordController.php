<?php

namespace App\Http\Controllers\Interfaces;
use App\Http\Requests\WordRequest;

use Illuminate\Http\Request;

interface IWordController
{
    public function index();
    public function create();
    public function store(WordRequest $request);
    public function edit();
    public function update(Request $request);
    public function destroy(int $id);
}