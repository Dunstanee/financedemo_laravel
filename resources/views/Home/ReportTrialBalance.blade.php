@extends('App.App')
@section('content')
   
   
<div class="m-body" id="">
    <div class="card">
      <div class="card-body">
            <ul class="nav nav-pills" id="myTab3" role="tablist">
                <li class="nav-item">
                <a class="nav-link " id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Daily Trial Balance</a>
                </li>
                <li class="nav-item">
                <a class="nav-link " id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Monthly Trial Balance</a>
                </li>
                <li class="nav-item">
                <a class="nav-link " id="Decline-tab3" data-toggle="tab" href="#Decline3" role="tab" aria-controls="Decline" aria-selected="false">Yearly Trial Balance</a>
                </li>
            </ul>
                <div class="tab-content" id="myTabContent2">
                <!-- Daily Tab  -->
                <div class="tab-pane fade show " id="home3" role="tabpanel" aria-labelledby="home-tab3">
    
                <!-- Search  Button Daily  -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <button  onclick="printDiv('Daily')" class="m-1 btn btn-primary float-right"><i class="fas fa-print"></i>  Print</button>
                            <button id="Btnexport-1" class="m-1 btn btn-primary"><i class="fas fa-table"></i>  Export Excel</button>  
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                          <div class=" card-statistic-1">
                            <form method="post" class="form-inline mr-auto">
                                <div class="search-element">
                                  <input name="my_date" class="form-control " type="date" placeholder="Search" aria-label="Search" data-width="250">
                                  <button class="btn" name="Btn_Daily" type="submit"><i class="fas fa-filter"></i> Filter</button>
                                  <div class="search-backdrop"></div>
                                </div>
                            </form>
                          </div>
                        </div>                  
                    </div>
                    <hr>
                    <!-- end Search  Button Daily  -->
                    <div id="Daily">
                        <div class="row" >
                            <div class="container">
                                <div class="text-center">
                            <p><img width="200" src="assets/full_logo.png" alt="safina_logo"></p>
                        </div>
                            <h1 style="text-align: center;">DAILY TRIAL BALANCE FOR </h1>	
                            </div>
                        </div>
                        <div class="card card-body">
                            <div class="row m-1">
                                <div class="col-lg-12 col-md-12  col-sm-12 col-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped " id="table-Export-2">
                                        <thead>
                                            <tr class="header-table">
                                                <th class="text-center bg-secondary">Name</th>
                                                <th class="text-center bg-danger">Credit</th>
                                                <th class="text-center bg-success">Debit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @empty(!$TrialBalance)
    
                                            <tr>
                                            <td>CASH</td>
                                            <td>{{ number_format($TrialBalance[0]->cash_cr,2)}}</td>
                                            <td>{{ number_format($TrialBalance[0]->cash_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                            <td>DEBTOR</td>
                                            <td>{{ number_format($TrialBalance[0]->Debtor_cr,2)}}</td>
                                            <td>{{ number_format($TrialBalance[0]->Debtor_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>SUSPENSE</td>
                                                <td>{{ number_format($TrialBalance[0]->Suspense_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->Suspense_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>BANK</td>
                                                <td>{{ number_format($TrialBalance[0]->bank_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->bank_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>MPESA</td>
                                                <td>{{ number_format($TrialBalance[0]->mpesa_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->mpesa_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>LOAN</td>
                                                <td>{{ number_format($TrialBalance[0]->loans_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->loans_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>BORROWING</td>
                                                <td>{{ number_format($TrialBalance[0]->borrowings_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->borrowings_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>SHARE PREMIUM</td>
                                                <td>{{ number_format($TrialBalance[0]->share_prem_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->share_prem_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>PROPERTY PLANT</td>
                                                <td>{{ number_format($TrialBalance[0]->property_plant_eqpt_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->property_plant_eqpt_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>CBO RESERVE</td>
                                                <td>{{ number_format($TrialBalance[0]->cbo_reserve_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->cbo_reserve_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>REVENUE RESERVE</td>
                                                <td>{{ number_format($TrialBalance[0]->revenue_reserve_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->revenue_reserve_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>ASHES SHARES</td>
                                                <td>{{ number_format($TrialBalance[0]->ashes_shares_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->ashes_shares_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>ASHES COOPERATE</td>
                                                <td>{{ number_format($TrialBalance[0]->ashes_shares_dr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->ashes_cooperate_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>ASWAP SHARES</td>
                                                <td>{{ number_format($TrialBalance[0]->aswap_shares_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->aswap_shares_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>ASWAP MEMBER WELFARE CONTRIBUTION</td>
                                                <td>{{ number_format($TrialBalance[0]->aswap_member_welfare_contrib_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->aswap_member_welfare_contrib_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>ASWAP COOPERATE</td>
                                                <td>{{ number_format($TrialBalance[0]->aswap_cooperate_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->aswap_cooperate_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>INDIVIDUAL SAVINGS</td>
                                                <td>{{ number_format($TrialBalance[0]->indiv_savings_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->indiv_savings_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>VOLUNTARY SAVINGS</td>
                                                <td>{{ number_format($TrialBalance[0]->voluntary_savings_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->voluntary_savings_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>GROUP SAVINGS</td>
                                                <td>{{ number_format($TrialBalance[0]->group_savings_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->group_savings_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>COMPULSARY SAVINGS</td>
                                                <td>{{ number_format($TrialBalance[0]->compulsory_savings_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->compulsory_savings_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>FIXED SAVINGS</td>
                                                <td>{{ number_format($TrialBalance[0]->fixed_savings_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->fixed_savings_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>SHARES</td>
                                                <td>{{ number_format($TrialBalance[0]->shares_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->shares_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>BUILDING SHARES</td>
                                                <td>{{ number_format($TrialBalance[0]->building_shares_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->building_shares_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>INCOME</td>
                                                <td>{{ number_format($TrialBalance[0]->income_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->income_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>LOAN INSUARANCE FUND</td>
                                                <td>{{ number_format($TrialBalance[0]->loan_insur_fund_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->loan_insur_fund_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>EXPENDITURE</td>
                                                <td>{{ number_format($TrialBalance[0]->expenditure_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->expenditure_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>DIVIDENDS</td>
                                                <td>{{ number_format($TrialBalance[0]->dividends_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->dividends_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>SUPPLIER</td>
                                                <td>{{ number_format($TrialBalance[0]->supplier_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->supplier_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>CASH IN CUSTODY</td>
                                                <td>{{ number_format($TrialBalance[0]->Cash_Incustody_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->Cash_Incustody_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>FIXED ASSET</td>
                                                <td>{{ number_format($TrialBalance[0]->fixed_asset_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->fixed_asset_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>CURRENT ASSET</td>
                                                <td>{{ number_format($TrialBalance[0]->Current_Asset_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->Current_Asset_dr,2)}}</td>
                                            </tr>
                                            @endempty 
                                        </tbody>
                                        <tfoot>
                                            <tr class="bg-secondary">
                                            <th>TOTAL</th>
                                            <th>
                                                0
                                            </th>
                                            <th>
                                                0
                                                </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>	
                        </div>
                    </div>	
                </div>
    
                <!-- Monthly Tab  -->
                <div class="tab-pane show " id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                    
                <!-- Search  Button Monthly  -->
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <button  onclick="printDiv('Monthly')" class="m-1 btn btn-primary float-right"><i class="fas fa-print"></i>  Print</button>	
                        <button id="Btnexport-2" class="m-1 btn btn-primary"><i class="fas fa-table"></i>  Export Excel</button> 
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                      <div class=" card-statistic-1">
                        <form method="post" class="form-inline mr-auto">
                            <div class="search-element">
                              <input name="my_date" class="form-control " type="month" placeholder="Search" aria-label="Search" data-width="250">
                              <button class="btn" name="Btn_Monthly" type="submit"><i class="fas fa-filter"></i> Filter</button>
                              <div class="search-backdrop"></div>
                            </div>
                        </form>
                      </div>
                    </div>                  
                </div>
                <hr>
                <!-- end Search  Button Monthly  -->
                <div id="Monthly">
                    <div class="row" >
                        <div class="container">
                            <div class="text-center">
                            <p><img width="200" src="assets/full_logo.png" alt="safina_logo"></p>
                        </div>
                        <h1 style="text-align: center;">MONTHLY TRIAL BALANCE FOR </h1>	
                        </div>
                    </div>
                    <div class="card card-body">
                        <div class="row m-1">
                            <div class="col-lg-12 col-md-12  col-sm-12 col-12">
                                <div class="table-responsive">
                                    {{-- <table class="table table-bordered table-striped " id="table-Export-2">
                                        <thead>
                                            <tr class="header-table">
                                                <th class="text-center bg-secondary">Name</th>
                                                <th class="text-center bg-danger">Credit</th>
                                                <th class="text-center bg-success">Debit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <td>CASH</td>
                                            <td>{{ number_format($TrialBalance[0]->cash_cr,2)}}</td>
                                            <td>{{ number_format($TrialBalance[0]->cash_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                            <td>DEBTOR</td>
                                            <td>{{ number_format($TrialBalance[0]->Debtor_cr,2)}}</td>
                                            <td>{{ number_format($TrialBalance[0]->Debtor_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>SUSPENSE</td>
                                                <td>{{ number_format($TrialBalance[0]->Suspense_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->Suspense_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>BANK</td>
                                                <td>{{ number_format($TrialBalance[0]->bank_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->bank_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>MPESA</td>
                                                <td>{{ number_format($TrialBalance[0]->mpesa_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->mpesa_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>LOAN</td>
                                                <td>{{ number_format($TrialBalance[0]->loans_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->loans_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>BORROWING</td>
                                                <td>{{ number_format($TrialBalance[0]->borrowings_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->borrowings_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>SHARE PREMIUM</td>
                                                <td>{{ number_format($TrialBalance[0]->share_prem_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->share_prem_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>PROPERTY PLANT</td>
                                                <td>{{ number_format($TrialBalance[0]->property_plant_eqpt_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->property_plant_eqpt_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>CBO RESERVE</td>
                                                <td>{{ number_format($TrialBalance[0]->cbo_reserve_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->cbo_reserve_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>REVENUE RESERVE</td>
                                                <td>{{ number_format($TrialBalance[0]->revenue_reserve_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->revenue_reserve_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>ASHES SHARES</td>
                                                <td>{{ number_format($TrialBalance[0]->ashes_shares_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->ashes_shares_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>ASHES COOPERATE</td>
                                                <td>{{ number_format($TrialBalance[0]->ashes_cooperate_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->ashes_cooperate_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>ASWAP SHARES</td>
                                                <td>{{ number_format($TrialBalance[0]->aswap_shares_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->aswap_shares_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>ASWAP MEMBER WELFARE CONTRIBUTION</td>
                                                <td>{{ number_format($TrialBalance[0]->aswap_member_welfare_contrib_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->aswap_member_welfare_contrib_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>ASWAP COOPERATE</td>
                                                <td>{{ number_format($TrialBalance[0]->aswap_cooperate_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->aswap_cooperate_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>INDIVIDUAL SAVINGS</td>
                                                <td>{{ number_format($TrialBalance[0]->indiv_savings_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->indiv_savings_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>VOLUNTARY SAVINGS</td>
                                                <td>{{ number_format($TrialBalance[0]->voluntary_savings_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->voluntary_savings_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>GROUP SAVINGS</td>
                                                <td>{{ number_format($TrialBalance[0]->group_savings_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->group_savings_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>COMPULSARY SAVINGS</td>
                                                <td>{{ number_format($TrialBalance[0]->compulsory_savings_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->compulsory_savings_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>FIXED SAVINGS</td>
                                                <td>{{ number_format($TrialBalance[0]->fixed_savings_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->fixed_savings_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>SHARES</td>
                                                <td>{{ number_format($TrialBalance[0]->shares_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->shares_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>BUILDING SHARES</td>
                                                <td>{{ number_format($TrialBalance[0]->building_shares_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->building_shares_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>INCOME</td>
                                                <td>{{ number_format($TrialBalance[0]->income_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->income_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>LOAN INSUARANCE FUND</td>
                                                <td>{{ number_format($TrialBalance[0]->loan_insur_fund_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->loan_insur_fund_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>EXPENDITURE</td>
                                                <td>{{ number_format($TrialBalance[0]->expenditure_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->expenditure_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>DIVIDENDS</td>
                                                <td>{{ number_format($TrialBalance[0]->dividends_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->dividends_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>SUPPLIER</td>
                                                <td>{{ number_format($TrialBalance[0]->supplier_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->supplier_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>CASH IN CUSTODY</td>
                                                <td>{{ number_format($TrialBalance[0]->Cash_Incustody_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->Cash_Incustody_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>FIXED ASSET</td>
                                                <td>{{ number_format($TrialBalance[0]->fixed_asset_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->fixed_asset_dr,2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>CURRENT ASSET</td>
                                                <td>{{ number_format($TrialBalance[0]->Current_Asset_cr,2)}}</td>
                                                <td>{{ number_format($TrialBalance[0]->Current_Asset_dr,2)}}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr class="bg-secondary">
                                            <th>TOTAL</th>
                                            <th><?php 
                                            echo number_format(($transaction_ledger_Monthly['sum(cash_cr)'] + $transaction_ledger_Monthly['sum(bank_cr)'] + $transaction_ledger_Monthly['sum(loans_cr)'] + $transaction_ledger_Monthly['sum(borrowings_cr)'] + $transaction_ledger_Monthly['sum(share_prem_cr)'] + $transaction_ledger_Monthly['sum(property_plant_eqpt_cr)'] + $transaction_ledger_Monthly['sum(cbo_reserve_cr)'] + $transaction_ledger_Monthly['sum(revenue_reserve_cr)'] + $transaction_ledger_Monthly['sum(ashes_shares_cr)'] + $transaction_ledger_Monthly['sum(ashes_cooperate_cr)'] + $transaction_ledger_Monthly['sum(aswap_shares_cr)'] + $transaction_ledger_Monthly['sum(aswap_member_welfare_contrib_cr)'] + $transaction_ledger_Monthly['sum(aswap_cooperate_cr)'] +  $transaction_ledger_Monthly['sum(indiv_savings_cr)'] + $transaction_ledger_Monthly['sum(voluntary_savings_cr)'] + $transaction_ledger_Monthly['sum(group_savings_cr)'] + $transaction_ledger_Monthly['sum(compulsory_savings_cr)'] + $transaction_ledger_Monthly['sum(fixed_savings_cr)'] + $transaction_ledger_Monthly['sum(shares_cr)'] + $transaction_ledger_Monthly['sum(building_shares_cr)'] + $transaction_ledger_Monthly['sum(income_cr)'] + $transaction_ledger_Monthly['sum(loan_insur_fund_cr)'] + $transaction_ledger_Monthly['sum(expenditure_cr)'] + $transaction_ledger_Monthly['sum(dividends_cr)'] + $transaction_ledger_Monthly['sum(supplier_cr)'] + $transaction_ledger_Monthly['sum(Cash_Incustody_cr)']+ $transaction_ledger_Monthly['sum(mpesa_cr)'] + $transaction_ledger_Monthly['sum(fixed_asset_cr)']+$transaction_ledger_Monthly['sum(Current_Asset_cr)']+ $transaction_ledger_Monthly['sum(Debtor_cr)'] + $transaction_ledger_Monthly['sum(Suspense_cr)'] ),2);
                                            ?></th>
                                            <th>
                                            <?php 
                                            echo number_format(($transaction_ledger_Monthly['sum(cash_dr)'] + $transaction_ledger_Monthly['sum(bank_dr)'] + $transaction_ledger_Monthly['sum(loans_dr)'] + $transaction_ledger_Monthly['sum(borrowings_dr)'] + $transaction_ledger_Monthly['sum(share_prem_dr)'] + $transaction_ledger_Monthly['sum(property_plant_eqpt_dr)'] + $transaction_ledger_Monthly['sum(cbo_reserve_dr)'] + $transaction_ledger_Monthly['sum(revenue_reserve_dr)'] + $transaction_ledger_Monthly['sum(ashes_shares_dr)'] + $transaction_ledger_Monthly['sum(ashes_cooperate_dr)'] + $transaction_ledger_Monthly['sum(aswap_shares_dr)'] + $transaction_ledger_Monthly['sum(aswap_member_welfare_contrib_dr)'] + $transaction_ledger_Monthly['sum(aswap_cooperate_dr)'] +  $transaction_ledger_Monthly['sum(indiv_savings_dr)'] + $transaction_ledger_Monthly['sum(voluntary_savings_dr)'] + $transaction_ledger_Monthly['sum(group_savings_dr)'] + $transaction_ledger_Monthly['sum(compulsory_savings_dr)'] + $transaction_ledger_Monthly['sum(fixed_savings_dr)'] + $transaction_ledger_Monthly['sum(shares_dr)'] + $transaction_ledger_Monthly['sum(building_shares_dr)'] + $transaction_ledger_Monthly['sum(income_dr)'] + $transaction_ledger_Monthly['sum(loan_insur_fund_dr)'] + $transaction_ledger_Monthly['sum(expenditure_dr)'] + $transaction_ledger_Monthly['sum(dividends_dr)'] + $transaction_ledger_Monthly['sum(supplier_dr)'] + $transaction_ledger_Monthly['sum(Cash_Incustody_dr)'] + $transaction_ledger_Monthly['sum(mpesa_dr)'] +$transaction_ledger_Monthly['sum(fixed_asset_dr)'] +$transaction_ledger_Monthly['sum(Current_Asset_dr)'] + $transaction_ledger_Monthly['sum(Debtor_dr)'] +$transaction_ledger_Monthly['sum(Suspense_dr)'] ),2);
                                            ?>
                                            </th>
                                            </tr>
                                        </tfoot>
                                    </table> --}}
                                </div>
                            </div>
                        </div>	
                    </div>
                </div>
                </div>
    
                <!-- Yearly Tab -->
                <div class="tab-pane show >" id="Decline3" role="tabpanel" aria-labelledby="Decline-tab3">
                      <!-- Search  Button Monthly  -->
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <button  onclick="printDiv('Yearly')" class="m-1 btn btn-primary float-right"><i class="fas fa-print"></i>  Print Report</button>	
                        <button id="Btnexport-3" class="m-1 btn btn-primary"><i class="fas fa-table"></i>  Export Excel</button> 
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                      <div class=" card-statistic-1">
                        <form method="post" class="form-inline mr-auto">
                            <div class="search-element">
                              <select name="my_date" class="form-control "  placeholder="Year" aria-label="Search" data-width="250">
                                  <option value="">Choose Year..</option>}
                                  option
                                  <?php 
                                for($year=date('Y'); $year>=2000; $year--)
                                {
                                ?>
                                <option value="<?php echo $year ?>"><?php echo $year ?></option>
                                <?php
                                }
                                   ?>
                              </select>
                              <button class="btn" name="Btn_Yearly" type="submit"><i class="fas fa-filter"></i> Filter</button>
                              <div class="search-backdrop"></div>
                            </div>
                        </form>
                      </div>
                    </div>                  
                </div>
                <hr>
                <!-- end Search  Button Monthly  -->
                <div id="Yearly">
                    <div class="row" >
                        <div class="container">
                            <div class="text-center">
                            <p><img width="200" src="assets/full_logo.png" alt="safina_logo"></p>
                        </div>
                        <h1 style="text-align: center;">YEAR TRIAL BALANCE FOR </h1>	
                        </div>
                    </div>
                    <div class="card card-body">
                        <div class="row m-1">
                            <div class="col-lg-12 col-md-12  col-sm-12 col-12">
                                <div class="table-responsive">
                                    {{-- <table class="table table-bordered table-striped " id="table-Export-3">
                                        <thead>
                                            <tr class="header-table">
                                                <th class="text-center bg-secondary">Name</th>
                                                <th class="text-center bg-danger">Credit</th>
                                                <th class="text-center bg-success">Debit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <td>CASH</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(cash_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(cash_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>DEBTOR</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(Debtor_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(Debtor_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>SUSPENSE</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(Suspense_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger['sum(Suspense_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>BANK</td>
                                            <td><?php echo number_format($transaction_ledger['sum(bank_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(bank_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>MPESA</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(mpesa_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(mpesa_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>LOAN</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(loans_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(loans_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>BORROWING</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(borrowings_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(borrowings_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>SHARE PREMIUM</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(share_prem_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(share_prem_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>PROPERTY PLANT</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(property_plant_eqpt_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(property_plant_eqpt_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>CBO RESERVE</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(cbo_reserve_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(cbo_reserve_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>REVENUE RESERVE</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(revenue_reserve_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(revenue_reserve_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>ASHES SHARES</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(ashes_shares_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(ashes_shares_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>ASHES COOPERATE</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(ashes_cooperate_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(ashes_cooperate_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>ASWAP SHARES</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(aswap_shares_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(aswap_shares_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>ASWAP MEMBER WELFARE CONTRIBUTION</td>
                                            <td><?php echo number_format($transaction_ledger['sum(aswap_member_welfare_contrib_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger['sum(aswap_member_welfare_contrib_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>ASWAP COOPERATE</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(aswap_cooperate_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(aswap_cooperate_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>INDIVIDUAL SAVINGS</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(indiv_savings_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(indiv_savings_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>VOLUNTARY SAVINGS</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(voluntary_savings_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(voluntary_savings_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>GROUP SAVINGS</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(group_savings_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(group_savings_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>COMPULSARY SAVINGS</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(compulsory_savings_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(compulsory_savings_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>FIXED SAVINGS</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(fixed_savings_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(fixed_savings_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>SHARES</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(shares_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(shares_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>BUILDING SHARES</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(building_shares_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(building_shares_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>INCOME</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(income_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(income_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>LOAN INSUARANCE FUND</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(loan_insur_fund_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(loan_insur_fund_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>EXPENDITURE</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(expenditure_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(expenditure_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>DIVIDENDS</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(dividends_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(dividends_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>SUPPLIER</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(supplier_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(supplier_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>CASH IN CUSTODY</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(Cash_Incustody_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(Cash_Incustody_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>FIXED ASSET</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(fixed_asset_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(fixed_asset_dr,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>CURRENT ASSET</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(Current_Asset_cr,2)}}</td>
                                            <td><?php echo number_format($transaction_ledger_Yearly['sum(Current_Asset_dr,2)}}</td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr class="bg-secondary">
                                            <th>TOTAL</th>
                                            <th><?php 
                                            echo number_format(($transaction_ledger_Yearly['sum(cash_cr)'] + $transaction_ledger_Yearly['sum(bank_cr)'] + $transaction_ledger_Yearly['sum(loans_cr)'] + $transaction_ledger_Yearly['sum(borrowings_cr)'] + $transaction_ledger_Yearly['sum(share_prem_cr)'] + $transaction_ledger_Yearly['sum(property_plant_eqpt_cr)'] + $transaction_ledger_Yearly['sum(cbo_reserve_cr)'] + $transaction_ledger_Yearly['sum(revenue_reserve_cr)'] + $transaction_ledger_Yearly['sum(ashes_shares_cr)'] + $transaction_ledger_Yearly['sum(ashes_cooperate_cr)'] + $transaction_ledger_Yearly['sum(aswap_shares_cr)'] + $transaction_ledger_Yearly['sum(aswap_member_welfare_contrib_cr)'] + $transaction_ledger_Yearly['sum(aswap_cooperate_cr)'] +  $transaction_ledger_Yearly['sum(indiv_savings_cr)'] + $transaction_ledger_Yearly['sum(voluntary_savings_cr)'] + $transaction_ledger_Yearly['sum(group_savings_cr)'] + $transaction_ledger_Yearly['sum(compulsory_savings_cr)'] + $transaction_ledger_Yearly['sum(fixed_savings_cr)'] + $transaction_ledger_Yearly['sum(shares_cr)'] + $transaction_ledger_Yearly['sum(building_shares_cr)'] + $transaction_ledger_Yearly['sum(income_cr)'] + $transaction_ledger_Yearly['sum(loan_insur_fund_cr)'] + $transaction_ledger_Yearly['sum(expenditure_cr)'] + $transaction_ledger_Yearly['sum(dividends_cr)'] + $transaction_ledger_Yearly['sum(supplier_cr)'] + $transaction_ledger_Yearly['sum(Cash_Incustody_cr)']+ $transaction_ledger_Yearly['sum(mpesa_cr)'] + $transaction_ledger_Yearly['sum(fixed_asset_cr)']+$transaction_ledger_Yearly['sum(Current_Asset_cr)']+ $transaction_ledger_Yearly['sum(Debtor_cr)'] + $transaction_ledger_Yearly['sum(Suspense_cr)'] ),2);
                                            ?></th>
                                            <th>
                                            <?php 
                                            echo number_format(($transaction_ledger_Yearly['sum(cash_dr)'] + $transaction_ledger_Yearly['sum(bank_dr)'] + $transaction_ledger_Yearly['sum(loans_dr)'] + $transaction_ledger_Yearly['sum(borrowings_dr)'] + $transaction_ledger_Yearly['sum(share_prem_dr)'] + $transaction_ledger_Yearly['sum(property_plant_eqpt_dr)'] + $transaction_ledger['sum(cbo_reserve_dr)'] + $transaction_ledger_Yearly['sum(revenue_reserve_dr)'] + $transaction_ledger_Yearly['sum(ashes_shares_dr)'] + $transaction_ledger_Yearly['sum(ashes_cooperate_dr)'] + $transaction_ledger_Yearly['sum(aswap_shares_dr)'] + $transaction_ledger_Yearly['sum(aswap_member_welfare_contrib_dr)'] + $transaction_ledger_Yearly['sum(aswap_cooperate_dr)'] +  $transaction_ledger_Yearly['sum(indiv_savings_dr)'] + $transaction_ledger_Yearly['sum(voluntary_savings_dr)'] + $transaction_ledger_Yearly['sum(group_savings_dr)'] + $transaction_ledger_Yearly['sum(compulsory_savings_dr)'] + $transaction_ledger_Yearly['sum(fixed_savings_dr)'] + $transaction_ledger_Yearly['sum(shares_dr)'] + $transaction_ledger_Yearly['sum(building_shares_dr)'] + $transaction_ledger_Yearly['sum(income_dr)'] + $transaction_ledger_Yearly['sum(loan_insur_fund_dr)'] + $transaction_ledger_Yearly['sum(expenditure_dr)'] + $transaction_ledger_Yearly['sum(dividends_dr)'] + $transaction_ledger_Yearly['sum(supplier_dr)'] + $transaction_ledger_Yearly['sum(Cash_Incustody_dr)'] + $transaction_ledger_Yearly['sum(mpesa_dr)'] +$transaction_ledger_Yearly['sum(fixed_asset_dr)'] +$transaction_ledger_Yearly['sum(Current_Asset_dr)'] + $transaction_ledger_Yearly['sum(Debtor_dr)'] +$transaction_ledger_Yearly['sum(Suspense_dr)'] ),2);
                                            ?>
                                            </th>
                                        </tr>
                                        </tfoot>
                                    </table> --}}
                                </div>
                            </div>
                        </div>	
                    </div>
                </div>
                </div>
    
        </div>
      </div>
    </div>
    </div>
@endsection