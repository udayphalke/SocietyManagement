<?php
date_default_timezone_set("Asia/Kolkata");
$todays_date = date("Y-m-d");
$todays_time = date("H:i:s");
$now = new \DateTime('now', new DateTimeZone('Asia/Kolkata'));
?>

@extends('layouts.auth')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <style>
    html,body{
        max-width:100%;
        overflow-x:hidden;
    }
    /* .maindiv{
        padding-top: -0.5rem;
    } */
    .navbar-default{
    background-color:#0f1442;
    border-color: white;
  }
  .card-color{
    background-color:#F4F6F9;
    border-color: white;
  }
  .thcolor{
    background-color: #0f1442;
    color:white;
  }
  .table-responsive{
    max-height:350px;
  }
  .w-5{
    width:50px;
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
      <li class="nav-item active">
        <a class="nav-link" href="/home"><b>Home</b><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/maintenance">Pay Maintenance</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/shopping">Shopping</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/amenity_bookings">Amenities Booking</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="/parking">Parking</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/complaints">Complaints</a>
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
    <div class="card-body card-color">
        <div class="row">
            <div class="col-sm-8">
                <div class="card" >
                    <div class="card-body shadow p-3  rounded">
                        <h5 class="card-title"><b>Discussion Forum</b></h5>
        
                        <!-- content -->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-md-offset-2">
                                    <div class="panel panel-default">
                                        
                                            <div class="panel-body">
                                                @if (session('status'))
                                                    <div class="alert alert-success">
                                                        {{ session('status') }}
                                                    </div>
                                                @endif
                                                <form id="comment-form" method="post" action="{{ route('comments.store') }}" >
                                                {{ csrf_field() }}
                                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
                                                        <div class="row" style="padding: 10px;">
                                                            <div class="form-group">
                                                                <textarea class="form-control" rows="5" cols="90" name="comment" placeholder="Add Comment...!" required></textarea>
                                                            </div>
                                                            <input type="hidden" name="date1" value="<?php echo date(" jS  F Y h:i:s A") ?>" >
                                                    
                                                        </div>
                                                        <div class="row" style="padding: 0 10px 0 10px;">
                                                            <div class="form-group">
                                                            <button class="btn btn-info" type="submit" name="submit">POST</button>
                                                            </div>
                                                        </div>
                                                </form>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-md-offset-2">
                                        <div class="panel panel-default">
                                            <div class="card pl-3">          
                                                <div class="panel-heading pt-3"><h3>Comments</h3>
                                                </div>
                                                <div class="panel-body comment-container" >
                                                    <div class="card pt-3 pl-3 mt-3 pt-4  ">
                                                        @foreach($comments as $comment)
                                                        <div class="well">
                                                            <i><h3> {{ $comment->name }} : </h3></i>&nbsp;&nbsp;&nbsp;
                                                            <span> <b>{{ $comment->comment }} </b></span>&nbsp;&nbsp;&nbsp;<span>{{$comment->date1}}</span>
                                                            <div style="margin-left:20px;">
                                                                <a style="cursor: pointer;" cid="{{ $comment->id }}" name_a="{{ Auth::user()->name }}" token="{{ csrf_token() }}" class="reply">Reply</a>&nbsp;
                                                                <a style="cursor: pointer;"  class="delete-comment" token="{{ csrf_token() }}" comment-did="{{ $comment->id }}" >Delete</a>
                                                                <div class="reply-form">
                                    
                                                                    <!-- Dynamic Reply form -->
                                    
                                                                </div>
                                                                <div class="card pt-3 pl-5 mt-3 mb-5">
                                                                    @foreach($comment->replies as $rep)
                                                                    @if($comment->id === $rep->comment_id)
                                                                        <div class="well">
                                                                            <i><b> {{ $rep->name }} </b></i>&nbsp;&nbsp;
                                                                            <span> {{ $rep->reply }} </span>&nbsp;&nbsp;&nbsp;
                                                                            <span>{{$comment->date1}}</span>
                                                                            <div style="margin-left:10px;">
                                                                            <a style="cursor: pointer;" date1="<?php echo date(" jS  F Y h:i:s A") ?>" rname="{{ Auth::user()->name }}" rid="{{ $comment->id }}" style="cursor: pointer;" class="reply-to-reply" token="{{ csrf_token() }}">Reply</a>&nbsp;
                                                                            <a style="cursor: pointer;" did="{{ $rep->id }}" class="delete-reply" token="{{ csrf_token() }}" >Delete</a>
                                                                        </div>
                                                                        <div class="reply-to-reply-form">
                                                                        <!-- Dynamic Reply form -->
                                                                        </div>
                                                                </div>
                                                                    @endif 
                                                                    @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- content -->
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="card text-white bg-success mb-3" style="max-width: 24rem;">
                        <div class="card-body">
                            This is some text within a card body.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="card text-white bg-primary mb-3" style="max-width: 24rem;">
                        <div class="card-body">
                            This is some text within a card body.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('/js/main.js') }}"></script>
</body>
</html>









