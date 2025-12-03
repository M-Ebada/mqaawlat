<?php

namespace App\Support;

use phpDocumentor\Reflection\Types\Integer;
use PhpParser\Node\Expr\AssignOp\Mod;
use UsingRefs\Model;
use Str;

class DataTableActions
{

    private bool $showBtn = false;
    private string $showRoute;

    private ?string $html = "";

    private bool $deleteBtn = false;
    private bool $deleteActionInModel = false;
    private string $deleteRoute;

    private bool $editBtn = false;
    private string $editRoute;

    private bool $promoteBtn = false;
    private  $status1 = false;
    private string $promoteRoute;

    private string $switcherModel;
    private int $switcherModelId;
    private ?string $switcher_column_name = "status";
    private bool $status = false;

    public function edit(string $route): DataTableActions
    {
        $this->editBtn = true;
        $this->editRoute = $route;
        return $this;
    }

    public function promote(string $route ,$status1 = false): DataTableActions
    {
        $this->promoteBtn = true;
        $this->promoteRoute = $route;
        $this->status1 = $status1;
        return $this;
    }

    public function show(string $route): DataTableActions
    {
        $this->showBtn = true;
        $this->showRoute = $route;
        return $this;
    }

    public function button($html = ""): DataTableActions
    {
        $this->html = $html;
        return $this;
    }

    public function delete(string $route, bool $actionInModel = true): DataTableActions
    {
        $this->deleteBtn = true;
        $this->deleteActionInModel = $actionInModel;
        $this->deleteRoute = $route;

        return $this;
    }

    public function make(): string
    {
        $html = '<div class="d-flex justify-content-center flex-shrink-0">';
        if ($this->showBtn) {
            $html .= '<a href="' . $this->showRoute . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                <span class="svg-icon svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="black"></path>
                        <path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="black"></path>
                    </svg>
                </span>
            </a>';
        }
        if ($this->editBtn) {
            $html .= '<a href="' . $this->editRoute . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                <span class="svg-icon svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                    </svg>
                </span>
            </a>';
        }
        if ($this->promoteBtn) {
            if(!$this->status1){
                $html .= '<a href="' . $this->promoteRoute . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                    <span class="svg-icon svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/></svg>                </span>
                </a>';
            }else{
                $html .= '<a href="' . $this->promoteRoute . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                <span class="svg-icon svg-icon-3">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>                </a>';
            }
        }
        $html .= $this->html;
        if ($this->deleteBtn) {
            if ($this->deleteActionInModel) {
                $html .= '<a data-bs-toggle="modal" data-bs-target="#delete" href="javascript:;" data-href="' . $this->deleteRoute . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">';
            } else {
                $html .= '<a href="' . $this->deleteRoute . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">';
            }
            $html .= '<span class="svg-icon svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
                    </svg>
                </span>
            </a>';
        }
        $html .= "</div>";
        return $html;
    }

    public function model(object $model): DataTableActions
    {
        $this->switcherModel = get_class($model);
        return $this;
    }

    public function column(string $column_name = "status"): DataTableActions
    {
        $this->switcher_column_name = $column_name;
        return $this;
    }

    public function modelId($model_id): DataTableActions
    {
        $this->switcherModelId = $model_id;
        return $this;
    }

    public function checkStatus($status): DataTableActions
    {
        $this->status = $status;
        return $this;
    }

    public function switcher(): string
    {
        $html = '<label class="form-check form-switch form-check-custom form-check-solid justify-content-around">';
        $html .= '<input class="form-check-input w-50px switcher" type="checkbox" data-modelId="' . $this->switcherModelId . '" data-model="' . $this->switcherModel . '" data-columnName="' . $this->switcher_column_name . '" ' . ($this->status == 1 ? 'checked="checked"' : '') . '>';
        $html .= '</label>';
        return $html;
    }

    public static function image($imageUrl): string
    {
        $html = "<div class='symbol symbol-50px me-5'>";
        $html .= "<img src='$imageUrl' alt='image' />";
        $html .= "</div>";
        return $html;
    }

    public function color($colorCode): string
    {
        return "<div style='width: 30px;height:30px;margin: auto;border-radius: 50%;background-color: " . $colorCode . "'></div>";
    }

    public static function Statuses($code, $status): string
    {
        return '<span class="badge badge-light-' . $code . '">' . $status . '</span>';
    }

    public static function bgColor($bgColor, $text): string
    {
        return "<div class='badge badge-light-" . Str::replace("bg-", "", $bgColor) . "'>" . $text . "</div>";
    }
}
