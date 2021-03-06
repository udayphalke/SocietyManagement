@extends('layouts.auth')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Documents</title>

    <style>
    .navbar-default{
    background-color:#0f1442;
    border-color: white;
  }
  .card-color{
    background-color:#F4F6F9;
    border-color: white;
  }
  .thcolor{
    background-color: #5B2C6F;
    color:white;
  }
  .table-responsive{
    max-height:360px;
  }
    </style>
  
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
      <li class="nav-item active">
        <a class="nav-link">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/transactions">Financial Transactions</a>
      </li>

      <li class="nav-item active ">
        <a class="nav-link" href="/sinking_funds">Sinking Funds</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/transaction_reports">Reports</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/treasurer-notice">Notices</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/usercomplaints"><b>Complaints</b></a>
      </li>
     
      <li class="nav-item active">
        <a class="nav-link" href="">Upload Documents</a>
      </li>
     
      </ul>
    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                       <li class="nav-item active dropdown">
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
<div class="">
<a href="/usercomplaints"><button class="btn btn-primary">back</button></a> 

  <div class="card-header" style="text-align: center;background-color:grey;color: white">
  
  <h4><b> User Details </b> </h4>
  </div>
  <div class="card-body card-color">
    

  <div class="row">
  <div class="col-sm-12">
    <div class="card" style="height:24rem;">
      <div class="card-body shadow p-3  rounded">
        <h5 class="card-title" align="center">User Details</h5>
 
<div class="row">
  <div class="col-sm-6"> 
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text" id="" style="background-color:#4d79ff; color:white;">User ID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
      </div>
      <input type="text" class="form-control" value="{{$user['id']}}" readonly=""   >
    </div>
  </div>


  <div class="col-sm-6"> 
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text" id="" style="background-color:#4d79ff; color:white;">Flat No:</span>
      </div>
      <input type="text" class="form-control" value="{{$user['flat_no']}}" readonly="">
    </div>
  </div>
</div>
<br>  

<div class="row">
  <div class="col-sm-6"> 
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text" id="" style="background-color:#4d79ff; color:white;">Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
      </div>
      <input type="text" class="form-control" value="{{$user['name']}}" readonly="">
    </div>
  </div>


  <div class="col-sm-6"> 
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text" id="" style="background-color:#4d79ff; color:white;">&nbsp;Email:&nbsp;&nbsp;</span>
      </div>
      <input type="text" class="form-control" value="{{$user['email']}}" readonly="">
    </div>
  </div>
</div>
<br>  
<div class="row">
  <div class="col-sm-6"> 
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text" id="" style="background-color:#4d79ff; color:white;">Contact No:</span>
      </div>
      <input type="text" class="form-control" value="{{$user['contact_no']}}" readonly="">
    </div>
  </div>


  <div class="col-sm-6"> 
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text" id="" style="background-color:#4d79ff; color:white;">Flat No:</span>
      </div>
      <input type="text" class="form-control" value="{{$user['flat_no']}}" readonly="">
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