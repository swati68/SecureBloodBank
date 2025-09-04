<!DOCTYPE html>
<html>
    <head>
		<title>Login to page</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <div>
            <marquee><h3><font color="red">This is a demo website created by the students of Vellore Institute of Technology,Chennai. But please donate plasma if you are a COVID-19 survivor. Your small Contribution can save somone's life.</font></h3></marquee>
            </div>
        <header>
            <div style="height:180px;">
                <img src='government-of-india.jpg' id='logo' height='180' width='360' align='left'/>
                <br><br>
                <h1 align="center"><font color="blue">Government of India Blood and Plasma Bank for COVID-19 Pandemic</font></h1>
            </div>
        </header>
        <nav align='right'>
            <ul style='list-style-type:none;'>
                <li style='display:inline-block; margin-right:15px;'><a href='ap_option.php' style="font-size:1.3em; padding-bottom:3px;text-decoration:none;"><font color="black"><b>Home</b></font></a></li>
            </ul>
        </nav>
        <br><br><br>
    <?php
    $conn=mysqli_connect("localhost","root","12345");
    if(!$conn)
    {
        die("Connection failed:".mysqli_connect_error());
    }
    
    $sql="SELECT * FROM blood";
    mysqli_select_db($conn,'isaa_project');
    $result=mysqli_query($conn,$sql);
    $numrow=mysqli_num_rows($result);
    if ($numrow > 0) {
        echo "<table align='center' border='2' style='width:50%;'>
                <tr>
                    <th style='text-align:center; padding:15px 20px;'>Blood Group</th>
                    <th style='text-align:center; padding:15px 20px;'>Antigen</th>
                    <th style='text-align:center; padding:15px 20px;'>Quantity Available</th>
                    <th style='text-align:center; padding:15px 20px;'>Blood Banks</th>
                </tr>";
        while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            echo "<tr><td style='text-align:center; padding:15px 20px;'>".$row['bgp']."</td>
                        <td style='text-align:center; padding:15px 20px;'> " .$row['ant']. "</td>
                        <td style='text-align:center; padding:15px 20px;'> " .$row['qty']. "</td>
                        <td style='text-align:center; padding:15px 20px;'> " .$row['bank']. "</td>
                        </tr>";
                    }
        echo "</table>";
      }
      mysqli_close($conn); 
      echo "<br><br>";
      echo "<div align='center'>
      <a href='http://localhost/ISAA_project/data_add_blood.php'><button style='padding:5px 10px; font-size:1.1em;'>Add Data in Blood Bank</button></a>
</div>";
    ?>
