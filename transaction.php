<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
         .topnav a {
  float: left;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: LightGray;
  color: white;
}
      h2{
  color: #4C4B4B;
}
*{
    padding: 10;
    margin: 1px;
    box-sizing: border-box;
    }
    button{
      border:none;
      border-radius: 8px;
      padding: 8px;
      background:#7B8788; 
      color:white;
      font-size: 15px;
      transition: 1s;
    }
    button:hover,h1:hover{
      transform: scale(1.1);
    }
    button:hover{
      background-color:#4C4B4B;
    }
table{
    letter-spacing: 3px;
}
td{
    text-align: center;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
}
 
    </style>
</head>
<body style="background-color:powderblue;">
<?php
    include 'connect.php';
    $sql = "SELECT * FROM `users`";
    $result = mysqli_query($conn,$sql);
?>
<div class="topnav ">
  <a href="index.html">HOME</a></h5>
  <a class="active" href="transaction.php">CUSTOMERS</a>
</div>

<div class="container">
        <center><h2 class="text-center pt-4">TRANSACTION</h2><center>
        <br>
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table table-hover table-sm table-striped table-condensed table-bordered">
                        <thead>
                            <tr>
                            <th scope="col" class=" py-2">Operations</th>
                            <th scope="col" class=" py-2">Accno</th>
                            <th scope="col" class=" py-2">Name</th>
                            <th scope="col" class="py-2">Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php 
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td><a href="selectedusers.php?id= <?php echo $rows['id'] ;?>"> <button type="button" class="btn">Transact From</button></a></td> 
                        <td class="py-2"><?php echo $rows['id'] ?></td>
                        <td class="py-2"><?php echo $rows['name']?></td>
                        <td class="py-2"><?php echo $rows['balance']?></td>
                    </tr>
                <?php
                    }
                ?>
            
                        </tbody>
                    </table>
                    </div>
                </div>
            </div> 
         </div>
         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
</body>
</html>