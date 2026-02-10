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

Route::get('/services-details', function () {
    return view('services-details');
})->name('services.details');

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

    // Staff routes: clients (accessible to admins OR users with can_view_clients)
    Route::middleware([
        'auth',
        config('jetstream.auth_session'),
        'verified',
        'can.view.clients'
    ])->group(function () {
        Route::get('/admin/clients', [\App\Http\Controllers\ClientController::class, 'adminIndex'])->name('admin.clients.index');
        Route::post('/admin/clients/{id}/send-email', [\App\Http\Controllers\ClientController::class, 'sendEmail'])->name('admin.clients.sendEmail');
        Route::get('/admin/clients/{id}/pdf', [\App\Http\Controllers\ClientController::class, 'viewPdf'])->name('admin.clients.pdf');
        Route::get('/admin/clients/{id}/download', [\App\Http\Controllers\ClientController::class, 'downloadPdf'])->name('admin.clients.download');
    });

    // Staff routes: messages (accessible to admins OR users with can_view_messages)
    Route::middleware([
        'auth',
        config('jetstream.auth_session'),
        'verified',
        'can.view.messages'
    ])->group(function () {
        Route::get('/admin/messages', [\App\Http\Controllers\ContactMessageController::class, 'adminIndex'])->name('admin.messages.index');
        Route::delete('/admin/messages/{id}', [\App\Http\Controllers\ContactMessageController::class, 'destroy'])->name('admin.messages.destroy');
    });

    // Admin area: keep strict admin-only routes here
    Route::prefix('admin')->name('admin.')->middleware(['admin'])->group(function () {
        // Admin users management only
        Route::get('/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');
        Route::post('/users', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('users.store');
        Route::delete('/users/{id}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');
        
        // Cantons pricing management
        Route::get('/cantons', [\App\Http\Controllers\Admin\CantonController::class, 'index'])->name('cantons.index');
        Route::put('/cantons/{id}', [\App\Http\Controllers\Admin\CantonController::class, 'update'])->name('cantons.update');
        Route::post('/users/{id}/toggle-admin', [\App\Http\Controllers\Admin\UserController::class, 'toggleAdmin'])->name('users.toggleAdmin');
    });
});

// Public API endpoint for canton prices (for real-time price calculation)
Route::get('/api/cantons/prices', [\App\Http\Controllers\Admin\CantonController::class, 'getPrices'])->name('api.cantons.prices');
