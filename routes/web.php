<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\Auth\LoginController;
    use App\Http\Controllers\DataEntryController;

    //Contact Routes
    Route::get('/contact', function () {
        return view('contact');
    });

    //Index Routes
    Route::get('/index', function () {
        return view('index');
    });

    Route::get('/index', function () {
        return view('index');
    })->name('index');

    // Authentication Routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    //Admin Routes
    Auth::routes();
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/home', [DataEntryController::class, 'store']);

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/home', [DataEntryController::class, 'store']);
    Route::get('/edit/{id}', [DataEntryController::class, 'edit']);
    Route::put('/update/{id}', [DataEntryController::class, 'update']);
    Route::get('/delete/{id}', [DataEntryController::class,'delete']);



    

    
