<?php

namespace App\Datatables;

use Illuminate\Http\Request;

interface DatatableInterface
{
    public function columns(): array;

    public function datatables(Request $request);

    public function query(Request $request);
}
