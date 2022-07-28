<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\EmpController;
 
Route::controller(EmpController::class)->group(function () {
     Route::get('/employee/add', 'index')->name('index');
    Route::post('/employee/insertdata', 'insertdata')->name('insertdata');
    Route::get('/employee/get', 'getdata')->name('getdata');
   Route::get('/employee/{id}', 'editdata')->name('editdata');
   Route::post('/employee/update', 'update')->name('update');
     Route::post('/employee/deleteuser/{id}',  'deleteuser')->name('deleteuser');

    });


      Route::group(['namespace' => 'App\Http\Controllers'], function()
    {   

     Route::get('/', 'EmpController')->name('home.index');
     Route::group(['middleware' => ['guest']], function() {
          
     Route::get('/register', 'EmpController')->name('register.show');
     Route::post('/register', 'EmpController')->name('register.perform');

       
        Route::get('/login', 'EmpController')->name('login.show');
        Route::post('/login', 'EmpController')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', 'EmpController')->name('logout.perform');
    });
});

    






 



});

    
