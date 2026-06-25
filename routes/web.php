<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/pricing', [PageController::class, 'pricing'])->name('pricing');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/booking', [PageController::class, 'booking'])->name('booking');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

