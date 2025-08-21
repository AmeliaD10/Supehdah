<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClinicRegisterController;
use App\Http\Controllers\Step1Controller;
use App\Http\Controllers\Step2Controller;
use App\Http\Controllers\ClinicAppointmentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ClinicFieldController;
use App\Http\Controllers\AppointmentController;

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

// Public route
Route::get('/', function () {
    return view('/auth/login');
});

// User dashboard (if you're using a separate one)
Route::get('/dashboard', function () {
    return view('/user/dashboard');
})->middleware(['auth'])->name('dashboard');

// Admin routes group (authenticated only)
Route::middleware(['auth'])->group(function () {
    // Admin dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // User management page
    Route::get('/admin/usermag', [AdminController::class, 'usermag'])->name('admin.usermag');
    Route::get('/admin/user-stats/{type}', [AdminController::class, 'getUserStats']);
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
Route::put('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');



    Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/admin/settings', [AdminController::class, 'updateSettings'])->name('admin.updateSettings');

    Route::get('/clinic/register', [ClinicRegisterController::class, 'showRegisterForm'])->name('clinic.showForm');
Route::post('/clinic/register', [ClinicRegisterController::class, 'register'])->name('clinic.register');

Route::get('/clinic/step1', [Step1Controller::class, 'create'])->name('step1.create');
    Route::post('/clinic/step1', [Step1Controller::class, 'store'])->name('step1.store');

    Route::get('/clinic/step2', [Step2Controller::class, 'create'])->name('step2.create');
Route::post('/clinic/step2', [Step2Controller::class, 'store'])->name('step2.store');


//clinic
    Route::get('/clinic/dashboard', function () {
        return view('clinic.dashboard');
    })->name('clinic.dashboard');
Route::middleware(['auth', 'role:clinic'])->group(function () {
    // routes for clinic role only
});

// Clinic list and detail view
Route::get('/admin/clinics', [AdminController::class, 'clinicList'])->name('admin.clinics');
Route::get('/admin/clinics/{id}', [AdminController::class, 'viewClinic'])->name('admin.clinics.view');

// Route::put('/admin/clinic/{id}/update-password', [AdminController::class, 'updateClinicPassword'])->name('admin.clinic.updatePassword');
Route::put('/clinics/{id}/update-details', [AdminController::class, 'updateClinicDetails'])->name('admin.clinic.updateDetails');
    Route::put('/clinics/{userId}/update-account', [AdminController::class, 'updateClinicAccount'])->name('admin.clinic.updateAccount');

//PDF
Route::get('/admin/clinic/{id}/download', [AdminController::class, 'downloadClinicInfo'])->name('admin.clinic.download');


//clinic Dashboard
Route::middleware(['auth'])->group(function () {
    // Route::get('/clinic/appointments', [ClinicAppointmentController::class, 'index'])->name('clinic.appointments.index');
    // Route::post('/clinic/appointments/store', [ClinicAppointmentController::class, 'store'])->name('clinic.appointments.store');


//Gallery
    Route::get('/clinic/gallery', [GalleryController::class, 'index'])->name('clinic.gallery.index');
    Route::post('/clinic/gallery', [GalleryController::class, 'store'])->name('clinic.gallery.store');
    Route::delete('/clinic/gallery/{id}', [GalleryController::class, 'destroy'])->name('clinic.gallery.delete');


    // Clinic field manager
    Route::get('/clinic/fields', [ClinicFieldController::class, 'index'])->name('clinic.fields.index');
    Route::post('/clinic/fields', [ClinicFieldController::class, 'store'])->name('clinic.fields.store');
    Route::get('/clinic/fields/{id}/edit', [ClinicFieldController::class, 'edit'])->name('clinic.fields.edit');
    Route::put('/clinic/fields/{id}', [ClinicFieldController::class, 'update'])->name('clinic.fields.update');
    Route::delete('/clinic/fields/{id}', [ClinicFieldController::class, 'destroy'])->name('clinic.fields.destroy');

//     Route::get('/clinics/{clinicId}/book', [AppointmentController::class, 'showBookingForm'])->name('appointments.book');
// Route::post('/clinics/{clinicId}/book', [AppointmentController::class, 'store'])->name('appointments.store');

// Route::get('/clinic/appointments', [ClinicAppointmentController::class, 'index'])->name('clinic.appointments');
// Route::get('/clinic/appointments/{id}', [ClinicAppointmentController::class, 'show'])->name('clinic.appointments.show');

// Route::get('/appointments/{id}', [AppointmentController::class, 'show'])->name('appointments.show');

// Route::get('/book-appointment/{id}', [AppointmentController::class, 'showBookingForm'])->name('book.appointment');
// Route::post('/book-appointment/{id}', [AppointmentController::class, 'storeAppointment'])->name('store.appointment');


Route::post('/appointments/{clinic}', [AppointmentController::class, 'store'])->name('appointments.store');
Route::get('/appointments/{id}', [AppointmentController::class, 'show'])->name('appointments.show');

Route::get('clinic/appointments/preview/{clinic}', [AppointmentController::class, 'previewForm'])
    ->name('appointments.preview');



});
});

require __DIR__.'/auth.php';
