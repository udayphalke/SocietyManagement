<?php $number = 0; ?>
<?php $userid = (Auth::user()->society_id);?>
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
    <title>Admin Page</title>

    <style>
    .navbar-default{
    background-color:#0f1442;
    border-color: white;
  }
  .thcolor{
    background-color: #0f1442;
    color:white;
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
      <a class="nav-link" href="/admin_reports">Reports</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/admin-maintenance">Maintenance & Utility Bills</a>
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
      <a class="nav-link" href="/files/create"><b>Upload Documents</b></a>
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
  </div>
   
  <div class="card-body card-color">
    

  <div class="row">
  <div class="col-sm-12">
    <div class="card" style="height:26rem;">
      <div class="card-body shadow p-3  rounded">
        <h5 class="card-title"><b>Upload Documents</b></h5>
        @if(Session::get('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{Session::get('status')}}
<button type="button" class="close" data-dismiss="alert" aria-label="close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif  
        <!-- form -->
        <form action="/files" method="POST" enctype="multipart/form-data">
		@csrf
		<br>
    <div class="form-row"> 
    <div class="form-group col-md-12">
		<input type="text" class="form-control" name="title" placeholder="title">
    </div>
    </div>
	   
    <div class="form-row"> 
    <div class="form-group col-md-12">
		<input type="text" class="form-control" name="description" placeholder="description">
    </div>
    </div>

    <div class="form-row"> 
    <div class="form-group col-md-12">
		<!-- <input type="file" class="form-control" name="file"> -->
    <label class="file">
    <input type="file" id="file" name="file" aria-label="File browser example">
    <span class="file-custom"></span>
    </label>

    </div>
    </div>

    <div class="form-row"> 
    <div class="form-group col-md-6">
      <input type="text" class="form-control" name="upload_date" id="upload_date" value="<?php echo $todays_date;?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <input type="text" class="form-control" name="upload_time" id="upload_time" value="<?php echo $todays_time;?>" readonly>
    </div>
    </div>
		<input type="submit" class="btn btn-success" value="submit">

	</form>
        <!-- form -->

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

</body>
</html>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
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