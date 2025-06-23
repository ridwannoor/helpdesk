<?php

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

// Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('/vendor/forget-password','Auth\ForgotPasswordController@submitForgetPasswordForm')->name('forget.password.post');
Route::get('reset-password/{token}', 'Auth\ForgotPasswordController@showResetPasswordForm')->name('reset.password.get');
Route::post('reset-password', 'Auth\ForgotPasswordController@submitResetPasswordForm')->name('reset.password.post');

Route::get('account/verify/{token}', 'Auth\VendorAuthController@verifyAccount')->name('vendor.verify');
Route::post('/vendor/profile/lupaverifikasi', 'Back\ProfileController@lupaverifikasi')->name('vendor.lupaverifikasi');
Route::get('vendor/profile/verify/{token}', 'Back\ProfileController@verifyAccount')->name('vendor.profileverify');
// Route::get('/vendor/profile/lupaverifikasi/{token}', 'Back\ProfileController@submitlupaverifikasi')->name('vendor.submitlupaverifikasi');
// Route::get('dashboard', 'Auth\VendorAuthController@dashboard')->middleware(['auth', 'is_verify_email']);

Route::get('/', 'FrontController@index');
Route::get('/faq', 'FrontController@faq');
Route::get('/pengumuman', 'FrontController@pengumuman');
Route::get('/pengumuman/detail/{id}', 'FrontController@pengdetail');
Route::get('/paket', 'FrontController@paket');

Route::get('/vendor/login', 'Auth\VendorAuthController@login')->name('vendor.login');
Route::post('/vendor/login', 'Auth\VendorAuthController@home')->name('vendor.submit');
Route::get('/vendor/api_login', 'Auth\VendorAuthController@api_login');

Route::get('/vendor/dashboard', 'Back\HomepageController@index')->name('vendor.dashboard');
Route::post('/vendor/logout', 'Auth\VendorAuthController@logout')->name('vendor.logout');
Route::get('/vendor/lupapassword', 'Auth\VendorAuthController@lupapassword')->name('vendor.lupa');
Route::get('/vendor/register', 'FrontController@register')->name('vendor.register');
Route::post('/vendor/registersave', 'Auth\VendorAuthController@create')->name('vendor.registersave');
Route::post('/vendor/resetpassword', 'Auth\VendorAuthController@resetPassword')->name('vendor.resetpassword');
Route::post('/vendor/dashboard/resend', 'Back\HomepageController@resend')->name('vendor.resend');

Route::get('/vendor/tender', 'Back\TenderController@index')->name('vendor.tender');
Route::get('/vendor/tender/search/{id}', 'Back\TenderController@search')->name('vendor.tender.search');
Route::get('/vendor/tender/show/{id}', 'Back\TenderController@show')->name('vendor.tender.show');
Route::get('/vendor/tender/penawaran/{id}', 'Back\TenderController@penawaran')->name('vendor.tender.penawaran');
Route::get('/vendor/tender/jasakontruksi', 'Back\TenderController@jasakontruksi')->name('vendor.tender.jasakontruksi');
Route::get('/vendor/tender/jasakonsultankonstruksi', 'Back\TenderController@jasakonsultankonstruksi')->name('vendor.tender.jasakonsultankonstruksi');
Route::get('/vendor/tender/pengadaanbarang', 'Back\TenderController@pengadaanbarang')->name('vendor.tender.pengadaanbarang');
Route::get('/vendor/tender/jasakonsultan', 'Back\TenderController@jasakonsultan')->name('vendor.tender.jasakonsultan');
Route::get('/vendor/tender/jasalain', 'Back\TenderController@jasalain')->name('vendor.tender.jasalain');
Route::post('/vendor/tender/regist', 'Back\TenderController@regist')->name('vendor.tender.regist');
Route::get('/vendor/tender/detail/{id}', 'Back\TenderController@detail')->name('vendor.tender.detail');
Route::get('/vendor/tender/detailtender/{id}', 'Back\TenderController@detailtender')->name('vendor.tender.detailtender');
Route::put('/vendor/tender/quotation', 'Back\TenderController@quotation')->name('vendor.tender.quotation');
Route::get('/vendor/tender/destroyfile/{id}', 'Back\TenderController@destroyfile')->name('vendor.tender.destroyfile');

Route::get('/vendor/profile', 'Back\ProfileController@index')->name('vendor.profile');
Route::get('/vendor/profile/edit/{id}', 'Back\ProfileController@edit')->name('vendor.profile.edit');
Route::put('/vendor/profile/update', 'Back\ProfileController@update')->name('vendor.profile.update');
Route::put('/vendor/profile/dok/update', 'Back\ProfileController@updatedoc')->name('vendor.profile.updatedoc');
Route::get('/vendor/profile/destroyfile/{id}', 'Back\ProfileController@destroyfile')->name('vendor.profile.destroyfile');
Route::post('/vendor/profile/fileupload/store', 'Back\ProfileController@fileupload')->name('vendor.profile.fileupload');
Route::put('/vendor/profile/imageupload', 'Back\ProfileController@imageupload')->name('vendor.profile.imageupload');
Route::put('/vendor/profile/terms', 'Back\ProfileController@terms')->name('vendor.profile.terms');
Route::get('/vendor/profile/gantipassword', 'Back\ProfileController@gantipassword')->name('vendor.gantipassword');
Route::put('/vendor/profile/gantipassword/update', 'Back\ProfileController@gantipasswordupdate')->name('vendor.gantipasswordupdate');
Route::get('/vendor/profile/certificate/{id}', 'Back\ProfileController@certificate')->name('vendor.certificate');

//Lisensi
Route::get('/vendor/profile/lisensi/create', 'Back\ProfilelisensiController@create')->name('vendor.profilelisensi.create');
Route::put('/vendor/profile/lisensi/update', 'Back\ProfilelisensiController@update')->name('vendor.profilelisensi.update');
Route::post('/vendor/profile/lisensi/store', 'Back\ProfilelisensiController@store')->name('vendor.profilelisensi.store');
Route::get('/vendor/profile/lisensi/destroy/{id}', 'Back\ProfilelisensiController@destroy')->name('vendor.profilelisensi.destroy');

//Pengurus
Route::get('/vendor/profile/pengurus/create', 'Back\ProfilepengurusController@create')->name('vendor.profilepengurus.create');
Route::put('/vendor/profile/pengurus/update', 'Back\ProfilepengurusController@update')->name('vendor.profilepengurus.update');
Route::post('/vendor/profile/pengurus/store', 'Back\ProfilepengurusController@store')->name('vendor.profilepengurus.store');
Route::get('/vendor/profile/pengurus/destroy/{id}', 'Back\ProfilepengurusController@destroy')->name('vendor.profilepengurus.destroy');


//Laporan Keuangan
Route::get('/vendor/profile/lap/create', 'Back\ProfilelaporanController@create')->name('vendor.profilelaporan.create');
Route::put('/vendor/profile/lap/update', 'Back\ProfilelaporanController@update')->name('vendor.profilelaporan.update');
Route::post('/vendor/profile/lap/store', 'Back\ProfilelaporanController@store')->name('vendor.profilelaporan.store');
Route::get('/vendor/profile/lap/destroy/{id}', 'Back\ProfilelaporanController@destroy')->name('vendor.profilelaporan.destroy');


//Sertifikat
Route::get('/vendor/profile/sertifikat/create', 'Back\ProfilesertifikatController@create')->name('vendor.profilesertifikat.create');
Route::put('/vendor/profile/sertifikat/update', 'Back\ProfilesertifikatController@update')->name('vendor.profilesertifikat.update');
Route::post('/vendor/profile/sertifikat/store', 'Back\ProfilesertifikatController@store')->name('vendor.profilesertifikat.store');
Route::get('/vendor/profile/sertifikat/destroy/{id}', 'Back\ProfilesertifikatController@destroy')->name('vendor.profilesertifikat.destroy');


//Tenaga Ahli
Route::get('/vendor/profile/tenaga/create', 'Back\ProfiletenagaController@create')->name('vendor.profiletenaga.create');
Route::put('/vendor/profile/tenaga/update', 'Back\ProfiletenagaController@update')->name('vendor.profiletenaga.update');
Route::post('/vendor/profile/tenaga/store', 'Back\ProfiletenagaController@store')->name('vendor.profiletenaga.store');
Route::get('/vendor/profile/tenaga/destroy/{id}', 'Back\ProfiletenagaController@destroy')->name('vendor.profiletenaga.destroy');


//Fasilitas
Route::get('/vendor/profile/fasilitas/create', 'Back\ProfilefasilitasController@create')->name('vendor.profilefasilitas.create');
Route::put('/vendor/profile/fasilitas/update', 'Back\ProfilefasilitasController@update')->name('vendor.profilefasilitas.update');
Route::post('/vendor/profile/fasilitas/store', 'Back\ProfilefasilitasController@store')->name('vendor.profilefasilitas.store');
Route::get('/vendor/profile/fasilitas/destroy/{id}', 'Back\ProfilefasilitasController@destroy')->name('vendor.profilefasilitas.destroy');


//Pengalaman
Route::get('/vendor/profile/pengalaman/create', 'Back\ProfilepengalamanController@create')->name('vendor.profilepengalaman.create');
Route::put('/vendor/profile/pengalaman/update', 'Back\ProfilepengalamanController@update')->name('vendor.profilepengalaman.update');
Route::post('/vendor/profile/pengalaman/store', 'Back\ProfilepengalamanController@store')->name('vendor.profilepengalaman.store');
Route::get('/vendor/profile/pengalaman/destroy/{id}', 'Back\ProfilepengalamanController@destroy')->name('vendor.profilepengalaman.destroy');
Route::get('/vendor/profile/pengalaman/destroyfile/{id}', 'Back\ProfilepengalamanController@destroyfile')->name('vendor.profilepengalaman.destroyfile');

//Dokumen
Route::get('/vendor/profile/doc/create', 'Back\ProfiledocController@create')->name('vendor.profiledoc.create');
Route::put('/vendor/profile/doc/update', 'Back\ProfiledocController@update')->name('vendor.profiledoc.update');
Route::post('/vendor/profile/doc/store', 'Back\ProfiledocController@store')->name('vendor.profiledoc.store');
Route::get('/vendor/profile/doc/destroy/{id}', 'Back\ProfiledocController@destroy')->name('vendor.profiledoc.destroy');

//Bank
Route::get('/vendor/profile/bank/create', 'Back\ProfilebankController@create')->name('vendor.profilebank.create');
Route::put('/vendor/profile/bank/update', 'Back\ProfilebankController@update')->name('vendor.profilebank.update');
Route::post('/vendor/profile/bank/store', 'Back\ProfilebankController@store')->name('vendor.profilebank.store');
Route::get('/vendor/profile/bank/destroy/{id}', 'Back\ProfilebankController@destroy')->name('vendor.profilebank.destroy');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/bantuan', 'HomeController@bantuan')->name('bantuan');
Route::get('/home/search', 'HomeController@search')->name('homesearch');

Route::get('add-to-log', 'HomeController@myTestAddToLog');
Route::get('logActivity', 'HomeController@logActivity');

Route::get('/orderlist/emailcart/{id}', 'OrderController@emailcart')->name('Orderemailcart');



Route::get('/purchase', 'PurchaseController@index')->name('purchase.index');
Route::get('/purchase/detail', 'PurchaseController@detail')->name('purchase.detail');
//My Drive
Route::get('/mydrive', 'MydriveController@index')->name('mydrive');
Route::post('/mydrive/store', 'MydriveController@store')->name('mydrive.store');
Route::get('/mydrive/edit/{id}', 'MydriveController@edit')->name('mydrive.edit');
Route::put('/mydrive/update', 'MydriveController@update')->name('mydrive.update');
Route::get('/mydrive/destroy/{id}', 'MydriveController@destroy')->name('mydrive.destroy');
Route::get('/mydrive/download/{id}', 'MydriveController@download')->name('mydrive.download');

//Product Information
Route::get('/productinformation', 'ProductInformationController@index')->name('productinformation');
Route::post('/productinformation/store', 'ProductInformationController@store')->name('productinformation.store');
Route::get('/productinformation/edit/{id}', 'ProductInformationController@edit')->name('productinformation.edit');
Route::put('/productinformation/update', 'ProductInformationController@update')->name('productinformation.update');
Route::get('/productinformation/destroy/{id}', 'ProductInformationController@destroy')->name('productinformation.destroy');
Route::get('/productinformation/download/{id}', 'ProductInformationController@download')->name('productinformation.download');

//Vendor
Route::get('/vendor', 'VendorController@index')->name('vendorindex');
Route::get('/vendor-bahan-baku', 'VendorController@vendor_bahan_baku')->name('vendor_bahan_baku');
Route::get('/vendor/all', 'VendorController@indexall')->name('vendorindexall');
Route::get('/vendor/add', 'VendorController@create')->name('vendoradd');
Route::get('/vendor-bahan-baku/add', 'VendorController@create_bahan_baku')->name('vendoradd_bahan_baku');
Route::post('/vendor/confirmation', 'VendorController@confirmation')->name('Vendorconfirm');
Route::post('/vendor/store', 'VendorController@store')->name('Vendorstore');
Route::post('/vendor-bahan-baku/store', 'VendorController@store_bahan_baku')->name('Vendorstore_bahan_baku');
Route::post('/vendor/store1', 'VendorController@store1')->name('Vendorstore1');
Route::get('/vendor/edit/{id}', 'VendorController@edit')->name('Vendoredit');
Route::put('/vendor/update', 'VendorController@update')->name('Vendorupdate');
Route::get('/vendor/show/{id}', 'VendorController@show')->name('Vendorshow');
Route::get('/vendor/destroy/{id}', 'VendorController@destroy')->name('Vendordestroy');
Route::get('/vendor/destroyfile/{id}', 'VendorController@destroyfile')->name('vendordestroyfile');
Route::get('/vendor/exportXLS', 'VendorController@exportXLS')->name('vendor.export');
Route::get('/vendor/exportPDF', 'VendorController@exportPDF')->name('vendor.export');
Route::get('/vendor/publish/{id}', 'VendorController@publish')->name('vendor.publish');
Route::get('/vendor/email', 'VendorController@emailvend')->name('vendor.emailvend');
Route::get('/vendor/cetak/{id}', 'VendorController@cetak')->name('vendor.cetak');
Route::post('/emailvendor/sendmail', 'VendorController@sendemail')->name('vendor.sendemail');
Route::get('/vendor/certificate/{id}', 'VendorController@certificate')->name('vendor1.certificate');
Route::get('/vendor/search', 'VendorController@search')->name('vendor.search');
// Route::get('/vendor/upload/{id}', 'VendorController@upload')->name('vendor.upload');
Route::post('/vendor/upload/simpan', 'VendorController@uploadsimpan')->name('vendor.uploadsimpan');
Route::post('/vendor/uploadkontrak/simpan', 'VendorController@uploadkontrak')->name('vendor.uploadkontrak');
Route::get('/vendor/destroyfilekontrak/{id}', 'VendorController@destroyfilekontrak')->name('vendor.destroyfilekontrak');
Route::post('/vendor/sendmaillog', 'VendorController@sendmaillog')->name('vendor.sendmaillog');
// Route::get('/vendor/ttdprimary/{id}', 'VendorController@ttdprimary')->name('Vendor.ttdprimary');
Route::get('/vendor/trash', 'VendorController@trash')->name('vendor.trash');
Route::get('/vendor/restore/{id}', 'VendorController@restore')->name('vendor.restore');
Route::get('/vendor/deletepermanent/{id}', 'VendorController@deletepermanent')->name('vendor.deletepermanent');

//Nota Dinas
Route::get('/notadinas', 'NotadinasController@index')->name('notadinas');
Route::get('/notadinas/create', 'NotadinasController@create')->name('notadinas.create');
Route::post('/notadinas/store', 'NotadinasController@store')->name('notadinas.store');
Route::get('/notadinas/edit/{id}', 'NotadinasController@edit')->name('notadinas.edit');
Route::put('/notadinas/update', 'NotadinasController@update')->name('notadinas.update');
Route::get('/notadinas/show/{id}', 'NotadinasController@show')->name('notadinas.show');
Route::get('/notadinas/destroy/{id}', 'NotadinasController@destroy')->name('notadinas.destroy');
Route::get('/notadinas/upload/{id}', 'NotadinasController@upload')->name('notadinas.upload');
Route::put('/notadinas/upload/simpan', 'NotadinasController@uploadsimpan')->name('notadinas.uploadsimpan');
Route::get('/notadinas/destroyfile/{id}', 'NotadinasController@destroyfile')->name('notadinas.destroyfile');
Route::get('/notadinas/exportPDF', 'NotadinasController@exportPDF')->name('notadinas.export');
Route::get('/notadinas/exportXLS', 'NotadinasController@exportXLS')->name('notadinas.export');
Route::get('/notadinas/pending', 'NotadinasController@pending')->name('notadinas.pending');
Route::get('/notadinas/open', 'NotadinasController@open')->name('notadinas.open');
Route::get('/notadinas/cancel', 'NotadinasController@cancel')->name('notadinas.cancel');
Route::get('/notadinas/progress', 'NotadinasController@progress')->name('notadinas.progress');
Route::get('/notadinas/done', 'NotadinasController@done')->name('notadinas.done');
Route::get('/notadinas/revisi', 'NotadinasController@revisi')->name('notadinas.revisi');

//Minutes of Meeting
Route::get('/mom', 'MomController@index')->name('mom');
Route::get('/mom/create', 'MomController@create')->name('mom.create');
Route::post('/mom/store', 'MomController@store')->name('mom.store');
Route::get('/mom/edit/{id}', 'MomController@edit')->name('mom.edit');
Route::put('/mom/update', 'MomController@update')->name('mom.update');
Route::get('/mom/show/{id}', 'MomController@show')->name('mom.show');
Route::get('/mom/destroy/{id}', 'MomController@destroy')->name('mom.destroy');
Route::get('/mom/upload/{id}', 'MomController@upload')->name('mom.upload');
Route::put('/mom/upload/simpan', 'MomController@uploadsimpan')->name('mom.uploadsimpan');
Route::get('/mom/destroyfile/{id}', 'MomController@destroyfile')->name('mom.destroyfile');
Route::get('/mom/exportPDF', 'MomController@exportPDF')->name('mom.export');
Route::get('/mom/pending', 'MomController@pending')->name('mom.pending');
Route::get('/mom/open', 'MomController@open')->name('mom.open');
Route::get('/mom/cancel', 'MomController@cancel')->name('mom.cancel');
Route::get('/mom/progress', 'MomController@progress')->name('mom.progress');
Route::get('/mom/done', 'MomController@done')->name('mom.done');
Route::get('/mom/revisi', 'MomController@revisi')->name('mom.revisi');

//Tender
Route::get('/tender', 'TenderController@index')->name('tender.index');
Route::get('/tender/add', 'TenderController@create')->name('tender.add');
Route::post('/tender/store', 'TenderController@store')->name('tender.store');
Route::get('/tender/edit/{id}', 'TenderController@edit')->name('tender.edit');
Route::put('/tender/update', 'TenderController@update')->name('tender.update');
Route::get('/tender/destroy/{id}', 'TenderController@destroy')->name('tender.destroy');
Route::get('/tender/publish/{id}', 'TenderController@publish')->name('tender.publish');
Route::get('/tender/approval/{id}', 'TenderController@approval')->name('tender.approval');
Route::get('/tender/show/{id}', 'TenderController@show')->name('tender.show');
// Route::get('/tender/upload/{id}', 'TenderController@upload')->name('tender.upload');
Route::put('/tender/upload/simpan', 'TenderController@uploadsimpan')->name('tender.uploadsimpan');
Route::get('/tender/destroyfile/{id}', 'TenderController@destroyfile')->name('tender.destroyfile');
Route::put('/tender/show/qout', 'TenderController@qout')->name('tender.qout');
Route::get('/tender/exportPDF/{id}', 'TenderController@exportPDF')->name('tender.exportPDF');

//Timeline
Route::get('/timeline', 'TimelineController@index')->name('timeline');
Route::get('/timeline/create', 'TimelineController@create')->name('timeline.create');
Route::post('/timeline/store', 'TimelineController@store')->name('timeline.store');
Route::get('/timeline/edit/{id}', 'TimelineController@edit')->name('timeline.edit');
Route::put('/timeline/update', 'TimelineController@update')->name('timeline.update');
Route::get('/timeline/show/{id}', 'TimelineController@show')->name('timeline.show');
Route::get('/timeline/destroy/{id}', 'TimelineController@destroy')->name('timeline.destroy');
Route::get('/timeline/cetak/{id}', 'TimelineController@cetak')->name('timeline.cetak');

//Syarat Tender
Route::get('/syarattender', 'SyarattenderController@index')->name('syarattender');
Route::get('/syarattender/create', 'SyarattenderController@create')->name('syarattender.create');
Route::post('/syarattender/store', 'SyarattenderController@store')->name('syarattender.store');
Route::get('/syarattender/edit/{id}', 'SyarattenderController@edit')->name('syarattender.edit');
Route::put('/syarattender/update', 'SyarattenderController@update')->name('syarattender.update');
Route::get('/syarattender/show/{id}', 'SyarattenderController@show')->name('syarattender.show');
Route::get('/syarattender/destroy/{id}', 'SyarattenderController@destroy')->name('syarattender.destroy');
// Route::get('/syarattender/destroyfile/{id}', 'SyarattenderController@destroyfile')->name('syarattender.destroyfile');

//Vendor BOD
Route::get('/vendorbod/add/{id}', 'VendorController@createbod')->name('vendorbod.add');
Route::post('/vendorbod/store', 'VendorController@storebod')->name('vendorbod.store');
Route::get('/vendorbod/edit/{id}', 'VendorController@editbod')->name('vendorbod.edit');
Route::put('/vendorbod/update', 'VendorController@updatebod')->name('vendorbod.update');
Route::get('/vendorbod/destroy/{id}', 'VendorController@destroybod')->name('vendorbod.destroy');
Route::get('/vendorbod/publishbod/{id}', 'VendorController@publishbod')->name('vendor.publish');

//Verifikasi Vendor
Route::get('/verifikasivendor', 'VerifikasivendorController@index')->name('verifikasivendor.index');
Route::get('/verifikasivendor/vendorbod/publishbod/{id}', 'VerifikasivendorController@publishbod')->name('verifikasivendor.publish');
Route::get('/verifikasivendor/publish/{id}', 'VerifikasivendorController@publish')->name('verifikasivendor.publish');
Route::get('/verifikasivendor/unpublish/{id}', 'VerifikasivendorController@unpublish')->name('verifikasivendor.unpublish');
Route::get('/verifikasivendor/show/{id}', 'VerifikasivendorController@show')->name('verifikasivendor.show');
Route::get('/verifikasivendor/vendorbod/publish/{id}', 'VerifikasivendorController@publishpengurus')->name('vendor.publishpengurus');
Route::get('/verifikasivendor/vendorlisensi/publish/{id}', 'VerifikasivendorController@publishlisensi')->name('vendor.publishlisensi');
Route::get('/verifikasivendor/vendorlap/publish/{id}', 'VerifikasivendorController@publishlap')->name('vendor.publishlap');
Route::get('/verifikasivendor/vendorsertifikat/publish/{id}', 'VerifikasivendorController@publishsertifikat')->name('vendor.publishsertifikat');
Route::get('/verifikasivendor/vendortenaga/publish/{id}', 'VerifikasivendorController@publishtenaga')->name('vendor.publishtenaga');
Route::get('/verifikasivendor/vendorfasilitas/publish/{id}', 'VerifikasivendorController@publishfasilitas')->name('vendor.publishfasilitas');
Route::get('/verifikasivendor/vendorpengalaman/publish/{id}', 'VerifikasivendorController@publishpengalaman')->name('vendor.publishpengalaman');
Route::get('/verifikasivendor/vendordok/publish/{id}', 'VerifikasivendorController@publishdok')->name('vendor.publishdok');
Route::post('/verifikasivendor/filestore', 'VerifikasivendorController@filestore')->name('vendor.filestore');
Route::put('/verifikasivendor/verif', 'VerifikasivendorController@verif')->name('vendor.verif');
Route::put('/verifikasivendor/tolakverif', 'VerifikasivendorController@tolakverif')->name('vendor.tolakverif');
// Route::put('/verifikasivendor/tolakverif', 'VerifikasivendorController@tolakverif')->name('vendor.tolakverif');
Route::get('/verifikasivendor/exportPDF', 'VerifikasivendorController@exportPDF')->name('verifikasivendor.exportPDF');
//Vendor Bank
Route::get('/vendorbank/add/{id}', 'VendorController@createbank')->name('vendorbank.add');
Route::post('/vendorbank/store', 'VendorController@storebank')->name('vendorbank.store');
Route::get('/vendorbank/edit/{id}', 'VendorController@editbank')->name('vendorbank.edit');
Route::put('/vendorbank/update', 'VendorController@updatebank')->name('vendorbank.update');
Route::get('/vendorbank/destroy/{id}', 'VendorController@destroybank')->name('vendorbank.destroy');
Route::get('/vendorbank/show/{id}', 'VendorController@showbank')->name('vendorbank.showbank');

//vendorjenis
Route::get('/vendorjenis', 'VendorjenisController@index')->name('vendorjenis');
Route::get('/vendorjenis/create', 'VendorjenisController@create')->name('vendorjenis.create');
Route::post('/vendorjenis/store', 'VendorjenisController@store')->name('vendorjenis.store');
Route::get('/vendorjenis/edit/{id}', 'VendorjenisController@edit')->name('vendorjenis.edit');
Route::put('/vendorjenis/update', 'VendorjenisController@update')->name('vendorjenis.update');
Route::get('/vendorjenis/show/{id}', 'VendorjenisController@show')->name('vendorjenis.show');
Route::get('/vendorjenis/destroy/{id}', 'VendorjenisController@destroy')->name('vendorjenis.destroy');


//vendorjenisdok
Route::get('/vendorjenisdoc', 'VendorjenisdocController@index')->name('vendorjenisdoc');
Route::get('/vendorjenisdoc/create', 'VendorjenisdocController@create')->name('vendorjenisdoc.create');
Route::post('/vendorjenisdoc/store', 'VendorjenisdocController@store')->name('vendorjenisdoc.store');
Route::get('/vendorjenisdoc/edit/{id}', 'VendorjenisdocController@edit')->name('vendorjenisdoc.edit');
Route::put('/vendorjenisdoc/update', 'VendorjenisdocController@update')->name('vendorjenisdoc.update');
Route::get('/vendorjenisdoc/show/{id}', 'VendorjenisdocController@show')->name('vendorjenisdoc.show');
Route::get('/vendorjenisdoc/destroy/{id}', 'VendorjenisdocController@destroy')->name('vendorjenisdoc.destroy');


//vendorklasifikasi
Route::get('/vendorklasifikasi', 'VendorklasifikasiController@index')->name('vendorklasifikasi');
Route::get('/vendorklasifikasi/create', 'VendorklasifikasiController@create')->name('vendorklasifikasi.create');
Route::post('/vendorklasifikasi/store', 'VendorklasifikasiController@store')->name('vendorklasifikasi.store');
Route::get('/vendorklasifikasi/edit/{id}', 'VendorklasifikasiController@edit')->name('vendorklasifikasi.edit');
Route::put('/vendorklasifikasi/update', 'VendorklasifikasiController@update')->name('vendorklasifikasi.update');
Route::get('/vendorklasifikasi/show/{id}', 'VendorklasifikasiController@show')->name('vendorklasifikasi.show');
Route::get('/vendorklasifikasi/destroy/{id}', 'VendorklasifikasiController@destroy')->name('vendorklasifikasi.destroy');


//vendorbidangpek
Route::get('/vendorbidangpek', 'VendorbidangpekController@index')->name('vendorbidangpek');
Route::get('/vendorbidangpek/create', 'VendorbidangpekController@create')->name('vendorbidangpek.create');
Route::post('/vendorbidangpek/store', 'VendorbidangpekController@store')->name('vendorbidangpek.store');
Route::get('/vendorbidangpek/edit/{id}', 'VendorbidangpekController@edit')->name('vendorbidangpek.edit');
Route::put('/vendorbidangpek/update', 'VendorbidangpekController@update')->name('vendorbidangpek.update');
Route::get('/vendorbidangpek/show/{id}', 'VendorbidangpekController@show')->name('vendorbidangpek.show');
Route::get('/vendorbidangpek/destroy/{id}', 'VendorbidangpekController@destroy')->name('vendorbidangpek.destroy');

//Preference
Route::get('/preference', 'PreferenceController@index')->name('preference');
Route::get('/preference/edit/{id}', 'PreferenceController@edit')->name('preferenceedit');
Route::put('/preference/update', 'PreferenceController@update')->name('preferenceupdate');

//Slider
Route::post('/slider/store', 'PreferenceController@storeslider')->name('preference.storeslider');
Route::put('/slider/update', 'PreferenceController@updateslider')->name('preference.updateslider');
Route::get('/slider/destroy/{id}', 'PreferenceController@destroyslider')->name('preference.destroyslider');
//FAQ
Route::get('/faqint', 'FaqController@index')->name('faq');
Route::get('/faqint/create', 'FaqController@create')->name('faq.create');
Route::post('/faqint/store', 'FaqController@store')->name('faq.store');
Route::get('/faqint/edit/{id}', 'FaqController@edit')->name('faq.edit');
Route::put('/faqint/update', 'FaqController@update')->name('faq.update');
Route::get('/faqint/show/{id}', 'FaqController@show')->name('faq.show');
Route::get('/faqint/destroy/{id}', 'FaqController@destroy')->name('faq.destroy');

//Currency
Route::get('/currency', 'CurrencyController@index')->name('currency');
Route::get('/currency/create', 'CurrencyController@create')->name('Currency.create');
Route::post('/currency/store', 'CurrencyController@store')->name('Currency.store');
Route::get('/currency/edit/{id}', 'CurrencyController@edit')->name('Currency.edit');
Route::put('/currency/update', 'CurrencyController@update')->name('Currency.update');
Route::get('/currency/show/{id}', 'CurrencyController@show')->name('Currency.show');
Route::get('/currency/destroy/{id}', 'CurrencyController@destroy')->name('Currency.destroy');

//Bank
Route::get('/bank', 'BankController@index')->name('bank');
Route::get('/bank/create', 'BankController@create')->name('Bank.create');
Route::post('/bank/store', 'BankController@store')->name('Bank.store');
Route::get('/bank/edit/{id}', 'BankController@edit')->name('Bank.edit');
Route::put('/bank/update', 'BankController@update')->name('Bank.update');
Route::get('/bank/show/{id}', 'BankController@show')->name('Bank.show');
Route::get('/bank/destroy/{id}', 'BankController@destroy')->name('Bank.destroy');


//Kontrak
Route::get('/kontrak', 'KontrakController@index')->name('kontrak');
Route::get('/kontrak/create', 'KontrakController@create')->name('kontrak.create');
Route::post('/kontrak/store', 'KontrakController@store')->name('kontrak.store');
Route::get('/kontrak/edit/{id}', 'KontrakController@edit')->name('kontrak.edit');
Route::put('/kontrak/update', 'KontrakController@update')->name('kontrak.update');
Route::get('/kontrak/show/{id}', 'KontrakController@show')->name('kontrak.show');
Route::get('/kontrak/destroy/{id}', 'KontrakController@destroy')->name('kontrak.destroy');

//Lokasi
Route::get('/lokasi', 'LokasiController@index')->name('lokasi');
Route::get('/lokasi/create', 'LokasiController@create')->name('lokasicreate');
Route::post('/lokasi/store', 'LokasiController@store')->name('lokasistore');
Route::get('/lokasi/edit/{id}', 'LokasiController@edit')->name('lokasiedit');
Route::put('/lokasi/update', 'LokasiController@update')->name('lokasiupdate');
Route::get('/lokasi/show/{id}', 'LokasiController@show')->name('lokasishow');
Route::get('/lokasi/destroy/{id}', 'LokasiController@destroy')->name('lokasidestroy');
// Route::get('/lokasi/addmail/{id}', 'LokasiController@addmail')->name('lokasi.addmail');
Route::post('/lokasi/postmail', 'LokasiController@postmail')->name('lokasi.postmail');
Route::get('/lokasi/destroymail/{id}', 'LokasiController@destroymail')->name('lokasi.destroymail');
//BOD
Route::get('/bod', 'BodController@index')->name('bod');
Route::get('/bod/create', 'BodController@create')->name('bod.create');
Route::post('/bod/store', 'BodController@store')->name('bod.store');
Route::get('/bod/edit/{id}', 'BodController@edit')->name('bod.edit');
Route::put('/bod/update', 'BodController@update')->name('bod.update');
Route::get('/bod/show/{id}', 'BodController@show')->name('bod.show');
Route::get('/bod/destroy/{id}', 'BodController@destroy')->name('bod.destroy');

//Jenis
Route::get('/jenisusaha', 'JenisusahaController@index')->name('jenisusaha');
Route::get('/jenisusaha/create', 'JenisusahaController@create')->name('jenisusahacreate');
Route::post('/jenisusaha/store', 'JenisusahaController@store')->name('jenisusahastore');
Route::get('/jenisusaha/edit/{id}', 'JenisusahaController@edit')->name('jenisusahaedit');
Route::put('/jenisusaha/update', 'JenisusahaController@update')->name('jenisusahaupdate');
Route::get('/jenisusaha/show/{id}', 'JenisusahaController@show')->name('jenisusahashow');
Route::get('/jenisusaha/destroy/{id}', 'JenisusahaController@destroy')->name('jenisusahadestroy');

//Category
Route::get('/category', 'CategoryController@index')->name('category');
Route::get('/category/create', 'CategoryController@create')->name('categorycreate');
Route::post('/category/store', 'CategoryController@store')->name('categorystore');
Route::get('/category/edit/{id}', 'CategoryController@edit')->name('categoryedit');
Route::put('/category/update', 'CategoryController@update')->name('categoryupdate');
Route::get('/category/show/{id}', 'CategoryController@show')->name('categoryshow');
Route::get('/category/destroy/{id}', 'CategoryController@destroy')->name('categorydestroy');


//Faq
Route::get('/faqs', 'FaqController@index')->name('faqs');
Route::get('/faqs/create', 'FaqController@create')->name('faqs.create');
Route::post('/faqs/store', 'FaqController@store')->name('faqs.store');
Route::get('/faqs/edit/{id}', 'FaqController@edit')->name('faqs.edit');
Route::put('/faqs/update', 'FaqController@update')->name('faqs.update');
Route::get('/faqs/show/{id}', 'FaqController@show')->name('faqs.show');
Route::get('/faqs/destroy/{id}', 'FaqController@destroy')->name('faqs.destroy');

//Divisi
Route::get('/divisi', 'DivisiController@index')->name('divisi');
Route::get('/divisi/create', 'DivisiController@create')->name('Divisicreate');
Route::post('/divisi/store', 'DivisiController@store')->name('Divisistore');
Route::get('/divisi/edit/{id}', 'DivisiController@edit')->name('Divisiedit');
Route::put('/divisi/update', 'DivisiController@update')->name('Divisiupdate');
Route::get('/divisi/show/{id}', 'DivisiController@show')->name('Divisishow');
Route::get('/divisi/destroy/{id}', 'DivisiController@destroy')->name('Divisidestroy');

//BA Nego
Route::get('/banego', 'BanegoController@index')->name('banego');
Route::get('/banego/create', 'BanegoController@create')->name('Banegocreate');
Route::post('/banego/store', 'BanegoController@store')->name('Banegostore');
Route::get('/banego/edit/{id}', 'BanegoController@edit')->name('Banegoedit');
Route::put('/banego/update', 'BanegoController@update')->name('Banegoupdate');
Route::get('/banego/show/{id}', 'BanegoController@show')->name('Banegoshow');
Route::get('/banego/destroy/{id}', 'BanegoController@destroy')->name('Banegodestroy');
Route::get('/banego/cetak/{id}', 'BanegoController@cetak')->name('Banegocetak');
Route::get('/banego/publish/{id}', 'BanegoController@publish')->name('Banegopublish');
Route::get('/banego/upload/{id}', 'BanegoController@upload')->name('banegoupload');
Route::put('/banego/upload/simpan', 'BanegoController@baupload')->name('banego.baupload');
Route::get('/banego/destroyfile/{id}', 'BanegoController@destroyfile')->name('banego.destroyfile');
Route::get('/banego/exportXLS', 'BanegoController@exportXLS')->name('banego.export');
Route::get('/banego/exportPDF', 'BanegoController@exportPDF')->name('banego.exportPDF');

//Orderlist
Route::get('/cartlist', 'OrderController@cartlist')->name('cartlist');
Route::get('/cartlist/show/{id}', 'OrderController@cartlistshow')->name('cartlistshow');
Route::get('/cartlist/cetak/{id}', 'OrderController@downloadpdf')->name('cartlistcetak');

Route::get('/user/cartlist', 'OrderController@cartlist')->name('cartlist');
Route::get('/user/cartlist/show/{id}', 'OrderController@cartlistshow')->name('cartlistshow');
Route::get('/user/cartlist/cetak/{id}', 'OrderController@downloadpdf')->name('cartlistcetak');
Route::get('/user/history/{id}', 'OrderController@history')->name('user.history');
Route::get('/user/history/search/{id}', 'OrderController@historysearch')->name('user.historysearch');

Route::get('/orderlist', 'OrderController@index')->name('orderlist');
Route::get('/orderlist/detail', 'OrderController@detail')->name('orderlist.detail');
Route::get('/orderlist/create', 'OrderController@create')->name('Ordercreate');
Route::post('/orderlist/store', 'OrderController@store')->name('Orderstore');
Route::get('/orderlist/edit/{id}', 'OrderController@edit')->name('Orderedit');
Route::put('/orderlist/update', 'OrderController@update')->name('Orderupdate');
Route::get('/orderlist/show/{id}', 'OrderController@show')->name('Ordershow');
Route::get('/orderlist/destroy/{id}', 'OrderController@destroy')->name('Orderdestroy');
Route::get('/orderlist/search', 'OrderController@search')->name('Ordersearch');
Route::get('/orderlist/cart', 'OrderController@cart')->name('Ordercart');
Route::get('/orderlist/cart/detail', 'OrderController@cartdetail')->name('Ordercartdetail');
Route::post('/orderlist/cart/detail/store', 'OrderController@cartstore')->name('Ordercartstore');

// Route::post('/orderlist/cart/store', 'OrderController@cartstore')->name('Ordercartstore');
Route::post('/orderlist/addtocart', 'OrderController@addtocart')->name('Orderaddtocart');
Route::get('/orderlist/cartdestroy/{id}', 'OrderController@removecart')->name('Orderremovecart');
Route::put('/orderlist/cart/update', 'OrderController@updatecart')->name('Orderupdatecart');
Route::post('/orderlist/detail/save', 'OrderController@addtocart1')->name('Orderaddtocart1');

// Badan Usaha
Route::get('/badanusaha', 'BadanusahaController@index')->name('badanusaha');
Route::get('/badanusaha/create', 'BadanusahaController@create')->name('Badanusahacreate');
Route::post('/badanusaha/store', 'BadanusahaController@store')->name('Badanusahastore');
Route::get('/badanusaha/edit/{id}', 'BadanusahaController@edit')->name('Badanusahaedit');
Route::put('/badanusaha/update', 'BadanusahaController@update')->name('Badanusahaupdate');
Route::get('/badanusaha/show/{id}', 'BadanusahaController@show')->name('Badanusahashow');
Route::get('/badanusaha/destroy/{id}', 'BadanusahaController@destroy')->name('Badanusahadestroy');

// Sub Menu
Route::get('/menu', 'MenuController@index')->name('menu');
Route::get('/menu/create', 'MenuController@create')->name('Menucreate');
Route::post('/menu/store', 'MenuController@store')->name('Menustore');
Route::get('/menu/edit/{id}', 'MenuController@edit')->name('Menuedit');
Route::put('/menu/update', 'MenuController@update')->name('Menuupdate');
Route::get('/menu/show/{id}', 'MenuController@show')->name('Menushow');
Route::get('/menu/destroy/{id}', 'MenuController@destroy')->name('Menudestroy');

// Menu
Route::get('/menusub/create', 'MenuController@createsub')->name('Menusub.create');
Route::post('/menusub/store', 'MenuController@storesub')->name('Menusub.store');
Route::get('/menusub/edit/{id}', 'MenuController@editsub')->name('Menusub.edit');
Route::put('/menusub/update', 'MenuController@updatesub')->name('Menusub.update');
Route::get('/menusub/show/{id}', 'MenuController@showsub')->name('Menusub.show');
Route::get('/menusub/destroy/{id}', 'MenuController@destroysub')->name('Menusub.destroy');

// Delivery Order
Route::get('/do', 'DeliveryOrderController@index')->name('do');
Route::get('/do/create', 'DeliveryOrderController@create')->name('docreate');
Route::post('/do/store', 'DeliveryOrderController@store')->name('dostore');
Route::get('/do/edit/{id}', 'DeliveryOrderController@edit')->name('doedit');
Route::get('/do/publish/{id}', 'DeliveryOrderController@publish')->name('dopublish');
Route::get('/do/publish1/{id}', 'DeliveryOrderController@publish1')->name('dopublish1');
Route::put('/do/update', 'DeliveryOrderController@update')->name('doupdate');
Route::get('/do/track/{id}', 'DeliveryOrderController@track')->name('do.track');
Route::put('/do/updatetrack', 'DeliveryOrderController@updatetrack')->name('doupdate.track');
Route::get('/do/show/{id}', 'DeliveryOrderController@show')->name('doshow');
Route::get('/do/destroy/{id}', 'DeliveryOrderController@destroy')->name('dodestroy');
Route::get('/do/destroyfile/{id}', 'DeliveryOrderController@destroyfile')->name('dodestroyfile');
Route::get('/do/deleterow/{id}', 'DeliveryOrderController@deleterow')->name('deleterow');
Route::get('/do/cetak/{id}', 'DeliveryOrderController@cetak');

//Service Order
Route::get('/so', 'ServiceorderController@index')->name('so');
Route::get('/so/create', 'ServiceorderController@create')->name('so.create');
Route::post('/so/store', 'ServiceorderController@store')->name('so.store');
Route::get('/so/edit/{id}', 'ServiceorderController@edit')->name('so.edit');
Route::get('/so/publish/{id}', 'ServiceorderController@publish')->name('so.publish');
Route::put('/so/update', 'ServiceorderController@update')->name('so.update');
Route::get('/so/show/{id}', 'ServiceorderController@show')->name('so.show');
Route::get('/so/destroy/{id}', 'ServiceorderController@destroy')->name('so.destroy');
Route::get('/so/destroyfile/{id}', 'ServiceorderController@destroyfile')->name('so.destroyfile');
Route::get('/so/deleterow/{id}', 'ServiceorderController@deleterow')->name('deleterow');
Route::get('/so/cetak/{id}', 'ServiceorderController@cetak')->name('so.cetak');
Route::get('/so/upload/{id}', 'ServiceorderController@upload')->name('so.upload');
Route::put('/so/upload/simpan', 'ServiceorderController@simpanupload')->name('so.simpanupload');
Route::get('/so/exportXLS', 'ServiceorderController@exportXLS')->name('so.export');
Route::get('/so/exportPDF', 'ServiceorderController@exportPDF')->name('so.export');

//PUM
Route::get('/pum', 'PumController@index')->name('pum');
Route::get('/pum/create', 'PumController@create')->name('pum.create');
Route::post('/pum/store', 'PumController@store')->name('pum.store');
Route::get('/pum/storedetail/{id}', 'PumController@storedetail')->name('pum.storedetail');
Route::post('/pum/store/detail', 'PumController@store1')->name('pum.store1');
Route::get('/pum/edit/{id}', 'PumController@edit')->name('pum.edit');
Route::get('/pum/editdetail/{id}', 'PumController@editdetail')->name('pum.editdetail');
Route::get('/pum/publish/{id}', 'PumController@publish')->name('pum.publish');
Route::put('/pum/update', 'PumController@update')->name('pum.update');
Route::put('/pum/update/detail', 'PumController@updatedetail')->name('pum.updatedetail');
Route::get('/pum/show/{id}', 'PumController@show')->name('pum.show');
Route::get('/pum/destroy/{id}', 'PumController@destroy')->name('pum.destroy');
Route::get('/pum/destroyfile/{id}', 'PumController@destroyfile')->name('pum.destroyfile');
Route::get('/pum/deleterow/{id}', 'PumController@deleterow')->name('pum.deleterow');
Route::get('/pum/cetak/{id}', 'PumController@cetak')->name('pum.cetak');
Route::get('/pum/upload/{id}', 'PumController@upload')->name('pum.upload');
Route::put('/pum/upload/simpan', 'PumController@simpanupload')->name('pum.simpanupload');
Route::get('/pum/exportXLS', 'PumController@exportXLS')->name('pum.export');
Route::get('/pum/exportPDF', 'PumController@exportPDF')->name('pum.export');

//PJPUM
// Route::get('/pjpum', 'PjpumController@index')->name('pjpum');
Route::get('/pjpum/create', 'PjpumController@create')->name('pjpum.create');
Route::post('/pjpum/store', 'PjpumController@store')->name('pjpum.store');
Route::get('/pjpum/storedetail/{id}', 'PjpumController@storedetail')->name('pjpum.storedetail');
Route::post('/pjpum/store/detail', 'PjpumController@store1')->name('pjpum.store1');
Route::get('/pjpum/edit/{id}', 'PjpumController@edit')->name('pjpum.edit');
Route::get('/pjpum/editdetail/{id}', 'PjpumController@editdetail')->name('pjpum.editdetail');
Route::get('/pjpum/publish/{id}', 'PjpumController@publish')->name('pjpum.publish');
Route::put('/pjpum/update', 'PjpumController@update')->name('pjpum.update');
Route::put('/pjpum/update/detail', 'PjpumController@updatedetail')->name('pjpum.updatedetail');
Route::get('/pjpum/show/{id}', 'PjpumController@show')->name('pjpum.show');
Route::get('/pjpum/destroy/{id}', 'PjpumController@destroy')->name('pjpum.destroy');
Route::get('/pjpum/destroyfile/{id}', 'PjpumController@destroyfile')->name('pjpum.destroyfile');
Route::get('/pjpum/deleterow/{id}', 'PjpumController@deleterow')->name('pjpum.deleterow');
Route::get('/pjpum/cetak/{id}', 'PjpumController@cetak')->name('pjpum.cetak');
Route::get('/pjpum/upload/{id}', 'PjpumController@upload')->name('pjpum.upload');
Route::put('/pjpum/upload/simpan', 'PjpumController@simpanupload')->name('pjpum.simpanupload');
Route::get('/pjpum/exportXLS', 'PjpumController@exportXLS')->name('pjpum.export');
Route::get('/pjpum/exportPDF', 'PjpumController@exportPDF')->name('pjpum.export');
//Good Receive
Route::get('/receivedo', 'ReceivedoController@index')->name('receivedo');
Route::get('/receivedo/create', 'ReceivedoController@create')->name('receivedocreate');
Route::post('/receivedo/store', 'ReceivedoController@store')->name('receivedostore');
Route::get('/receivedo/edit/{id}', 'ReceivedoController@edit')->name('receivedoedit');
Route::get('/receivedo/publish/{id}', 'ReceivedoController@publish')->name('receivedopublish');
Route::put('/receivedo/update', 'ReceivedoController@update')->name('doupdate');
Route::get('/receivedo/show/{id}', 'ReceivedoController@show')->name('receivedoshow');
Route::get('/receivedo/destroy/{id}', 'ReceivedoController@destroy')->name('receivedodestroy');
Route::get('/receivedo/deleterow/{id}', 'ReceivedoController@deleterow')->name('receivedodeleterow');
Route::get('/receivedo/destroyfile/{id}', 'ReceivedoController@destroyfile')->name('receivedodeletefile');

//Rekap DO
Route::get('/rekapdo', 'RekapdoController@index')->name('rekapdo');
Route::get('/rekapdo/detail/{id}', 'RekapdoController@detail')->name('rekapdo.detail');
Route::get('/rekapdo/download/{id}', 'RekapdoController@getdownload')->name('rekapdodownload');


//Rekap PO
Route::get('/rekappo', 'RekapPoController@index')->name('rekappo');
Route::get('/rekappo/create', 'RekapPoController@create')->name('rekappoadd');
Route::post('/rekappo/detail/store', 'RekapPoController@store')->name('rekappostore');
Route::post('/rekappo/store1', 'RekapPoController@store1')->name('rekappostore1');
Route::get('/rekappo/detail/{id}', 'RekapPoController@detail')->name('rekappodetail');
Route::get('/rekappo/edit/{id}', 'RekapPoController@edit')->name('rekappoedit');
Route::get('/rekappo/edit/detail/{id}', 'RekapPoController@editdetail')->name('rekappoeditdetail');
Route::put('/rekappo/edit/update1', 'RekapPoController@update1')->name('rekappoupdate1');
Route::put('/rekappo/edit/detail/update', 'RekapPoController@update')->name('rekappodetailupdate');
Route::get('/rekappo/show/{id}', 'RekapPoController@show')->name('rekapposhow');
Route::get('/rekappo/destroy/{id}', 'RekapPoController@destroy')->name('rekappodestroy');
Route::get('/rekappo/publish/{id}', 'RekapPoController@publish')->name('rekappopublish');
Route::get('/rekappo/status/{id}', 'RekapPoController@status')->name('rekappo.status');
Route::get('/rekappo/destroyfile/{id}', 'RekapPoController@destroyfile')->name('rekappodestroyfile');
Route::get('/podetail/delete/{id}', 'RekapPoController@destroydetail')->name('rekappodestroydetail');
Route::get('/rekappo/cetak/{id}', 'RekapPoController@cetak')->name('rekappocetak');
Route::get('/rekappo/upload/{id}', 'RekapPoController@upload')->name('rekappoupload');
Route::put('/rekappo/upload/simpan', 'RekapPoController@poupload')->name('rekappo.poupload');
Route::get('/rekappo/kontrak/{id}', 'RekapPoController@kontrak')->name('rekappokontrak');

Route::post('/rekappo/next', 'RekapPoController@buatsession')->name('rekappo.buatsession');
Route::get('/rekappo/next/detail', 'RekapPoController@tampilsession')->name('rekappo.tampilsession');

Route::get('/rekappo/exportXLS', 'RekapPoController@exportXLS')->name('rekappo.export');
Route::get('/rekappo/exportPDF', 'RekapPoController@exportPDF')->name('rekappo.exportpdf');
//User
Route::get('/user', 'UserController@index')->name('user');
Route::get('/user/create', 'UserController@create')->name('usercreate');
Route::post('/user/store', 'UserController@store')->name('userstore');
Route::post('/user/jobstore', 'UserController@jobstore')->name('userjobstore');
Route::get('/user/edit/{id}', 'UserController@edit')->name('useredit');
Route::put('/user/update', 'UserController@update')->name('userupdate');
Route::get('/user/show/{id}', 'UserController@show')->name('usershow');
Route::get('/user/destroy/{id}', 'UserController@destroy')->name('userdestroy');
Route::get('/user/jobdestroy/{id}', 'UserController@jobdestroy')->name('userjobdestroy');
Route::get('/user/profile', 'ProfileController@index')->name('profile');
Route::put('/user/profile/update', 'ProfileController@update')->name('profileupdate');
Route::get('/user/exportPDF', 'UserController@exportPDF')->name('user.exportpdf');

//Barang
Route::get('/barang', 'BarangController@index')->name('barang');
Route::get('/barang/add', 'BarangController@create')->name('Barangadd');
Route::post('/barang/store', 'BarangController@store')->name('Barangstore');
Route::get('/barang/edit/{id}', 'BarangController@edit')->name('Barangedit');
Route::put('/barang/update', 'BarangController@update')->name('Barangupdate');
Route::get('/barang/show/{id}', 'BarangController@show')->name('Barangshow');
Route::get('/barang/publish/{id}', 'BarangController@publish')->name('barang.publish');
Route::get('/barang/cetak/{id}', 'BarangController@cetak')->name('barang.cetak');
Route::get('/barang/upload/{id}', 'BarangController@upload')->name('barang.upload');
Route::put('/barang/upload/simpan', 'BarangController@barangupload')->name('barang.uploadsimpan');
Route::get('/barang/destroy/{id}', 'BarangController@destroy')->name('Barangdestroy');
Route::get('/barang/destroyfile/{id}', 'BarangController@destroyfile')->name('Barangdestroyfile');
Route::get('/barang/addmaintenance/{id}', 'BarangController@addmaintenance')->name('Barangaddmaintenance');
Route::post('/barang/storemaintenance', 'BarangController@storemaintenance')->name('Barangstoremaintenance');
Route::get('/barang/editmaintenance/{id}', 'BarangController@editmaintenance')->name('Barangeditmaintenance');
Route::post('/barang/storemaintenance', 'BarangController@storemaintenance')->name('Barangstoremaintenance');
Route::put('/barang/updatemaintenance', 'BarangController@updatemaintenance')->name('Barangupdatemaintenance');
Route::get('/barang/destroymaintenance/{id}', 'BarangController@destroymaintenance')->name('Barangdestroymaintenance');
Route::get('/barang/mutasi/{id}', 'BarangController@mutasi')->name('Barangmutasi');
Route::post('/barang/mutasi/store', 'BarangController@storemutasi')->name('Barangstoremutasi');
Route::get('/barang/editmutasi/{id}', 'BarangController@editmutasi')->name('Barangeditmutasi');
Route::put('/barang/mutasi/update', 'BarangController@updatemutasi')->name('Barangupdatemutasi');
Route::get('/barang/destroymutasi/{id}', 'BarangController@destroymutasi')->name('Barangdestroymutasi');
Route::get('/barang/exportXLS', 'BarangController@exportXLS')->name('barang.export');
Route::get('/barang/exportPDF', 'BarangController@exportPDF')->name('barang.exportpdf');
Route::get('/barang/rekap/{id}', 'BarangController@rekap')->name('barang.rekap');

//Harga Barang
Route::get('/hargabarang', 'HargabarangController@index')->name('hargabarang');
Route::get('/hargabarang/add', 'HargabarangController@create')->name('Hargabarang.add');
Route::post('/hargabarang/store', 'HargabarangController@store')->name('Hargabarang.store');
Route::get('/hargabarang/edit/{id}', 'HargabarangController@edit')->name('Hargabarang.edit');
Route::put('/hargabarang/update', 'HargabarangController@update')->name('Hargabarang.update');
Route::get('/hargabarang/show/{id}', 'HargabarangController@show')->name('Hargabarang.show');
Route::get('/hargabarang/destroy/{id}', 'HargabarangController@destroy')->name('Hargabarang.destroy');
Route::get('/hargabarang/search', 'HargabarangController@search')->name('Hargabarang.search');
Route::get('/hargabarangdetail/publish/{id}', 'HargabarangController@publish')->name('Hargabarang.publish');

//Barang Masuk
Route::get('/brgmasuk', 'BrgmasukController@index')->name('brgmasuk');
Route::get('/brgmasuk/add', 'BrgmasukController@create')->name('brgmasukadd');
Route::post('/brgmasuk/store', 'BrgmasukController@store')->name('brgmasukstore');
Route::get('/brgmasuk/edit/{id}', 'BrgmasukController@edit')->name('brgmasukedit');
Route::put('/brgmasuk/update', 'BrgmasukController@update')->name('brgmasukupdate');
Route::get('/brgmasuk/show/{id}', 'BrgmasukController@show')->name('brgmasukshow');
Route::get('/brgmasuk/destroy/{id}', 'BrgmasukController@destroy')->name('brgmasukdestroy');

Route::get('/billing', 'BillingController@index')->name('billing');
Route::get('/billing/detail', 'BillingController@detail')->name('billing.detail');


//Pengadaan --------------------------------------------
// Route::get('/formpengadaan', 'FormpengadaanController@index')->name('formpengadaan');
// Route::get('/formpengadaan/create', 'FormpengadaanController@create')->name('formpengadaan.create');
// Route::post('/formpengadaan/store', 'FormpengadaanController@store')->name('formpengadaan.store');
// Route::get('/formpengadaan/edit/{id}', 'FormpengadaanController@edit')->name('formpengadaan.edit');
// Route::put('/formpengadaan/update', 'FormpengadaanController@update')->name('formpengadaan.update');
// Route::get('/formpengadaan/show/{id}', 'FormpengadaanController@show')->name('formpengadaan.show');
// Route::get('/formpengadaan/destroy/{id}', 'FormpengadaanController@destroy')->name('formpengadaan.destroy');

Route::get('/bapengadaan', 'BapengadaanController@index')->name('bapengadaan');
Route::get('/bapengadaan/create', 'BapengadaanController@create')->name('bapengadaan.create');
Route::post('/bapengadaan/store', 'BapengadaanController@store')->name('bapengadaan.store');
Route::get('/bapengadaan/edit/{id}', 'BapengadaanController@edit')->name('bapengadaan.edit');
Route::put('/bapengadaan/update', 'BapengadaanController@update')->name('bapengadaan.update');
Route::get('/bapengadaan/show/{id}', 'BapengadaanController@show')->name('bapengadaan.show');
Route::get('/bapengadaan/destroy/{id}', 'BapengadaanController@destroy')->name('bapengadaan.destroy');
Route::get('/bapengadaan/publish/{id}', 'BapengadaanController@publish')->name('bapengadaan.publish');
Route::get('/bapengadaan/destroyfile/{id}', 'BapengadaanController@destroyfile')->name('bapengadaan.destroyfile');
Route::get('/bapengadaan/cetak/{id}', 'BapengadaanController@cetak')->name('bapengadaan.cetak');
Route::get('/bapengadaan/upload/{id}', 'BapengadaanController@upload')->name('bapengadaan.upload');
Route::put('/bapengadaan/upload/simpan', 'BapengadaanController@simpanupload')->name('bapengadaan.simpanupload');
Route::get('/bapengadaan/exportXLS', 'BapengadaanController@exportXLS')->name('bapengadaan.export');


Route::get('/banegopengadaan', 'BanegopengadaanController@index')->name('banegopengadaan');
Route::get('/banegopengadaan/create', 'BanegopengadaanController@create')->name('banegopengadaan.create');
Route::post('/banegopengadaan/store', 'BanegopengadaanController@store')->name('banegopengadaan.store');
Route::get('/banegopengadaan/edit/{id}', 'BanegopengadaanController@edit')->name('banegopengadaan.edit');
Route::put('/banegopengadaan/update', 'BanegopengadaanController@update')->name('banegopengadaan.update');
Route::get('/banegopengadaan/show/{id}', 'BanegopengadaanController@show')->name('banegopengadaan.show');
Route::get('/banegopengadaan/destroy/{id}', 'BanegopengadaanController@destroy')->name('banegopengadaan.destroy');
Route::get('/banegopengadaan/publish/{id}', 'BanegopengadaanController@publish')->name('banegopengadaan.publish');
Route::get('/banegopengadaan/destroyfile/{id}', 'BanegopengadaanController@destroyfile')->name('banegopengadaan.destroyfile');
Route::get('/banegopengadaan/cetak/{id}', 'BanegopengadaanController@cetak')->name('banegopengadaan.cetak');
Route::get('/banegopengadaan/upload/{id}', 'BanegopengadaanController@upload')->name('banegopengadaan.upload');
Route::put('/banegopengadaan/upload/simpan', 'BanegopengadaanController@simpanupload')->name('banegopengadaan.simpanupload');
Route::get('/banegopengadaan/exportXLS', 'BanegopengadaanController@exportXLS')->name('banegopengadaan.export');

Route::get('/baadendum', 'BaadendumController@index')->name('baadendum');
Route::get('/baadendum/create', 'BaadendumController@create')->name('baadendum.create');
Route::post('/baadendum/store', 'BaadendumController@store')->name('baadendum.store');
Route::get('/baadendum/edit/{id}', 'BaadendumController@edit')->name('baadendum.edit');
Route::put('/baadendum/update', 'BaadendumController@update')->name('baadendum.update');
Route::get('/baadendum/show/{id}', 'BaadendumController@show')->name('baadendum.show');
Route::get('/baadendum/destroy/{id}', 'BaadendumController@destroy')->name('baadendum.destroy');
Route::get('/baadendum/publish/{id}', 'BaadendumController@publish')->name('baadendum.publish');
Route::get('/baadendum/destroyfile/{id}', 'BaadendumController@destroyfile')->name('baadendum.destroyfile');
Route::get('/baadendum/cetak/{id}', 'BaadendumController@cetak')->name('baadendum.cetak');
Route::get('/baadendum/upload/{id}', 'BaadendumController@upload')->name('baadendum.upload');
Route::put('/baadendum/upload/simpan', 'BaadendumController@simpanupload')->name('baadendum.simpanupload');
Route::get('/baadendum/exportXLS', 'BaadendumController@exportXLS')->name('baadendum.export');

Route::get('/bakesepakatan', 'BakesepakatanController@index')->name('bakesepakatan');
Route::get('/bakesepakatan/create', 'BakesepakatanController@create')->name('bakesepakatan.create');
Route::post('/bakesepakatan/store', 'BakesepakatanController@store')->name('bakesepakatan.store');
Route::get('/bakesepakatan/edit/{id}', 'BakesepakatanController@edit')->name('bakesepakatan.edit');
Route::put('/bakesepakatan/update', 'BakesepakatanController@update')->name('bakesepakatan.update');
Route::get('/bakesepakatan/show/{id}', 'BakesepakatanController@show')->name('bakesepakatan.show');
Route::get('/bakesepakatan/destroy/{id}', 'BakesepakatanController@destroy')->name('bakesepakatan.destroy');
Route::get('/bakesepakatan/publish/{id}', 'BakesepakatanController@publish')->name('bakesepakatan.publish');
Route::get('/bakesepakatan/destroyfile/{id}', 'BakesepakatanController@destroyfile')->name('bakesepakatan.destroyfile');
Route::get('/bakesepakatan/cetak/{id}', 'BakesepakatanController@cetak')->name('bakesepakatan.cetak');
Route::get('/bakesepakatan/upload/{id}', 'BakesepakatanController@upload')->name('bakesepakatan.upload');
Route::put('/bakesepakatan/upload/simpan', 'BakesepakatanController@simpanupload')->name('bakesepakatan.simpanupload');
Route::get('/bakesepakatan/getvendor', 'BakesepakatanController@getVendor')->name('bakesepakatan.getvendor');
Route::get('/bakesepakatan/exportXLS', 'BakesepakatanController@exportXLS')->name('bakesepakatan.export');

//SPK
Route::get('/spk', 'SpkController@index')->name('spk');
Route::get('/spk/create', 'SpkController@create')->name('spk.create');
Route::post('/spk/store', 'SpkController@store')->name('spk.store');
Route::get('/spk/edit/{id}', 'SpkController@edit')->name('spk.edit');
Route::put('/spk/update', 'SpkController@update')->name('spk.update');
Route::get('/spk/show/{id}', 'SpkController@show')->name('spk.show');
Route::get('/spk/destroy/{id}', 'SpkController@destroy')->name('spk.destroy');
Route::get('/spk/publish/{id}', 'SpkController@publish')->name('spk.publish');
Route::get('/spk/destroyfile/{id}', 'SpkController@destroyfile')->name('spk.destroyfile');
Route::get('/spk/cetak/{id}', 'SpkController@cetak')->name('spk.cetak');
Route::get('/spk/upload/{id}', 'SpkController@upload')->name('spk.upload');
Route::put('/spk/upload/simpan', 'SpkController@simpanupload')->name('spk.simpanupload');
Route::get('/spk/getvendor', 'SpkController@getVendor')->name('spk.getvendor');
Route::get('/spk/exportXLS', 'SpkController@exportXLS')->name('spk.export');


//SPP
Route::get('/spp', 'SppController@index')->name('spp');
Route::get('/spp/create', 'SppController@create')->name('spp.create');
Route::post('/spp/store', 'SppController@store')->name('spp.store');
Route::get('/spp/edit/{id}', 'SppController@edit')->name('spp.edit');
Route::put('/spp/update', 'SppController@update')->name('spp.update');
Route::get('/spp/show/{id}', 'SppController@show')->name('spp.show');
Route::get('/spp/destroy/{id}', 'SppController@destroy')->name('spp.destroy');
Route::get('/spp/publish/{id}', 'SppController@publish')->name('spp.publish');
Route::get('/spp/destroyfile/{id}', 'SppController@destroyfile')->name('spp.destroyfile');
Route::get('/spp/cetak/{id}', 'SppController@cetak')->name('spp.cetak');
Route::get('/spp/upload/{id}', 'SppController@upload')->name('spp.upload');
Route::put('/spp/upload/simpan', 'SppController@simpanupload')->name('spp.simpanupload');
Route::get('/spp/getvendor', 'SppController@getVendor')->name('spp.getvendor');
Route::get('/spp/exportXLS', 'SppController@exportXLS')->name('spp.export');
// Route::get('bakesepakatan/subcat/{id}', function ($id) {
//     $vendorbod = App\Models\Vendorbod::with('vendor', 'bakesepakatan')->where('bakesepakatan_id',$id)->get();
//     return response()->json($vendorbod);
// });
