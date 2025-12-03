<?php

use App\Enums\GuardEnum;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Contact\ContactController;
use App\Http\Controllers\Admin\Notification\NotificationController;

use App\Http\Controllers\Admin\Role\RoleController;
use App\Http\Controllers\Admin\Profile\ProfileController;
use App\Http\Controllers\Admin\Settings\BackupController;
use App\Http\Controllers\Admin\Profile\PasswordController;
use App\Http\Controllers\Admin\Firebase\FirebaseController;
use App\Http\Controllers\Admin\Image\ImageController;
use App\Http\Controllers\Admin\Staff\StaffController;

use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Gallery\GalleryController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Status\StatusController;
use App\Http\Controllers\Admin\Profile\UpdateDeviceTokenController;
use App\Http\Controllers\Admin\Settings\BasicInformationController;
use App\Http\Controllers\Admin\Settings\FirebaseCredentialsController;
use App\Http\Controllers\Admin\Settings\WebsiteImagesController;
use App\Http\Controllers\Admin\Testmonial\TestmonialController;

Route::name("admin.")->prefix("admin")->group(function () {

    Route::namespace("\\App\\Http\\Controllers\\Admin")->group(function () {

        Auth::routes(["register" => false, "verify" => true]);

    });

    Route::middleware(["auth:" . GuardEnum::ADMIN->value, "verified:admin.verification.notice"])->group(function () {

        Route::get("/", [DashboardController::class, "index"])->name("dashboard.index");

        Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard.index");

        Route::get("order-chart", [DashboardController::class, "orderChart"])->name("order.chart");


        Route::resource("contact", ContactController::class);

        Route::resource("testmonial", TestmonialController::class)->except("show");

        Route::resource("category", CategoryController::class);

        Route::resource("gallery", GalleryController::class);
        
        Route::resource("service", ProductController::class);
        

        Route::prefix("settings")->name("settings.")->middleware("can:settings")->group(function () {

            Route::resource("basic-information", BasicInformationController::class)->only("index", "update");

            Route::post("basic-information/homepage", [BasicInformationController::class,'homepage'])->name('homepage');

            Route::resource("website-images", WebsiteImagesController::class)->only("index", "update");

            Route::resource("firebase-credentials", FirebaseCredentialsController::class)->only("index", "update");

            Route::resource("backup", BackupController::class)->only("index", "update");

        });

        Route::post("update-status", StatusController::class)->name("update-status");

        Route::resource("notification", NotificationController::class)->only("index", "update");

        Route::resource("profile", ProfileController::class)->only("index", "update");

        Route::put("password", PasswordController::class)->name("password.update");

        Route::put("update-device-token", UpdateDeviceTokenController::class)->name("update-device-token");

        Route::delete('delete-image/{id}', [ImageController::class, "destroy"])->name("delete-image");

    });

    Route::get("init-firebase", FirebaseController::class)->name("firebase.init");


});
