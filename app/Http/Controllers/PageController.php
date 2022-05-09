<?php

namespace App\Http\Controllers;


use App\Models\Member;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Self_;

class PageController extends Controller
{
    public function api_index()
    {
        return Member::all();
    }
   public function login()
   {
       if(session()->has('staff'))
       {
        return view('Dashboard');  
       }
       return view('Login');
   }
   public function Signout(Request $request)
   {
         $checked = self::Checkloggins($request);
         if ($checked == 0) {
             return redirect('/');
         }
       $request->session()->forget('staff');
       return redirect('/');
   }
   public function Dashboard(Request $request)
   {
        $checked = self::Checkloggins($request);
        if ($checked == 0) {
            return redirect('/');
        }
       return view('Home.Dashboard',['name'=> 'Dashboard']);
   }
   public function StaffNew(Request $request)
   {
        $checked = self::Checkloggins($request);
        if ($checked == 0) {
            return redirect('/');
        }
       return view('Home.StaffNew',['name'=> 'New Staff']);
    }
   public function Newmember(Request $request)
   {
        $checked = self::Checkloggins($request);
        if ($checked == 0) {
            return redirect('/');
        }
       return view('Home.MemberNew',['name'=> 'New Member']);
   }
   public function StaffList(Request $request)
   {
        $checked = self::Checkloggins($request);
        if ($checked == 0) {
            return redirect('/');
        }
       $list  = DB::table('staffs')->get();
       return view('Home.StaffManage',['name'=> 'Staff Control', 'staffs'=> $list]);
    }
    public function IncomeList(Request $request)
    {
         $checked = self::Checkloggins($request);
         if ($checked == 0) {
             return redirect('/');
         }
       $incomelist  = DB::table('income_lists')->get();
       return view('Home.Income',['name'=> 'Income Categories', 'IncomeList'=> $incomelist]);
    }
   public function IncomeEdit($id,Request $request)
   {
        $checked = self::Checkloggins($request);
        if ($checked == 0) {
            return redirect('/');
        }
       $incomedata  = DB::table('income_lists')->find($id);
       return view('Home.IncomeEdit',['name'=> 'Income Edit', 'incomedata'=> $incomedata]);
    }
    public function IncomeCategory(Request $request)
    {
         $checked = self::Checkloggins($request);
         if ($checked == 0) {
             return redirect('/');
         }
       return view('Home.IncomeCategory',['name'=> 'New Income Category']);
    }
   public function IncomePost(Request $request)
   {
        $checked = self::Checkloggins($request);
        if ($checked == 0) {
            return redirect('/');
        }
        $incomedata  = DB::table('income_lists')->get();
        $paymode  = DB::table('paymodes')->get();
        return view('Home.IncomePost',['name'=> 'Post Income','Incomelist' =>  $incomedata,'Paymodes' =>$paymode ]);
    }
    public function IncomeReport(Request $request)
    {
         $checked = self::Checkloggins($request);
         if ($checked == 0) {
             return redirect('/');
         }
        $incomereport  = DB::table('incomes')
        ->join('income_lists','income_lists.id', '=','incomes.source_id' )
        ->select('incomes.*','income_lists.category_name as category')
        ->get();
        $name = 'Income Report '.date('d M, Y');
        return view('Home.IncomeReport',['name'=> $name ,'IncomeReport' =>  $incomereport]);
    }
    public function TrialBalance(Request $request)
   {
        $checked = self::Checkloggins($request);
        if ($checked == 0) {
            return redirect('/');
        }
       $today = date('Y-m-d');
        $TrialBalance  = DB::table('trial_balance_daily')
        ->where('transactiondate',$today)
        ->where('Tenant', 1)
        ->get();
        $name = 'Trial Balance ';
        return view('Home.ReportTrialBalance',['name'=> $name ,'TrialBalance' =>  $TrialBalance]);
    }
   public function Members(Request $request)
   {
        $checked = self::Checkloggins($request);
        if ($checked == 0) {
            return redirect('/');
        }
       $today = date('Y-m-d');
        $Members  = DB::table('members')
                                    ->where('tenantid', 1)
                                    ->get();
       $name = 'Manage Member ';
       return view('Home.Members',['name'=> $name ,'Members' =>  $Members]);
    }
    public function MemberAuth(Request $request)
    {
        $checked = self::Checkloggins($request);
        if ($checked == 0) {
            return redirect('/');
        }
       $today = date('Y-m-d');
        $Members  = DB::table('members')
        ->where('tenantid', 1)
        ->get();
        $name = 'Member Freezing ';
       return view('Home.MemberAuth',['name'=> $name ,'Members' =>  $Members]);
    }
   public function MemberOpenAccounts(Request $request, $id)
   {
        $checked = self::Checkloggins($request);
        if ($checked == 0) {
            return redirect('/');
        }
       
       $OpenAccounts  = DB::table('memberaccounts')->where('memberid',$id)->select('memberaccounts.accountid as accountid')->get();
       $AccountList = [];
       
       foreach ($OpenAccounts as $value) {
           array_push($AccountList, $value->accountid);
       }
       $Members  = DB::table('members')->where('id',$id)->get();
        $Accounts  = DB::table('accounts')->get();
        $MemberData = $Members;
        $counts = count($Members);
        if ($counts > 0) {
            $Member = $Members[0];
             $name = 'Open Account for '.$Member->first_name.' '.$Member->second_name.' '.$Member->last_name;
        } else {
            $MemberData = $Members;
            $name = 'Member not found ';
        }
        
       
        return view('Home.MemberAcc',['name'=> $name ,'Accounts' =>  $Accounts,'OpenAccounts'=> $AccountList, 'Members' => $MemberData]);
    }
    public function MemberReport(Request $request)
    {
        $checked = self::Checkloggins($request);
        if ($checked == 0) {
            return redirect('/');
        }
        $Members  = DB::table('members')
                                    ->get();
        return view('Home.MemberReport',['name'=> 'Member Report','Members'=>  $Members]);
    }
    public function MemberView(Request $request, $id)
    {
        $checked = self::Checkloggins($request);
        if ($checked == 0) {
            return redirect('/');
        }
        $SingleMember = DB::table('members')
                                ->select('id','first_name','second_name','last_name','gender','mobile','email','status','active','registration_date','occupation','branchid','groupid','village','kra_pin','national_id','profile_image')
                                ->where('id',$id)->get();
     
        foreach ($SingleMember as $value) {

            $value->Accounts = DB::table('memberaccounts')
                                    ->join('accounts','accounts.id','=','memberaccounts.accountid')
                                    ->where('memberid',$id)
                                    ->select('memberaccounts.accountid as accountid', 'accounts.account_name as accountname')
                                    ->get();
               foreach ($value->Accounts as  $item) {
                   $item->Balance = DB::table('accountentries')
                            ->where('accountid',$item->accountid)
                            ->where('memberid',$id)
                            ->sum('deposit_amount') - DB::table('accountentries')
                            ->where('accountid',$item->accountid)
                            ->where('memberid',$id)
                            ->sum('withdraw_amount');
               }                     
            
                            
        }
        
        return view('Home.MemberView',['name'=> 'Member Account','Member'=>  $SingleMember]);
    }
    public function Withdraw(Request $request)
    {
        $checked = self::Checkloggins($request);
        if ($checked == 0) {
            return redirect('/');
        }
        $Members  = DB::table('members')
                                    ->get();
        return view('Home.Withdraw',['name'=> 'Withdraw Cash','Members'=>  $Members]);
        
    }
    public function Deposit(Request $request)
    {
        $checked = self::Checkloggins($request);
        if ($checked == 0) {
            return redirect('/');
        }
        $Members  = DB::table('members')
                                    ->get();
        return view('Home.Deposit',['name'=> 'Account Deposit','Members'=>  $Members]);
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

    
    public function Transactions($ac_id,$m_id,Request $request)
    {
        $checked = self::Checkloggins($request);
        if ($checked == 0) {
            return redirect('/');
        }
      $Transactions =   DB::table('accountentries')
                                    ->where('accountid',$ac_id)
                                    ->where('memberid',$m_id)
                                    ->get();
        foreach ($Transactions as $item) {
            $item->Mode = DB::table('paymodes')->where('id',$item->trans_mode)->select('modename')->get();
        }
        
        
        return view('Home.MemberTransaction',['name'=> 'Transaction History','Transactions'=>  $Transactions,'Memberid'=>$m_id]);
    }
    public function CashBook(Request $request)
    {
        $Async = new SynchronizeController();
      $date = $Async->currentDate($request);
        $checked = self::Checkloggins($request);
        if ($checked == 0) {
            return redirect('/');
        }
        $cashbook = DB::table('safeaccounts')
                        ->where('tenant_id',session('staff')->tenantid)
                        ->groupBy('tenant_id')
                        ->select('tenant_id')
                        ->get();
        foreach ($cashbook as  $value) {
            $value->Cashbook =   DB::table('cashbooks')
                                    ->where('tenant_id',session('staff')->tenantid)
                                    ->where('transaction_date',$date)
                                    ->where('status',0)
                                    ->get();
            $value->Businessinfo = self::Businessdata($request);
            
        }
        
        return view('Home.CashBook',['name'=> 'Cash Book Entries','Cashbook'=>  $cashbook]);
    }
    public function Businessinfo(Request $request)
    {
        $Async = new SynchronizeController();
      $date = $Async->currentDate($request);
        
        $cashbook = DB::table('safeaccounts')
                        ->where('tenant_id',session('staff')->tenantid)
                        ->groupBy('tenant_id')
                        ->select('tenant_id')
                        ->get();
        foreach ($cashbook as  $value) {
            $value->Cashbook =   DB::table('cashbooks')
                                    ->where('tenant_id',session('staff')->tenantid)
                                    ->where('transaction_date',$date)
                                    ->where('status',0)
                                    ->get();
            $value->Businessinfo = self::Businessdata($request);
            
        }
        
        return $cashbook;
    }
    public function BusinessSchedule(Request $request)
    {
        $checked = self::Checkloggins($request);
        if ($checked == 0) {
            return redirect('/');
        }
        $Businessdata = self::Businessdata($request);

        return view('Home.BusinessOperation',['name'=> 'Business Operations','Businessdata'=>$Businessdata]);
    }
    public function OpenBusiness(Request $request)
    {
        $checked = self::Checkloggins($request);
        if ($checked == 0) {
            return redirect('/');
        }
        $Businessdata = self::Businessdata($request);

        return view('Home.BusinessOpen',['name'=> 'Open Business','Businessdata'=>$Businessdata]);
    }
    public function CloseBusiness(Request $request)
    {
        $checked = self::Checkloggins($request);
        if ($checked == 0) {
            return redirect('/');
        }
        $data = self::Businessdata($request);
        return view('Home.BusinessClose',['name'=> 'Close Business','Businessdata'=>$data]);
    }
    public function Businessdata($request)
    {
        $Async = new SynchronizeController();
      $date = $Async->currentDate($request);
        $Businessdata = DB::table('safeaccounts')
                        ->where('tenant_id',session('staff')->tenantid)
                        ->groupBy('tenant_id')
                        ->select('tenant_id')
                        ->get();
            foreach ($Businessdata as  $value) {
                $value->safebalance = DB::table('safeaccounts')
                                        -> where('tenant_id',$value->tenant_id)
                                        ->sum('deposit_amount') - DB::table('safeaccounts')
                                        -> where('tenant_id',$value->tenant_id)
                                        ->sum('withdraw_amount');
                $value->Cashathand = DB::table('cashbooks')
                                        -> where('tenant_id',$value->tenant_id)
                                        -> whereIn('status',[0,1])
                                        ->sum('cash_in') - DB::table('cashbooks')
                                        -> where('tenant_id',$value->tenant_id)
                                        -> whereIn('status',[0,1])
                                        ->sum('cash_out');
                $value->OpeningBalance = DB::table('businessoperations')
                                        -> where('tenant_id',$value->tenant_id)
                                        -> where('status',1)
                                        ->sum('open_balance');
                $value->Pendingapproval = DB::table('safeoperations')
                                        -> where('tenant_id',$value->tenant_id)
                                        -> where('request_status',1)
                                        ->sum('return_amount');
                $value->RequestedCash =0;
                $value->operationhistory = DB::table('businessoperations')
                                            -> join('staffs', 'staffs.id', '=', 'businessoperations.opened_by')
                                            -> where('tenant_id',$value->tenant_id)
                                            -> select('businessoperations.*','staffs.first_name','staffs.middle_name','staffs.last_name')
                                            ->get();
                $value->SafeReturn = DB::table('safeoperations')
                                            -> join('staffs','staffs.id','=','safeoperations.request_by')
                                            -> where('tenant_id',$value->tenant_id)
                                            -> where('return_amount','>',0)
                                            ->select('safeoperations.*','staffs.first_name','staffs.middle_name','staffs.last_name')
                                            ->get();
                $value->SafeRequest = DB::table('safeoperations')
                                            -> join('staffs','staffs.id','=','safeoperations.request_by')
                                            -> where('tenant_id',$value->tenant_id)
                                            -> where('request_amount','>',0)
                                            ->select('safeoperations.*','staffs.first_name','staffs.middle_name','staffs.last_name')
                                            ->get();

            }
            return $Businessdata;
    }
    public function CashReturn(Request $request)
    {
        $checked = self::Checkloggins($request);
        if ($checked == 0) {
            return redirect('/');
        }
        $data = self::Businessdata($request);
        return view('Home.CashierReturn',['name'=> 'Cash Return Window','Businessdata'=>$data]);
    }
}
