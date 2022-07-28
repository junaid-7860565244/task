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

    