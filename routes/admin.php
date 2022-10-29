<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    //all route name has a prefix of admin.

    Route::get('/home', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('home');

    Route::get('/cache_clear', [App\Http\Controllers\Backend\DashboardController::class, 'clear'])->name('cache.clear');

    Route::get('/meta_information', [App\Http\Controllers\Backend\SetupController::class, 'metaInformation'])->name('setup.meta.index');
    Route::put('/meta_information', [App\Http\Controllers\Backend\SetupController::class, 'updateMetaInformation'])->name('setup.meta.update');

    Route::get('/custom_scripts', [App\Http\Controllers\Backend\SetupController::class, 'customScripts'])->name('setup.custom_scripts.index');
    Route::put('/custom_scripts', [App\Http\Controllers\Backend\SetupController::class, 'updateCustomScripts'])->name('setup.custom_scripts.update');

    Route::get('/uploads/files', [App\Http\Controllers\Backend\UploadController::class, 'index'])->name('upload.index');
    Route::get('/uploads/upload', [App\Http\Controllers\Backend\UploadController::class, 'uploadIndex'])->name('upload.upload');
    Route::post('/uploads/upload', [App\Http\Controllers\Backend\UploadController::class, 'upload'])->name('upload.upload.store');
    Route::delete('/uploads/{upload}', [App\Http\Controllers\Backend\UploadController::class, 'destroy'])->name('upload.destroy');

    Route::post('blog/change_status/{blog}', [App\Http\Controllers\Backend\BlogController::class, 'changeStatus']);
    Route::resource('blog', App\Http\Controllers\Backend\BlogController::class);

    Route::resource('service_group', App\Http\Controllers\Backend\ServiceGroupController::class);

    Route::resource('service', App\Http\Controllers\Backend\ServiceController::class);

    Route::resource('hardware', App\Http\Controllers\Backend\HardwareProductController::class);

    Route::resource('page', App\Http\Controllers\Backend\PageController::class);

    Route::get('pages/{page}/editor', [App\Http\Controllers\Backend\PageController::class, 'editor'])->name('page.editor');

    Route::get('pages/{page}/editor2', [App\Http\Controllers\Backend\PageController::class, 'editor2'])->name('page.editor2');
    Route::post('pages/{page}/update', [App\Http\Controllers\Backend\PageController::class, 'editor2Update'])->name('page.editor2.update');

    Route::get('/general_information', [App\Http\Controllers\Backend\SetupController::class, 'generalInformation'])->name('setup.general.index');
    Route::put('/general_information', [App\Http\Controllers\Backend\SetupController::class, 'updateGeneralInformation'])->name('setup.general.update');
    Route::put('/logo_favicon_information', [App\Http\Controllers\Backend\SetupController::class, 'updateLogoAndFavicon'])->name('setup.logo.favicon.update');

    Route::post('/header/sub_menu/store', [App\Http\Controllers\Backend\HeaderController::class, 'subMenuStore'])->name('header.submenu.store');
    Route::get('/header/get_header_content', [App\Http\Controllers\Backend\HeaderController::class, 'getdateHeaderContent'])->name('header.get_content');
    Route::get('/header/update_header_content', [App\Http\Controllers\Backend\HeaderController::class, 'updateHeaderContent'])->name('header.update_content');
    Route::resource('header', App\Http\Controllers\Backend\HeaderController::class);

    Route::resource('footer', App\Http\Controllers\Backend\FooterController::class);
    Route::get('footer/{footer}/editor', [App\Http\Controllers\Backend\FooterController::class, 'editor'])->name('footer.editor');

    Route::get('/check_blog_slug', [App\Http\Controllers\Backend\SlugController::class, 'checkBlogSlug']);

    Route::get('/check_slug', [App\Http\Controllers\Backend\SlugController::class, 'checkSlug']);

    Route::get('/profile', [App\Http\Controllers\Backend\ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/update', [App\Http\Controllers\Backend\ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password/update', [App\Http\Controllers\Backend\ProfileController::class, 'passwordUpdate'])->name('profile.password.update');

    Route::resource('contact', App\Http\Controllers\Backend\ContactController::class);
});
