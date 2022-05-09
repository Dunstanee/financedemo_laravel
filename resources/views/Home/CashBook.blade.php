@extends('App.App')
@section('content')
    
    <style type="text/css" media="screen">
	
        .header-table th{
            color:white !important;
        }
    </style>
    <div class="m-body">
        <!-- loan statistics  -->
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-university"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Opening Balance</h4>
                  </div>
                  <div class="card-body stats ">
                    {{number_format($Cashbook[0]->Businessinfo[0]->OpeningBalance,2)}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 ">
                @if (session('operation'))
                    <div class="card card-statistic-1 d-flex bg-primary" style="padding: 27px !important">
                        <h3 class="align-self-center">DAY ACTIVE</h3> 
                    </div>
                @else
                    <div class="card card-statistic-1 d-flex bg-danger" style="padding: 27px !important">
                        <h3 class="align-self-center">DAY CLOSED</h3> 
                    </div>
                @endif
                
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success ">
                  <i class="fas fa-calendar"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Cash at Hand</h4>
                  </div>
                  <div class="card-body stats">
                    {{number_format($Cashbook[0]->Businessinfo[0]->Cashathand,2)}}
                  </div>
                </div>
              </div>
            </div>                  
        </div>
        <!-- end of loan Statistics  -->
        <!-- loan statistics  -->
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class=" card-statistic-1">
                <form method="post" class="form-inline mr-auto">
                    <div class="search-element">
                      <input name="my_date" class="form-control " type="date" placeholder="Search" aria-label="Search" data-width="250">
                      <button class="btn" name="Search_Date" type="submit"><i class="fas fa-filter"></i></button>
                      <div class="search-backdrop"></div>
                    </div>
                </form>
              </div>
            </div>                  
        </div>
        <!-- end of loan Statistics  -->
        <div class="row" >
            <div class="container">
            <h1 style="text-align: center;">CASH BOOK FOR {{ date('d M,Y',strtotime(date('Y-m-d')))}} </h1>	
            <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12  col-sm-12 col-12">
                <table class="table">
                    <thead class="bg-danger header-table" >
                        <tr>
                            <th>DEBIT</th>
                            <th class="text-right">ENTRY</th>
                        </tr>
                    </thead>
                </table>
                <div class="table-responsive">
                        <table class="table table-bordered" id="table-1">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Internal</th>
                                    <th>Cash</th>
                                    <th>Mpesa</th>
                                    <th>Bank</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cash_in =0;
                                    $mpesa_in =0;
                                    $bank_in =0;
                                    $internal_in =0;
                                    $Total_Received = 0;
                                @endphp
                                @foreach ($Cashbook[0]->Cashbook as $item)
                                    @if (($item->internal_in + $item->cash_in + $item->mpesa_in + $item->bank_in) > 0  )
                                        @php
                                            $cash_in =$cash_in + $item->cash_in;
                                            $mpesa_in =$mpesa_in + $item->mpesa_in;
                                            $bank_in =$bank_in + $item->bank_in;
                                            $internal_in =$internal_in + $item->internal_in;
                                            $Total_Received = $Total_Received + ($item->internal_in + $item->cash_in + $item->mpesa_in + $item->bank_in);
                                        @endphp
                                        <tr>
                                            <td>{{ strtolower($item->title)}}</td>
                                            <td>{{number_format($item->internal_in,2)}}</td>
                                            <td>{{number_format($item->cash_in,2)}}</td>
                                            <td>{{number_format($item->mpesa_in,2)}}</td>
                                            <td>{{number_format($item->bank_in,2)}}</td>
                                        </tr>
                                    @endif  
                                @endforeach
                                <tfoot class="bg-info header-table">
                                    <tr>
                                        <th></th>
                                        <th>{{number_format($internal_in,2)}}</th>
                                        <th>{{number_format($cash_in,2)}}</th>
                                        <th>{{number_format($mpesa_in,2)}}</th>
                                        <th>{{number_format($bank_in,2)}}</th>
                                    </tr>
                                </tfoot>
                            </tbody>
                        </table>
                    
                </div>
            </div>
            <div class="col-lg-6 col-md-12  col-sm-12 col-12">
                
                <table class="table">
                    <thead class="bg-success header-table">
                        <tr>
                            <th>CREDIT</th>
                            <th class="text-right">ENTRY</th>
                        </tr>
                    </thead>
                </table>
                <div class="table-responsive">
                <table class="table table-bordered" id="table-2">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Internal</th>
                            <th>Cash</th>
                            <th>Mpesa</th>
                            <th>Bank</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $cash_out =0;
                            $mpesa_out =0;
                            $bank_out =0;
                            $internal_out =0;
                            $Total_Cashout = 0;
                        @endphp
                        @foreach ($Cashbook[0]->Cashbook as $item)
                            @if (($item->internal_out + $item->cash_out + $item->mpesa_out + $item->bank_out) > 0  )
                                @php
                                    $cash_out =$cash_out + $item->cash_out;
                                    $mpesa_out =$mpesa_out + $item->mpesa_out;
                                    $bank_out =$bank_out + $item->bank_out;
                                    $internal_out =$internal_out + $item->internal_out;
                                    $Total_Cashout = $Total_Cashout + ($item->internal_out + $item->cash_out + $item->mpesa_out + $item->bank_out);
                                @endphp
                                <tr>
                                    <td>{{ strtolower($item->title)}}</td>
                                    <td>{{number_format($item->internal_out,2)}}</td>
                                    <td>{{number_format($item->cash_out,2)}}</td>
                                    <td>{{number_format($item->mpesa_out,2)}}</td>
                                    <td>{{number_format($item->bank_out,2)}}</td>
                                </tr>
                            @endif  
                        @endforeach
                        
                         <tfoot class="bg-info header-table">
                             <tr>
                                 <th></th>
                                 <th>{{number_format($internal_out,2)}}</th>
                                 <th>{{number_format($cash_out,2)}}</th>
                                 <th>{{number_format($mpesa_out,2)}}</th>
                                 <th>{{number_format($bank_out,2)}}</th>
                             </tr>
                         </tfoot>
                    </tbody>
                </table>
                </div>
                
            </div>
            
        </div>
        <hr>	
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                
                <h3 class="text-center">SUMMARY</h3>
                <hr>
                <table class="table table-bordered">
                    <tr>
                        <td class="bg-info text-white text-bold">Opening Balance</td>
                        <td style="font-size: 20px; font-weight: bold;">{{number_format($Cashbook[0]->Businessinfo[0]->OpeningBalance,2)}}</td>
                    </tr>
                    <tr>
                        <td class="bg-success text-white text-bold">Total Received</td>
                        <td style="font-size: 20px; font-weight: bold;">{{number_format($Total_Received,2)}}</td>
                    </tr>
                    <tr>
                        <td class="bg-danger text-white text-bold">Total Cashout</td>
                        <td style="font-size: 20px; font-weight: bold;">({{ number_format($Total_Cashout,2) }})</td>
                    </tr>
                    <tr>
                        <td class="bg-primary text-white text-bold">Cash Balance</td>
                        <td style="font-size: 20px; font-weight: bold;">={{number_format($Cashbook[0]->Businessinfo[0]->Cashathand,2)}}</td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
@endsection