<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CompanyVisitController;
use App\Http\Controllers\API\LeadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login',[UserController::class,'login'])->name('login');

Route::group(['middleware' => 'auth:api'], function(){
    //All secure URL's
    Route::post('companyVisitList', [CompanyVisitController::class,'companyVisitList'])->name('companyVisitList');
    Route::post('companyVisitAdd', [CompanyVisitController::class,'companyVisitAdd'])->name('companyVisitAdd');
    Route::post('companyVisitDetail', [CompanyVisitController::class,'companyVisitDetail'])->name('companyVisitDetail');
    Route::post('leadList', [LeadController::class,'leadList'])->name('leadList');
    Route::post('leadDetails', [LeadController::class,'leadDetails'])->name('leadDetails');
    Route::post('leadCommentAdd', [LeadController::class,'leadCommentAdd'])->name('leadCommentAdd');
    Route::post('locationUpdate', [UserController::class,'locationUpdate'])->name('locationUpdate');
});

