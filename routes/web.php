<?php

use App\Livewire\ShowHome;
use App\Livewire\ShowService;
use App\Livewire\ShowServicePage;
use App\Livewire\ShowTeamPage;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// este show home esta vindo da pasta live wire
Route::get('/', ShowHome::class)->name('home.page');
Route::get('/service', ShowServicePage::class)->name('services.page');
Route::get('/service/{id}', ShowService::class)->name('service.page');
Route::get('/team', ShowTeamPage::class)->name('team.page');