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
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\VisitorsController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AmenitiesController;
use App\Http\Controllers\SecretoryController;
use App\Http\Controllers\SocietyController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\admcontroller;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CheckoutController;


use App\Http\Controllers\CommentsController;
use App\Http\Controllers\RepliesController;




// Route::get('/', function () {
//     return view('welcome');
// });
Route::view('/', 'welcome');
Auth::routes(['verify'=>true]);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::get('/login/watchman', [LoginController::class,'showWatchmanLoginForm']);

Route::get('/login/superadmin', [LoginController::class, 'showSuperadminLoginForm']);
Route::get('/login/secretary', [LoginController::class, 'showSecretaryLoginForm']);
Route::get('/login/treasurer', [LoginController::class, 'showTreasurerLoginForm']);

Route::get('/register/admin', [RegisterController::class,'showAdminRegisterForm']);
Route::get('/register/watchman', [RegisterController::class,'showWatchmanRegisterForm']);

// Route::get('/register/superadmin', [RegisterController::class,'showSuperadminRegisterForm']);
Route::get('/register/secretary', [RegisterController::class,'showSecretaryRegisterForm']);
Route::get('/register/treasurer', [RegisterController::class,'showTreasurerRegisterForm']);

Route::post('/login/admin', [LoginController::class,'adminLogin']);
Route::post('/login/watchman', [LoginController::class,'watchmanLogin']);

Route::post('/login/superadmin', [LoginController::class,'superadminLogin']);
Route::post('/login/secretary', [LoginController::class,'secretaryLogin']);
Route::post('/login/treasurer', [LoginController::class,'treasurerLogin']);

Route::post('/register/admin', [RegisterController::class,'createAdmin']);
Route::post('/register/watchman', [RegisterController::class,'createWatchman']);

Route::post('/register/superadmin', [RegisterController::class,'createSuperadmin']);
Route::post('/register/secretary', [RegisterController::class,'createSecretary']);
Route::post('/register/treasurer', [RegisterController::class,'createTreasurer']);

Route::group(['middleware' => 'auth:watchman'], function () {
    Route::view('/watchman', 'watchman');

    Route::get('/watchman', [VisitorsController::class, 'displaysocietynametowatchman']);
    
    Route::view('/watchman-amenities', 'watchman-amenities');
    Route::view('/visitors_entryform', 'visitors/visitors_entryform');
    Route::view('/visitors_exitform', 'visitors/visitors_exitform');
    Route::view('/visitors_record', 'visitors/visitors_record');
    Route::view('/staffs_record', 'staff/staffs_record');

    Route::post('/visitorsform',[VisitorsController::class, 'AddVisitors']);
    
    Route::view('/testvisitors', 'visitors/testvisitors');
    // Route::get('testvisitors',[VisitorsController::class, 'ShowtestVisitors']);

    Route::get('visitors_record',[VisitorsController::class, 'ShowVisitors']);
    Route::get('staffs_record',[StaffController::class, 'ShowStaffs']);
    Route::get('/visitors_entryform', [VisitorsController::class, 'show_flatusername']);
    
    

    Route::view('/staff_register', 'staff/staff_register');
    Route::post('/staff_register',[StaffController::class, 'register']);
    Route::view('/staff_entryform', 'staff/staff_entryform');
    Route::post('/staff_entryform', [StaffController::class, 'Staff_attendance']);
    Route::view('/staffattendance', 'staff/staffattendance');
    Route::get('/staffattendance',[StaffController::class, 'showstaffattendance']);

    Route::view('/member_entryform', 'member/member_entryform');
    Route::view('/member_record', 'member/member_record');
    Route::get('/member_record',[MemberController::class, 'showmemberentryrecord']);
    
    Route::post('/member_entryform', [MemberController::class, 'Member_Entry']);

    Route::view('/display-gym', 'watchman/display-gym');
    Route::get('/display-gym',[AmenitiesController::class, 'showgymforwatchman']);
    
    Route::get('edit/{id}',[VisitorsController::class, 'showData']);
    Route::post('edit',[VisitorsController::class, 'Update']);
    
    Route::view('staff_exit', 'staff/staff_exit');
    Route::get('staff_exit/{id}',[StaffController::class, 'showData']);
    Route::post('staff_exit',[StaffController::class, 'Update']);

    Route::view('member_exit', 'member/member_exit');
    Route::get('member_exit/{id}',[MemberController::class, 'showData']);
    Route::post('member_exit',[MemberController::class, 'Update']);
    
});

Route::group(['middleware' => 'auth:admin'], function () {
    Route::view('/admin', 'admin/admin');
   
    Route::view('/amenities', 'admin/amenities');

    Route::view('/admin-maintenance', 'admin/admin-maintenance');
    Route::get('/admin-maintenance', [MaintenanceController::class, 'show_username']);
    Route::view('/all_amenity_bookings', 'admin/all_amenity_bookings');
    Route::view('/allnotices_admin', 'admin/allnotices_admin');

    Route::get('/admin', [VisitorsController::class, 'displayonadmin']);
    Route::post('/amenities',[AmenitiesController::class, 'RegisterAmenity']);
    Route::get('/amenities',[AmenitiesController::class, 'ShowAmenities']);

    Route::get('/all_amenity_bookings',[AmenitiesController::class, 'ShowAmenitybookingstoAdmin']);
    

    Route::view('/flat_management', 'admin/flat_management');
    Route::view('/admin-parking', 'admin/admin-parking');
    
    Route::view('/usercomplaints1', 'admin/usercomplaints1');
    Route::get('/usercomplaints1',[ComplaintController::class, 'displayonadmin']);
    Route::view('/solve1', 'admin/solve1');
    Route::get('solve1/{id}',[ComplaintController::class, 'showData1']);
    Route::post('solve1', [ComplaintController::class, 'update']);
    Route::view('/view1', 'admin/view1');
    Route::get('/view1/{id}',[ComplaintController::class, 'userdetails']);
    
    Route::view('/notice', 'admin/notice');
    Route::post('/notice', [NoticeController::class, 'addData']);
    Route::get('/notice_list', [NoticeController::class, 'show']);
    Route::get('/allnotices_admin', [NoticeController::class, 'displayallnoticestoadmin']);

    Route::get('/allmeetings_admin', [NoticeController::class, 'displayallmeetingstoadmin']);
    
    // Route::view('/create', 'document/create');
    Route::get('/files/create',[DocumentController::class, 'create']);
    Route::post('/files',[DocumentController::class, 'store']);

    Route::get('/flat_management',[SocietyController::class, 'display_flatinfo_toAdmin']);

    //flat management on admin login
    Route::get('/flat_management',[admcontroller::class, 'showflatinfotoadmin']);
    Route::get('delete/{id}',[admcontroller::class, 'delete']);
    Route::get('edit1/{id}',[admcontroller::class, 'showData']);
    Route::post('edit1',[admcontroller::class, 'update']);

    Route::post('admin-maintenance',[MaintenanceController::class, 'AddMaintenance']);
    Route::view('/allbills_admin', 'admin/allbills_admin');
    
    Route::view('/accounts', 'admin/accounts');
    Route::view('/member_reports', 'admin/member_reports');
    Route::get('/member_reports',[admcontroller::class, 'MemberReportOnAdmin']);
    
    Route::view('/staff_reports', 'admin/staff_reports');
    Route::get('/staff_reports',[StaffController::class, 'StaffReportOnAdmin']);
    
    Route::view('/visitor_reports', 'admin/visitor_reports');
    Route::get('/visitor_reports',[VisitorsController::class, 'ShowVisitors2']);
    
    Route::view('/complaints_report', 'admin/complaints_report');
    Route::get('/complaints_report',[ComplaintController::class, 'Complaint_Report']);
    
    // Route::get('/admin', [SocietyController::class, 'Show_SocietyName']);
});

Route::group(['middleware' => 'auth:superadmin'], function () {
    Route::view('/superadmin', 'superadmin/superadmin');
    Route::view('/registersociety', 'superadmin/registersociety');
    Route::post('/registersociety',[SocietyController::class, 'AddSociety']);
    Route::get('/registersociety',[SocietyController::class, 'display_registered_societies']);
    
    
});

Route::group(['middleware' => 'auth:secretary'], function () {
    Route::view('/secretary', 'secretary/secretary');
    Route::view('/secretary-notice', 'secretary/secretary-notice');
    Route::view('/schedule-meeting', 'secretary/schedule-meeting');
    Route::post('/secretary-notice',[NoticeController::class, 'addNotice']);
    Route::get('/secretary-notice',[NoticeController::class, 'displaytosecretarynotice']);
    Route::post('/schedule-meeting',[NoticeController::class, 'ScheduleMeeting']);
    Route::get('/schedule-meeting',[NoticeController::class, 'displaymeetingstosecretary']);
    
    Route::view('/usercomplaints2', 'secretary/usercomplaints2');
    Route::view('/usercomplaints2', 'secretary/usercomplaints2');
    Route::get('/usercomplaints2',[ComplaintController::class, 'displayonsecretary']);
    Route::get('solve2/{id}',[ComplaintController::class, 'showData2']);
    Route::post('solve2', [ComplaintController::class, 'update2']);
    Route::get('/view2/{id}',[ComplaintController::class, 'userdetails1']);
    Route::view('/minutesofmeeting', 'secretary/minutesofmeeting');
    Route::get('/minutesofmeeting',[NoticeController::class, 'displaymeetingstosecretary1']);
    Route::get('/editMeetings/{id}',[NoticeController::class, 'edit2']);
    Route::post('/editMeetings',[NoticeController::class, 'ScheduleMeeting2']);

    //Reports...
    Route::view('/secretary_report', 'secretary/secretary_report');
    Route::get('/secretary_report',[NoticeController::class, 'displaymeetingstosecretary2']);
});

Route::group(['middleware' => 'auth:treasurer'], function () {
    Route::view('/treasurer', 'treasurer');
    Route::view('/treasurer-notice', 'treasurer/treasurer-notice');
    Route::view('/transactions', 'treasurer/transactions');
    Route::view('/sinking_funds', 'treasurer/sinking_funds');
    Route::view('/transaction_reports', 'treasurer/transaction_reports');
    

    Route::post('/treasurer-notice',[NoticeController::class, 'addNotice1']);
    Route::get('/treasurer-notice',[NoticeController::class, 'displaytotreasurernotice']);

    Route::view('/usercomplaints', 'treasurer/usercomplaints');
    Route::get('/usercomplaints',[ComplaintController::class, 'displayontreasurer']);
    Route::get('solve/{id}',[ComplaintController::class, 'showData3']);
    Route::post('solve', [ComplaintController::class, 'update3']);
    Route::get('/view/{id}',[ComplaintController::class, 'userdetails2']);

    
});

Route::get('logout', [LoginController::class,'logout']);

// for three welcome pages
Route::view('/security-management', 'welcome-pages/security-management');
 Route::view('/financial-management', 'welcome-pages/financial-management');
 Route::view('/community-management', 'welcome-pages/community-management');
 Route::view('/Why_view', 'welcome-pages/Why_view');
 Route::view('/Aboutus_view', 'welcome-pages/Aboutus_view');
 Route::view('/Account_view', 'welcome-pages/Account_view');
 Route::view('/Amenities_view', 'welcome-pages/Amenities_view');
 Route::view('/Communication_view', 'welcome-pages/Communication_view');
 Route::view('/Complaint_view', 'welcome-pages/Complaint_view');
 Route::view('/Dailystaff_view', 'welcome-pages/Dailystaff_view');
 Route::view('/DataProtection_view', 'welcome-pages/DataProtection_view');
 Route::view('/Delivery_view', 'welcome-pages/Delivery_view');
 Route::view('/FAQ_view', 'welcome-pages/FAQ_view');
 Route::view('/Helpdesk_view', 'welcome-pages/Helpdesk_view');
 Route::view('/PrivacyFaq_view', 'welcome-pages/PrivacyFaq_view');
 Route::view('/PrivacyPolicy_view', 'welcome-pages/PrivacyPolicy_view');
 Route::view('/Visitor_view', 'welcome-pages/Visitor_view');


 Route::get('/home', [VisitorsController::class, 'displayonhome']);
 
 
 Route::view('/amenity_bookings', 'amenity_bookings');
 
 Route::view('/display_booking_amenity', 'display_booking_amenity');
 Route::get('/amenity_bookings', [AmenitiesController::class, 'amenity_list']);
 Route::post('/amenity_bookings',[AmenitiesController::class, 'amenity_booking']);
 Route::get('/display_booking_amenity',[AmenitiesController::class, 'display_booking_amenity']);
 Route::get('/amenity_bookings',[AmenitiesController::class, 'display_bookingson_user']);

 Route::get('/allnotices_member', [NoticeController::class, 'displayallnoticestomember']);
 Route::get('/allmeetings_member', [NoticeController::class, 'displayallmeetingstomember']);










Route::view('parking','parking/parking');

Route::view('maintenance','maintenance/maintenance');
Route::get('maintenance', [MaintenanceController::class, 'displaymonthlybilltouser']); 


Route::view('confirm','auth/passwords/confirm');

Route::view('test','test');

Route::view('complaints','complaints/complaints');
Route::post('complaints',[ComplaintController::class,'addData']);
Route::get('complaints', [ComplaintController::class, 'displayonuser']); 

Route::view('shopping','shopping/shopping');

Route::get('/files/{id}',[DocumentController::class, 'show']);
Route::get('/files/download/{file}',[DocumentController::class, 'download']);
Route::get('/files',[DocumentController::class, 'index']);


Route::view('loginpage','loginpage');




Route::get('/test', [TestController::class, 'list']);


Route::view('/allbills','maintenance/allbills');
Route::get('/maintenance',[MaintenanceController::class, 'displaybills']);



Route::get('/submit', [PaymentController::class, 'submit']);
Route::get('/instamojo_redirect', [PaymentController::class, 'instamojo_redirect']);

Route::post('/instamojo_redirect', [PaymentController::class, 'instamojo_redirect']);

// Route::view('/instamojo_redirect','instamojo_redirect');


// ---------------------forum--------------------
Route::view('forum','forum');
Route::get('/forum',[ HomeController::class, 'index1']);
Route::resource('/comments',CommentsController::class);
Route::resource('/replies',RepliesController::class);
Route::post('/replies/ajaxDelete','RepliesController@ajaxDelete');



// Route::get('checkout','CheckoutController@checkout');
// Route::post('checkout','CheckoutController@afterpayment')->name('checkout.credit-card');

Route::get('checkout',[CheckoutController::class, 'checkout']);
Route::post('checkout',[CheckoutController::class, 'afterpayment'])->name('checkout.credit-card');
