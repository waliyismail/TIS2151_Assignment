<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="row">
        <div class="column left" >
            <img src="/public/contoth1.png" alt="Website name" style="width:9em;">
        </div>
        <div class="column right" >
            <img src="/public/contoh2.png" alt="website type" style="width:9em;">
        </div>
    </div>

<div class="behind">
    <div class="navbar">
        <ul>
            <li><a href="adminMain.php">Forum</a></li>
            <li><a href="adminReport.php">User Report</a></li>
            <li><a class="active">Account Management</a></li>
            
            <li style="float:right"><a href="/logout.php">Log Out</a></li>
          
        </ul>
    </div>
</div>


<div class="row">
    <div class="column left3">
    <h2>Manage User Account</h2>
        <div class="boxborder">
        <table>
                
        <?php include "database.php";
            $result = mysqli_query($conn,"SELECT USER_FORUM_ID FROM USER_FORUM");
            echo 
            "<tr>
                <th>List </th>
                <th>User ID</th>
                <th>Delete Account</th> 
            </tr>";

            $count=1;
            while($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td>" . $count . "</td>";
                echo "<td>" . $row['USER_FORUM_ID'] . "</td>";
                echo "<td><button class=\"buttonDelete\">DELETE</button></td>";
                echo "</tr>";
                $count++;
            }
            echo "</table>";

            mysqli_close($conn); ?>             

        </div>  
    </div>
    <div class="column right3">
        
        <h2 style="margin-top:0;text-align:center;">ADMIN</h2>
        <p style="margin-top:-1em;text-align:center;">@admin</p>
       
        
    </div>
</div>



<div class = "loginboxx" style="height:7em;padding:3em;padding-top:2em;text-align:center;background-color:#283061;">
    Copyright OPnion. All rights reserved  
    @2021 Online Generated Content Web Forum System
</div>
 
</body>

</html>