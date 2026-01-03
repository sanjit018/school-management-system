<?php

use App\Http\Controllers\classController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\subjectController;
use App\Http\Controllers\teacherController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix"=>"Admin"],function(){
    Route::get("signin",[userController::class,'signin'])->name('signin');
    Route::post("login",[userController::class,'login'])->name("login");
    Route::get('dashboard',[userController::class,'dashboard'])->name("dashboard");
    Route::prefix('students')->group(function(){
        Route::get('class-wise-students',[studentController::class,'class_wise'])->name('class-wise');
    });
    Route::prefix("/classes")->group(function(){
        Route::get('all-classes',[classController::class,'all_class'])->name("all-class");
        Route::get('add-new-class',[classController::class,'new_class'])->name("new-class");
        Route::post('add-class',[classController::class,'add_class'])->name("add-class");
        Route::get("edit-class/{id}",[classController::class,'edit_class'])->name("edit-class");
        Route::post('update-class/{id}',[classController::class,'update_class'])->name('update-class');
        Route::get("delete-class/{id}",[classController::class,'delete_class'])->name("delete-class");
    });
    Route::prefix("/subjects")->group(function(){
        Route::get("all-subjects",[subjectController::class,'all_subject'])->name("all-subject");
        Route::get("add-new-subject",[subjectController::class,'new_subject'])->name('new-subject');
        Route::post("add-subject",[subjectController::class,'add_subject'])->name("add-subject");
        Route::get("edit-subject/{id}",[subjectController::class,'edit_subject'])->name("edit-subject");
        Route::post("update-subject/{id}",[subjectController::class,'update_subject'])->name('update-subject');
        Route::get("delete-subject/{id}",[subjectController::class,'delete_subject'])->name("delete-subject");
    });
    Route::prefix("/assign-subject-to-class")->group(function(){
        Route::get("all-assign",[subjectController::class,'all_assign'])->name("all-assign");
        Route::get("new-assign",[subjectController::class,'new_assign'])->name("new-assign");
        Route::post("new-assign-subject",[subjectController::class,'new_assign_subject'])->name("new-assign-subject");
        Route::get("delete-assign-class/{id}",[subjectController::class,'delete_assign'])->name("delete-assign");
    });
    Route::prefix("/teachers")->group(function(){
        Route::get("all-teacher",[teacherController::class,'all_teacher'])->name("all-teacher");
        Route::get("add-teacher",[teacherController::class,'add_teacher'])->name("add-teacher");
        Route::post("new-teacher",[teacherController::class,'new_teacher'])->name("new-teacher");
        Route::get("edit-teacher/{id}",[teacherController::class,'edit_teacher'])->name("edit-teacher");
        Route::post("update-teacher/{id}",[teacherController::class,'update_teacher'])->name("update-teacher");
        Route::get("delete-teacher/{id}",[teacherController::class,'delete_teacher'])->name("delete-teacher");
    });
    Route::prefix("/assign-class-teacher")->group(function(){
        Route::get("all-assign-teacher",[teacherController::class,'all_assign'])->name("all-assign-teacher");
        Route::get("new-assign-teacher",[teacherController::class,'new_assign_teacher'])->name("new-assign-teacher");
        Route::post("add-teacher",[teacherController::class,'add_assign_teacher'])->name("add-assign-teacher");
    });
});
