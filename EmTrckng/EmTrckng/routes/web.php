<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyVisitController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\IndustryTypeController;
use App\Http\Controllers\LeadReplayController;
use App\Http\Controllers\UserAttendanceController;

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

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
Auth::routes();

Route::get('/', function () {
    return redirect(route('dashboard'));
})->name('home');

Route::get('/checkOnline', function (App\Repositories\AttendanceRepository $attendanceRepo) {
    if (Auth::check()) { }
    return $attendanceRepo->CountUserOnline();
})->name('checkOnline');

Route::get('company',[CompanyVisitController::class,'index'])->name('company_visits.index');

Route::get('company/table',[CompanyVisitController::class,'table'])->name('company_visits.table');

Route::group(['prefix' => 'company/{id}'],function(){
    Route::get('/',[CompanyVisitController::class,'show'])->name('company_visits.show');

    Route::get('/store',[LeadController::class,'store'])->name('leads.store');
});

Route::get('leads',[LeadController::class,'index'])->name('leads.index');

Route::group(['prefix' => 'leads/{id}'],function(){
    Route::get('show',[LeadController::class,'show'])->name('leads.show');
});

Route::get('industryTypes',[IndustryTypeController::class,'index'])->name('industry_types.index');

Route::get('industryTypes/table',[IndustryTypeController::class,'table'])->name('industry_types.table');

Route::get('industryTypes/create',[IndustryTypeController::class,'create'])->name('industry_types.create');

Route::post('industryTypes/store',[IndustryTypeController::class,'store'])->name('industry_types.store');


Route::group(['prefix' => 'industryTypes/{id}'],function(){
    
    Route::get('/',[IndustryTypeController::class,'show'])->name('industry_types.show');

    Route::get('industryTypes/edit',[IndustryTypeController::class,'edit'])->name('industry_types.edit');

    Route::patch('industryTypes/update',[IndustryTypeController::class,'update'])->name('industry_types.update');
    
    Route::delete('industryTypes/destroy',[IndustryTypeController::class,'destroy'])->name('industry_types.destroy');
    
});

Route::post('leads/replay',[LeadReplayController::class,'store'])->name('leadreplay.store');

Route::get('userAttendance',[UserAttendanceController::class,'index'])->name('user_attendance.index');

Route::get('userAttendance/table',[UserAttendanceController::class,'table'])->name('user_attendance.table');


Route::get('userAttendance/create',[UserAttendanceController::class,'create'])->name('user_attendance.create');

Route::post('userAttendance/store',[UserAttendanceController::class,'store'])->name('user_attendance.store');




Route::group(['prefix' => 'userAttendance/{id}'],function(){
    
    Route::get('/',[UserAttendanceController::class,'show'])->name('user_attendance.show');

    Route::get('userAttendance/edit',[UserAttendanceController::class,'edit'])->name('user_attendance.edit');

    Route::patch('userAttendance/update',[UserAttendanceController::class,'update'])->name('user_attendance.update');
    
    Route::delete('userAttendance/destroy',[UserAttendanceController::class,'destroy'])->name('user_attendance.destroy');
    
});