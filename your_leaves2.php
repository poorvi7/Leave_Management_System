<?php
  session_start();
  ?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style1.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
* {
    box-sizing: border-box;
}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

.col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
}

.col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
body {font-family: Arial;}

/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}
</style>
</head>
<body>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')">Click here to view Leave list</button>
  
</div>

<div id="London" class="tabcontent">
  <h3>Leave List</h3>
  <div class="container">
  <table class="table table-hover">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Reg. No</th>
      <th scope="col">Name</th>
      <th scope="col">Date</th>
      <th scope="col">Reason</th>
      <th scope="col">Days</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $conn = new mysqli("172.31.77.251:3307", "cyber", "cyber","WebProject");
    $sql = "select * from WebProject.leave natural join WebProject.student";
    $res = $conn->query($sql);
    
    while($result=$res->fetch_assoc())
    {
    
    echo "<tr>";
    echo "<th>".$result['ID']."</th>";
    echo  "<td>".$result['RegNo']."</td>"; 
    echo  "<td>".$result['Name']."</td>";
    echo  "<td>".$result['L_Date']."</td>";
    echo  "<td>".$result['Reason']."</td>";
    echo  "<td>".$result['Days']."</td>";
$id=$result['ID'];
$stat=$result['Status'];
if($stat=='Under Process')
{
    echo  "<td>
<form method='post'  action='/project/app.php'>
<input type='image' src='/project/green.png' style='cursor:pointer' width='20px' height='20px' name='".$id."'></form>
<form method='post' action='/project/den.php'>
<input type='image' src='/project/red.png' style='cursor:pointer' width='20px' height='20px' name='".$id."'></form></td>";
}
else echo  "<td>".$result['Status']."</td>";
    echo "</tr>";
    
    }
  
  ?>

  </tbody>
</table>
</div>
</div>
</body>
</html> 


<script>
function openCity(evt, cityName)
{
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) 
    {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}	





</script>
     

