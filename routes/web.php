<?php

use App\Filament\Pages\Home;
use App\Filament\Pages\Suspended;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/account/login');
});

//https://admin.masavuinvestments.com/account/home

Route::get('/account/home', function () {
    return redirect('/account/login');
});

Route::get('/optimize', function () {
    // \Artisan::call('config:clear'); //
    \Artisan::call('config:clear'); //
    \Artisan::call('optimize'); //config:clear
    // \Artisan::call('filament:optimize'); //config:clear
    // \Artisan::call('filament:cache-components'); //config:clear
  return "complete";
});

// Route::get('/',Home::class);
Route::get('/suspended', Suspended::class)->name('suspended');

 Route::get('/link', function () {
    $targetFolder = 'micapp/storage/app/public';
   //  dd($targetFolder);
    $linkFolder = '/home/masavuin/domains/admin.masavuinvestments.com/public_html/storage';
   //  dd($linkFolder);/
    symlink($targetFolder, $linkFolder);
 });


