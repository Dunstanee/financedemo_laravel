<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        
        <a href="index.html"><span class="text-primary">E</span>ASY <span class="text-danger">G</span>O INITIATIVE</a>
        <p style="font-family: 'Electrolize';letter-spacing: 5px;text-align:center;" id="MyClockDisplay"  onload="showTime()"></p>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">EGI</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown ">
          <a href="{{url('Dashboard')}}" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{url('Dashboard')}}">Main Dashboard</a></li>
            <!-- <li><a class="nav-link" href="">Access Dashboard</a></li>
            <li><a class="nav-link" href="">Cashier Dashboard</a></li> -->
          </ul>
        </li>
        <li class="menu-header">System Operation</li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i> <span>Operation Control</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="/CashBook">Cash Book</a></li>
            {{-- <li><a class="nav-link" href="Daily-Ledger.php">Daily Ledger</a></li> --}}
            <li><a class="nav-link" href="/BusinessOperation">Open/Close Business</a></li>
            @if (session('operation'))
               <li><a class="nav-link" href="">Operation Settings</a></li>
            @endif
          </ul>
        </li> 
        <li class="menu-header">Cash Transaction</li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i> <span>Transaction</span></a>
          <ul class="dropdown-menu">
            @if (session('operation'))
              <li><a class="nav-link" href="/Withdraw">Withdraw Cash</a></li>
            <li><a class="nav-link" href="/Deposit">Deposit Cash</a></li>
            <li><a class="nav-link" href="/CashReturn">Cash Return</a></li>  
            <li><a class="nav-link" href="/CashReturn">Cash Request</a></li>  
            @endif
            
          </ul>
        </li> 
        
        <li class="menu-header">Income and Expense</li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-plug"></i> <span>Income</span></a>
          <ul class="dropdown-menu">
            @if (session('operation'))
               <li><a class="nav-link" href="{{url('Income-Report')}}">Income Report</a></li>
              <li><a class="nav-link" href="{{url('Income-Post')}}">Post Income</a></li>
              <li><a class="nav-link" href="{{url('Income-List')}}">Income List</a></li>
              <li><a class="nav-link" href="{{url('Income-Category')}}">Add Category</a></li>
            @endif
          </ul>
        </li>
        
        <li class="menu-header">Loan Menu</li>
        
        
        <li class="menu-header">All Members</li>
        
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Customer Account</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{url('Members')}}">Members</a></li>
            @if (session('operation'))
               <li><a class="nav-link" href="{{url('Member-New')}}">New Member</a></li>
              <li><a class="nav-link" href="{{url('MemberAuth')}}">Account Authentications</a></li> 
            @endif
            
            <li><a class="nav-link" href="{{url('Member-Report')}}">Member Report</a></li>
          </ul>
        </li>
                  
  
        <li class="menu-header">System Control</li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Human Resource</span></a>
          <ul class="dropdown-menu">
            
            @if (session('operation'))
                <li><a href="./Staff-Manage">Staff Control</a></li> 
                <li><a href="./Staff-Group.php">Staff Designation </a></li> 
                
                <li><a href="/New-Staff">New Staff</a></li> 
            @endif
            
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-exclamation"></i> <span>Financial Report</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="/Trial-Balance">Trial Balance</a></li> 
            <li><a class="nav-link" href="">Income & Profit Report</a></li> 
          </ul>
        </li>           
        <li><a class="nav-link" href="{{url('Signout')}}"><i class="fas fa-lock"></i> <span>Sign Out</span></a></li>
      </ul>
  
       </aside>
  </div>