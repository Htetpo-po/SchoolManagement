<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\UserController;

/* authentication */
// Route::get('/login', [UserController::class, 'create'])->name('login');
// Route::post('/login', [UserController::class, 'store'])->name('login.process');
// Route::post('/logout', [UserController::class, 'logout'])->name('logout');

/* public landing */
   
    Route::get('/students',[StudentController::class,'index']);
    Route::get('/students/create',[StudentController::class,'create']);
    Route::post('/students/store',[StudentController::class,'store']);
    Route::get('/students/edit/{id}',[StudentController::class,'edit']);
    Route::post('/students/update/{id}',[StudentController::class,'update']);
    Route::get('/students/delete/{id}',[StudentController::class,'delete']);
    Route::get('/students/export',[StudentController::class,'export'])->name('students.export');
    Route::get('/student/export-format',[StudentController::class,'downloadFormat'])->name('students.export-format');
    Route::post('/students/import',[StudentController::class,'import'])->name('students.import');

    /* Teacher Routes */
    Route::get('/teachers',[TeacherController::class,'index']);
    Route::get('/teachers/create',[TeacherController::class,'create']);
    Route::get('/teachers/edit/{id}',[TeacherController::class,'edit']);
    Route::post('/teachers/update/{id}',[TeacherController::class,'update']);
    Route::post('/teachers/store',[TeacherController::class,'store']);
    Route::get('/teachers/delete/{id}',[TeacherController::class,'delete']);

    /* Course Routes */
    Route::get('/courses',[CourseController::class,'index']);
    Route::get('/courses/create',[CourseController::class,'create']);
    Route::post('/courses/store',[CourseController::class,'store']);
    Route::get('/courses/edit/{id}',[CourseController::class,'edit']);
    Route::post('/courses/update/{id}',[CourseController::class,'update']);
    Route::get('/courses/delete/{id}',[CourseController::class,'delete']);

    /* Classroom Routes */
    Route::get('/classrooms',[ClassroomController::class,'index']);
    Route::get('/classrooms/create',[ClassroomController::class,'create']);
    Route::post('/classrooms/store',[ClassroomController::class,'store']);
    Route::get('/classrooms/edit/{id}',[ClassroomController::class,'edit']);
    Route::post('/classrooms/update/{id}',[ClassroomController::class,'update']);
    Route::get('/classrooms/delete/{id}',[ClassroomController::class,'delete']);

      /* Enrollment Routes */
    Route::get('/enrollments',[EnrollmentController::class,'index']);
    Route::get('/enrollments/create',[EnrollmentController::class,'create']);
    Route::post('/enrollments/update/{id}',[EnrollmentController::class,'update']);
    Route::post('/enrollments/store',[EnrollmentController::class,'store']);
    Route::get('/enrollments/edit/{id}',[EnrollmentController::class,'edit']);
    Route::get('/enrollments/delete/{id}',[EnrollmentController::class,'delete']);