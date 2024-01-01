<?php



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mywebcontroller;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ProductCategoryController;


use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\SubActivityController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\PostReportController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\Admin\AdminAuthController;

Route::get('/', function(){
	return view('welcome');
    //return ('welcome mr Abdul jaleel');
});
Route::get('/terms', function(){
	return view('terms');
    //return ('welcome mr Abdul jaleel');
});
Route::get('/userguide', function(){
    return view('userguide');
    //return ('welcome mr Abdul jaleel');
});
Route::get('/printdata', function(){
    return view('my_print_data');
    //return ('welcome mr Abdul jaleel');
});
Route::get('/support', function(){
	return view('support');
    //return ('welcome mr Abdul jaleel');
});
//RAQ
Route::get('/faq', 'AdminController@faq');





Route::get('/testjson', 'Mywebcontroller@readjson');
Route::post('/contactSubmt', 'ContactController@contactPost');

Route::group(['prefix' => 'business', 'as' => 'business.'], function () {

    Route::get('/filter/{by}/{bid}', 'BusinessController@getAllBusiness');
    Route::get('/filter/{by}/{bid}/{country}', 'BusinessController@getAllBusiness_list');

    Route::get('/{BID}', 'BusinessController@getBusinessByBID');

    Route::post('/', 'BusinessController@createNewBusiness');
    Route::get('subActivity/{subActivityId}', 'BusinessController@getBusinessBySubActivity');
    Route::get('mainActivity/{mainActivityId}', 'BusinessController@getBusinessByMainActivity');

    Route::get('activity/businessrandom', 'BusinessController@getBusinessRandomCategory');
    Route::get('activity/businessrandom/{country_code}', 'BusinessController@getBusinessRandomCategory_list');

    Route::post('businessupdate', 'BusinessController@updateBusiness');
    Route::post('login', 'BusinessController@login');

    Route::post('verify_email_address', 'BusinessController@verify_email_url');
    Route::get('verify_email_address/{BID}', 'BusinessController@email_verified');
    Route::post('resetpassword', 'BusinessController@resetpassword');
    Route::get('resetpassword/{BID}', 'BusinessController@reset_page');

    Route::post('updatestatus', 'BusinessController@updateBusinessStatus');

    Route::post('update_business_token', 'BusinessController@update_business_token');
    Route::post('update_business_location', 'BusinessController@update_business_location');

    Route::get('businesslist/getall', 'BusinessController@getAllBusinessDashboard');
    Route::post('/deleteBusiness/{bid}', 'BusinessController@deleteBusiness');
    Route::get('/member_profile/{BID}', 'BusinessController@single_business');
    Route::get('report_business/{BID}', 'BusinessController@reportBuisinessByBID');
    Route::post('member/change_password', 'BusinessController@change_password');
    Route::post('/deleteAccount', 'BusinessController@deleteAccount');

    Route::get('country_wise/get_count', 'SearchController@getBusinessCountCountryWise');

    Route::post('member/createNewBusinessStepFirst', 'BusinessController@createNewBusinessStepFirst');


});

Route::group(['prefix' => 'post', 'as' => 'post.'], function ()
{

    Route::get('/postform', 'PostController@index');
    Route::get('/', 'PostController@getAllPostRandom');
   // Route::get('/filterpost/{}', 'PostController@getAllPostRandom');
    Route::get('/productadd', 'PostController@productaddForm');
	Route::get('/postcategory', 'PostController@getPostCategory');
    Route::get('/deleteimg', 'PostController@removeImage');
    Route::post('/create', 'PostController@createPost');
    Route::post('/postupdate', 'PostController@editpost');
    Route::post('/editpoststatus', 'PostController@editpoststatus');
    Route::post('/postfilter', 'PostController@getSearchFilter');
    Route::post('/postreport', 'PostReportController@createReport');
    Route::post('/getAllPostReport', 'PostReportController@getAllPostReport');
    Route::post('/getAllPostWithReportCount', 'PostController@getAllPostWithReportCount');
    Route::post('delete_post', 'PostController@delete_post');
    Route::get('get_single_post/{pid}', 'PostController@get_single_post');
    Route::get('needs/{BID}', 'PostController@getAllNeedsByBid');
    Route::get('/livefeeds/{BID}', 'FollowingController@getAllFollowingByBid');
    Route::get('post_single/{pid}', 'PostController@single_post_dashboard');

    Route::get('/get_latest_post', 'PostController@get_latest_post');



});
Route::group(['prefix' => 'email', 'as' => 'email.'], function ()
{
Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');
Route::post('send_mail','MailController@send_mail');
Route::post('add_email_attatchments','MailController@my_email_uploads');

});

Route::group(['prefix' => 'advertisement', 'as' => 'advertisement.'], function ()
{
Route::get('get_adds_category','AdvertisementController@get_adds_category');
Route::get('get_All_Adds','AdvertisementController@get_All_Adds');
Route::get('get_All_Adds/{country}','AdvertisementController@get_All_Adds');
Route::post('create_add','AdvertisementController@create_add');
Route::post('change_adds_status','AdvertisementController@change_adds_status');
Route::post('delete_Advertisement','AdvertisementController@delete_Adds');
});

Route::group(['prefix' => 'questuser', 'as' => 'questuser.'], function ()
{
Route::post('create_guest_user','QuestUserController@create');
Route::post('get_all_guest_users','QuestUserController@get_all_guest_users');
Route::post('editgueststatus','QuestUserController@editgueststatus');

Route::post('delete_guest_user','QuestUserController@delete_guest_user');
Route::post('guest_login','QuestUserController@guest_login');
Route::post('regenerate_otp','QuestUserController@regenerate_otp');

});



Route::group(['prefix' => 'following', 'as' => 'following.'], function ()
{

    Route::post('/addFollowing', 'FollowingController@createFollowing');

    //Route::get('/addFollowing/{BID}/{follows}/{satus}', 'FollowingController@addFolowStatus');

    Route::post('/unfollow', 'FollowingController@unFollow');
    Route::get('/getFollowing', 'FollowingController@getAllFollowing');
    Route::get('/livefeeds/{BID}', 'FollowingController@getAllFollowingByBid');

});

Route::group(['prefix' => 'product', 'as' => 'product.'], function () {

    Route::get('/', 'ProductController@getAllProductRandom');
    Route::get('view_product/{pid}', 'ProductController@single_product_dashboard');
    Route::get('/pages/{start_from}/{per_page}', 'ProductController@getAllProductPaginated');
    Route::get('/{BID}', 'ProductController@getBusinessByBid');
    Route::post('/create', 'ProductController@createProduct');
    Route::post('/add_product_images', 'ProductController@add_product_images');
    Route::delete('/{productId}', 'ProductController@deleteProduct');

    Route::put('/{pid}', 'ProductController@updateProduct');
    Route::get('subCategory/{subcategoryId}', 'ProductController@getProductBySubcategory');
    Route::get('delete_product/{pid}', 'ProductController@deleteProduct');
    Route::get('delete_product_images/{pid}', 'ProductController@deleteProductImages');

    Route::get('mainCategory/{categoryId}', 'ProductController@getProductByCategory');

    Route::get('/businessrandom', 'ProductController@getBusinessRandomCategory');
    Route::post('/updateproductstatus', 'ProductController@editproductstatus');

    Route::post('/updateproduct', 'ProductController@updateProductDashboard');

    Route::get('productlist/getAllProducts', 'ProductController@getAllProducts');

});

Route::group(['prefix' => 'activity', 'as' => 'activity.'], function () {
    Route::get('/', 'ActivityController@getAll');

    Route::post('/', 'ActivityController@create');

//    Route::post('/create', 'ProductController@createProduct');

    Route::delete('/{productId}', 'ProductController@deleteProduct');

    Route::put('/{pid}', 'ProductController@updateProduct');
});

Route::group(['prefix' => 'subactivity', 'as' => 'activity.'], function () {
    Route::get('/', 'SubActivityController@getAll');

    Route::post('/', 'SubActivityController@create');
    Route::post('/editsubactivity', 'SubActivityController@editsubactivity');

    Route::post('/deleteItem/{id}', 'SubActivityController@deleteItem');


//    Route::post('/create', 'ProductController@createProduct');

    Route::delete('/{productId}', 'ProductController@deleteProduct');


});
Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {     //''uploadTradeLicence
    Route::get('/{BID}', 'AuthController@getBusinessTradeLicence');

    Route::post('/', 'AuthController@uploadTradeLicence');
});

/*Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {     //''uploadTradeLicence
    Route::get('/{BID}', 'AuthController@getBusinessTradeLicence');

    Route::post('/', 'AuthController@uploadTradeLicence');
});*/

Route::group(['prefix' => 'category', 'as' => 'category.'], function ()
{     //''uploadTradeLicence

    Route::get('/', 'ProductCategoryController@getMainCategories');
    Route::post('/', 'ProductCategoryController@createCategory');
    Route::get('/getMainCategoriesWithSubCount', 'ProductCategoryController@getMainCategoriesWithSubCount');


});




Route::group(['prefix' => 'chat', 'as' => 'chat.'], function ()
{     //''uploadTradeLicence
    Route::post('/addMessages', 'ChatController@addMessages');
    Route::post('/getMessages', 'ChatController@getMessages');
    Route::post('/setSceneStatus', 'ChatController@setSceneStatus');
    Route::post('/setMessageStatus', 'ChatController@setMessageStatus');
    Route::post('/getChatUserList', 'ChatController@getChatUserList');
    Route::post('/setSocket', 'ChatController@setSocket');
    Route::get('/sendChatNotification/{bid}/{msg}/{from_bid}', 'AdminController@sendChatNotification');
    Route::post('/get_Group_List', 'ChatController@get_Group_List');
    Route::post('/get_Group_List_with_count', 'ChatController@get_Group_List_with_count');
    Route::post('/addAttachments', 'ChatController@uploadChatAttachments');

});

Route::group(['prefix' => 'subcategory', 'as' => 'subcategory.'], function ()
{     //''uploadTradeLicence

    Route::get('/EditSubCategory/{id}', 'SubCategoryController@EditSubCategory');
    Route::get('/', 'SubCategoryController@getSubCategory');
    Route::post('/', 'SubCategoryController@createSubCategory');
    Route::post('/editsubcategory', 'SubCategoryController@editsubcateg');
    Route::post('/deleteSubCategory/{category_id}', 'SubCategoryController@deleteSubCategory');


});
Route::group(['prefix' => 'quotation', 'as' => 'quotation.'], function ()
{     //''uploadTradeLicence
    Route::get('/generate_quotation/{qid}', 'QuotationController@generateQuotation');
    Route::post('/', 'QuotationController@create_quotation');
    Route::post('/get_all_quotes', 'QuotationController@getQuotationList');
    Route::post('/get_quotes/{BID}', 'QuotationController@getQuotationList_BID');
    Route::post('/delete_quote', 'QuotationController@delete_quote');
    Route::post('/edit_quote_status', 'QuotationController@edit_quote_status');
    Route::get('/{qid}', 'QuotationController@generateQuotation');
});

Route::group(['prefix' => 'search', 'as' => 'search.'], function ()
{     //''uploadTradeLicence

    Route::post('/searchall', 'SearchController@getSearchFilter1');
    Route::post('/searchall_test', 'SearchController@getSearchFilter');
    Route::post('/getBusiness_Search', 'SearchController@getBusinessDashboard_Search');
    Route::post('/getProducts_Search', 'SearchController@getProductsDashboard_Search');
    Route::get('/getBusinessInfo', 'SearchController@getBusinessInfo');
    Route::get('/getSubActivities', 'SearchController@getBusinessActivity');
    Route::get('/getBusinessCountry', 'SearchController@getBusinessCountry');
    Route::get('/getBusinessCity', 'SearchController@getBusinessCity');

    Route::post('/get_subactivity_summary', 'SearchController@get_subactivity_summary');
    Route::post('/get_subactivity_list', 'SearchController@getSubCategory_dashboard');
    Route::post('/get_All_Adds', 'SearchController@get_All_Adds');

    Route::get('get_adds_category','AdvertisementController@get_adds_category');
    Route::get('get_general_parameters','SearchController@get_general_parameters');
    Route::get('approve/{tbl}','SearchController@approve_pending');
    Route::get('changelog/{bid}','SearchController@changeLogStatus');
    Route::post('/getBusiness_With_Token', 'SearchController@getBusiness_with_token');
    Route::get('get_faqs','SearchController@get_faqs');

    Route::get('/{page_type}/{start_from}/{per_page}/{filter_text}', 'SearchController@getAllProductPaginatedWithFilter');

    Route::post('/searchallpaginated', 'SearchController@getSearchAllPaginatedFilter');
    Route::post('/getMyNearPlaces', 'SearchController@getMyNearPlaces');
    Route::post('/getMyPlaceInfo', 'SearchController@getMyPlaceInfo');

    Route::get('/single_product/{pid}','SearchController@getSingleProduct');
    Route::get('/single_livefeed/{pid}','SearchController@getSingleFeed');
    Route::get('/getCollaborated/{bid}','SearchController@activeCollaboration');

    Route::get('/activity_info/{activityid}', 'SearchController@getActivityInfo');



});

Route::group(['prefix' => 'notification', 'as' => 'notification.'], function ()
{
    Route::post('/general_alert_notification', 'AdminController@general_alert_notification');
    Route::get('get_notifications','NotficationController@getNotifications');
    Route::get('get_tokens','NotficationController@get_sms_token_etisalat');
    Route::post('get_notifications_bymember','NotficationController@getNotificationsByMember');
    Route::post('test_sms','NotficationController@send_sms_test');
    Route::post('generateMessges','NotficationController@generateMessges');
    Route::post('test_sms_url','NotficationController@send_sms_url');

});
Route::group(['prefix' => 'businesscontact', 'as' => 'businesscontact.'], function ()
{
    Route::post('contactManage','ContactController@createContact');
    Route::post('getContactByID','ContactController@getContactByID');
    Route::post('getSMSMessageReport','ContactController@getSMSMessageReport');

});
Route::group(['prefix' => 'collabpayment', 'as' => 'collabpayment.'], function ()
{
    Route::post('makePayment','PaymentController@makePayment');


});
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');

    Route::group(['middleware' => 'adminauth'], function () {
        Route::get('/', function () {
            return view('adminhome');
        })->name('adminDashboard');

    });
});
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function ()
{

	Route::get('/home', 'AdminController@index');
    Route::get('/login', 'AdminController@login');
    Route::get('/logout ', 'AdminController@logout');
    Route::post('/userValidate ', 'AdminController@userValidate');
    Route::post('/register ', 'AdminController@register');
    Route::get('/productlist', 'AdminController@product');
    Route::get('/businesslist', 'AdminController@businessList');
    Route::get('/subactivityform', 'AdminController@subactivity');
    Route::get('/add_activity', 'AdminController@add_activity');
    Route::get('/addcategory', 'AdminController@addcategory');

    Route::get('/subactivitylist', 'AdminController@subactivitylist');
    Route::get('/activitylist', 'AdminController@activitylist');
    Route::get('/categorylist', 'AdminController@categorylist');
    Route::get('/subcategorylist', 'AdminController@subcategorylist');
    Route::get('/subactivityEdit/{SID}', 'AdminController@Edit');
    Route::get('/terms', 'AdminController@terms');
    Route::get('/support', 'AdminController@support');
    Route::get('/addcategory', 'AdminController@addcategory');
    Route::get('/addsubcategory', 'AdminController@addsubcategory');
    Route::get('/postlist', 'AdminController@postlist');
    Route::get('/2805', 'AdminController@logintest');
    Route::get('/postcategorylist', 'AdminController@postcategorylist');
    Route::get('/addpostcategory', 'AdminController@addpostcategory');
    Route::get('/getHomeCounter', 'AdminController@getHomeCounter');
    Route::get('/productlist', 'AdminController@productlist');
    Route::get('/postreportlist', 'AdminController@postreportlist');
    Route::get('/composemail', 'AdminController@composemail');
    Route::get('/create_user', 'AdminController@create_user');
    Route::get('/add_advertisement', 'AdminController@add_advertisement');
    Route::get('/subactivity_summary', 'AdminController@subactivity_summary');
    Route::get('/adds_category', 'AdminController@advertisement_category');
    Route::get('/addlist', 'AdminController@addlist');
    Route::get('/parameter_list', 'AdminController@parameter_list');
    Route::get('/approval_list', 'AdminController@approval_list');
    Route::get('/generate_notification', 'AdminController@generate_notification');
    Route::get('/rfq_list', 'AdminController@rfq_list');

    Route::post('/sendNotification', 'AdminController@sendNotification');
    Route::post('/save-token', 'AdminController@saveToken');

    Route::get('/guest_list', 'AdminController@guest_list');
    Route::get('/guest_create', 'AdminController@guest_create');
    Route::get('/create_chat_group', 'AdminController@create_group');
    Route::get('/add_group_member', 'AdminController@add_group_member');
    Route::get('/chat_group_list', 'AdminController@chat_group_list');



   });
