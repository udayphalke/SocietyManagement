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
        <a class="nav-link" href="admin">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="flat_management"><b>Manage Flats</b></a>
      </li>

      <li class="nav-item active">
      <a class="nav-link" href="/member_reports">Reports</a>
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
  </div>
   
  <div class="card-body card-color">
    

  <div class="row">
  <div class="col-sm-12">
    <div class="card" style="height:23rem;">
      <div class="card-body shadow p-3  rounded">
        <h5 class="card-title"><b>Flats Details</b></h5>
        <div class="table-responsive">
        <table border="1" class="table table-hover table-bordered">
<tr>
    <th class="thcolor">ID</th>
    <th class="thcolor">NAME</th>
    <th class="thcolor">FLAT_NO</th>  
    <th class="thcolor">CONTACT_NO</th>
    <th class="thcolor">OCCUPANT</th>
    <th class="thcolor">OPERATION</th>
  </tr>

  @foreach($users as $u)
  <tr>
    <td>{{$u['id']}}</td>
    <td>{{$u['name']}}</td>
    <td>{{$u['flat_no']}}</td>
    <td>{{$u['contact_no']}}</td>
    <td>{{$u['occupant']}}</td>
    <td> &nbsp;
    <a href= {{"edit1/" .$u['id']}} >
    <button class="btn btn-primary">Edit</button> </a>
  </td>
  </tr>
  @endforeach


</table>
<!-- <a href= {{"delete/" .$u['id']}} >
    <button class="btn btn-danger">Delete</button></a> -->

</div>
<span>{{$users->links()}}</span>
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