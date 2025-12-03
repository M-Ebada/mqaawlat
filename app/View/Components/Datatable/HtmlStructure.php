<?php

namespace App\View\Components\Datatable;

use Illuminate\View\Component;

class HtmlStructure extends Component
{

    public $id = '';
    public $route = false;
    public $columns = false;
    public function __construct($id = 'datatables' , $route = false , $columns = false)
    {
        $this->id = $id;
        $this->route = $route;
        $this->columns = $columns;
    }

    public function render()
    {
        return view('components.datatable.html-structure');
    }
}
