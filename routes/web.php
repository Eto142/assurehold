<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\PaymentInformationController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\EscrowController;
use Illuminate\Support\Facades\Route;








Route::get('/', function () {
    return view('home.homepage');
});





// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('show.register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');


// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');


// Logout Route
Route::post('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('user.logout');

Route::prefix('user')->as('user.')->middleware('auth')->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('home'); // user.home
      Route::get('/connect-escrow', [DashboardController::class, 'ConnectEscrow'])->name('connectescrow'); // user.home
     Route::get('/escrow-wallet-verification', [DashboardController::class, 'EscrowWalletVerification'])->name('escrow.wallet.verification'); // user.home
    Route::get('/transaction-agreement', [DashboardController::class, 'TransactionAgreement'])->name('transaction.agreement'); // user.home
    Route::get('/bank-information', [DashboardController::class, 'BankInformation'])->name('bank.information'); // user.home
    Route::get('/pay-option', [DashboardController::class, 'PayOption'])->name('pay.option'); // user.pay.option
    Route::get('/approve-payment', [DashboardController::class, 'ApprovePayment'])->name('approve.payment'); // user.pay.option
    Route::get('/cashout', [DashboardController::class, 'Cashout'])->name('cashout'); // user.cashout
    Route::get('/support', [DashboardController::class, 'Support'])->name('support'); // user.cashout  
    Route::get('/profile', [DashboardController::class, 'Profile'])->name('profile'); // user.cashout   
    Route::get('/profile-update', [DashboardController::class, 'ProfileUpdate'])->name('profile.update'); // user.cashout  
    Route::get('/password-update', [DashboardController::class, 'PasswordUpdate'])->name('password.update'); // user.cashout  
   

    //Escrow Details

    Route::post('/connect-attorney', [EscrowController::class, 'connect'])->name('connect.attorney');
    Route::post('/verify', [EscrowController::class, 'store'])->name('verification.store');
    Route::post('/transaction-agreement', [EscrowController::class, 'TransactionAgreement'])->name('transaction.agreement');


    //payment information
    Route::post('/payment-information', [PaymentInformationController::class, 'store'])->name('payment.information');
    
});



