<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DataController extends Controller
{
   
    public function StaffStore(Request $request)
    {
       $checked =  $request->validate([
            'city'=>'required',
            'college_certificates'=>'required',
            'dob'=>'required',
            'email'=>'required',
            'first_name'=>'required',
            'gender'=>'required',
            'id_number'=>'required',
            'kra_pin'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'village'=>'required'
        ]);
      $staffid =   DB::table('staffs')->insertGetId([
           'tenantid' => 1,
           'first_name' => $request->input('first_name'),
            'middle_name'=> $request->input('middle_name'),
            'last_name'=> $request->input('last_name'),
            'id_number'=> $request->input('id_number'),
            'city'=> $request->input('city'),
            'village'=> $request->input('village'),
            'huduma_number'=> $request->input('huduma_number'),
            'personal_file_no'=> $request->input('personal_file_no'),
            'date_of_birth'=> $request->input('dob'),
            'gender'=> $request->input('gender'),
            'phone'=> $request->input('phone'),
            'email'=> $request->input('email'),
            'nhif_number'=> $request->input('nhif_number'),
            'nssf_number'=> $request->input('nssf_number'),
            'kra_pin'=> $request->input('kra_pin'),
            'college_certificates'=> $request->input('college_certificates'),
            'school_certificate_grades'=> $request->input('school_certificate_grades'),
            'password'=> Hash::make($request->input('id_number'))
      ]);

      if($staffid != 0)
      {
          return array('status'=> 200, 'message'=> 'Staff added successfully');
      }else{
        return array('status'=> 400, 'message'=> 'Staff data entry failed');
      }

        
    }
    public function IncomeCategoryStore(Request $request)
    {
       $request->validate([
           'Income_Name' => 'required',
           'Visibility' =>'required'
       ]);
       $results = DB::table('income_lists')->insert([
           'category_name' => $request->input('Income_Name'),
           'visibility' => $request->input('Visibility'),
           
       ]);
       if ($results) {
        return array('status'=> 200, 'message'=> 'New Income Category added successfully');
       }else{
        return array('status'=> 400, 'message'=> 'New Income category entry failed');
      }
    }
    public function IncomeEditStore(Request $request)
    {
       $request->validate([
           'Income_Name' => 'required',
           'Visibility' =>'required',
           'incomeid' =>'required'
       ]);
       $results = DB::table('income_lists')
       ->where('id',$request->input('incomeid') )
       ->update([
           'category_name' => $request->input('Income_Name'),
           'visibility' => $request->input('Visibility')
       ]);
       if ($results) {
        return array('status'=> 200, 'message'=> 'New Income Category added successfully');
       }else{
        return array('status'=> 400, 'message'=> 'New Income category entry failed');
      }
    }
    public function MemberStore(Request $request)
    {
      $Async = new SynchronizeController();
      $date = $Async->currentDate($request);
       $request->validate([
           'first_name' => 'required',
           'last_name' =>'required',
           'second_name' =>'required',
           'village' =>'required',
           'gender' =>'required',
           'mobile' =>'required',
           'branchid' =>'required',
           'group_id' =>'required',
           'disability' =>'required',
           'nationalid' =>'required',
           'occupation' =>'required',
           'dob' =>'required',
       ]);
     $query =   DB::table('members')->insert([
       'beneficiary_phone'=>$request->input('ben_contact'),
        'beneficiary_name'=>$request->input('ben_name'),
        'beneficiary_bational_id'=>$request->input('ben_national_id'),
        'benefiaciary_relation'=>$request->input('ben_relation'),
        'branchid'=>$request->input('branchid'),
        'tenantid'=>1,
        'disability'=>$request->input('disability'),
        'dob'=>$request->input('dob'),
        'email'=>$request->input('email'),
        'first_name'=>$request->input('first_name'),
        'gender'=>$request->input('gender'),
        'groupid'=>$request->input('group_id'),
        'huduma_number'=>$request->input('huduma_number'),
        'kin_contact'=>$request->input('kin_contact'),
        'next_of_kin_id'=>$request->input('kin_id'),
        'next_of_kin_name'=>$request->input('kin_name'),
        'next_of_kin_relation'=>$request->input('kin_relation'),
        'kra_pin'=>$request->input('kra_pin'),
        'last_name'=>$request->input('last_name'),
        'mobile'=>$request->input('mobile'),
        'national_id'=>$request->input('nationalid'),
        'occupation'=>$request->input('occupation'),
        'second_name'=>$request->input('second_name'),
        'village'=>$request->input('village'),
        'registration_date'=>$date
       ]);
       if ($query) {
        return array('status'=> 200, 'message'=> 'New member registered successfully');
       }else{
        return array('status'=> 400, 'message'=> 'Member registration failed');
      }
    }
    public function IncomeStore(Request $request)
    {
      $Async = new SynchronizeController();
      $date = $Async->currentDate($request);
       $request->validate([
           'income_categoryid' => 'required',
           'Amount' =>'required',
           'modeid' =>'required',
           'tenantid' =>'required',
           'description' =>'required'
       ]);
       $income = DB::table('income_lists')->where('id',$request->input('income_categoryid'))->get();
       $title = $income[0]->category_name;
      $data =  DB::table('incomes')
                    ->insert([
                      'tenantid' => $request->input('tenantid'),
                      'source_id' => $request->input('income_categoryid'),
                      'details' => $request->input('description'),
                      'income_amount' => $request->input('Amount'),
                      'income_date' => $date,
                      'paid_via' => $request->input('modeid'),
                      'done_by' => 1,
                    ]);
        if($data)
        {
          
          if($request->input('modeid') == 1)
          {
            DB::table('ledgers')
                    ->insert([
                        'tenantid' => $request->input('tenantid'),
                        'cash_dr' => $request->input('Amount'),
                        'income_cr' => $request->input('Amount'),
                        'transactiondate' => $date,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                    DB::table('cashbooks')->insert([
                      'tenant_id' => session('staff')->tenantid,
                      'title' => $title,
                      'cash_in' => $request->input('Amount'),
                      'transaction_date' => $date,
                      'staff_id' => session('staff')->id,
                    ]);
          }
          if($request->input('modeid') == 2)
          {
            DB::table('ledgers')
                    ->insert([
                        'tenantid' => $request->input('tenantid'),
                        'mpesa_dr' => $request->input('Amount'),
                        'income_cr' => $request->input('Amount'),
                        'transactiondate' => $date,
                        'created_at' => now(),
                      'updated_at' => now()
                    ]);
                    DB::table('cashbooks')->insert([
                      'tenant_id' => session('staff')->tenantid,
                      'mpesa_in' => $request->input('Amount'),
                      'title' => $title,
                      'transaction_date' => $date,
                      'staff_id' => session('staff')->id,
                    ]);
          }
          if($request->input('modeid') != 1 && $request->input('modeid') != 2 )
          {
            DB::table('ledgers')
                    ->insert([
                        'tenantid' => $request->input('tenantid'),
                        'bank_dr' => $request->input('Amount'),
                        'income_cr' => $request->input('Amount'),
                        'transactiondate' => $date,
                        'created_at' => now(),
                      'updated_at' => now()
                    ]);
                    DB::table('banks')->insert([
                      'tenant_id' => session('staff')->tenantid,
                      'staff_id' => session('staff')->id,
                      'bank_id' => $request->input('modeid'),
                      'deposit_amount' =>  $request->input('Amount'),
                      'entry_date' => $date,
                    ]);
                    DB::table('cashbooks')->insert([
                      'tenant_id' => session('staff')->tenantid,
                      'bank_in' => $request->input('Amount'),
                      'title' => $title,
                      'transaction_date' => $date,
                      'staff_id' => session('staff')->id,
                    ]);
                    
          }
          return array('status'=> 200, 'message'=> 'New Income Category added successfully');
        }else{
          return array('status'=> 400, 'message'=> 'New Income category entry failed');
        }
    }

    public function Userlogin(Request $request)
    {
      
      $email = $request->email;
      $users = DB::table('staffs')->where('email', $email)->first();
        if(!$users || !Hash::check($request->password, $users->password))
        {
          return array('status'=> 400, 'message'=> 'Login credentials do not match');
        }else{
          $request->session()->put('staff', $users);
          $operation = DB::table('businessoperations')->where('tenant_id', session('staff')->tenantid)->where('status', 1)->first();
          $request->session()->put('operation', $operation);
          return array('status'=> 200, 'message'=> 'Login successfully. Redirecting ... ');
        }
    }
    public function MemberFreeze(Request $request)
    {
      
      
      $query = DB::table('members')->where('id', $request->input('id'))
                                  ->update([
                                    'status'=>1,
                                  ]);
        if($query)
        {
          return array('status'=> 200, 'message'=> 'Member account freezed successfully');
        }else{
          
          return array('status'=> 400, 'message'=> 'Member account freeze failed');
        }
    }
    public function MemberunFreeze(Request $request)
    {
      
      
      $query = DB::table('members')->where('id', $request->input('id'))
                                  ->update([
                                    'status'=>2,
                                  ]);
        if($query)
        {
          return array('status'=> 200, 'message'=> 'Member account unfreezed successfully');
        }else{
          
          return array('status'=> 400, 'message'=> 'Member account unfreeze failed');
        }
    }
    public function OpenAccount(Request $request)
    {
      $request->validate([
        'tenantid' => 'required',
        'branchid' => 'required',
        'memberid' => 'required',
        'accountid' => 'required'
      ]);

     $counts =  DB::table('memberaccounts')->where('memberid',$request->input('memberid') )
                                ->where('accountid',$request->input('accountid'))
                                ->count();
      if($counts < 1)
      {
        $query = DB::table('memberaccounts')->insert([
        'tenantid'=> $request->input('tenantid'),
        'memberid'=> $request->input('memberid'),
        'branchid'=> $request->input('branchid'),
        'accountid'=> $request->input('accountid'),
          ]);
          
          if($query)
          {
            return array('status'=> 200, 'message'=> 'Account opened successfully');
          }else{
            
            return array('status'=> 400, 'message'=> 'Account open failed');
          }
      }else{
        return array('status'=> 400, 'message'=> 'Account already opened.');
      }
      
    }
    public function Checkloggins($request)
    {
        if($request->session()->has('staff'))
        {
            return 1;

        }else{
            return 0;
        }
    }

    public function WithdrawBalance(Request $request)
    {
      $checked = self::Checkloggins($request);
        if ($checked == 0) {
            return redirect('/');
        }
        $request->validate([
          'memberid'=> 'required'
        ]);

        $results = DB::table('members') 
                                        ->where('id',$request->input('memberid'))
                                        ->select('id','first_name','second_name','last_name','groupid','tenantid','branchid','status')
                                        ->get();
        foreach ($results as $item) {
          $item->Accounts = DB::table('memberaccounts') 
          ->join('accounts','accounts.id','=','memberaccounts.accountid')
          ->where('memberid',$request->input('memberid'))
          ->whereIn('accountid', [2, 6])
          ->select('accountid','account_name')
          ->get();
          $item->Mode = DB::table('paymodes')
          ->where('modestatus', 2) 
          ->select('id','modename')
          ->get();
        }
        return $results;
        
    }
    public function DepositData(Request $request)
    {
      $checked = self::Checkloggins($request);
        if ($checked == 0) {
            return redirect('/');
        }
        $request->validate([
          'memberid'=> 'required'
        ]);

        $results = DB::table('members') 
                                        ->where('id',$request->input('memberid'))
                                        ->select('id','first_name','second_name','last_name','groupid','tenantid','branchid','status')
                                        ->get();
        foreach ($results as $item) {
          $item->Accounts = DB::table('memberaccounts') 
          ->join('accounts','accounts.id','=','memberaccounts.accountid')
          ->where('memberid',$request->input('memberid'))
          ->whereNotIn('accountid', [1,7,3])
          ->select('accountid','account_name')
          ->get();
          $item->Mode = DB::table('paymodes')
          ->where('modestatus', 2) 
          ->select('id','modename')
          ->get();
        }
        return $results;
        
    }
    public function Deposit(Request $request)
    {
      $Async = new SynchronizeController();
      $date = $Async->currentDate($request);
        $checked = self::Checkloggins($request);
          if ($checked == 0) {
              return redirect('/');
          }
          $request->validate([
            'accountid'=> 'required',
            'memberid'=> 'required',
            'modeid'=> 'required',
            'amount'=> 'required',
            'modeid'=> 'required'
          ]);
         $query =  DB::table('accountentries')->insert([
            'memberid' => $request->input('memberid'),
            'trans_mode' => $request->input('modeid'),
            'accountid' => $request->input('accountid'),
            'tenantid' => session('staff')->tenantid,
            'deposit_amount' => $request->input('amount'),
            'staffid' => session('staff')->id,
            'transactiondate' => $date,
          ]);
          $accounts = DB::table('accounts')->where('id',$request->input('accountid'))->get();
          $title = $accounts[0]->account_name.' Deposit for '.$request->input('memberid');
          if($query)
          {
            if($request->input('modeid') == '1')
              {
                DB::table('ledgers')
                        ->insert([
                            'tenantid' => session('staff')->tenantid,
                            'cash_dr' => $request->input('amount'),
                            'indiv_savings_cr' => $request->input('amount'),
                            'transactiondate' => $date,
                        ]);
                        DB::table('cashbooks')->insert([
                          'tenant_id' => session('staff')->tenantid,
                          'cash_in' => $request->input('amount'),
                          'title' => $title,
                          'transaction_date' => $date,
                          'staff_id' => session('staff')->id,
                        ]);
              }
              if($request->input('modeid') == '2')
              {
                DB::table('ledgers')
                        ->insert([
                          'tenantid' => session('staff')->tenantid,
                          'mpesa_dr' => $request->input('amount'),
                          'indiv_savings_cr' => $request->input('amount'),
                          'transactiondate' => $date,
                        ]);
                        DB::table('cashbooks')->insert([
                          'tenant_id' => session('staff')->tenantid,
                          'mpesa_in' => $request->input('amount'),
                          'title' => $title,
                          'transaction_date' => $date,
                          'staff_id' => session('staff')->id,
                        ]);
              }
              if($request->input('modeid') != '1' && $request->input('modeid') != '2' )
              {
                DB::table('ledgers')
                        ->insert([
                          'tenantid' => session('staff')->tenantid,
                          'bank_dr' => $request->input('amount'),
                          'indiv_savings_cr' => $request->input('amount'),
                          'transactiondate' => $date,
                        ]);
                        DB::table('banks')->insert([
                          'tenant_id' => session('staff')->tenantid,
                          'staff_id' => session('staff')->id,
                          'bank_id' => $request->input('modeid'),
                          'deposit_amount' =>  $request->input('amount'),
                          'entry_date' => $date,
                        ]);
                        DB::table('cashbooks')->insert([
                          'tenant_id' => session('staff')->tenantid,
                          'bank_in' => $request->input('amount'),
                          'title' => $title,
                          'transaction_date' => $date,
                          'staff_id' => session('staff')->id,
                        ]);
              }
            return array('status'=> 200, 'message'=> 'Deposit cash successfully');
          }else{
            
            return array('status'=> 400, 'message'=> 'Deposit execution failed. Try again');
          }
    }

    public function AccountSum(Request $request)
    {
        $checked = self::Checkloggins($request);
          if ($checked == 0) {
              return redirect('/');
          }
          $request->validate(
            [
              'accountid'=>'required',
              'memberid'=>'required'
            ]);

           $TotalDeposit =  DB::table('accountentries')
                        ->where('memberid',$request->input('memberid'))
                        ->where('accountid',$request->input('accountid'))
                        ->sum('deposit_amount');
           $TotalWithdraw =  DB::table('accountentries')
                        ->where('memberid',$request->input('memberid'))
                        ->where('accountid',$request->input('accountid'))
                        ->sum('Withdraw_amount');
           $account =  DB::table('accounts')
                        ->where('id',$request->input('accountid'))
                        ->select('account_name')
                        ->get();
            $TotalBalance = $TotalDeposit - $TotalWithdraw;

            $data = array('accountid'=>$request->input('accountid'), 'accountname'=>$account[0]->account_name,'totalbalance'=> $TotalBalance);
            return $data;

    }
    public function WithdrawAccount(Request $request)
    {
      $Async = new SynchronizeController();
      $date = $Async->currentDate($request);
        $checked = self::Checkloggins($request);
          if ($checked == 0) {
              return redirect('/');
          }
          $request->validate([
            'amount'=>'required',
            'modeid'=>'required',
            'memberid'=>'required',
            'accountid'=>'required',
          ]);
          $TotalDeposit =  DB::table('accountentries')
                        ->where('memberid',$request->input('memberid'))
                        ->where('accountid',$request->input('accountid'))
                        ->sum('deposit_amount');
           $TotalWithdraw =  DB::table('accountentries')
                        ->where('memberid',$request->input('memberid'))
                        ->where('accountid',$request->input('accountid'))
                        ->sum('Withdraw_amount');
           $account =  DB::table('accounts')
                        ->where('id',$request->input('accountid'))
                        ->select('account_name')
                        ->get();
            $TotalBalance = $TotalDeposit - $TotalWithdraw;
          if ($TotalBalance >= $request->input('amount')) {
           
          
          
            $query =  DB::table('accountentries')->insert([
              'memberid' => $request->input('memberid'),
              'trans_mode' => $request->input('modeid'),
              'accountid' => $request->input('accountid'),
              'tenantid' => session('staff')->tenantid,
              'withdraw_amount' => $request->input('amount'),
              'staffid' => session('staff')->id,
              'transactiondate' => $date,
            ]);
            $accounts = DB::table('accounts')->where('id',$request->input('accountid'))->get();
            $title = $accounts[0]->account_name.' Withdraw Cash for '.$request->input('memberid');
            if($query)
            {
              
              if($request->input('modeid') == '1')
                {
                  DB::table('ledgers')
                          ->insert([
                              'tenantid' => session('staff')->tenantid,
                              'cash_cr' => $request->input('amount'),
                              'indiv_savings_dr' => $request->input('amount'),
                              'transactiondate' => $date,
                          ]);
                          DB::table('cashbooks')->insert([
                            'tenant_id' => session('staff')->tenantid,
                            'cash_out' => $request->input('amount'),
                            'title' => $title,
                            'transaction_date' => $date,
                            'staff_id' => session('staff')->id,
                          ]);
                }
                if($request->input('modeid') == '2')
                {
                  DB::table('ledgers')
                          ->insert([
                            'tenantid' => session('staff')->tenantid,
                            'mpesa_cr' => $request->input('amount'),
                            'indiv_savings_dr' => $request->input('amount'),
                            'transactiondate' => $date,
                          ]);
                          DB::table('cashbooks')->insert([
                            'tenant_id' => session('staff')->tenantid,
                            'mpesa_out' => $request->input('amount'),
                            'transaction_date' => $date,
                            'title' => $title,
                            'staff_id' => session('staff')->id,
                          ]);
                }
                if($request->input('modeid') != '1' && $request->input('modeid') != '2' )
                {
                  DB::table('ledgers')
                          ->insert([
                            'tenantid' => session('staff')->tenantid,
                            'bank_cr' => $request->input('amount'),
                            'indiv_savings_dr' => $request->input('amount'),
                            'transactiondate' => $date,
                          ]);
                          DB::table('cashbooks')->insert([
                            'tenant_id' => session('staff')->tenantid,
                            'bank_out' => $request->input('amount'),
                            'title' => $title,
                            
                            'transaction_date' => $date,
                            'staff_id' => session('staff')->id,
                          ]);
                          DB::table('banks')->insert([
                            'tenant_id' => session('staff')->tenantid,
                            'staff_id' => session('staff')->id,
                            'bank_id' => $request->input('modeid'),
                            'withdraw_amount' =>  $request->input('amount'),
                            'entry_date' => $date,
                          ]);
                }
              return array('status'=> 200, 'message'=> 'Withdrawal cash successfully');
            }else{
              
              return array('status'=> 400, 'message'=> 'Withdrawal execution failed. Try again');
            }
          } else {
            return array('status'=> 400, 'message'=> 'The current '.$account[0]->account_name.' has insufficient amount for withdrawal. Please to up or try a lower amount' );
          }
    }
    public function OpenOperations(Request $request)
    {
      $request->validate([
        'openbalance'=>'required'
      ]);
      $running = DB::table('businessoperations')->where('tenant_id',session('staff')->tenantid )->where('status', 1)->count();
      
      if($running == 0)
      {
        $query = DB::table('businessoperations')->insert([
              'tenant_id'=>session('staff')->tenantid,
              'opened_by'=>session('staff')->id,
              'open_balance'=>$request->input('openbalance'),
              'open_time'=>date('H:m:s'),
              'open_date'=>date('Y-m-d'),
              'open_time'=>date('H:m:s')
            ]);
        if ($query) {
          return array('status'=> 200, 'message'=> 'Operations Activated successfully');
        } else {
          return array('status'=> 400, 'message'=> 'Operations Activation failed');
        }
      }else{
        return array('status'=> 400, 'message'=> 'Operations has already been activated');
      }
    }
    public function Checkstatus(Request $request)
    {
        $checked = self::Checkloggins($request);
        if ($checked == 0) {
            return redirect('/');
        }
        $results = DB::table('businessoperations')
                        ->where('tenant_id',session('staff')->tenantid)
                        ->where('status', 1)
                        ->count();
        if($results > 0 && $request->session()->has('operation'))
        {
          return 2;
        }else if($results > 0 && !$request->session()->has('operation')){
          return 1;
        }
        else{
          return 2;
        }
          
    }
    public function CashReturn(Request $request)
    {
      $Async = new SynchronizeController();
      $date = $Async->currentDate($request);
        $checked = self::Checkloggins($request);
        if ($checked == 0) {
            return redirect('/');
        }
        $request->validate([
          'amount'=>'required'
        ]);
        $Pagecontroller = new PageController();
        $data = $Pagecontroller->Businessdata($request);
        if($request->input('amount') > $data[0]->Cashathand)
        {
          return array('status'=> 400, 'message'=> 'Can not deposit cash more than expected');
        }else{
          $check = DB::table('safeoperations')
                    ->where('tenant_id',session('staff')->tenantid)
                    ->where('request_status',1)
                    ->count();
          if ($check > 0) {
            $checkdata = DB::table('safeoperations')
                    ->where('tenant_id',session('staff')->tenantid)
                    ->where('request_status',1)
                    ->sum('return_amount');
              if (($checkdata + $request->input('amount')) > $data[0]->Cashathand) {
                return array('status'=> 400, 'message'=> 'Cash Return failed. Can sent more than expected');
              } else {
                DB::table('safeoperations')->insert([
                  'tenant_id'=>session('staff')->tenantid,
                  'request_by'=>session('staff')->id,
                  'return_amount'=>$request->input('amount'),
                  'entry_date'=>$date,
                  'request_status'=>1,
                ]);
                return array('status'=> 200, 'message'=> 'Cash Return sent successfully');
              }
              
          } else {
            DB::table('safeoperations')->insert([
              'tenant_id'=>session('staff')->tenantid,
              'request_by'=>session('staff')->id,
              'return_amount'=>$request->input('amount'),
              'entry_date'=>$date,
              'request_status'=>1,
            ]);
            return array('status'=> 200, 'message'=> 'Cash Return sent successfully');
          }
          
            
            
        }
        
    }
    public function ApproveReturn(Request $request)
    {
      $Async = new SynchronizeController();
      $date = $Async->currentDate($request);
        $checked = self::Checkloggins($request);
        if ($checked == 0) {
            return redirect('/');
        }
        $request->validate([
          'id'=>'required'
        ]);
        $Pagecontroller = new PageController();
        $data = $Pagecontroller->Businessdata($request);
        if($request->input('amount') > $data[0]->Cashathand)
        {
          return array('status'=> 400, 'message'=> 'Can not approve cash more than expected');
        }else{
          $results =DB::table('safeoperations')
                    ->where('id', $request->input('id'))
                    ->where('request_status',1)
                    ->count();
          if ($results > 0) {
            $returndata =DB::table('safeoperations')
                      ->where('id', $request->input('id'))
                      ->where('request_status',1)
                      ->first();
            $execute = DB::table('safeoperations')->where('id', $request->input('id'))->update([
                        'approve_by'=>session('staff')->id,
                        'request_status'=>2
                      ]);
            if ($execute) {
              DB::table('safeaccounts')->insert([
                'tenant_id'=>session('staff')->tenantid,
                'staffid'=>session('staff')->id,
                'entry_date'=>$date,
                'deposit_amount'=>$returndata->return_amount,
              ]);
              DB::table('cashbooks')->insert([
                'tenant_id' => session('staff')->tenantid,
                'cash_out' => $returndata->return_amount,
                'title' => 'Cash return to safe',
                'status' => 1,
                'transaction_date' => $date,
                'staff_id' => session('staff')->id,
              ]);
              return array('status'=> 200, 'message'=> 'Data approved successfully');
            }else
            {
              return array('status'=> 400, 'message'=> 'Data approval failed');
            }
                      
          } else {
            return array('status'=> 400, 'message'=> 'Data approval failed');
          }
          
            
        }
        
    }
    public function DeclineReturn(Request $request)
    {
        $checked = self::Checkloggins($request);
        if ($checked == 0) {
            return redirect('/');
        }
        $request->validate([
          'id'=>'required'
        ]);
        
        $execute = DB::table('safeoperations')->where('id', $request->input('id'))->update([
                    'approve_by'=>session('staff')->id,
                    'request_status'=>3
                  ]);
        if ($execute) {
          return array('status'=> 200, 'message'=> 'Data Declined successfully');
        }else
        {
          return array('status'=> 400, 'message'=> 'Data Declination failed');
        }
    }
    public function BusinessClose(Request $request)
    {
      $Async = new SynchronizeController();
      $date = $Async->currentDate($request);
        $checked = self::Checkloggins($request);
        if ($checked == 0) {
            return redirect('/');
        }
        $request->validate([
          'narration'=>'required'
        ]);
        $Pagecontroller = new PageController();
        $data = $Pagecontroller->Businessdata($request);
        $execute = DB::table('businessoperations')
                      ->where('tenant_id', session('staff')->tenantid)
                      ->where('status', 1)
                      ->update([
                    'close_time'=>date('H:m:s'),
                    'close_balance'=>$data[0]->safebalance,
                    'close_date'=>$date,
                    'closed_by'=>session('staff')->id,
                    'status'=>2,
                  ]);
        if ($execute) {
          $operation = DB::table('businessoperations')->where('tenant_id', session('staff')->tenantid)->where('status', 1)->first();
          $request->session()->put('operation', $operation);
          return array('status'=> 200, 'message'=> 'Operation Closed successfully. System mode changed. Have a nice time.');
        }else
        {
          return array('status'=> 400, 'message'=> 'Operation Close failed');
        }
    }
}
