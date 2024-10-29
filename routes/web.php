<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/{referral_id}/{back?}', static function ($referral_id, $back = 0) {
    if (\App\User::where('customer_id', $referral_id)->exists()) {
        \Cookie::queue(cookie(
            'referral_id', $referral_id, 60 * 24 * 30 * 3, null, '.'. env('APP_BASE_DOMAIN', 'brandfields.com')
        ));
    }
    return redirect()->route('landing.index');

    // if (0 === (int)$back) {
    //     return redirect()->away("https://www.brandfields.".(\App::environment('local')?'test':'com')."/{$referral_id}/1");
    // } else {
    //     return redirect()->away('https://www.brandfields.'.(\App::environment('local')?'test':'com').'/');
    // }
})->where('referral_id', '[0-9]{6}+')->name('referral:referral-link');

// Auth Route Panel
Route::group(['middleware' => ['web'], 'namespace' => 'Auth'], function() {
    Route::post('/verify', 'RegisterController@verify')->name('auth.verify');
});

// No Auth Panel
Route::group([], function() {
    Route::get('/', 'LandingController@index')->name('landing.index');
    Route::get('/terms-of-conditions', 'LegalController@termsOfconditions')->name('legal.termsOfconditions');
    Route::get('/privacy-policy', 'LegalController@privacyPolicy')->name('legal.privacyPolicy');
    Route::get('/risk-warning', 'LegalController@riskWarning')->name('legal.riskWarning');
    Route::get('/our-awesome-team', 'LegalController@own')->name('legal.own');
    // Route::post('/contact-us-send', 'ContactUsController@send')->name('landing.sendMail');
});


// User Panel
Route::group(['middleware' => ['auth', 'user']], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'HomeController@profile')->name('profile');
    Route::get('/participation', 'HomeController@participation')->name('participation');
    Route::post('participation/affiliateRegister', 'HomeController@createAccount')->name('participation.create.account');
    Route::get('/portfolio', 'HomeController@portfolio')->name('portfolio');
    Route::get('/referrals', 'HomeController@referrals')->name('referrals');
    Route::get('/commissions', 'HomeController@commissions')->name('commissions');
    Route::get('/news', 'HomeController@news')->name('news');
    Route::get('/downloads', 'HomeController@downloads')->name('downloads');
    Route::get('/support', 'HomeController@support')->name('support');
});

// Admin Panel
Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::get('admin/{userID?}', 'AdminController@index')->name('admin.index');
    Route::post('admin/advanceSearchFilter', 'AdminController@filter')->name('admin.members.filter');
    Route::post('admin/profileUsername', 'AdminController@profileUsername')->name('admin.members.profileUsername');
    Route::post('admin/profileSponsorId', 'AdminController@profileSponsorId')->name('admin.members.profileSponsorId');
    Route::post('admin/profileProfile', 'AdminController@profileProfile')->name('admin.members.profileProfile');
    Route::post('admin/profilePassword', 'AdminController@profilePassword')->name('admin.members.profilePassword');
    Route::get('admin/tree/view/{id?}', 'TreeController@index')->name("admin.tree.view");
    Route::match(['get', 'post'], 'admin/tree/reload/{id?}', 'TreeController@reload')->name("admin.tree.reload");
    Route::match(['get', 'post'], 'admin/tree/tooltip/{id}', 'TreeController@tooltip')->name("admin.tree.tooltip");
});
