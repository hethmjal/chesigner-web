<?php

use App\Http\Controllers\ChallengeUserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\LikeController;
use App\Models\Order_Work;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\MessengerController;
use App\Http\Controllers\OrderUserController;
use App\Http\Controllers\OrderWorkController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\SubOrdersController;
use App\Http\Controllers\SubOrdersUserController;
use App\Models\SubOrder;

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
Route::get('/', 'HomeController@index');
Route::get('/terms&policy', 'HomeController@terms');

Route::get('/aboutUs', 'HomeController@aboutus');
Route::get('/blog', 'HomeController@blog');
Route::get('/blog/{home}', 'HomeController@showblog')->name('showblog');
Route::get('/home', 'HomeController@oldindex');

Route::get('/challenges', 'ChallengeUserController@index');
Route::get('/designers', 'HomeController@designersPage')->name('designersPage');
Route::get('/readyWorks', 'HomeController@readyWorksPage');
Route::get('/contactUs', 'HomeController@contactUsPage');
Route::get('/signin', 'HomeController@signInPage');
Route::get('/signup', 'HomeController@signUpPage');
Route::get('/challengeForm', 'HomeController@challengeFormPage');
Route::get('/directOrderForm', 'HomeController@directOrderPage');
Route::get('/viewDesigner/{home}', 'HomeController@viewDesigner')->name('viewDesigner');

//Admin panels
//Designers Panel
Route::get('/panels/AdminPanel/DesignersPanel', 'DesignersAdminController@index')->name('designer.index');
Route::post('/panels/AdminPanel/DesignersPanel/changestatus/{id}', 'DesignersAdminController@changeDesignerStatus')->name('designer.changestatus');

Route::get('/panels/AdminPanel/DesignersPanel/createDesigner', 'DesignersAdminController@create');
Route::get('/panels/AdminPanel/DesignersPanel/{desighnersadminresource}/editDesigner', 'DesignersAdminController@edit');
Route::get('/panels/AdminPanel/DesignersPanel/{clientsadminresource}/Orders', 'DesignersAdminController@orders')->name('designerOrders');
Route::post('/panels/AdminPanel/DesignersPanel/{clientsadminresource}/Order/update', 'DesignersAdminController@updateOrder')->name('updateOrder');
Route::get('/panels/AdminPanel/DesignersPanel/{clientsadminresource}/Challenges', 'DesignersAdminController@challenges')->name('designerChallenges');
Route::post('/panels/AdminPanel/DesignersPanel/{clientsadminresource}/Challenge/update', 'DesignersAdminController@updatechallenge')->name('updatechallenge');
Route::get('/panels/AdminPanel/DesignersPanel/{clientsadminresource}/profile', 'DesignersAdminController@profile')->name('designer.profile');

Route::get('/panels/AdminPanel/DesignersPanel/{clientsadminresource}/Subscription', 'DesignersAdminController@subscription');
//Clients Panel
Route::get('/panels/AdminPanel/clientsPanel', 'ClientsAdminController@index')->name('user.index');
Route::post('/panels/AdminPanel/clientsPanel/changestatus/{id}', 'ClientsAdminController@changeUserStatus')->name('user.changestatus');

Route::get('/panels/AdminPanel/clientsPanel/{clientsadminresource}/Orders', 'ClientsAdminController@orders')->name('userOrders');
Route::post('/panels/AdminPanel/clientsPanel/{clientsadminresource}/Order/update', 'ClientsAdminController@updateOrder')->name('updateOrder2');

Route::get('/panels/AdminPanel/clientsPanel/{clientsadminresource}/Challenges', 'ClientsAdminController@challenges')->name('userChallenges');
Route::post('/panels/AdminPanel/clientsPanel/{clientsadminresource}/Challenge/update', 'ClientsAdminController@updatechallenge')->name('updatechallenge2');

Route::get('/panels/AdminPanel/clientsPanel/{clientsadminresource}/Subscriptions', 'ClientsAdminController@subscription');
Route::get('/panels/AdminPanel/clientsPanel/{clientsadminresource}/profile', 'ClientsAdminController@profile')->name('user.profile');



//General Panel
Route::get('/panels/AdminPanel/generalSettings', 'GeneralSettingsController@index')->name('generalSettings');

Route::post('/panels/AdminPanel/generalSettings/SlideShow', 'GeneralSettingsController@slideShow')->name('slideshow');
Route::post('/panels/AdminPanel/generalSettings/Slide/delete/{id}', 'GeneralSettingsController@deleteslide')->name('deleteslide');

Route::post('/panels/AdminPanel/generalSettings/addblog', 'GeneralSettingsController@addblog')->name('addblog');
Route::post('/panels/AdminPanel/generalSettings/blog/deupdatelete/{id}', 'GeneralSettingsController@updateblog')->name('updateblog');
Route::post('/panels/AdminPanel/generalSettings/blog/delete/{id}', 'GeneralSettingsController@deleteblog')->name('deleteblog');



Route::post('/panels/AdminPanel/generalSettings/TermsAndPolicy', 'GeneralSettingsController@termsandpolicy')->name('termsandpolicy');
Route::post('/panels/AdminPanel/generalSettings/TermsAndPolicy/update/{id}', 'GeneralSettingsController@updateterms')->name('updateterms');


Route::post('/panels/AdminPanel/generalSettings/SocialMedia', 'GeneralSettingsController@socialmedia')->name('socialmedia');
Route::post('/panels/AdminPanel/generalSettings/SocialMedia/delete/{id}', 'GeneralSettingsController@deletesocialmedia')->name('deletesocialmedia');
Route::post('/panels/AdminPanel/generalSettings/aboutus', 'GeneralSettingsController@aboutus')->name('addaboutus');

//Report Panel
Route::get('/panels/AdminPanel/reportsPanel', 'ReportsAdminController@index');
Route::get('/panels/AdminPanel/reportsPanel/{reportadminresource}/show', 'ReportsAdminController@show');
Route::get('/panels/AdminPanel/reportsPanel/{reportadminresource}/showDesigner', 'ReportsAdminController@showdesigner');

//end of admin panels

//Start Designer panels
//Myprofile About & profile images (Designer)
Route::get('/panels/DesignerPanel/MyProfile/about', 'ProfileDesignerController@about')->name('profiledesignerresource.about')->middleware('CheckDesignerType');
Route::get('/panels/DesignerPanel/MyProfile/about/newAbout', 'AboutDesignerController@create')->middleware('CheckDesignerType');
Route::get('/panels/DesignerPanel/MyProfile/about/{aboutdesignerresource}/editAbout', 'AboutDesignerController@edit')->middleware('CheckDesignerType');
Route::get('/panels/DesignerPanel/MyProfile/profileavatar', 'AboutDesignerController@profileavatar')->middleware('CheckDesignerType');
Route::post('/panels/DesignerPanel/MyProfile/profileavatar/add', 'AboutDesignerController@addavatar')->middleware('CheckDesignerType')->name('designer.avatar');
Route::post('/panels/UserPanel/MyProfile/profileavatar/add', 'ProfileUserController@addavatar')->middleware('CheckUserType')->name('user.avatar');

//Myprofile Education (Designer)
//Route::get('/panels/DesignerPanel/MyProfile/education', 'ProfileDesignerController@education')->name('ProfileDesigner.education');
Route::get('/panels/DesignerPanel/MyProfile/education', 'EducationDesignerController@index')->name('ProfileDesigner.education')->middleware('CheckDesignerType');
Route::get('/panels/DesignerPanel/MyProfile/education/newEducation', 'EducationDesignerController@create')->middleware('CheckDesignerType');
Route::get('/panels/DesignerPanel/MyProfile/education/{educationdesignerresource}/editEducation', 'EducationDesignerController@edit')->middleware('CheckDesignerType');

//Myprofile Experience (Designer)
//Route::get('/panels/DesignerPanel/MyProfile/experience', 'ProfileDesignerController@experience')->name('ProfileDesigner.experience');
Route::get('/panels/DesignerPanel/MyProfile/experience', 'ExperienceDesignerController@index')->name('ProfileDesigner.experience')->middleware('CheckDesignerType');
Route::get('/panels/DesignerPanel/MyProfile/experience/newExperience', 'ExperienceDesignerController@create')->middleware('CheckDesignerType');
Route::get('/panels/DesignerPanel/MyProfile/experience/{experiencedesignerresource}/editExperience', 'ExperienceDesignerController@edit')->middleware('CheckDesignerType');

//Myprofile Skills (Designer)
//Route::get('/panels/DesignerPanel/MyProfile/skill', 'ProfileDesignerController@skill')->name('ProfileDesigner.skill');

Route::get('/panels/DesignerPanel/MyProfile/skill', 'SkillDesignerController@index')->name('ProfileDesigner.skill')->middleware('CheckUserType');
Route::get('/panels/DesignerPanel/MyProfile/skill/newSkill', 'SkillDesignerController@create')->middleware('CheckUserType');
Route::get('/panels/DesignerPanel/MyProfile/skill/{skilldesignerresource}/editSkill', 'SkillDesignerController@edit')->middleware('CheckUserType');

//Myprofile Programs (Designer)
//Route::get('/panels/DesignerPanel/MyProfile/program', 'ProfileDesignerController@program')->name('ProfileDesigner.program');
Route::get('/panels/DesignerPanel/MyProfile/program', 'ProgramDesignerController@index')->name('ProfileDesigner.program')->middleware('CheckDesignerType');
Route::get('/panels/DesignerPanel/MyProfile/program/newProgram', 'ProgramDesignerController@create')->middleware('CheckDesignerType');
Route::get('/panels/DesignerPanel/MyProfile/program/{programdesignerresource}/editExperience', 'ProgramDesignerController@edit')->middleware('CheckDesignerType');

//Myprofile WorkingHours (Designer)
//Route::get('/panels/DesignerPanel/MyProfile/workinghours', 'ProfileDesignerController@workinghour')->name('ProfileDesigner.workinghours');
Route::get('/panels/DesignerPanel/MyProfile/workinghours', 'WorkingHourDesignerController@index')->name('ProfileDesigner.workinghours')->middleware('CheckDesignerType');
Route::get('/panels/DesignerPanel/MyProfile/workinghours/newWorkinghour', 'WorkingHourDesignerController@create')->middleware('CheckDesignerType');
Route::get('/panels/DesignerPanel/MyProfile/workinghours/{workinghourdesignerresource}/editWorkinghour', 'WorkingHourDesignerController@edit')->middleware('CheckDesignerType');

//Myprofile Portfolio (Designer)
//Route::get('/panels/DesignerPanel/MyProfile/portfolio', 'ProfileDesignerController@portfolio')->name('ProfileDesigner.portfolio');
Route::get('/panels/DesignerPanel/MyProfile/portfolio', 'PortfolioDesignerController@index')->name('ProfileDesigner.portfolio')->middleware('CheckDesignerType');
Route::get('/panels/DesignerPanel/MyProfile/portfolio/newPortfolio', 'PortfolioDesignerController@create')->middleware('CheckDesignerType');
Route::get('/panels/DesignerPanel/MyProfile/portfolio/{portfoliodesignerresource}/editPortfolio', 'PortfolioDesignerController@edit')->middleware('CheckDesignerType');

//Orders (Designer)
Route::get('/panels/DesignerPanel/Orders', 'OrderDesignerController@index')->middleware('CheckDesignerType')->name('designer.order.index');
Route::get('/panels/DesignerPanel/Orders/MyOrders', 'OrderDesignerController@myorders')->name('order.myorder')->middleware('CheckDesignerType');
Route::get('/panels/DesignerPanel/Orders/MyOrders/{orderdesignerresource}/submitWork', 'OrderDesignerController@edit')->middleware('CheckDesignerType');
Route::get('/panels/DesignerPanel/Orders/{orderdesignerresource}/show', 'OrderDesignerController@show')->name('designer.showorder')->middleware('CheckDesignerType');

//My Clients - Subsecription plans (Designer)
Route::get('/panels/DesignerPanel/AcceptSubscriptionOrders/{id}', 'SubscriptionDesignerController@accept_user_request')->middleware('CheckDesignerType')->name('request.accept');
Route::get('/panels/DesignerPanel/RejectSubscriptionOrders/{id}', 'SubscriptionDesignerController@reject_user_request')->middleware('CheckDesignerType')->name('request.reject');

Route::get('/panels/DesignerPanel/Orders/MyClients', 'SubscriptionDesignerController@myClients')->middleware('CheckDesignerType');
Route::get('/panels/DesignerPanel/MyClients/{orderdesignerresource}/submitWork', 'SubscriptionDesignerController@edit')->middleware('CheckDesignerType');
Route::get('/panels/DesignerPanel/MyClients/{orderdesignerresource}', 'SubscriptionDesignerController@myClientsOrders')->name('myClientsOrders')->middleware('CheckDesignerType');
Route::get('panels/DesignerPanel/MyProfile/packages/{id}/active',[PackagesController::class,'active'])->middleware('CheckDesignerType')->name('package.active');
Route::get('panels/DesignerPanel/MyProfile/packages/{id}/unactive',[PackagesController::class,'unactive'])->middleware('CheckDesignerType')->name('package.unactive');

//Challenges (Designer)
Route::get('/panels/DesignerPanel/Challenges', 'ChallengeDesignerController@index')->name('designer.challenge')->middleware('CheckDesignerType');
Route::get('/panels/DesignerPanel/MyChallenges', 'ChallengeDesignerController@mychallenges')->name('designer.mychallenge')->middleware('CheckDesignerType');
Route::get('/panels/DesignerPanel/Challenges/MyChallenges/{challengedesignerresource}/submitWork', 'ChallengeDesignerController@edit')->name('designer.submitwork')->middleware('CheckDesignerType');
Route::get('/panels/DesignerPanel/Challenges/{challengedesignerresource}/show', 'ChallengeDesignerController@show')->name('designer.showchallenge')->middleware('CheckDesignerType');
Route::get('/panels/DesignerPanel/Challenges/{challengedesignerresource}/subscribe', 'ChallengeDesignerController@subscribe')->name('designer.subscribe')->middleware('CheckDesignerType');
Route::get('/panels/DesignerPanel/Challenges/{challengedesignerresource}/request', 'ChallengeDesignerController@request_to_join_challenge')->name('designer.request')->middleware('CheckDesignerType');

//Favorites (Designer)
Route::get('/panels/DesignerPanel/MyFavorites', 'FavoritesDesignerController@index')->name('designer.favorite')->middleware('CheckDesignerType');

//End Designer panels

//Start User panels
//Myprofile (User)
Route::get('/panels/UserPanel/MyProfile', 'ProfileUserController@index')->name('user.about')->middleware('CheckUserType');
Route::get('/panels/UserPanel/MyProfile/profileavatar', 'ProfileUserController@profileavatar')->middleware('CheckUserType');

//Orders (User)
Route::get('/panels/UserPanel/Orders', 'OrderUserController@index')->middleware('CheckUserType')->name('user.order.index');
Route::get('/panels/UserPanel/Orders/newOrder', 'OrderUserController@create')->middleware('CheckUserType')->middleware('CheckUserType');
Route::get('/panels/UserPanel/Orders/{orderdesignerresource}/editOrder', 'OrderUserController@edit')->middleware('CheckUserType');
Route::get('/panels/UserPanel/Orders/{orderdesignerresource}/show', 'OrderUserController@show')->middleware('CheckUserType');

//Subscription plans (User)
Route::get('/subscriptionplans/{subscriptionuserresource}', 'SubscriptionUserController@show')->middleware('CheckUserType');
Route::post('/subscriptionplans/request', 'SubscriptionUserController@subscribe_package_request')->middleware('CheckUserType')->name('subscribe.request');


//Challenges (User)
Route::get('/panels/UserPanel/Challenges', 'ChallengeUserController@index')->name('user.challenge');
Route::get('/panels/UserPanel/MyChallenges', 'ChallengeUserController@mychallenges')->name('user.mychallenge')->middleware('CheckUserType');
Route::get('/panels/UserPanel/Challenges/newChallenge', 'ChallengeUserController@create')->middleware('CheckUserType');
Route::get('/panels/UserPanel/Challenges/{challengeuseresource}/editChallenge', 'ChallengeUserController@edit')->name('user.editchallenge')->middleware('CheckUserType');
Route::get('/panels/UserPanel/Challenges/{challengeuseresource}/show', 'ChallengeUserController@show')->name('user.showchallenge');
Route::post('/panels/UserPanel/Challenges/{challengeuseresource}/rank', 'ChallengeUserController@rank')->name('user.putrank')->middleware('CheckUserType');
Route::get('/panels/UserPanel/Challenges-request/{challengeuseresource}/reject', 'ChallengeUserController@reject_challenge_request')->name('order.reject');
Route::get('/panels/UserPanel/Challenges-request/{challengeuseresource}/accept', 'ChallengeUserController@accept_challenge_request')->name('order.accept');

//My Designers (User)
Route::get('/panels/UserPanel/MyDesigners', 'SubscriptionUserController@myDesigners')->middleware('CheckUserType');
Route::get('/panels/UserPanel/MyFavoritesDesigners', 'FavoritesUserController@Designers')->middleware('CheckUserType')->name('MyFavoritesDesigners');
Route::get('/panels/UserPanel/MyFavoritesDesigners/add/{id}', 'FavoritesUserController@addToFavorite')->middleware('CheckUserType')->name('user.addToFavorite');
Route::get('/panels/UserPanel/MyFavoritesDesigners/remove/{id}', 'FavoritesUserController@removeFromFavorite')->middleware('CheckUserType')->name('user.removeFromFavorite');

Route::get('/panels/UserPanel/MyDesigners/{subscriptionuserresource}', 'SubscriptionUserController@myDesignersOrders')->name('myDesignersOrders')->middleware('CheckUserType');

//Favorites (User)
Route::get('/panels/UserPanel/MyFavorites', 'FavoritesUserController@index')->name('user.favorite')->middleware('CheckUserType');
//End User panels

//Start Notifications & Messages panels
Route::get('/panels/Notifications', 'NotificationController@index');
Route::get('/panels/Messages', 'MessagesController@index');
//End Notifications & Messages panels

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('home', 'HomeController');
//Admin Controllers
Route::resource('desighnersadminresource', 'DesignersAdminController');
Route::resource('clientsadminresource', 'ClientsAdminController');
Route::resource('generaladminresource', 'GeneralSettingsController');
Route::resource('reportadminresource', 'ReportsAdminController');

//Designer Controllers
Route::resource('profiledesignerresource', 'ProfileDesignerController')->middleware('CheckDesignerType');
Route::resource('aboutdesignerresource', 'AboutDesignerController')->middleware('CheckDesignerType');
Route::resource('educationdesignerresource', 'EducationDesignerController')->middleware('CheckDesignerType');
Route::resource('experiencedesignerresource', 'ExperienceDesignerController')->middleware('CheckDesignerType');
Route::resource('skilldesignerresource', 'SkillDesignerController')->middleware('CheckDesignerType');
Route::resource('programdesignerresource', 'ProgramDesignerController')->middleware('CheckDesignerType');
Route::resource('workinghourdesignerresource', 'WorkingHourDesignerController')->middleware('CheckDesignerType');
Route::resource('portfoliodesignerresource', 'PortfolioDesignerController')->middleware('CheckDesignerType');
Route::resource('orderdesignerresource', 'OrderDesignerController')->middleware('CheckDesignerType');
Route::resource('subscriptiondesignerresource', 'SubscriptionDesignerController')->middleware('CheckDesignerType');
Route::resource('challengedesignerresource', 'ChallengeDesignerController')->middleware('CheckDesignerType');
Route::resource('favoritesdesignerresource', 'FavoritesDesignerController')->middleware('CheckDesignerType');

//User Controllers
Route::resource('profileuserresource', 'ProfileUserController')->middleware('CheckUserType');
Route::resource('orderuserresource', 'OrderUserController')->middleware('CheckUserType');
Route::resource('subscriptionuserresource', 'SubscriptionUserController')->middleware('CheckUserType');
Route::resource('challengeuseresource', 'ChallengeUserController')->middleware('CheckUserType');
Route::resource('favoritesuseresource', 'FavoritesUserController')->middleware('CheckUserType');
Route::get('/store', 'SubscriptionUserController@create')->middleware('CheckUserType');
Route::post('/order/{id}/reviews', [EvaluationController::class,'order_create'])->name('order.reviews')->middleware('CheckUserType');
Route::post('/challege/{id}/reviews', [EvaluationController::class,'challenge_create'])->name('challenge.reviews')->middleware('CheckUserType');
Route::post('/subscriptions/{id}/reviews', [EvaluationController::class,'suborder_create'])->name('sub.reviews')->middleware('CheckUserType');


Route::post('/challenge/comment', [CommentController::class,'comment'])->name('comment')->middleware('auth');
Route::post('/challenge/reply', [CommentController::class,'reply'])->name('reply')->middleware('auth');

Route::post('/challenge/comment/delete/{id}', [CommentController::class,'comment'])->name('comment')->middleware('auth');
Route::post('/challenge/reply/delete/{id}', [CommentController::class,'reply'])->name('reply')->middleware('auth');

Route::post('/challenge/comment/delete/{id}', [CommentController::class,'deletecomment'])->name('deletecomment')->middleware('auth');
Route::post('/challenge/reply/delete/{id}', [CommentController::class,'deletereply'])->name('deletereply')->middleware('auth');
Route::post('/challenge/like', [LikeController::class,'like'])->name('like')->middleware('auth');
Route::post('/challenge/dislike', [LikeController::class,'dislike'])->name('dislike')->middleware('auth');
Route::get('/challenge/favorite/{id}', [ChallengeUserController::class,'favorite'])->name('favorite')->middleware('auth');
Route::get('/challenge/unfavorite/{id}', [ChallengeUserController::class,'unfavorite'])->name('unfavorite')->middleware('auth');


Route::get('subscribe/{id}/newOrder',[SubOrdersUserController::class,'add'])->name('sub.newOrder');
Route::post('subscribe/{id}/storeOrder',[SubOrdersUserController::class,'store'])->name('sub.store');
Route::get('subscribe/{id}/show-order',[SubOrdersUserController::class,'show'])->name('sub.show');
Route::get('subscribe/{id}/edit-order',[SubOrdersUserController::class,'edit'])->name('sub.edit');
Route::post('subscribe/{id}/updateOrder',[SubOrdersUserController::class,'update'])->name('sub.update');
Route::post('subscribe/{id}/check-work',[SubOrdersUserController::class,'check_work'])->name('sub.check');





//Notification & Messages Controllers
Route::resource('notificationresource', 'NotificationController')->middleware('auth');
Route::get('/notification/markAsRead',[NotificationController::class,'asread'])->middleware('auth')->name('not.asread');


Route::post('/order/designer/search',[SearchController::class,'search'])->name('search');
Route::post('/chat-search',[SearchController::class,'chat_search'])->name('chat-search');

Route::post('/order-work/designer/store/{id}',[OrderWorkController::class,'store'])->middleware('CheckDesignerType')->name('work.store');

Route::post('/order-work/user/store/{id}',[OrderUserController::class,'work_user'])->middleware('CheckUserType')->name('user.work');
Route::get('/messenger/{id?}', [MessengerController::class,'index'])->middleware('auth')->name('messenger');

Route::post('/a',[ChallengeUserController::class,'a']);
Route::get('/delete-file', [ChallengeUserController::class,'delete_file'])->middleware('auth');
