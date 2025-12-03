<?php

namespace App\View\Components\Datatable;

use Illuminate\View\Component;

class DatatableHeader extends Component
{

    public $id = '';
    public function __construct($id = 'datatable')
    {
        $this->id = $id;
    }

    public function render()
    {
        return view('components.datatable.datatable-header');
    }
}
