@extends('App.App')
@section('content')
<style>
      .stats{
    font-size: 16px !important;
}
.balance, .paid{
    color: white;
    opacity: 0.8;
}
.header-table th{
    color:white !important;
}
</style>
<div class="m-body">
    <div class="card">
      <div class="card-body">
        <ul class="nav nav-pills" id="myTab3" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Main Income</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Other Income</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent2">
          <div class="tab-pane fade show active " id="home3" role="tabpanel" aria-labelledby="home-tab3">
            <!-- table  -->
                    <div class=" m-1">
                        <div class="">
                            <table class="table table1 table-striped " id="table-2">
                              <thead class="bg-primary" >
                                <tr class="header-table">
                                  <th class="data1">Id</th>
                                  <th>Category</th>
                                  <th>Details</th>
                                  <th>Total Amount</th>
                                  <th>Date & Time</th>
                                  
                                </tr>
                              </thead>
                              <tbody> 
                               @php
                                   $i = 1;
                                    $Total_Income = 0;
                               @endphp
                               @foreach ($IncomeReport as $item)
                                    @php
                                      $Total_Income = $Total_Income +  $item->income_amount;
                                    @endphp
                                  <tr>
                                  <td class="data1" data-label="Id">{{ $i++}}</td>
                                  <td data-label="Category">{{$item->category}}</td>
                                  <td data-label="Details">{{$item->details}}</td>
                                  <td data-label="Total Amount">{{number_format($item->income_amount,2)}}</td>
                                  <td data-label="Date & Time">
                                      {{strtoupper(date('d-m-Y h:i:sa', strtotime($item->created_at))) }}
                                    </td>
    
                                </tr> 
                               @endforeach                       
                                
                               
                              </tbody>
                                <footer>
                                <tr>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th>{{ number_format($Total_Income,2) }}</th>
                                  <th></th>
                                </tr>
                              </footer>
                            </table>
                      </div>
                    </div>
                    <!-- end of table  -->
          </div>
          <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
            <!-- Other income  -->
            <div class=" m-1">
                <div class="">
                    {{-- <table class="table table-bordered">
                        <thead class="bg-primary header-table">
                        <th>ACCOUNT</th>
                        <th>AMOUNT</th>
                        </thead>
                        <tr>
                        <td>Affidavit Fees</td>
                        <td><?php echo number_format($Other_Income['Affidavit_Fee'],2)?></td>
                        </tr>
                        <tr>
                        <td>Loan Processing Fees</td>
                        <td><?php echo number_format($Other_Income['Loan_Processing_Fee'],2)?></td>
                        </tr>
                        <tr>
                        <td>Loan Insuarance Funds</td>
                        <td><?php echo number_format($Other_Income['Loan_Insuarance_Fees'],2)?></td>
                        </tr>
                        <tr>
                        <td>Interest on Loan</td>
                        <td><?php echo number_format($Other_Income['Interest'],2)?></td>
                        </tr>
                        <tr>
                        <td><b>TOTALS</b></td>
                        <td><b><?php echo number_format($Other_Income['Total'],2)?></b></td>
                        </tr>	
                    </table> --}}
                </div>
            </div>
            <!-- end other income  -->
          </div>
        </div>
      </div>
    </div>
    </div>
@endsection