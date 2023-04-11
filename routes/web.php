<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

// Resource Books
Route::resource('books', BookController::class);