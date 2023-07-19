<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\CoachingController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\guestController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\RDController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\TherapyController;
use App\Http\Controllers\TreatableController;
use App\Http\Controllers\WorkshopController;
use Illuminate\Support\Facades\Route;

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


//Client
Route::get('/', [guestController::class, 'index']);
Route::get('/our-team', [guestController::class, 'ourTeam']);
Route::get('/our-team/{id}', [guestController::class, 'teamMember']);
Route::get('/therapies', [guestController::class, 'therapies']);
Route::get('/therapies/{id}', [guestController::class, 'therapy']);
Route::get('/services', [guestController::class, 'services']);
Route::get('/services/{id}', [guestController::class, 'service']);
Route::get('/treatables/{id}', [guestController::class, 'treatable']);
Route::get('/workshops', [guestController::class, 'workshops']);
Route::get('/workshops/{id}', [guestController::class, 'workshop']);
Route::get('/resources', [guestController::class, 'resources']);
Route::get('/about-us', [guestController::class, 'aboutUs']);
Route::get('/contact-us', [guestController::class, 'contactUs']);
Route::get('/appointment_request', [guestController::class, 'appointmentRequestPage']);
Route::get('/coachings', [guestController::class, 'coachings']);
Route::get('/coachings/{id}', [guestController::class, 'coaching']);

//Client Actions
Route::post("/send_message",[MessageController::class, "store"]);
Route::post("/request_appointment",[AppointmentController::class, "store"]);


//Authentication
Route::get('/__security_firewall_1/login', [UserController::class, 'loginPage'])->name("login");
Route::post('/__security_firewall_1/login', [UserController::class, 'login']);
Route::get('/__security_firewall_1/request_password_reset/',[UserController::class, 'generateToken']);
Route::get('/__security_firewall_1/reset/{token}',[UserController::class, 'resetPage']);
Route::post('/__security_firewall_1/reset',[UserController::class, 'reset']);
Route::get('/__security_firewall_1/logout', [UserController::class, 'logout']);
//Admin
Route::prefix("admin")->middleware(["auth"])->group(function(){

    //dashboard
    Route::get('dashboard', [UserController::class, 'dashboard']);

    //appointents
    Route::get('appointments', [AppointmentController::class, 'index']);
    Route::post('appointments/status_update', [AppointmentController::class, 'statusUpdate']);
    Route::post('appointments/remove/{id}', [AppointmentController::class, 'remove']);

    //messages
    Route::get('messages',[MessageController::class, 'index']);
    Route::get('messages/{id}',[MessageController::class, 'show']);
    Route::post('message/destroy/{id}',[MessageController::class, 'destroy']);

    //clinics
    Route::get('clinics',[ClinicController::class, 'index']);
    Route::get('clinics/create',[ClinicController::class, 'create']);
    Route::get('clinics/edit/{id}',[ClinicController::class, 'edit']);
    Route::post('clinics/destroy/{id}',[ClinicController::class, 'destroy']);
    Route::post('clinics/store',[ClinicController::class, 'store']);
    Route::get('clinics/edit/{id}',[ClinicController::class, 'edit']);
    Route::post('clinics/update/{id}',[ClinicController::class, 'update']);

    //coachings
    Route::get('coachings',[CoachingController::class, 'index']);
    Route::get('coachings/{id}/edit',[CoachingController::class, 'edit']);
    Route::post('coachings/{id}/update',[CoachingController::class, 'update']);
    Route::get('coachings/create',[CoachingController::class, 'create']);
    Route::post('coachings/store',[CoachingController::class, 'store']);
    Route::post('coachings/{id}/destroy',[CoachingController::class, 'destroy']);

    //plans
    Route::get('plans',[PlanController::class, 'index']);
    Route::get('plans/create',[PlanController::class, 'create']);
    Route::get('plans/{id}/edit',[PlanController::class, 'edit']);
    Route::post('plans/{id}/update',[PlanController::class, 'update']);
    Route::post('plans/store',[PlanController::class, 'store']);
    Route::post('plans/{id}/destroy',[PlanController::class, 'destroy']);

    //resources
    Route::get('resources',[ResourceController::class, 'index']);
    Route::get('resources/create',[ResourceController::class, 'create']);
    Route::get('resources/{id}/edit',[ResourceController::class, 'edit']);
    Route::post('resources/{id}/update',[ResourceController::class, 'update']);
    Route::post('resources/store',[ResourceController::class, 'store']);
    Route::post('resources/{id}/destroy',[ResourceController::class, 'destroy']);

    //Rates and Debates
    Route::get('r_d',[RDController::class, 'index']);
    Route::get('r_d/create',[RDController::class, 'create']);
    Route::get('r_d/{id}/edit',[RDController::class, 'edit']);
    Route::post('r_d/{id}/update',[RDController::class, 'update']);
    Route::post('r_d/store',[RDController::class, 'store']);
    Route::post('r_d/{id}/destroy',[RDController::class, 'destroy']);

    //Services
    Route::get('services',[ServiceController::class, 'index']);
    Route::get('services/create',[ServiceController::class, 'create']);
    Route::get('services/{id}/edit',[ServiceController::class, 'edit']);
    Route::post('services/{id}/update',[ServiceController::class, 'update']);
    Route::post('services/store',[ServiceController::class, 'store']);
    Route::post('services/{id}/destroy',[ServiceController::class, 'destroy']);

    //Team Members
    Route::get('team_members',[TeamMemberController::class, 'index']);
    Route::get('team_members/create',[TeamMemberController::class, 'create']);
    Route::get('team_members/{id}/edit',[TeamMemberController::class, 'edit']);
    Route::post('team_members/{id}/update',[TeamMemberController::class, 'update']);
    Route::post('team_members/store',[TeamMemberController::class, 'store']);
    Route::post('team_members/{id}/destroy',[TeamMemberController::class, 'destroy']);

    //Therapies
    Route::get('therapies',[TherapyController::class, 'index']);
    Route::get('therapies/create',[TherapyController::class, 'create']);
    Route::get('therapies/{id}/edit',[TherapyController::class, 'edit']);
    Route::post('therapies/{id}/update',[TherapyController::class, 'update']);
    Route::post('therapies/store',[TherapyController::class, 'store']);
    Route::post('therapies/{id}/destroy',[TherapyController::class, 'destroy']);

    //Treatables
    Route::get('treatables',[TreatableController::class, 'index']);
    Route::get('treatables/create',[TreatableController::class, 'create']);
    Route::get('treatables/{id}/edit',[TreatableController::class, 'edit']);
    Route::post('treatables/{id}/update',[TreatableController::class, 'update']);
    Route::post('treatables/store',[TreatableController::class, 'store']);
    Route::post('treatables/{id}/destroy',[TreatableController::class, 'destroy']);

    //Workshops
    Route::get('workshops',[WorkshopController::class, 'index']);
    Route::get('workshops/create',[WorkshopController::class, 'create']);
    Route::get('workshops/{id}/edit',[WorkshopController::class, 'edit']);
    Route::post('workshops/{id}/update',[WorkshopController::class, 'update']);
    Route::post('workshops/store',[WorkshopController::class, 'store']);
    Route::post('workshops/{id}/destroy',[WorkshopController::class, 'destroy']);

    //Admin Account settings
    Route::get("account_settings",[UserController::class, 'accountSettings']);
    Route::post("account_settings/update",[UserController::class, 'accountSettingsUpdate']);

    //Website Settings
    Route::get("website_settings",[UserController::class, 'websiteSettings']);
    Route::post("website_settings/update",[UserController::class, 'websiteSettingsUpdate']);
});




