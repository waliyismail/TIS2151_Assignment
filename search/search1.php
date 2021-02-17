<!-- can read multiple tables -->

<?php
    error_reporting(0);
    $conn = mysqli_connect("localhost","root","","opniondb");
    $query1=$_POST[query];
    $min_length = 1;  

        if(strlen($query1) >= $min_length){
            if(count($_POST)>0) {
           
                $result = mysqli_query($conn,
                "SELECT user_forum_name
                FROM user_forum
                where user_forum_name
                LIKE '%$query1%'

                UNION ALL

                SELECT comment_text
                FROM comment
                where comment_text
                LIKE '%$query1%' 
                ");
            }
        }  
        else{ // if query lenth > minimum
            echo "Minimum length is ".$min_length;
        }
?>
<!DOCTYPE html>
<html>
<head>
<title> Retrive data</title>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>
<tr>
<td></td>
<td></td>
<td></td>

</tr>
<?php
    $i=0;
    while($row = $result->fetch_assoc()) {
    ?>
    <tr>
    <td><?php echo $row["user_forum_name"]; ?></td>
    <td><?php echo $row["user_forum_email"]; ?></td>
    <td><?php echo $row["comment_text"]; ?></td>
    </tr>
    <?php
    $i++;
    }
?>
</body>
</html>
 
