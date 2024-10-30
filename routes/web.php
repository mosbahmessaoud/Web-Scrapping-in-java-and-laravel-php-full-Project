<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
// routes/web.php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ScraperController;

Route::get('/', [ArticlesController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticlesController::class, 'show'])->name('articles.show');


Route::get('/scrape', [ScraperController::class, 'showScrapeForm'])->name('scrape.form');
Route::post('/scrape', [ScraperController::class, 'storeSearchRequest'])->name('scrape.submit');