<?php

namespace App\Core\Menus;

use Gate;

class AdminMenu
{
    public static function links(): array
    {
        return [
            [
                "title" => __("Dashboard"),
                "route" => route('admin.dashboard.index'),
                "icon" => "layout-wtf",
                "can" => true
            ],
            [
                "title" => __("Categories"),
                "route" => route('admin.category.index'),
                "icon" => "layout-wtf",
                "can" => false
            ],
            [
                "title" => __("Services"),
                "route" => route('admin.service.index'),
                "icon" => "shop",
                "can" => true
            ],
            [
                "title" => __("Gallery"),
                "route" => route('admin.gallery.index'),
                "icon" => "image-fill",
                "can" => true
            ],
            [
                "title" => __("Testmonials"),
                "route" => route('admin.testmonial.index'),
                "icon" => "chat-quote",
                "can" => true
            ],
            [
                "title" => __("Messsages"),
                "route" => route('admin.contact.index'),
                "icon" => "chat-left-text",
                "can" => true
            ],
            [
                "title" => __("Settings"),
                "can" => Gate::allows('settings'),
                "icon" => "gear",
                "menus" => [
                    [
                        "title" => __("Basic Information"),
                        "route" => route('admin.settings.basic-information.index'),
                    ],
                    [
                        "title" => __("Website images"),
                        "route" => route('admin.settings.website-images.index'),
                    ],
                ]
            ],
        ];
    }
}
