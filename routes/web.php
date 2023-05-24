<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\AdvertismentController;

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

Auth::routes();

Route::get('/admin/login', function () {
    return view('admin/auth/login');})->name('admin-login');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');})->name('admin-logout');

/*
|-----------------------------------------------------------------------------------------------------------------------
| ADMIN ROUTE
|-----------------------------------------------------------------------------------------------------------------------
*/

Route::group(['middleware' => 'admin'], function () {


    /*------------------------------------------------Dashboard-------------------------------------------------------*/

    Route::get('/admin/dashboard', [DashboardController::class, 'dashboard']);


    /*------------------------------------------------News Section----------------------------------------------------*/

    Route::get('/admin/news/list', [NewsController::class, 'index'])->name('admin-news');
    Route::get('/admin/news/add', [NewsController::class, 'create']);
    Route::get('/admin/news/edit/{id}', [NewsController::class, 'create'])->name('');
    Route::post('/admin/news/save', [NewsController::class, 'store'])->name('');
    Route::post('/admin/news/update', [NewsController::class, 'store'])->name('');
    Route::get('/admin/news/get-media-ajax', [NewsController::class, 'getMediaAjax'])->name('');
    Route::get('/admin/news/delete/{id}', [NewsController::class, 'destroy'])->name('');

    // News Sources
    Route::get('/admin/news/source/list', [NewsController::class, 'sourcesList'])->name('sourcesList');
    Route::post('/admin/news/source/list', [NewsController::class, 'sourcesList'])->name('sourcesList');
    Route::get('/admin/news/source/add', [NewsController::class, 'addNewsSource'])->name('addNewsSource');
    Route::post('/admin/news/source/add', [NewsController::class, 'addNewsSource'])->name('addNewsSource');
    Route::post('/admin/news/source/delete/{id}', [NewsController::class, 'deleteNewsSource'])->name('deleteNewsSource');

    // Polling
    Route::get('/admin/news/pulling/list', [NewsController::class, 'pullList'])->name('pullList');
    Route::post('/admin/news/pulling/add', [NewsController::class, 'addPull'])->name('addPull');
    Route::get('/admin/news/pulling/delete/{id}', [NewsController::class, 'deletePull'])->name('deletePull');


    /*------------------------------------------------Category Section------------------------------------------------*/

    Route::get('/admin/category/list', [CategoryController::class, 'list'])->name('categoryList');
    Route::post('/admin/category/add', [CategoryController::class, 'add'])->name('categoryAdd');
    Route::get('/admin/category/delete/{id}', [CategoryController::class, 'delete'])->name('cateoryDelete');

    /*------------------------------------------------RSS Section------------------------------------------------*/

    Route::get('/admin/rss/fireRss', [RssController::class, 'fireRss'])->name('fireRss');
    Route::get('/admin/rss/list', [RssController::class, 'list'])->name('rssList');
    Route::get('/admin/rss/test', [RssController::class, 'list'])->name('rssLinkTest');
    Route::post('/admin/rss/status-change', [RssController::class, 'statusChange'])->name('rssStatusChange');
    Route::post('/admin/rss/add', [RssController::class, 'add'])->name('rssAdd');
    Route::get('/admin/rss/add-to-news/{id}', [RssController::class, 'rssAddToNews'])->name('rssAddToNews');
    Route::get('/admin/rss/fire/{id}', [RssController::class, 'fire'])->name('rssFire');
    Route::get('/admin/rss/delete/{id}', [RssController::class, 'delete'])->name('rssDelete');


    /*------------------------------------------------Tag Section-----------------------------------------------------*/

    Route::get('/admin/tag/list', [TagController::class, 'list']);
    Route::get('/admin/tag/add', [TagController::class, 'add']);
    Route::post('/admin/tag/add', [TagController::class, 'add']);
    Route::get('/admin/tag/delete/{id}', [TagController::class, 'delete']);
    Route::post('/admin/tag/delete/{id}', [TagController::class, 'delete']);


    /*------------------------------------------------Media Section---------------------------------------------------*/

    Route::resource('/admin/media/list', MediaController::class);
    Route::post('admin/media/save', [MediaController::class, 'store'])->name('');


    /*------------------------------------------------Themes Section--------------------------------------------------*/

    Route::get('/admin/theme/list', [SettingsController::class, 'themeList'])->name('');
    Route::post('/admin/theme/list', [SettingsController::class, 'themeList'])->name('');


    /*------------------------------------------------Page and menu Section-------------------------------------------*/

    Route::get('/admin/page/list', [PageController::class, 'staticPageList'])->name('');
    Route::post('/admin/page/add', [PageController::class, 'addStaticPage'])->name('');
    Route::get('/admin/page/delete/{id}', [PageController::class, 'deleteStaticPage'])->name('');

    Route::get('/admin/menu', [PageController::class, 'menuList'])->name('');


    /*------------------------------------------------ Advertisements Section-----------------------------------------*/

    Route::get('/admin/advertisement/list', [AdvertismentController::class, 'list']);
    Route::post('/admin/advertisement/add', [AdvertismentController::class, 'add']);
    Route::get('/admin/advertisement/add', [AdvertismentController::class, 'add']);
    Route::get('/admin/advertisement/delete/{id}', [AdvertismentController::class, 'delete']);


    /*------------------------------------------------ Users Section--------------------------------------------------*/

    Route::get('/admin/users/admin-user/list', [UserController::class, 'adminUserList'])->name('');
    Route::post('/admin/users/admin-user/add', [UserController::class, 'addAdminUser'])->name('');
    Route::get('/admin/users/admin-user/delete/{id}', [UserController::class, 'deleteAdminUser'])->name('');

    Route::get('/admin/users/subscriber/list', [UserController::class, 'subscriberList'])->name('');
    Route::get('/admin/users/profile', [UserController::class, 'userProfile'])->name('');


    /*------------------------------------------------ Settings Section-----------------------------------------------*/

    Route::post('/admin/language/add', [SettingsController::class, 'addLanguage'])->name('');
    Route::get('/admin/language/delete/{id}', [SettingsController::class, 'deleteLanguage'])->name('');


    Route::get('/admin/settings', [SettingsController::class, 'settings'])->name('');
    Route::post('/admin/settings/save', [SettingsController::class, 'SaveSettings'])->name('');


    /*------------------------------------------------ FAQ Section----------------------------------------------------*/

    Route::get('/admin/faq', [SettingsController::class, 'faq'])->name('');

});


/*
|-----------------------------------------------------------------------------------------------------------------------
| PUBLIC ROUTE
|-----------------------------------------------------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/article', [HomeController::class, 'articleDetails'])->name('articleDetails');
Route::get('/category/{id}/{category_slug?}', [HomeController::class, 'categoryNews'])->name('categoryNews');


/*
|-----------------------------------------------------------------------------------------------------------------------
| MOBILE API ROUTE
|-----------------------------------------------------------------------------------------------------------------------
*/

Route::group(['namespace' => 'Mobile','prefix'=>'mobile-app'], function () {
    Route::get('categories',[MobileController::class, 'categoriesApi'])->name('categoriesApi');
    Route::post('categories',[MobileController::class, 'categoriesApi'])->name('categoriesApi');
    Route::get('news',[MobileController::class, 'newesApi'])->name('newesApi');
    Route::post('news',[MobileController::class, 'newesApi'])->name('newesApi');
});