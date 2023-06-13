<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ToDoListController;
use Illuminate\Support\Facades\Route;


Route::get('/lists',[ToDoListController::class,'index']);
Route::post('/lists',[ToDoListController::class,'store']);
Route::get('/lists/view',[ToDoListController::class,'view']);
Route::get('/lists/edit/{id}',[ToDoListController::class,'edit']);
Route::post('/lists/update/{id}',[ToDoListController::class,'update']);   
Route::get('/lists/delete/{id}',[ToDoListController::class,'delete']);