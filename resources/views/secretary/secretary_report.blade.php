<?php $number = 0; ?>
<?php $userid = (Auth::user()->society_id);?>
@extends('layouts.auth')
<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meeting Reports</title>

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
    max-width: 1000px;
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
      <li class="nav-item">
        <a class="nav-link" href="/schedule-meeting">Schedule Meetings</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/secretary-notice">Notices</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/admin-maintenance">Audit Provisions</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/amenities">Insurance</a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="/secretary_report">Reports</a>
      </li>
     
      <!-- <li class="nav-item">
        <a class="nav-link" href="/Inventory">Member Objections</a>
      </li> -->
      
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
  <img src="/images/softcare.png" alt="">
  </div>
   
  <div class="card-body card-color">
    

  <div class="row">
  <div class="col-sm-3">
    <div class="card" style="height:26rem;">
      <div class="card-body shadow p-3  rounded">
        
        

      <!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
 

  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Reports</p>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="admin_reports" class="nav-link text-dark font-italic bg-info">
                <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
               Meeting Report
            </a>
    </li>
    <li class="nav-item">
      <a href="/staff_report" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
               Services
            </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                Services
            </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                Services
            </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                Services
            </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                Services
            </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                Services
            </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                Services
            </a>
    </li>

   
  </ul>

 
  </ul>
</div>
<!-- End vertical navbar -->



      </div>
    </div>
  </div>
  <div class="col-sm-9">
    <div class="card" style="height:26rem;"><br>
  <div class="row">
  <div class="col-sm-4">&nbsp; <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Enter Meeting Date:"></div>
  <div class="col-sm-4"><h3>Meeting Report</h3></div>
  <div class="col-sm-4"><button onclick="exportToExcel('Meeting_Report')" class="btn btn-success">Export Table Data To Excel File</button></div>
</div>

  
  <br>

<div class="table-responsive">
        <table class=table border=1 id="Meeting_Report">
        <tr>
        <th class="thcolor">id</th>
        <th class="thcolor">Agenda</th>
        <th class="thcolor"> Points</th>
        <th class="thcolor">Meeting Date</th>
        <th class="thcolor">Time</th>
        <th class="thcolor">Minutes of Meeting</th>
        <th class="thcolor">No.of Member Present</th>
        <th class="thcolor">Points Discussed</th>
      </tr>
@foreach($schedulemeeting as $s)      
      <tr>
        <td>{{$s['id']}}</td>
        <td>{{$s['agenda']}}</td>
        <td>{{$s['description']}}</td>
        <td>{{$s['date']}}</td>
        <td>{{$s['time']}}</td>
        <td>{{$s['minutes_of_meeting']}}</td>
        <td>{{$s['member_present']}}</td>
        <td>{{$s['points_discussed']}}</td>
      </tr>
@endforeach
        </table>
        </div>
     
  
      </div>
      </div>
    </div>
  </div>
</div>
  
 
 <!--  <div id="piechart"></div> -->

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
  table = document.getElementById("Meeting_Report");
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

<script type="text/javascript">
function exportToExcel(tableID, filename = 'Meeting_Report'){
    var downloadurl;
    var dataFileType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTMLData = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'export_excel_data.xls';
    
    // Create download link element
    downloadurl = document.createElement("a");
    
    document.body.appendChild(downloadurl);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTMLData], {
            type: dataFileType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadurl.href = 'data:' + dataFileType + ', ' + tableHTMLData;
    
        // Setting the file name
        downloadurl.download = filename;
        
        //triggering the function
        downloadurl.click();
    }
}

</script>


