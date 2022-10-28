<?php

Route::get('/locale/{local}', function ($locale) {
    request()->session()->put('locale', $locale);
    return redirect('/pages');
});
