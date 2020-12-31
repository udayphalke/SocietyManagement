<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    .serif {
  font-family: "Times New Roman", Times, serif;
}

a#link {
  margin-top: 8px;
  color: white;
  text-decoration-color: white;
  font-weight: bold;

}

a#link:hover {
  color: #B01EFF;
}

.button {
  cursor: pointer;
  width: 250px;
  height: 40px;
  background: white;
  border-radius: 50px;
  background: linear-gradient(90deg, #fcff9e 0%, #c67700 100%);
  animation: gradient 2.5s infinite 0.8s cubic-bezier(0.2, 0.8, 0.2, 1.2) forwards;
  
  padding-top: 0px;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;  
  font-size: 20px;
  text-decoration-color:white;
}

@keyframes gradient {
  0% { background: linear-gradient(90deg, #00d2ff 0%, #3a47d5 100%) }
  10% { background: linear-gradient(90deg, #d53369 0%, #daae51 100%) }
  20% { background: linear-gradient(90deg, #FDBB2D 0%, #3A1C71 100%) }
  30% { background: linear-gradient(90deg, #FDBB2D 0%, #22C1C3 100%) }
  40% { background: linear-gradient(90deg, #f8ff00 0%, #3ad59f 100%) }
  50% { background: linear-gradient(90deg, #00C9FF 0%, #92FE9D 100%) }
  60% { background: linear-gradient(90deg, #0700b8 0%, #00ff88 100%) }
  70% { background: linear-gradient(90deg, #3F2B96 0%, #A8C0FF 100%) }
  80% { background: linear-gradient(90deg, #FC466B 0%, #3F5EFB 100%) }
  90% { background: linear-gradient(90deg, #4b6cb7 0%, #182848 100%) }
  100% { background: linear-gradient(90deg, #00d2ff 0%, #3a47d5 100%)}
}

  </style>
  <title>Complaint Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
 <img src="images/P1.png" width="100%">
  <br>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <br><br><br>
  <h1 class="font-weight-bold">Lets Solve your Queries.</h1>
  <p >Here we processes the concerns of customers/users, allocation of the concerns to the appropriate persons and resolving the issues with utmost precision, certainty and swiftness.</p>
  <br>
<a target=”_blank” style="color:white" href="https://www.producthunt.com/posts/gradient-buttons-for-react-native"><div class="button" id="button">schedule demo
</div></a>
<a target=”_blank” id="link" href="https://www.producthunt.com/posts/gradient-buttons-for-react-native">Click Me!</a>
  </p>
</div>
<div class="col-md-6">
  <br><br><br>
   <img src="images/complaint.png" align="right">
 </div>
</div>

