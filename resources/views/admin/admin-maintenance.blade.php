<?php
date_default_timezone_set("Asia/Kolkata");
$todays_date = date("Y-m-d");
$todays_time = date("H:i:s");
?>


@extends('layouts.auth')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flat Management</title>
      <!-- add icon link -->
      <link rel = "icon" src =images/logo.png" type = "image/x-icon"> 

    <style>
    .navbar-default{
    background-color:#0f1442;
    border-color: white;
  }
  .thcolor{
    background-color: #0f1442;
    color:white;
  }
  .table-responsive{
    max-height:300px;
  }
    </style>

</head>
<body>
@section('content')
    <!-- navbar -->
<div>
  <nav class="navbar fixed-top navbar-default navbar-expand-lg navbar-dark ">
  
  <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> -->

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/admin">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="flat_management">Manage Flats</a>
      </li>

      <li class="nav-item active">
      <a class="nav-link" href="/member_reports">Reports</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/admin-maintenance"><b>Maintenance & Utility Bills</b></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/amenities">Amenities</a>
      </li>
     
      <li class="nav-item active">
        <a class="nav-link" href="">Parking</a>
      </li>

      <!-- <li class="nav-item">
        <a class="nav-link" href="/notice">Notice</a>
      </li> -->

      <li class="nav-item active">
        <a class="nav-link" href="/usercomplaints1">Complaints</a>
      </li>

      <li class="nav-item active">
      <a class="nav-link" href="/files/create">Upload Documents</a>
      </li>
      
        
     
     
      </ul>
    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                       <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link active dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{__(Auth::user()->name)}} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
  </div>
  </nav>
<!-- navbar -->
<br>
<div class="card">
  <div class="card-header">
  <img src="/images/softcare.png" alt="">
  <a href="allbills_admin"><button class="btn btn-success float-right">View All Bills</button></a>
  
  </div>
   
  <div class="card-body card-color">
    

  <div class="row">
  <div class="col-sm-12">
    <div class="card" style="height:26rem;">
      <div class="card-body shadow p-3  rounded">
        
        @if(Session::get('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{Session::get('status')}}
<button type="button" class="close" data-dismiss="alert" aria-label="close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif 


@if(Session::get('status1'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
{{Session::get('status1')}}
<button type="button" class="close" data-dismiss="alert" aria-label="close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif 

        <!-- form -->
        
        <form action="admin-maintenance" method="POST">
        @csrf
          <div class="row">

          <div class="col">
          <label for="formGroupExampleInput"><b>Select User Here</b></label>
        <select id="username" class="form-control" name="username" id="username" required="">
        <option value="" disabled selected>User Name</option>
            @foreach($users as $i)
            <option>{{$i['name']}}</option>
            @endforeach
        </select>
        
    </div>

            <div class="col">
            <label for="formGroupExampleInput"><b>All Municipal Dues</b></label>
              <input type="text" class="form-control" placeholder="All Municipal Dues" name="All_Municipal_Dues" id="All_Municipal_Dues" onkeyup="sum()" >
            </div>
            <div class="col">
            <label for="formGroupExampleInput"><b>Administrative and General Expenses</b></label>
              <input type="text" class="form-control" placeholder="Administrative and General Expenses" name="Administrative_and_General_Expenses" id="Administrative_and_General_Expenses" onkeyup="sum()" >
            </div>
            </div>

            <br>
          <div class="row">
            <div class="col">
            <label for="formGroupExampleInput"><b>Sinking Fund</b></label>
              <input type="text" class="form-control" placeholder="Sinking Fund" name="sinking_fund" id="sinking_fund" onkeyup="sum()">
            </div>
          
          
            
            <div class="col">
            <label for="formGroupExampleInput"><b>Periodic Building Maintenance</b></label>
              <input type="text" class="form-control" placeholder="Periodic Building Maintenance" name="Periodic_Building_Maintenance" id="Periodic_Building_Maintenance" onkeyup="sum()">
            </div>
            <div class="col">
            <label for="formGroupExampleInput"><b>Common Area Utilization/Parking</b></label>
              <input type="text" class="form-control" placeholder="Common Area Utilization/Parking" name="Common_Area_Utilization_Parking" id="Common_Area_Utilization_Parking" onkeyup="sum()">
            </div>
            </div>
        <br>
          <div class="row">

            <div class="col">
            <label for="formGroupExampleInput"><b>Non Occupancy Charges/Miscellaneous</b></label>
              <input type="text" class="form-control" placeholder="Non Occupancy Charges/Miscellaneous" name="Non_Occupancy_Charges" id="Non_Occupancy_Charges" onkeyup="sum()">
            </div>
          
            <div class="col">
            <label for="formGroupExampleInput"><b>Past Arrears of Contribution</b></label>
              <input type="text" class="form-control" placeholder="Past Arrears of Contribution" name="Past_Arrears_of_Contribution" id="Past_Arrears_of_Contribution" onkeyup="sum()">
            </div>
            <div class="col">
            <label for="formGroupExampleInput"><b>Interest Due</b></label>
              <input type="text" class="form-control" placeholder="Interest Due" name="Interest_Due" id="Interest_Due" onkeyup="sum()">
            </div>
            </div>
            
            <br>
          <div class="row">
            <div class="col-sm-4">
            <!-- <label for="formGroupExampleInput">Total Due</label> -->
              <input type="text" id="Total_Due" placeholder="Total Due" class="form-control" name="Total_Due" id="Total_Due">
          </div>

          <div class="col">
            <!-- <label for="formGroupExampleInput">Generate Bill</label> -->
            <button type="submit" class="btn btn-primary float-right">Submit</button>
            </div>
          </div>

          <input type="hidden" id="bill_month" class="form-control" name="bill_month" value="<?php echo date(" F Y "); ?>">
          <input type="hidden" id="bill_date" class="form-control" name="bill_date" value="<?php echo $todays_date; ?>">

          <input type="hidden" id="due_date" class="form-control" name="due_date" value="<?php echo date('Y-m-d',strtotime('+15 days')); ?>">
          
          
        </form>


        <!-- form -->
      </div>
    </div>
  </div>
  <!-- <div class="col-sm-6">
  hello
  </div> -->
</div>
  
 
  
  </div>
</div>



@endsection


</body>
</html>
<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script type="text/javascript">
        function sum() {
            var txtFirstNo = document.getElementById('All_Municipal_Dues').value;
            var txtSecondNo = document.getElementById('Administrative_and_General_Expenses').value;
            var txtThirdNo = document.getElementById('sinking_fund').value;
            var txtForthNo = document.getElementById('Periodic_Building_Maintenance').value;
            var txtFifthNo = document.getElementById('Common_Area_Utilization_Parking').value;
            var txtSixthNo = document.getElementById('Non_Occupancy_Charges').value;
            var txtSeventhNo = document.getElementById('Past_Arrears_of_Contribution').value;
            var txtEighthNo = document.getElementById('Interest_Due').value;
            


 
            var result = parseInt(txtFirstNo) + parseInt(txtSecondNo) + parseInt(txtThirdNo) + parseInt(txtForthNo) + parseInt(txtFifthNo) 
            + parseInt(txtSixthNo) + parseInt(txtSeventhNo) + parseInt(txtEighthNo);
            if (!isNaN(result)) {
                document.getElementById('Total_Due').value = result;
            }
        }
</script>



<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>