<?php

namespace App\Core\Support;

use Illuminate\Support\Str;

class DataTableActions
{
    private bool $showBtn = false;
    private string $showRoute;

    private ?string $html = "";

    private bool $deleteBtn = false;
    private bool $deleteActionInModel = false;
    private bool $showDeleteBtn = true;
    private string $deleteRoute;

    private bool $editBtn = false;
    private string $editRoute;
    
    private bool $editBtnModal = false;
    private string $editBtnModalAttrs;

    private bool $printBtn = false;
    private string $printRoute;

    private bool $copylink = false;
    private string $copyLinkRoute;

    private bool $wallet = false;
    private string $walletRoute;
    private string $walletName;
      private string $switcherModel;
    private int $switcherModelId;
    private ?string $switcher_column_name = "status";
    private bool $status = false;

    public function edit(string $route): self
    {
        $this->editBtn = true;
        $this->editRoute = $route;
        return $this;
    }

    public function editModal(string $attrs): self
    {
        $this->editBtnModal = true;
        $this->editBtnModalAttrs = $attrs;
        return $this;
    }

    public function print(string $route): self
    {
        $this->printBtn = true;
        $this->printRoute = $route;
        return $this;
    }

    public function show(string $route, $showBtn = true): self
    {
        $this->showBtn = $showBtn;
        $this->showRoute = $route;
        return $this;
    }

    public function button($html = ""): self
    {
        $this->html = $html;
        return $this;
    }

    public function copylink($html = ""): self
    {
        $this->copylink = true;
        $this->copyLinkRoute = $html;
        return $this;
    }

    public function wallet($html = "", $name = ""): self
    {
        $this->wallet = true;
        $this->walletRoute = $html;
        $this->walletName = $name;
        return $this;
    }


    public function delete(string $route, bool $actionInModel = true, $showBtn = true): DataTableActions
    {
        $this->deleteBtn = true;
        $this->deleteActionInModel = $actionInModel;
        $this->showDeleteBtn = $showBtn;
        $this->deleteRoute = $route;

        return $this;
    }

    public function make(): string
    {
        $html = '<div class="d-flex justify-content-center flex-shrink-0">';
        if ($this->showBtn) {
            $html .= '<a href="' . $this->showRoute . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                    <span class="svg-icon svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                        </svg>
                    </span>
            </a>';
        }
        if ($this->printBtn) {
            $html .= '<a href="' . $this->printRoute . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" target="_blank">
                         <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="currentColor">
                                    <path d="M16,17 L16,21 C16,21.5522847 15.5522847,22 15,22 L9,22 C8.44771525,22 8,21.5522847 8,21 L8,17 L5,17 C3.8954305,17 3,16.1045695 3,15 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,15 C21,16.1045695 20.1045695,17 19,17 L16,17 Z M17.5,11 C18.3284271,11 19,10.3284271 19,9.5 C19,8.67157288 18.3284271,8 17.5,8 C16.6715729,8 16,8.67157288 16,9.5 C16,10.3284271 16.6715729,11 17.5,11 Z M10,14 L10,20 L14,20 L14,14 L10,14 Z" fill="currentColor"/>
                                    <rect fill="currentColor" opacity="0.3" x="8" y="2" width="8" height="2" rx="1"/>
                                </g>
                            </svg>
                        </span>
                    </a>';
        }
        if ($this->copylink) {
            $html .= '<div data-copy="' . $this->copyLinkRoute . '" class="btn btn-icon btn-bg-warning btn-active-color-warning copyLink btn-sm me-1" target="_blank">

            <span class="svg-icon svg-icon-dark"><!--begin::Svg Icon | path:/metronic/theme/html/demo7/dist/assets/media/svg/icons/Design/Substract.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"></rect>
                <path d="M6,9 L6,15 C6,16.6568542 7.34314575,18 9,18 L15,18 L15,18.8181818 C15,20.2324881 14.2324881,21 12.8181818,21 L5.18181818,21 C3.76751186,21 3,20.2324881 3,18.8181818 L3,11.1818182 C3,9.76751186 3.76751186,9 5.18181818,9 L6,9 Z" fill="#000000" fill-rule="nonzero"></path>
                <path d="M10.1818182,4 L17.8181818,4 C19.2324881,4 20,4.76751186 20,6.18181818 L20,13.8181818 C20,15.2324881 19.2324881,16 17.8181818,16 L10.1818182,16 C8.76751186,16 8,15.2324881 8,13.8181818 L8,6.18181818 C8,4.76751186 8.76751186,4 10.1818182,4 Z" fill="#000000" opacity="0.3"></path>
            </g>
        </svg><!--end::Svg Icon--></span>

                    </div>';
        }
        if ($this->wallet) {
            $html .= '
            <a href="'.$this->walletRoute.'" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
            <span class="svg-icon svg-icon-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16"> <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z"/> </svg>
           </span>
        </a>';
        }
        if ($this->editBtn) {
            $html .= '<a href="' . $this->editRoute . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                <span class="svg-icon svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                    </svg>
                </span>
            </a>';
        }

        if ($this->editBtnModal) {
            $html .= '<button '. $this->editBtnModalAttrs .' class="btn custom-edit-btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                <span class="svg-icon svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                    </svg>
                </span>
            </button>';
        }

        $html .= $this->html;
        if ($this->deleteBtn && $this->showDeleteBtn) {
            if ($this->deleteActionInModel) {
                $html .= '<a data-bs-toggle="modal" data-bs-target="#delete" href="javascript:;" data-href="' . $this->deleteRoute . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">';
            } else {
                $html .= '<a href="' . $this->deleteRoute . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">';
            }
            $html .= '<span class="svg-icon svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
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
        $html = '<label class="form-check cursor-pointer form-switch form-check-custom form-check-solid justify-content-center">';
        $html .= '<input class="form-check-input cursor-pointer w-50px switcher" type="checkbox" data-modelId="' . $this->switcherModelId . '" data-model="' . $this->switcherModel . '" data-columnName="' . $this->switcher_column_name . '" ' . ($this->status == 1 ? 'checked="checked"' : '') . '>';
        $html .= '</label>';
        return $html;
    }

    public static function image($imageUrl, $width = 50): string
    {
        $imageUrl = str_replace('http//', 'http://', $imageUrl); // Add the missing colon (:) after 'http'

        $html = "<div class='symbol symbol-" . $width . "px me-5'>";
        $html .= "<img src='$imageUrl' alt='image' />";
        $html .= "</div>";
        return $html;
    }

    public function color($colorCode): string
    {
        return "<div  style='width: 20px;height:20px;margin: auto;border-radius: 50%;background-color: " . $colorCode . "'></div>";
    }

    public static function bgColor($bgColor, $text): string
    {
        return "<div class='badge badge-light-" . Str::replace("bg-", "", $bgColor) . "'>" . $text . "</div>";
    }

    public static function phone($phone): string
    {
        return "<a href='tel:" . $phone . "' style='direction:ltr'>" . Str::remove("+", $phone) . "</div>";
    }

    public static function link($link, $text): string
    {
        return "<a href='" . $link . "' >" . $text . "</div>";
    }

    public static function checkBox($id): string
    {
        return '<div class="form-check form-check-sm form-check-custom form-check-solid">
                    <input class="form-check-input input_checkbox" type="checkbox" value="' . $id . '"/>
                </div>';
    }
}
