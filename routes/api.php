<?php

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ForgetPasswordController;
use App\Http\Controllers\API\TripRemarksForPartnerController;
use App\Http\Controllers\API\CallDetailsController;
use App\Http\Controllers\API\TripRequestController;
use App\Http\Controllers\API\PickUpDropOffController;
use App\Http\Controllers\API\TripTypeController;
use App\Http\Controllers\API\PartnerController;
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


Route::group(['prefix' => 'v1', 'as' => 'v1.'], function () {

    Route::post('users/register', [ RegisterController::class, 'register'])->name('users.registration');
    Route::post('users/login', [ RegisterController::class, 'login'])->name('users.login');

    Route::get('locations/cities', [ RegisterController::class, 'fetchCity'])->name('cities');
    Route::post('locations/areas', [ RegisterController::class, 'getCityWiseArea'])->name('locations');
    Route::get('cars/types', [ RegisterController::class, 'getCarType'])->name('car_types');
    Route::post('cars/brands', [ RegisterController::class, 'getCarBrand'])->name('car_brands');
    Route::get('cars/models', [ RegisterController::class, 'getCarModel'])->name('car_models');
    
    Route::middleware('auth:api')->group( function () {

        Route::post('users/profile', [ RegisterController::class, 'saveUserAdditionalInformation'])->name('users.perosnal_information');
        Route::post('users/profile/cars', [ RegisterController::class, 'saveUserCarInformation'])->name('users.car_information');
        Route::post('users/profile/images', [ RegisterController::class, 'getImageInformation'])->name('users.image_information');
//        Route::post('users/account-information', [ RegisterController::class, 'accountInformation'])->name('users.account_information');
        Route::get('users/profile', [ RegisterController::class, 'getProfileInformation'])->name('users.profile');
        Route::get ('users/logout', [ RegisterController::class, 'logout'])->name('users.logout');
    });

    Route::post('users/send/otp', [ ForgetPasswordController::class, 'sendMobileOtp' ])->name('users.send_mobile_otp');
    Route::post('users/password/reset', [ ForgetPasswordController::class, 'reset' ])->name('users.reset_password');

});

Route::group(['prefix' => 'v2', 'as' => 'v2.'], function () {
    Route::group(['middleware' => ['auth-api-token']], function () {

    Route::group(['prefix' => 'partners', 'as' => 'partners.'], function () {


        /************************ Trip Request Api Start ****************************************************/
        Route::group(['prefix' => 'triprequests', 'as' => 'triprequests.'], function () {
            Route::get('/', [TripRequestController::class, 'index']);
            Route::post('/', [TripRequestController::class, 'store']);
            Route::get('/{id}', [TripRequestController::class, 'tripDetails']);
            Route::put('status/{id}', [TripRequestController::class, 'updateTripRequestStatus']);

            Route::get('partner/{id}', [TripRequestController::class, 'viewPartnerTripRequestDetails']);
            Route::group(['prefix' => 'invitations', 'as' => 'invitations.'], function () {

                Route::post('search', [TripRequestController::class, 'searchPartnerBasedOnCriteria']);
                Route::post('/', [ TripRequestController::class, 'invitePartner' ]);
                Route::put('/{id}', [TripRequestController::class, 'update']);

                Route::post('status', [TripRequestController::class, 'findInvitedPartnerByStatus']);


            });

            Route::group(['prefix' => 'assigned', 'as' => 'assigned.'], function () {
                Route::get('partners', [ TripRequestController::class, 'assignedPartners' ]);
            });
        });
        /************************ Trip Request Api End *****************************************************/

        /************************ PreDefined Remarks & Remarks for Partner Api End ***************************************/
        Route::group(['prefix' => 'remarks', 'as' => 'remarks.'], function () {
            Route::get('presets', [TripRemarksForPartnerController::class, 'fetchPredefineRemarks']);
            Route::post('/', [TripRemarksForPartnerController::class, 'saveRemark']);
            Route::get('/{id}', [TripRemarksForPartnerController::class, 'showRemarks']);
        });
        /************************ PreDefined Remarks & Remarks for Partner Api End ***************************************/

        /************************ Call Notes and Call Details Api start ***************************************/
        Route::group(['prefix' => 'calls', 'as' => 'calls.'], function () {

            Route::get('notes', [CallDetailsController::class, 'fetchCallNotes']);
            
            //call details
            Route::group(['prefix' => 'details', 'as' => 'details.'], function () {
                Route::post('/', [CallDetailsController::class, 'save']);
                Route::get('/{id}', [CallDetailsController::class, 'index']);
            });
        });
        /************************ Call Notes and Call Details Api End ***************************************/
    });

         Route::get('locations/pickdrop', [ PickUpDropOffController::class, 'index']);
         Route::get('cars/types', [ RegisterController::class, 'getCarType']);
         Route::get('cars/models', [ RegisterController::class, 'getCarModel']);
         Route::get('trips/types', [ TripTypeController::class, 'getTripsType']);

    });
    Route::post('partners/triprequests/invitations/response', [ TripRequestController::class, 'changePartnerStatus' ]);
});

Route::group(['prefix' =>'v3','as' =>'v3.'],function(){

    Route::get('triprequests', [TripRequestController::class, 'getTripRequests']);
    Route::group(['prefix' => 'partners', 'as' => 'partners.'], function () {
        Route::get('/{id}', [PartnerController::class, 'getPartner']);
        Route::get('/{id}/vehicles', [PartnerController::class, 'getVehicle']);
        Route::get('/{id}/trip/history', [PartnerController::class, 'getTripHistory']);
        Route::post('/{id}/documents', [PartnerController::class, 'updatePartnerDocument']);
        Route::get('/{id}/documents', [PartnerController::class, 'getDocumentsByPartner']);
//        Route::get('assign/{status}', [PartnerController::class, 'assignedPartners']);

    });
});