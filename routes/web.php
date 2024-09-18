<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\Auth\LoginController;
    use App\Http\Controllers\DataEntryController;
    use App\Http\Controllers\TimeTableController;
    use App\Http\Controllers\ContactController;

    //Contact Routes
    Route::get('/contact', function () {
        return view('contact');
    });

    Route::get('/index', [TimeTableController::class, 'timetable'])->name('index');

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

   // Route::post('/contact', [ContactController::class, 'store'];

   // Route to handle form submission
   Route::post('/contact', [ContactController::class, 'store'])->name('requests.store');
   
   // Route to display feedback page
   Route::get('/feedback/{id}', [ContactController::class, 'feedback'])->name('requests.feedback');
   
   // Route to download PDF
   Route::get('/download-pdf/{id}', [ContactController::class, 'downloadPDF'])->name('requests.download_pdf');