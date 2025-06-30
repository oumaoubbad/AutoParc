<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\EtatController;
use App\Http\Controllers\TcarburantController;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AffectationController;
use App\Http\Controllers\FonctionController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TentretienController;
use App\Http\Controllers\TreparationController;
use App\Http\Controllers\ReparationController;
use App\Http\Controllers\EntretienController;
use App\Http\Controllers\CarburantController;
use App\Http\Controllers\AdministratifController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\TraiteController;


















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




Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function(){


});

    Route::get('calendar/index', [CalendarController::class, 'index'])->name('calendar.index');
    Route::post('calendar', [CalendarController::class, 'store'])->name('calendar.store');
    Route::patch('calendar/update/{id}', [CalendarController::class, 'update'])->name('calendar.update');
    Route::delete('calendar/destroy/{id}', [CalendarController::class, 'destroy'])->name('calendar.destroy');

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('profile',[ProfileController::class,'index'])->name('admin.profile');
    Route::post('update-profile-info',[ProfileController::class,'updateInfo'])->name('adminUpdateInfo');
    Route::post('change-profile-picture',[ProfileController::class,'updatePicture'])->name('adminPictureUpdate');
    Route::post('change-password',[ProfileController::class,'changePassword'])->name('adminChangePassword');
    Route::get('/contact-form', [App\Http\Controllers\ContactController::class, 'contactForm'])->name('contact-form');
    Route::post('/contact-form', [App\Http\Controllers\ContactController::class, 'storeContactForm'])->name('contact-form.store');
    Route::resource('marques', MarqueController::class);
    Route::resource('modeles', ModeleController::class);
    Route::resource('etat', EtatController::class);
    Route::resource('tcarburants', TcarburantController::class);
    Route::resource('voitures', VoitureController::class);

    Route::get('/change-status/{id}', [VoitureController::class,'changeStatus']);
    Route::get('/change-etats/{id}', [VoitureController::class,'changeEtat']);
    Route::resource('reservations',ReservationController::class);

    Route::resource('affectations',AffectationController::class);
    Route::resource('employes', EmployeController::class);
    Route::resource('tentretiens', TentretienController::class);
    Route::resource('entretiens', EntretienController::class);
    Route::resource('treparations', TreparationController::class);
    Route::resource('reparations', ReparationController::class);
    Route::resource('carburants', CarburantController::class);
    Route::resource('traites', TraiteController::class);
    Route::get('/reservations/{id}/create', [ReservationController::class, 'create'])
    ->name('reservation.create');
    Route::get('/affectations/{id}/create', [AffectationController::class, 'create'])
    ->name('affectation.create');
    Route::resource('fonctions', FonctionController::class);
    Route::resource('user', UserController::class);
    Route::post('user/{user}/change-password', [ChangePasswordController::class, 'change_password'])->name('users.change.password');
    Route::resource('administratif', AdministratifController::class);
    Route::post('reservation/approve/{id}', [ReservationController::class, 'approve'])->name('reservation.approve');



Auth::routes();



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
