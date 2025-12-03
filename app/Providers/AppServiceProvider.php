<?php

namespace App\Providers;

use App\View\Components\Aside\Aside;
use App\View\Components\Buttons\AddBtn;
use App\View\Components\Buttons\IndicatorBtn;
use App\View\Components\Card\Body;
use App\View\Components\Card\CardContent;
use App\View\Components\Card\CardToolbar;
use App\View\Components\Card\Footer;
use App\View\Components\Card\Header;
use App\View\Components\Client\Parts\HorizontalProductView;
use App\View\Components\Datatable\DatatableHeader;
use App\View\Components\Datatable\HtmlStructure;
use App\View\Components\Datatable\Script;
use App\View\Components\Images\Avatar;
use App\View\Components\Inputs\FileInput;
use App\View\Components\Inputs\SelectInput;
use App\View\Components\Inputs\TextAreaInput;
use App\View\Components\Inputs\TextInput;
use App\View\Components\Inputs\WysiwygInput;
use Blade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        if (config("app.env") == 'production' || config('app.is_ngrok')) {
            URL::forceScheme('https');
        }
    }

    public function boot(): void
    {

        Model::unguard();

        Blade::component("indicator-btn", IndicatorBtn::class);
        Blade::component("add-btn", AddBtn::class);

        Blade::component("aside", Aside::class);

        Blade::component("text-input", TextInput::class);
        Blade::component("wysiwyg-input", WysiwygInput::class);
        Blade::component("textarea-input", TextAreaInput::class);
        Blade::component("select-input", SelectInput::class);
        Blade::component("file-input", FileInput::class);
        Blade::component('avatar-image', Avatar::class);
        Blade::component('horizontal-product', HorizontalProductView::class);

        Blade::component("datatable-html", HtmlStructure::class);
        Blade::component("datatable-script", Script::class);
        Blade::component("datatable-header", DatatableHeader::class);

        Blade::component("card-content", CardContent::class);
        Blade::component("card-body", Body::class);
        Blade::component("card-header", Header::class);
        Blade::component("card-toolbar", CardToolbar::class);
        Blade::component("card-footer", Footer::class);
    }
}
