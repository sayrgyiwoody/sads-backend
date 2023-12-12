<?php





use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Customer\ClientController;
use App\Http\Controllers\Api\Customer\ClientPreorderController;
use App\Http\Controllers\Api\Customer\ProductController;
use App\Http\Controllers\Api\Sales\SalePreorderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





Route::group(['middleware'=>['cors']],function(){
    Route::controller(AuthController::class)->group(function(){
        Route::match(['get','post'],'/register','Register');
        Route::match(['get','post'],'/login','Login');
    });
});

Route::middleware('auth:sanctum')->group(function(){
    Route::match(['get','match'],'/logout',[AuthController::class,'Logout']);
    Route::resource('/customer',ClientController::class);
    Route::resource('/customerPreorder',ClientPreorderController::class);
    Route::resource('/salePreorder',SalePreorderController::class);
    Route::post('/getProduct',[ProductController::class,'getProduct']);
});

