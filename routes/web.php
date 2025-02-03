<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\UserBillController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectIfNotProperRole;

    Route::get('/', function () {
        return view('welcome');
    });


// Redirect to the proper dashboard based on the user role
Route::middleware(['auth', 'verified', RedirectIfNotProperRole::class])->group(function () {

    // User profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes specific to admins
    Route::get('/admin-dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('/admin-usermanagement', [UserController::class, 'index'])->name('admin.user');
    Route::get('/get-pelanggan/{nik}', [UserController::class, 'getByNik'])->name('pelanggan.getByNik');
    Route::post('/admin-usermanagement/store', [UserController::class, 'store'])->name('admin.store');
    Route::patch('/admin/users/{user}/role', [UserController::class, 'updateUserRole'])->name('admin.updateUserRole');
    Route::delete('admin-usermanagement/{user}', [UserController::class, 'destroy'])->name('admin.destroy');

    // Routes specific to cashiers
    Route::get('/kasir-dashboard', [PaymentController::class, 'dashboard'])->name('teller.dashboard');
    Route::get('/kasir-approval', [PaymentController::class, 'kasir'])->name('teller.approval');
    Route::patch('/approve-payment/{id}', [PaymentController::class, 'approve'])->name('approve.payment');
    Route::post('/deny-payment/{id}', [PaymentController::class, 'deny'])->name('deny.payment');


    // Routes specific to general users
    Route::get('/user-dashboard', [UserBillController::class, 'index'])->name('user-dashboard');
    Route::post('/user-dashboard/{id}', [PaymentController::class, 'payWithDeposit'])->name('user-dashboard');
    Route::patch('/payment/deposit/{id}', [PaymentController::class, 'payWithDeposit'])->name('payment.deposit');
    Route::patch('/payment/transfer/{id}', [PaymentController::class, 'payWithTransfer'])->name('payment.transfer');
    Route::post('/user-dashboard/{id}', [PaymentController::class, 'payWithTransfer'])->name('user-dashboard');


    Route::get('/user-deposit', [DepositController::class, 'index'])->name('deposit.index');
    Route::post('/user-deposit', [DepositController::class, 'store'])->name('deposit.store');

    Route::get('/user-pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::post('/user-pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');

    // Routes specific to meter readers
    Route::get('/petugas-dashboard', [PetugasController::class, 'showDashboard'])->name('petugas.dashboard');
    Route::post('/petugas-dashboard', [PetugasController::class, 'dashboard'])->name('petugas.dashboard.submit');
    Route::get('/petugas-input', [PetugasController::class, 'index'])->name('petugas');
    Route::post('/petugas-input/{id}', [PetugasController::class, 'submitReading'])->name('submitReading');
    Route::post('/petugas-input/submit/{nik}', [PetugasController::class, 'submitMeterReading'])->name('submitReading');
});

// Route for checking bills
Route::get('/cekTagihan', function () {
    return view('cekTagihan');
});
Route::post('/cekTagihan', [TagihanController::class, 'checkPayment'])->name('checkPayment');

// Include authentication routes
require __DIR__.'/auth.php';
