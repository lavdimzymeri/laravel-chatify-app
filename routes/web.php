<?php

use App\Http\Controllers\Admin\AdminCoinRequestController;
use App\Http\Controllers\Chatify\ChatifyController;
use App\Http\Controllers\CoinRequestController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\LanguageController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\PluginController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\TrafficsController;
use App\Http\Controllers\FindFriendsController;
use App\Http\Controllers\PaymentPacksController;
use App\Http\Controllers\PayPalController;
use App\Models\Language;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\StripeController;

Route::middleware(['splade'])->group(function () {
    Route::spladeWithVueBridge();

    Route::spladePasswordConfirmation();

    Route::spladeTable();

    Route::spladeUploads();

    Route::get('/language/{code}', function ($code) {
        $language = Language::where('code', $code)->first();
        if ($language) {
            Session::put('locale', $code);
        }
        return redirect()->back();
    })->name('switch-language');

    Route::middleware(['guest', 'checkUserRegistration'])->group(function () {
        Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
        Route::post('/register', [RegisteredUserController::class, 'store']);
    });

    Route::get('/', function () {
        return view('welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    });

    Route::prefix('dashboard')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->name('dashboard.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::resource('user', UserController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('languages', LanguageController::class);
        Route::get('traffics', [TrafficsController::class, 'index'])->name('traffics.index');
        Route::get('traffics/logs', [TrafficsController::class, 'logs'])->name('traffics.logs');
        Route::get('error-reports', [TrafficsController::class, 'error_reports'])->name('traffics.error-reports');
        Route::get('error-reports/{report}', [TrafficsController::class, 'error_report'])->name('traffics.error-report');

        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/', [SettingController::class, 'index'])->name('index');
            Route::put('/update', [SettingController::class, 'update'])->name('update');
        });

        Route::prefix('plugins')->name('plugins.')->group(function () {
            Route::get('/', [PluginController::class, 'index'])->name('index');
            Route::get('/install', [PluginController::class, 'create'])->name('create');
            Route::post('/install', [PluginController::class, 'store'])->name('store');
            Route::post('/{plugin}/activate', [PluginController::class, 'activate'])->name('activate');
            Route::post('/{plugin}/deactivate', [PluginController::class, 'deactivate'])->name('deactivate');
            Route::post('/{plugin}/delete', [PluginController::class, 'delete'])->name('delete');
        });
    });
});
Route::middleware('auth')->group(function () {
    Route::get('/count/messages', [ChatifyController::class, 'count'])->name('count-messages');

    Route::get('/admin/coin-requests', [AdminCoinRequestController::class, 'index'])->name('admin.coin.requests');
    Route::post('/admin/coin-requests/approve/{id}',  [AdminCoinRequestController::class, 'approveRequest'])->name('admin.coin.approve');
    Route::post('/admin/coin-requests/cancel/{id}',  [AdminCoinRequestController::class, 'cancelRequest'])->name('admin.coin.cancel');

    Route::get('/user/find/friends/page',  [FindFriendsController::class, 'index'])->name('user.find.friends');
    Route::get('/user/find/friends/profiles',  [FindFriendsController::class, 'profilesModerator'])->name('profilesModerator');
    Route::get('/users/login/{user}', [FindFriendsController::class, 'loginAsUser'])->name('loginAsUser');
    Route::get('/user/find/friends/page/search',  [FindFriendsController::class, 'search'])->name('user.find.friends.search');
    Route::get('/user/profiles',  [FindFriendsController::class, 'profiles'])->name('user.profiles');
    Route::get('/payment/packs',  [PaymentPacksController::class, 'index'])->name('payment.packs');
});

Route::middleware("auth")->group(function () {
    Route::get('plans', [PlanController::class, 'index']);
    Route::get('plans/{plan}', [PlanController::class, 'show'])->name("plans.show");
    Route::post('subscription', [PlanController::class, 'subscription'])->name("subscription.create");

    Route::post('paypal/payment', [PaypalController::class, 'payment'])->name('paypal');
    Route::get('paypal/success', [PaypalController::class, 'success'])->name('paypal_success');
    Route::get('paypal/cancel', [PaypalController::class, 'cancel'])->name('paypal_cancel');

    Route::post('stripe/payment', [StripeController::class, 'payment'])->name('stripe');
    Route::get('stripe/success', [StripeController::class, 'success'])->name('stripe_success');
    Route::get('stripe/cancel', [StripeController::class, 'cancel'])->name('stripe_cancel');
});
