<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\PageController;
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

Route::get('/',[PageController::class, 'Login']);
Route::get('/Dashboard',[PageController::class, 'Dashboard']);
Route::get('/New-Staff',[PageController::class, 'StaffNew']);
Route::post('/New-Staff',[DataController::class, 'StaffStore']);
Route::get('/Staff-Manage',[PageController::class, 'StaffList']);


Route::get('/Income-List',[PageController::class, 'IncomeList']);
Route::get('/Income-Category',[PageController::class, 'IncomeCategory']);
Route::get('/Incomes/{id}/Edit',[PageController::class, 'IncomeEdit']);
Route::post('/Incomes/Edit',[DataController::class, 'IncomeEditStore']);
Route::post('/Income-Category',[DataController::class, 'IncomeCategoryStore']);
Route::get('/Income-Post',[PageController::class, 'IncomePost']);
Route::post('/Income-Post',[DataController::class, 'IncomeStore']);
Route::get('/Income-Report',[PageController::class, 'IncomeReport']);
Route::get('/Trial-Balance',[PageController::class, 'TrialBalance']);


Route::get('/Member-New',[PageController::class, 'Newmember']);
Route::post('/Member-New',[DataController::class, 'MemberStore']);
Route::get('/Members',[PageController::class, 'Members']);
Route::get('/MemberAuth',[PageController::class, 'MemberAuth']);
Route::get('/MemberAcc',[PageController::class, 'MemberAcc']);
Route::post('/MemberFreeze',[DataController::class, 'MemberFreeze']);
Route::post('/MemberunFreeze',[DataController::class, 'MemberunFreeze']);
Route::get('/Member-Report',[PageController::class, 'MemberReport']);
Route::get('/Member/{id}/View',[PageController::class, 'MemberView']);
Route::get('/MemberAuth/{id}/Accounts',[PageController::class, 'MemberOpenAccounts']);
Route::post('/OpenAccount',[DataController::class, 'OpenAccount']);

Route::post('/UserLogin',[DataController::class, 'Userlogin']);
Route::get('/Signout',[PageController::class, 'Signout'] );


Route::get('/Withdraw',[PageController::class, 'Withdraw'] );
Route::post('/WithdrawBalance',[DataController::class, 'WithdrawBalance'] );
Route::get('/Deposit',[PageController::class, 'Deposit'] );
Route::post('/DepositData',[DataController::class, 'DepositData'] );
Route::post('/DepositAccount',[DataController::class, 'Deposit'] );
Route::post('/WithdrawAccount',[DataController::class, 'WithdrawAccount'] );
Route::post('/AccountSum',[DataController::class, 'AccountSum'] );
Route::get('/Transactions/{ac_id}/{m_id}/',[PageController::class, 'Transactions'] );

Route::get('/CashBook',[PageController::class, 'CashBook'] );
Route::get('/BusinessOperation',[PageController::class, 'BusinessSchedule'] );
Route::get('/OpenBusiness',[PageController::class, 'OpenBusiness'] );
Route::post('/OpenOperations',[DataController::class, 'OpenOperations'] );
Route::get('/CloseBusiness',[PageController::class, 'CloseBusiness'] );
Route::post('/BusinessClose',[DataController::class, 'BusinessClose'] );
Route::get('/CashReturn',[PageController::class, 'CashReturn'] );
Route::post('/CashReturn',[DataController::class, 'CashReturn'] );
Route::post('/ApproveReturn',[DataController::class, 'ApproveReturn'] );
Route::post('/DeclineReturn',[DataController::class, 'DeclineReturn'] );

Route::post('/Checkstatus',[DataController::class, 'Checkstatus'] );



