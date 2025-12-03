<?php

use App\Http\Controllers\Web\WebController;


Route::name('web.')->group(function(){

    Route::get("/", [WebController::class, "index"])->name("index");

    Route::get("services", [WebController::class, "services"])->name("services");
    Route::get("/service/{slug}", [WebController::class, "showService"])->name("service.show");

    Route::get("about", [WebController::class, "about"])->name("about");
    Route::get("gallery", [WebController::class, "gallery"])->name("gallery");

    Route::get("category/{id}", [WebController::class, "category"])->name("category.show");

    Route::get('contact-us' , [WebController::class,'contact'])->name('contact');
    Route::post('contact-us' , [WebController::class,'contactStore'])->name('contact.store');

    Route::get("/thanks", [WebController::class, "thanks"])->name("thanks");

});