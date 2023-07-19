<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiteController;

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

Route::get('/', [SiteController::class, 'getHome'])->name('getHome');

Route::get('/getStudentInfo', [SiteController::class, 'getStudentInfo'])->name('getStudentInfo');

Route::get('/getClass', [SiteController::class, 'getClass'])->name('getClass');




Auth::routes();



Route::middleware(['auth'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
        Route::prefix('admin')->group(function(){
        
            Route::prefix('class')->group(function(){
                
                Route::get('/getClassManage', [SiteController::class, 'getClassManage'])->name('getClassManage');
            
                Route::post('add', [HomeController::class, 'postaddClass'])->name('postaddClass');
                
                Route::get('edit/{slug}', [SiteController::class, 'geteditClass'])->name('geteditClass');
                
                Route::post('edit/{slug}', [HomeController::class, 'posteditClass'])->name('posteditClass');
                
                Route::get('delete/{slug}', [HomeController::class, 'getdeleteClass'])->name('getdeleteClass');
            
            });
                
            Route::prefix('StudentInfo')->group(function(){
                    
                Route::get('/getStudentInfoManage', [SiteController::class, 'getStudentManage'])->name('getStudentManage');

                Route::post('add', [HomeController::class, 'postaddStudent'])->name('postaddStudent');

                Route::get('edit/{slug}', [HomeController::class, 'geteditStudent'])->name('geteditStudent');
                
                Route::post('edit/{slug}', [HomeController::class, 'posteditStudent'])->name('posteditStudent');
                
                Route::get('delete/{slug}', [HomeController::class, 'getdeleteStudent'])->name('getdeleteStudent');
                    
            });
        });
});
                