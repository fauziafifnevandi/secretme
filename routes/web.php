<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CommentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class, 'index'])->name('users.index');
Route::post('/', [UserController::class, 'store'])->name('users.store');

Route::get('/{generate_link}', [MessageController::class, 'index'])->name('messages.index');
Route::post('/{generate_link}/message', [MessageController::class, 'store'])->name('messages.store');
Route::delete('/{generate_link}/message', [MessageController::class, 'destroy'])->name('messages.destroy');

Route::post('/comments/{id}', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::patch('/comments/{id}', [CommentController::class, 'update'])->name('comments.update');
Route::get('/comments/{id}/edit', [CommentController::class, 'edit'])->name('comments.edit');







