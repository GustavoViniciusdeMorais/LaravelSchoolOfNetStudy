<?php

use Modules\Pages\Http\Controllers\PagesController;

Route::get('/pages', [PagesController::class, 'index'])->name('get.pages');
