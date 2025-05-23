<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\ExampleComponent;
use App\Http\Controllers\BotController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\InviteController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('signup', [LoginController::class, 'signup'])->name('signup');


Route::post('signup', [LoginController::class, 'registerUser'])->name('signup.store');

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('profile', [LoginController::class, 'profile'])->name('profile');
Route::get('settings', [LoginController::class, 'settings'])->name('settings');
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('login', [LoginController::class, 'authenticate'])->name('loginPost');


Route::get('reset-password/{key}', [LoginController::class, 'resetPassword'])->name('reset.password');
Route::post('reset-password', [LoginController::class, 'resetPasswordCh'])->name('reset.password.post');

Route::get('verify/email', [LoginController::class, 'verifyEmail'])->name('verifyEmail');
Route::get('forget-password', [LoginController::class, 'forgetPassword'])->name('forget.password');
// ---------------------------------
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;


Route::get('password/forgot', [ForgotPasswordController::class, 'showForgotForm'])->name('password.forgot');
Route::post('password/forgot', [ForgotPasswordController::class, 'sendResetLink'])->name('password.send');

Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'resetPassword'])->name('password.update');

Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::post('/update-name', [ProfileController::class, 'updateName'])->name('user.update.name');
Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('user.update.password');

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');



Route::group(
    ['as' => 'admin.', 'middleware' => ['auth'], 'prefix' => 'admin'],
    function () {

        Route::get('dashboard', [DashboardController::class, 'dashboardAdmin'])->name('dashboard');
        Route::get('/user-list', [MainController::class, 'listUser'])->name('user.list');
        Route::get('/plans-manage', [PlanController::class, 'manage'])->name('plan');
        Route::get('/chat-box', [MainController::class, 'chatbox'])->name('chatbox');
        Route::post('/plans/change-price', [PlanController::class, 'changePrice'])->name('plans.change-price');
        Route::post('users/disable/{id}', [MainController::class, 'disable'])->name('users.disable');
        Route::post('users/enable/{id}', [MainController::class, 'enable'])->name('users.enable');
        Route::post('users/delete/{id}', [MainController::class, 'delete'])->name('users.delete');
    });

 Route::group(
        ['as' => 'user.', 'middleware' => ['auth'], 'prefix' => 'user'],
        function () {

    Route::get('dashboard', [DashboardController::class, 'dashboardUser'])->name('dashboard');
    Route::get('dca/bot', [BotController::class, 'index'])->name('bot.list');
    Route::get('subscription', [MainController::class, 'listPlan'])->name('subscriptions');
    Route::get('invite/friends', [InviteController::class, 'index'])->name('invites');

    Route::get('/bot/list',App\Livewire\BotCrud::class)->name('bot.list');


Route::get('/payment/usdt/address', [PaymentController::class, 'createUSDTDepositAddress']);
Route::post('/payment/usdt/check', [PaymentController::class, 'checkUSDTDepositStatus']);


});

use App\Http\Controllers\SubscriptionController;
//Route::get('/subscription', [SubscriptionController::class, 'index'])->name('subscription.index');
Route::post('/subscription/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscription.subscribe');
Route::get('/subscription/confirm-payment', [SubscriptionController::class, 'confirmPayment'])->name('subscription.confirm');
Route::get('/subscription/success', function () {
    return view('subscription.success');
})->name('subscription.success');

use App\Http\Controllers\Google2FAController;

Route::get('2fa/setup', [Google2FAController::class, 'setup'])->name('2fa.setup');
Route::post('2fa/setup', [Google2FAController::class, 'store'])->name('2fa.store');
Route::get('2fa/verify', [Google2FAController::class, 'verify'])->name('2fa.verify');
Route::post('2fa/verify', [Google2FAController::class, 'validateToken'])->name('2fa.validate');
