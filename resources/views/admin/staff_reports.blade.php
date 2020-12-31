<?php $number = 0; ?>
<?php $userid = (Auth::user()->society_id);?>
@extends('layouts.auth')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src= "https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
    
 
    <title>Staff Report</title>
    <!-- <script>
        let button = document.querySelector("#button-excel");

        button.addEventListener("click", e => {
        let table = document.querySelector("#simpleTable1");
        TableToExcel.convert(table);
        });
    </script> -->
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
      max-width:800px;

  }
    </style>
</head>
<body>
    

@section('content')

<!-- navbar -->
<div>
  <nav class="navbar fixed-top navbar-default navbar-expand-lg navbar-dark ">
   

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link"><b>Home</b><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="flat_management">Manage Flats</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link"><b>Reports</b></a>
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
        <a class="nav-link" href="/usercomplaints">Complaints</a>
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
  <div class="col-sm-3">
    <div class="card" style="height:26rem;">
      <div class="card-body shadow p-3  rounded">
        
        

      <!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
 

  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Reports</p>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="member_reports" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
               Member Register Report
            </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-dark font-italic bg-info">
                <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                Staff Register Report
            </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                Staff Attendance Report
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
      <div class="col-sm-6">&nbsp; <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Enter Flat No:" title="Type Vehile No">&nbsp;<button onclick="exportToExcel('StaffsDetail_Report')" class="btn btn-success">Export to Excel</button></div>

</div>

  
  <br>

<div class="table-responsive">
        <table class=table border=1 id="StaffsDetail_Report">
        <tr>
        <th class="thcolor">Sr.No.</td>
        <th class="thcolor">ID</th>
        <!-- <th class="thcolor">Society ID</th> -->
        <th class="thcolor">Name</th>
        <th class="thcolor">Gender</th>
        <th class="thcolor">Birthdate</th>
        
        <th class="thcolor">Contact No</th>
        <th class="thcolor">Current Address</th>
        <th class="thcolor">Permanent Address</th>

        <th class="thcolor">Pincode</th>
        <th class="thcolor">Aadhar No</th>
        <th class="thcolor">Pan No</th>
        <th class="thcolor">Working Status</th>
        
        </tr>
        @foreach($staffs as $u)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$u['id']}}</td>
        <td>{{$u['name']}}</td>
        <td>{{$u['gender']}}</td>
        <td>{{$u['birthdate']}}</td>

        <td>{{$u['contact_no']}}</td>
        <td>{{$u['current_address']}}</td>
        <td>{{$u['permanent_address']}}</td>


        <td>{{$u['pincode']}}</td>
        <td>{{$u['aadhar_no']}}</td>
        <td>{{$u['pan_no']}}</td>
        <td>{{$u['working_status']}}</td>
        
        </tr>
    @endforeach


     
     
        </table>
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
    td = tr[i].getElementsByTagName("td")[4];
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
function exportToExcel(tableID, filename = 'StaffsDetail_Report'){
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

