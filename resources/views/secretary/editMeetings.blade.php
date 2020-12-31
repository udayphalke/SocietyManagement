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
      <li class="nav-item ">
        <a class="nav-link">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/manage_flats">Manage Flats</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/household">Accounts</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/admin-maintenance">Maintenance & Utility Bills</a>
      </li>

      <li class="nav-item">
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
<div class="container shadow p-3 mb-5 bg-white rounded" >
  <div class="card-header" style="text-align: center; background-color:blue; color: white"><h3>Update Members Record</h3></div>

<form action="/editMeetings" method="POST">
  @csrf
  <input type="hidden" name="id" value=""><br><br>
  <div class="form-row">
    <div class="col">
      <label><small>Id</small> </label>
      <input type="text" class="form-control"  name="id" value="{{$data['id']}}" readonly="">
    </div>
    <div class="col">
      <label><small>Agenda</small> </label>
      <input type="text" class="form-control"  name="agenda" value="{{$data['agenda']}}" readonly="">
    </div>
  </div>
<br>
<div class="form-row">
    <div class="col">
      <label><small>Description</small> </label>
      <textarea  class="form-control" name="description" value="">{{$data['description']}}</textarea>
    </div>
    <div class="col">
      <label><small>Date</small> </label>
      <input type="text" class="form-control" name="date" value="{{$data['date']}}">
    </div>
  </div>
  <br>
  <div class="form-row">
     <div class="col">
      <label><small>Minutes Of Meeting</small> </label>
      <input type="text" class="form-control" name="minutes_of_meeting" value="">
    </div>

    <div class="col">
      <label><small>Points Discussed</small> </label>
     <textarea  class="form-control" name="points_discussed" value=""></textarea>
    </div>
   
  </div>
  <br>
  <button type="submit" class="btn btn-success">Update</button>

</form>

</div>
@endsection

</body>
</html>