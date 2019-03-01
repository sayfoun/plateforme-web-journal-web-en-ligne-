<?php
/*
| Web Routes
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great! 
*/


Auth::routes();
Route::get('/Accueil','ProfilController@Accueil')->name('home');
Route::get('/','ProfilController@index');
Route::get('/contact','SearchController@contact');
//Route::get('/home','HomeController@index')->name('home');
Route::group(['middleware'=> ['auth']],function()
{
Route::post('/Accueil/lire/{id}','SearchController@lire')->name('lire_acc');
Route::post('/signaler','LikeController@singaler');
Route::post('/likes','LikeController@like');
Route::post('/article/{id}/comentaire','ComentaireController@comentaire');
Route::post('/article/comentaire/{id}','ComentaireController@com');
});
//journaliste
Route::group(['middleware'=> ['auth'],'middleware'=> ['journaliste']],function()
{
Route::get('/profil','ProfilController@profil')->name('profil');
Route::post('/profil/changeavatar','ProfilController@update_avatar');
Route::post('profile', 'ProfilController@update_avatar');
Route::get('/profil/Message','MessageController@create');
Route::post('/profil/Message/store','MessageController@store');
Route::get('/profil/change-Img','ProfilController@form_image');
Route::get('/profil/edit','ProfilController@edit');
Route::post('/profil/uploade_file','ProfilController@uploads_carte_service');
Route::get('/profil/carte_service','ProfilController@carte_service');
Route::get('/reset_password','ProfilController@changepassword');
Route::get('/profil/post_image','Postcontroller@create_image');
Route::get('/profil/create','Postcontroller@create');
Route::post('/profil/store','Postcontroller@store');
Route::post('/profil/store_image','Postcontroller@store_post_image');
Route::get('/profil/search','SearchController@search');
Route::get('/profil/uploade_video','Postcontroller@create_video');
Route::post('/profil/store_video','Postcontroller@store_video');
Route::post('/profil/article/{id}/supprimer','Postcontroller@delete');
Route::post('/profil/article/{id}/singaler','Postcontroller@signaler')->where('id','[1-9]+');
Route::post('/dislikes','LikeController@dislike');
Route::get('/Accueil/rechreche','SearchController@serach_accuiel');
Route::post('/Accueil/{cat}','SearchController@categorie');
Route::post('/article/{id}/supprimer','Postcontroller@delete_l')->where('id','[1-9]+');
Route::post('/Accueil/Année/{anne}','SearchController@date');
});



//admin
Route::group(['prefix' =>'profil'  ,'middleware'=> 'auth','middleware'=> 'admin'],function()
{
Route::get('admin','AdminController@show');
Route::get('cadres','AdminController@cadres');
Route::get('journalistes','AdminController@journalistes')->name('delete_desactive');
Route::get('utlisateurs','AdminController@utlisateurs')->name('delete_active');
Route::post('delete','AdminController@delete');
Route::post('active','AdminController@activer');
Route::post('desactiver','AdminController@desactiver');
Route::post('supprimer','AdminController@supprimer');
Route::get('messages','MessageController@show')->name('messages');
Route::post('supprimer/{id}','MessageController@delete')->where('id','[1-9]+');
Route::get('demande','AdminController@demande');
Route::get('articles','AdminController@articles')->name('articles');
Route::post('/articles/{id}/lire','AdminController@lire')->where('id','[1-9]+');
Route::get('articles_supprimer','AdminController@articles_supprimer');
Route::post('articles_soft/{id}/supprimer','AdminController@delete_soft')->where('id','[1-9]+');
Route::post('articles_soft/{id}/lire','AdminController@lire_soft')->where('id','[1-9]+');
Route::post('articles_soft/{id}/recuperer','AdminController@recupere')->where('id','[1-9]+');
Route::get('articles/signalés','AdminController@singaler');
Route::get('rechreche/articles','SearchController@article_q');
});
Route::group(['middleware'=> 'auth','middleware'=> 'admin'],function()
{
				Route::get('/message/repondre/{id}','MessageController@create_notfication')->where('id','[1-9]+');
				Route::get('/rechreche/journalistes','SearchController@Serach_journalsite');
				Route::get('/rechreche/utlisateurs','SearchController@Search_user');
});




				





