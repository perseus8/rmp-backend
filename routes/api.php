<?php

use App\Http\Controllers\Admin\Customer\CustomerController;
use App\Http\Controllers\Admin\Fee\FeeController;
use App\Http\Controllers\Admin\Zone\ZoneController;
use App\Http\Controllers\Admin\ZoneItems\ZoneItemsController;
use App\Http\Controllers\API\Admin\User\UserController;
use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\User\Proposal\ProposalCustomerDataController;
use App\Http\Controllers\User\Proposal\ProposalItemsController;
use App\Http\Controllers\User\Proposal\ProposalListController;
use App\Http\Controllers\User\Proposal\ProposalLogisticController;
use App\Http\Controllers\User\Proposal\ProposalPackingMaterialController;
use App\Http\Controllers\User\Proposal\ProposalStartLocationController;
use App\Http\Controllers\User\Proposal\ProposalSummaryController;
use App\Http\Controllers\User\Proposal\ProposalTourInformationController;
use App\Http\Controllers\User\Proposal\ProposalTourPlanController;
use App\Models\StartLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::middleware('auth:sanctum', 'cors')->group(function () {
    // Verify
    Route::post('verify', function () {
        return response()->json([
            "status" => 200,
            "message" => "Verified",
            "data" => ['user' => Auth::user()]
        ], 200);
    });

    // // Admin routes
    Route::prefix('admin')->middleware(['admin'])->group(function () {


        // User Routes
        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'getUsers']);
            Route::get('/data/{id}', [UserController::class, 'getUser']);
            Route::post('/create', [UserController::class, 'createUser']);
            Route::put('/update/{id}', [UserController::class, 'updateUser']);
            Route::put('/update-password/{id}', [UserController::class, 'updatePassword']);
            Route::delete('/delete/{id}', [UserController::class, 'deleteUser']);
        });

        //Zone Roues
        Route::prefix('zone')->group(function () {
            Route::get('/', [ZoneController::class, 'list']);
            Route::post('/create', [ZoneController::class, 'create']);
            Route::get('/data/{id}', [ZoneController::class, 'getData']);
            Route::put('/update/{id}', [ZoneController::class, 'update']);
            Route::delete('/delete/{id}', [ZoneController::class, 'deleteZone']);
        });

        // Zone Item Routes
        Route::prefix('zone-items')->group(function () {
            Route::get('/', [ZoneItemsController::class, 'list']);
            Route::post('/create', [ZoneItemsController::class, 'create']);
            Route::get('/data/{id}', [ZoneItemsController::class, 'getData']);
            Route::put('/update/{id}', [ZoneItemsController::class, 'update']);
            Route::delete('/delete/{id}', [ZoneItemsController::class, 'delete']);
        });

        // Customer
        Route::prefix('customer')->group(function () {

            Route::get('/data/{id}', [CustomerController::class, 'getData']);
            Route::put('/update/{id}', [CustomerController::class, 'update']);
            Route::delete('/delete/{id}', [CustomerController::class, 'delete']);
        });

        // Fee
        Route::prefix('fee')->group(function () {
            Route::get('/', [FeeController::class, 'getFees']);
            Route::post('/update', [FeeController::class, 'updateFees']);
        });
        Route::prefix('packing-materials')->group(function () {
            Route::get('/data/{id}', [ProposalPackingMaterialController::class, 'getPackingMaterialsData']);
            Route::get('/list', [ProposalPackingMaterialController::class, 'getPackingMaterials']);
            Route::post('/create', [ProposalPackingMaterialController::class, 'createPackingMaterial']);
            Route::delete('/delete/{id}', [ProposalPackingMaterialController::class, 'deletePackingMaterials']);
            Route::put('/update/{id}', [ProposalPackingMaterialController::class, 'updatePackagingMaterial']);
        });
    });

    // cal user routes
    Route::prefix('cal-user')->middleware(['user'])->group(function () {
        // customer
        Route::post('customer/create', [CustomerController::class, 'create']);
        // zone item
        Route::post('zone-item/create', [ZoneItemsController::class, 'create']);

        // proposal
        Route::prefix('proposal')->group(function () {

            //complete
            Route::post('/complete', [ProposalCustomerDataController::class, 'completeProposal']);

            //List
            Route::post('/list', [ProposalListController::class, 'getList'])->name('list');

            // customer data
            Route::post('/customer-data/create', [ProposalCustomerDataController::class, 'create']);
            Route::get('/customer-data', [ProposalCustomerDataController::class, 'getData']);
            Route::post('/customer-data/update', [ProposalCustomerDataController::class, 'update']);

            // tour plan
            Route::post('/tour-data/create', [ProposalTourPlanController::class, 'create']);
            Route::get('/tour-data/list', [ProposalTourPlanController::class, 'getTourPlan']);
            Route::post('/tour-information/update', [ProposalTourInformationController::class, 'updateTourInformation']);
            // item list plan
            Route::get('/tour-items/list', [ProposalItemsController::class, 'getList']);
            Route::post('/tour-items/save', [ProposalItemsController::class, 'saveProposalItems']);
            // logistic data
            Route::get('/logistic-data/data', [ProposalLogisticController::class, 'getData']);
            Route::post('/logistic-data/save', [ProposalLogisticController::class, 'saveData']);
            // summery data
            Route::get('/summary-data/data', [ProposalSummaryController::class, 'getData']);
            Route::get('/summary-data/get-summary', [ProposalSummaryController::class, 'getSummery']);
            Route::post('/summary-data/save', [ProposalSummaryController::class, 'saveData']);
        });

        Route::prefix('start-location')->group(function () {
            Route::get('/list', [ProposalStartLocationController::class, 'getStartLocation']);
            Route::post('/create', [ProposalStartLocationController::class, 'createStartLocation']);
        });
        Route::prefix('packing-materials')->group(function () {
            Route::get('/list', [ProposalPackingMaterialController::class, 'getPackingMaterials']);
            Route::post('/create', [ProposalPackingMaterialController::class, 'createPackingMaterial']);
        });
    });



    // common routes
    // Customer
    Route::prefix('customer')->group(function () {
        Route::get('/', [CustomerController::class, 'list']);
    });
});

Route::prefix('auth')->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::post('/login', [AuthController::class, 'adminLogin']);
        Route::post('/register', [AuthController::class, 'adminRegister']);
    });

    Route::prefix('cal-user')->name('user.')->group(function () {
        Route::post('/login', [AuthController::class, 'userLogin']);
        Route::post('/register', [AuthController::class, 'userRegister']);
    });
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('/logout', [AuthController::class, 'expireToken']);
    });
});


Route::get('/unauthenticated', function () {
    return response()->json(['message' => 'Unauthenticated', 'data' => [], 'status' => 401], 401);
})->name('unautherized');
