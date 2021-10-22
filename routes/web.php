<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', [App\Http\Controllers\PublicController::class, 'index'])->name('public');
Route::get('/capsulas', [App\Http\Controllers\PublicController::class, 'indexCapsula'])->name('public.capsula');
Route::get('/capsula/detail/{id}', [App\Http\Controllers\PublicController::class, 'detailCapsula'])->name('public.capsula.detail');
Route::get('/episodio/detail/{id}', [App\Http\Controllers\PublicController::class, 'detailEpisodio'])->name('public.episodio.detail');
Route::get('/psicologos', [App\Http\Controllers\PublicController::class, 'indexPsicologo'])->name('public.psicologos');
Route::get('/psicologo/detail/{id}', [App\Http\Controllers\PublicController::class, 'detailPsicologo'])->name('public.psicologos.detail');
Route::get('/recomendaciones', [App\Http\Controllers\PublicController::class, 'indexRecomendaciones'])->name('public.recomendaciones');


// Route::get('/', function () {
//     // return view('welcome');
//     return view('layouts.app3');
//
// });

// Route::get('/admin/login', 'AdminController@index')->name('admin.login');
Route::get('/admin/login', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.login');
Route::post('/admin/login/post', [App\Http\Controllers\AdminController::class, 'loginPost'])->name('admin.login.post');

Route::group(['middleware' => ['adminLogin']],function(){
  // Usuarios
  // Route::get('/admin/login', [App\Http\Controllers\AdminController::class, 'userIndex'])->name('admin.user');

  Route::get('/admin/usuarios', [App\Http\Controllers\AdminController::class, 'userIndex'])->name('admin.user');
  Route::get('/admin/usuarios/add', [App\Http\Controllers\AdminController::class, 'userAdd'])->name('admin.user.add');
  Route::post('/admin/usuarios/post', [App\Http\Controllers\AdminController::class, 'userPost'])->name('admin.user.post');
  Route::get('/admin/sesion/close', [App\Http\Controllers\AdminController::class, 'sesionClose'])->name('admin.sesion.close');

  Route::get('/admin/media', [App\Http\Controllers\AdminController::class, 'mediaIndex'])->name('admin.media');
  Route::get('/admin/media/add', [App\Http\Controllers\AdminController::class, 'addMedia'])->name('admin.media.add');
  Route::post('/admin/media/post', [App\Http\Controllers\AdminController::class, 'mediaPost'])->name('admin.media.post');
  Route::get('/admin/media/edit/{id}', [App\Http\Controllers\AdminController::class, 'editMedia'])->name('admin.media.edit');
  Route::post('/admin/media/update/{id}', [App\Http\Controllers\AdminController::class, 'mediaUpdate'])->name('admin.media.update');
  Route::get('/admin/media/delete/{id}', [App\Http\Controllers\AdminController::class, 'mediaDelete'])->name('admin.media.delete');

  Route::get('/admin/episodio/{id}', [App\Http\Controllers\AdminController::class, 'episodiosIndex'])->name('admin.episodio');
  Route::get('/admin/episodio/add/{id}', [App\Http\Controllers\AdminController::class, 'addEpisodio'])->name('admin.episodios.add');
  Route::post('/admin/episodio/post/{id}', [App\Http\Controllers\AdminController::class, 'episodioPost'])->name('admin.episodio.post');
  Route::get('/admin/episodio/edit/{id}', [App\Http\Controllers\AdminController::class, 'editEpisodio'])->name('admin.episodio.edit');
  Route::post('/admin/episodio/update/{id}', [App\Http\Controllers\AdminController::class, 'episodioUpdate'])->name('admin.episodio.update');
  // Route::get('/admin/episodio/update/{id}', [App\Http\Controllers\AdminController::class, 'episodioUpdate'])->name('admin.episodio.update');

  Route::get('/admin/episodio/delete/{id}', [App\Http\Controllers\AdminController::class, 'episodioDelete'])->name('admin.episodio.delete');

  Route::get('/admin/psicologo', [App\Http\Controllers\AdminController::class, 'indexPsicologo'])->name('admin.psicologo');
  Route::get('/admin/psicologo/add', [App\Http\Controllers\AdminController::class, 'addPsicologo'])->name('admin.psicologo.add');
  Route::post('/admin/psicologo/post', [App\Http\Controllers\AdminController::class, 'psicologoPost'])->name('admin.psicologo.post');
  Route::get('/admin/psicologo/edit/{id}', [App\Http\Controllers\AdminController::class, 'editPsicologo'])->name('admin.psicologo.edit');
  Route::post('/admin/psicologo/update/{id}', [App\Http\Controllers\AdminController::class, 'psicologoUpdate'])->name('admin.psicologo.update');
  Route::get('/admin/psicologo/delete/{id}', [App\Http\Controllers\AdminController::class, 'psicologoDelete'])->name('admin.psicologo.delete');

  Route::get('/admin/extra', [App\Http\Controllers\AdminController::class, 'indexExtra'])->name('admin.extra');
  Route::get('/admin/extra/add', [App\Http\Controllers\AdminController::class, 'addExtra'])->name('admin.extra.add');
  Route::post('/admin/extra/post', [App\Http\Controllers\AdminController::class, 'extraPost'])->name('admin.extra.post');
  Route::get('/admin/extra/edit/{id}', [App\Http\Controllers\AdminController::class, 'editExtra'])->name('admin.extra.edit');
  Route::post('/admin/extra/update/{id}', [App\Http\Controllers\AdminController::class, 'extraUpdate'])->name('admin.extra.update');
  Route::get('/admin/extra/delete/{id}', [App\Http\Controllers\AdminController::class, 'extraDelete'])->name('admin.extra.delete');

});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
// Auth::routes();
//
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
