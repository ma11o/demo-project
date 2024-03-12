<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\ImagesController@index');

Route::get('/analysis_logs', 'App\Http\Controllers\AiAnalysisController@analysis_logs');

Route::post('/submit', 'App\Http\Controllers\AiAnalysisController@submit');
