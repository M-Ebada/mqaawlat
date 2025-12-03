<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface ServiceInterface
{
    public function index(?bool $checkStatus = false);

    public function findById($id, ?bool $checkStatus = false): Model;

    public function store($request);

    public function update($request, $id);

    public function destroy($id): void;
}
