<?php

use App\Filament\Pages\Home;
use App\Filament\Pages\Suspended;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',Home::class);
Route::get('/suspended', Suspended::class)->name('suspended');

