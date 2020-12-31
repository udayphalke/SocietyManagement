@extends('layouts.auth')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    .navbar-default{
    background-color:#0f1442;
    border-color: white;
  }
  .thcolor{
    background-color: #0f1442;
    color:white;
  }
  .table{
    max-height:300px;
  }
  .w-5{
    width:15px;
  }
    </style>
</head>
<body>
    

@section('content')

<!-- navbar -->
<div>
  <nav class="navbar fixed-top navbar-default navbar-expand-lg navbar-dark ">
  <a class="navbar-brand" href="">Society</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/admin">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">Manage Flats</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/household">Accounts</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/admin-maintenance">Maintenance & Utility Bills</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/amenities">Amenities</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="/Inventory">Parking</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Reports">Complaints</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="">Upload Documents</a>
      </li>
     
      </ul>
    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                       <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
    <a href="amenities" class="btn btn-primary">Back</a>
    </div>
    <div class="card-body card-color">
        <div class="row">
            <div class="col-sm-12">
                <div class="card" style="height:27rem;">
                    <div class="card-body shadow p-3  rounded">
                        <h5 class="card-title">All Amenity Bookings</h5>
                        
                        <!-- display -->
                        

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Booking Date." title="Booking Date">

<table class="table  table-bordered table-striped" id="myTable">
<tr>
<td>Name</td>
<td>Amenity</td>
<td>Booking Date</td>
<td>Booking Slot</td>
</tr>
@foreach($amenities as $a)
<tr>
<td>{{$a['user_id']}}</td>
<td>{{$a['amenity_name']}}</td>
<td>{{$a['booking_date']}}</td>
<td>{{$a['booking_slot']}}</td>

</tr>
@endforeach
</table>
<span>{{$amenities->links()}}</span>

                        <!-- display -->
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
    td = tr[i].getElementsByTagName("td")[0, 2];
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