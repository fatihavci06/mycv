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
Route::group([
    'prefix' => LaravelLocalization::setLocale(),//tarayıcı dili prefix olarak ayarlandı
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect','frontmid' ]// eğer prefix boşsa vs middleware ile gerekli yönlendirmeler otomatik olarak yapılır
], function() {
   
   

  // Route::get(LaravelLocalization::transRoute('routes.index'), 'front\IndexController@index') //örneğin url/tr/hakkimizda //aboutun 4.maddede tr/routes.php de karşılığı
   Route::get(LaravelLocalization::transRoute('routes.resume'), 'front\IndexController@resume')->name('front.resume');
   Route::get(LaravelLocalization::transRoute('routes.portfolio'), 'front\IndexController@portfolio')->name('front.portfolio'); 
   Route::get(LaravelLocalization::transRoute('routes.blog'), 'front\IndexController@blog')->name('front.blog'); 
   Route::get(LaravelLocalization::transRoute('routes.contact'), 'front\IndexController@contact')->name('front.contact');
   Route::get('/','front\IndexController@index')->name('front.index'); 
   Route::get('/download_cv','front\IndexController@download_cv')->name('front.download_cv'); 
});

//Route::get('/','front\IndexController@index')->name('front.index');  
/*Route::get('/resume','front\IndexController@resume')->name('front.resume');
Route::get('/portfolio','front\IndexController@portfolio')->name('front.portfolio');  
Route::get('/blog','front\IndexController@blog')->name('front.blog');  
Route::get('/contact','front\IndexController@contact')->name('front.contact'); */
//Route::get('/login','back\IndexController@login')->name('back.login'); 
Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/','back\IndexController@test')->name('back.index');
    Route::get('/egitimbilgileri','back\IndexController@egitimbilgileri')->name('back.egitimbilgileri.list');
    Route::get('/egitim-ekle','back\IndexController@egitimekle')->name('back.egitimekle');
    Route::post('/egitim-ekle-post','back\IndexController@egitimeklepost')->name('back.egitimeklepost');
    Route::post('/egitim-status','back\IndexController@changestatus')->name('back.changestatus');
    Route::get('/egitim-sil/{id}','back\IndexController@egitimsil')->name('back.egitim.sil');
    Route::get('/egitim-duzenle/{id}','back\IndexController@egitimduzenle')->name('back.egitim.duzenle');
    Route::post('/egitim-update/{id}','back\IndexController@egitimupdate')->name('back.egitimupdate');

    Route::get('/deneyim-liste','back\IndexController@deneyimbilgileri')->name('back.deneyimbilgileri.list');
    Route::get('/deneyim-ekle','back\IndexController@deneyimekle')->name('back.deneyimekle');
    Route::post('/deneyim-ekle-post','back\IndexController@deneyimeklepost')->name('back.deneyimeklepost');
    Route::post('/deneyim-status','back\IndexController@deneyimchangestatus')->name('back.deneyimchangestatus');
    Route::get('/deneyim-sil/{id}','back\IndexController@deneyimsil')->name('back.deneyim.sil');
    Route::get('/deneyim-duzenle/{id}','back\IndexController@deneyimduzenle')->name('back.deneyim.duzenle');
    Route::post('/deneyim-update/{id}','back\IndexController@deneyimupdate')->name('back.deneyimupdate');
    Route::get('/anasayfa-icerik','back\IndexController@anasayfaicerik')->name('back.anasayfaicerik.list');
    Route::get('/anasayfa-icerik-sil/{id}','back\IndexController@anasayfaiceriksil')->name('back.anasayfaicerik.sil');
    Route::get('/anasayfa-icerik-duzenle/{id}','back\IndexController@anasayfaicerikduzenle')->name('back.anasayfaicerik.duzenle');
    Route::post('/anasayfa-icerik-update/{id}','back\IndexController@anasayfaicerikupdate')->name('back.anasayfaicerik.update');
    
});