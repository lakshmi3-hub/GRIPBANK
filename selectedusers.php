<?php
include 'connect.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);

    if (($amount)<=0 || $amount > $sql1['balance'])
   {
        echo '<script >alert("TRANSACTION UNSUCCESFUL PLEASE TRY LATER"); </script> ' ;
    }

    else {
                 echo "<script> alert('Transaction Successful'); </script>";
                 echo "<script> alert('VISIT US AGAIN '); 
                 window.location='index.html';</script>";
                 
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$from";
                mysqli_query($conn,$sql);
    
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
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
    
      h2{
  color: #4C4B4B;
}
*{
    padding: 10;
    margin: 1px;
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
    </style>
</head>

<body style="background-color:powderblue;">
    <div class="topnav ">
    <a href="index.html">HOME</a></h5>
    <a class="active" href="transaction.php">CUSTOMERS</a>
</div>
	<div class="container">
            <?php
                include 'connect.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  users where id= $sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <center>
            <table>
                <tr>
                    <th class="text-center">Accno</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Balance</th>
                </tr>
                <tr>
                    <td class="py-2"><?php echo $rows['id'] ?></td>
                    <td class="py-2"><?php echo $rows['name'] ?></td>
                    <td class="py-2"><?php echo $rows['balance'] ?></td>
                </tr>
            </table>
            <center>
        </div>
        <br><br><br>
        <select name="to" class="form-control" required>
        <center><option value="" disabled selected>Transfer To</option>
            <?php
                include 'connect.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM users where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
                    ?>
                        <option class="table" value="<?php echo $rows['id'];?>" >
                        
                            <?php echo $rows['name'] ;?> 
                       
                        </option>
                    <?php 
                        } 
                    ?>
            <div>
        </select>
            Amount:
            <input type="number"  name="amount" required>   
            <button class="btn mt-3" name="submit" type="submit" id="myBtn">CONFIRM</button>
                    </center>
        </form>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>