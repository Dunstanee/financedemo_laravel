@extends('App.App')
@section('content')
<style type="text/css" media="screen">
	
	.header-table th{
		color:white !important;
	}
</style>  
    <div class="m-body">
        <div id="MemberReport">
       <button class="btn btn-primary BtnBack btn-action m-1" data-toggle="tooltip" title="Delete"><i class="fas fa-arrow-left"></i> Back</button>
            <div class="">
                <div class="card-body">
                <div class="table-data">
                    <table class="table table1 table-striped mb-0 table-bordered" id="table-2" >
                        <thead class="header-table bg-primary">
                          <tr>
                            <th class="data1">Sno</th>
                            <th>Transaction Date</th>
                            <th>Deposit Amount</th>
                            <th>Withdraw Amount</th>
                            <th>Transaction Mode</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($Transactions as $item)
                              <tr>
                              <td class="data1" data-label="Sno">
                              {{$i++}}
                            </td>
                            <td data-label="Transaction Date">
                              {{ $item->transactiondate}}
                            </td>
                           <td data-label="Deposit Amount">
                              {{ $item->deposit_amount}}
                            </td>
                            <td data-label="Withdraw Amount">
                              {{ $item->withdraw_amount}}
                            </td>
                            <td data-label="Transaction Mode">
                              {{ $item->Mode[0]->modename}}
                            </td>
                            <td data-label="Transaction Mode">
                                <div class="text-center">
                                    @if ($item->withdraw_amount > 0)
                                    <i class="fas fa-arrow-down text-danger"></i> 
                                    @else
                                    <i class="fas fa-arrow-up text-success"></i>   
                                    @endif
                                </div>
                            
                            </td>
                            
                          </tr> 
                            @endforeach
                            
                          
                           </tbody>
                      </table>
                  </div>
                  </div>
            </div>
        </div>
        </div>  
@endsection
@section('scripts')
	<script>
$(document).ready(function (argument) 
{
      
     $('.BtnBack').on('click',function(event)
	 {
      	var m_id = {{$Memberid}};
      	$.ajaxSetup(
		{
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		location.href = '/Member/'+m_id+'/View';
    });
});
	</script>
@endsection