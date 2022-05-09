@extends('App.App')
@section('content')
    
<div class="m-body">
    <div class="row">
        <div class="col-12 mb-4">
          <div class="hero bg-primary text-white">
            <div class="hero-inner">
              <h2>Welcome Back, {{session('staff')->first_name}}</h2>
              <p class="lead">System are up to date and running smoothly.</p>
            </div>
          </div>
        </div>
      </div>
  <!-- statistic account  -->
  <div class="row">
      <div class="col-lg-6 col-md-12  col-sm-12 col-12">
        <div class="card">
          <div class="card-body pt-2 pb-2">
            <div id="myWeather">Consolidated User Account</div>
          </div>
        </div>
      </div>
  </div>
  <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Savings Account</h4>
            </div>
            <div class="card-body stats ">
              {{number_format(0,2)}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header ">
              <h4>Shares Account</h4>
            </div>
            <div class="card-body stats">
                {{number_format(0,2)}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Compulsary Account</h4>
            </div>
            <div class="card-body">
                {{number_format(0,2)}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Voluntary Account</h4>
            </div>
            <div class="card-body stats">
                {{number_format(0,2)}}
            </div>
          </div>
        </div>
      </div>                  
  </div>
  <!-- end of statistics  -->
  
  <!-- loan statistics  -->
  <div class="row">
      <div class="col-lg-6 col-md-12 col-12 col-sm-12">
        <div class="card">
          <div class="card-body pt-2 pb-2">
            <div id="myWeather">Consolidated Loan Summary</div>
          </div>
        </div>
      </div>
  </div>
  <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="fas fa-university"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Ongoing Loan Disbursed</h4>
            </div>
            <div class="card-body stats ">
                {{number_format(0,2)}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header ">
              <h4>Interest Recieved</h4>
            </div>
            <div class="card-body stats">
                {{number_format(0,2)}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="fas fa-book"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Principal Received</h4>
            </div>
            <div class="card-body stats">
                {{number_format(0,2)}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success ">
            <i class="fas fa-calendar"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Interest & Principal</h4>
            </div>
            <div class="card-body stats">
                {{number_format(0,2)}}
            </div>
          </div>
        </div>
      </div>                  
  </div>
  <!-- end of loan Statistics  -->
  
  <!-- body supple  -->
  
  <div class="row">
      <div class="col-lg-6 col-md-12 col-12 col-sm-12">
        <div class="card">
          <div class="card-body pt-2 pb-2">
            <div id="myWeather">Summary Report</div>
          </div>
        </div>
      </div>
  </div>
  <div class="row">
      <div class="col-lg-6 col-md-12 col-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4>Analysis Loan payment VS Loan Application Year {{date('Y')}}</h4>
            </div>
            <div class="card-body">
              <canvas id="myChart2"></canvas>
            </div>
          </div>
        <div class="card">
          <div class="card-header">
            <h4>Quick Summary</h4>
          </div>
          <div class="card-body">
            <div class="mb-4">
              <div class="text-small float-right font-weight-bold text-muted">2,100</div>
              <div class="font-weight-bold mb-1">New User Registered</div>
              <div class="progress" data-height="3">
                <div class="progress-bar" role="progressbar" data-width="80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>                          
            </div>
  
            <div class="mb-4">
              <div class="text-small float-right font-weight-bold text-muted">1,880</div>
              <div class="font-weight-bold mb-1">New Muungano Registered</div>
              <div class="progress" data-height="3">
                <div class="progress-bar" role="progressbar" data-width="67%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
  
            <div class="mb-4">
              <div class="text-small float-right font-weight-bold text-muted">1,521</div>
              <div class="font-weight-bold mb-1">Savings Deposit</div>
              <div class="progress" data-height="3">
                <div class="progress-bar" role="progressbar" data-width="58%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
  
            <div class="mb-4">
              <div class="text-small float-right font-weight-bold text-muted">884</div>
              <div class="font-weight-bold mb-1">Savings Withdraw</div>
              <div class="progress" data-height="3">
                <div class="progress-bar" role="progressbar" data-width="36%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
  
            <div class="mb-4">
              <div class="text-small float-right font-weight-bold text-muted">473</div>
              <div class="font-weight-bold mb-1">No. Loan Disbursed</div>
              <div class="progress" data-height="3">
                <div class="progress-bar" role="progressbar" data-width="28%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
  
            <div class="mb-4">
              <div class="text-small float-right font-weight-bold text-muted">418</div>
              <div class="font-weight-bold mb-1">Loan Paid Amount</div>
              <div class="progress" data-height="3">
                <div class="progress-bar" role="progressbar" data-width="20%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
      </div>
      </div>
  
      <div class="col-lg-6 col-md-12 col-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4>Loan Expoitaion Summary</h4>
            <div class="card-header-action">
              <a href="Loan-Summary.php" class="btn btn-primary">View All</a>
            </div>
          </div>
          
          <div class="card-body p-1">
            <div class="">
              <table class="table table1 table-striped mb-0" id="table-2">
                <thead>
                  <tr>
                    <th class="data1" >Full Name</th>
                    <th>Identity No</th>
                    <th>Balance</th>
                    <th>Paid</th>
                    <th>View</th>
                  </tr>
                </thead>
                <tbody> 
                {{-- <?php 
                if(!empty($Consolidated_Loan_summary)){
                foreach($Consolidated_Loan_summary as $rows) {
                 ?>                        
                  <tr>
                    <td class="data1" data-label="Full Name">
                      <?php echo $rows['Member_Name'] ?>
                    </td>
                     <td data-label="Identity No">
                      <p><?php echo $rows['Member_Number'] ?></p>
                    </td>
                    <td data-label="Balance">
                      <p class="balance btn btn-primary"><?php echo number_format($rows['Total_Balance'],2) ?></p>
                    </td>
                    <td data-label="Paid">
                      <p class="paid btn btn-danger "><?php echo number_format($rows['Total_Paid'],2) ?></p>
                    </td>
                    <td data-label="View">
                        <button id="<?php echo $rows['Loan_Number'] ?>" name="Btn_Loan_View" type="submit" class="btn btn-primary btn-action mr-1 ViewLoan" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></button>
                    </td>
                  </tr>
                  <?php 
                  } }?> --}}
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
   </div>
@endsection