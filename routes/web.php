
<?php

use Illuminate\Support\Facades\Route;

// Public client service request form
Route::get('/services', [\App\Http\Controllers\ClientController::class, 'create'])->name('clients.create');
Route::post('/services', [\App\Http\Controllers\ClientController::class, 'store'])->name('clients.store');

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

Route::get('/', function () {
    return view('home');
});

// Language Switcher
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'de', 'sq', 'fr'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');

// Public contact form
Route::get('/contact', [\App\Http\Controllers\ContactMessageController::class, 'create'])->name('contact.create');
Route::post('/contact', [\App\Http\Controllers\ContactMessageController::class, 'store'])->name('contact.store');

Route::middleware([
    // Use session-based auth middleware to protect the dashboard route.
    // Jetstream may configure 'sanctum' guard, but some setups don't
    // register a 'sanctum' session guard which can make routes appear
    // publicly accessible. Using the default 'auth' middleware ensures
    // the session guard is used.
    'auth',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Admin area: protected by auth + verified + admin middleware
    Route::prefix('admin')->name('admin.')->middleware(['admin'])->group(function () {
        // Admin clients
        Route::get('/clients', [\App\Http\Controllers\ClientController::class, 'adminIndex'])->name('clients.index');
        Route::post('/clients/{id}/send-email', [\App\Http\Controllers\ClientController::class, 'sendEmail'])->name('clients.sendEmail');
        Route::get('/clients/{id}/pdf', [\App\Http\Controllers\ClientController::class, 'viewPdf'])->name('clients.pdf');
        Route::get('/clients/{id}/download', [\App\Http\Controllers\ClientController::class, 'downloadPdf'])->name('clients.download');
        Route::get('/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
        Route::delete('/users/{id}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');
        Route::post('/users/{id}/toggle-admin', [\App\Http\Controllers\Admin\UserController::class, 'toggleAdmin'])->name('users.toggleAdmin');
        // Admin messages
        Route::get('/messages', [\App\Http\Controllers\ContactMessageController::class, 'adminIndex'])->name('messages.index');
        Route::delete('/messages/{id}', [\App\Http\Controllers\ContactMessageController::class, 'destroy'])->name('messages.destroy');
    });
});
