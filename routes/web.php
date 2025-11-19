<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BoarddirectorController;
use App\Http\Controllers\OurteamController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CustomersupportController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BranchController;
use Illuminate\Support\Facades\Artisan;
use Spatie\Honeypot\ProtectAgainstSpam;

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

Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');
    return "All Cache is cleared";
    // return view('cache');
})->name('cache.clear');
Route::prefix('{country?}')
    ->where(['country' => '[a-zA-Z]{2}'])
    ->middleware('setCountry')->group(
        function () {
            Route::prefix('{locale?}')
                ->where(['locale' => '[a-zA-Z]{2}'])
                ->middleware('setLanguage')
                ->group(function () {
                    Route::get('/', [HomeController::class, 'index'])->name('home');
                    Route::get('our-story', [AboutController::class, 'ourStory'])->name('our-story');
                    Route::get('board-of-directors', [BoarddirectorController::class, 'index'])->name('board-of-directors');
                    Route::get('our-teams', [OurteamController::class, 'index'])->name('our-teams');
                    Route::get('blogs', [BlogController::class, 'index'])->name('blogs');
                    Route::get('blog/{slug}', [BlogController::class, 'blogDetails'])->name('blog-details');
                    Route::get('customer-support', [CustomersupportController::class, 'index'])->name('customer-support');
                    Route::get('location', [LocationController::class, 'index'])->name('location');
                    Route::get('contact', [ContactController::class, 'index'])->name('contact');
                    Route::get('careers', [CareerController::class, 'index'])->name('careers');
                    Route::get('service/{sslug}', [ServiceController::class, 'index'])->name('service');
                    Route::get('branch/{sslug}', [BranchController::class, 'index'])->name('branch');
                    Route::get('customer-satisfaction-survey', [HomeController::class, 'customerSatisfactionSurvey'])->name('customer-satisfaction-survey');
                    Route::get('privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacy-policy');
                    Route::get('faq', [HomeController::class, 'faq'])->name('faq');
                    Route::post('enquiry-mail', [HomeController::class, 'mail'])->name('enquiry-mail');
                    Route::post('contact-mail', [ContactController::class, 'contactMail'])->name('contact-mail');
                    Route::post('jobs-each-mail', [CareerController::class, 'jobsEachMail'])->name('jobs-each-mail');
					Route::post('jobs-mail', [CareerController::class, 'jobsMail'])->name('jobs-mail');
                    Route::post('customer-satisfaction-survey-submit', [HomeController::class, 'customerSatisfactionSurveySubmit'])->name('customer-satisfaction-survey-submit');
                    Route::post('newsletter/{sslug?}', [HomeController::class, 'newsletter'])->name('newsletter')->middleware(ProtectAgainstSpam::class);
                });
        }
    );
