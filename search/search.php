<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles/search.css" />
</head>

<body>
    <?php
        include "conn.php";
        // search
        
        $query = $_GET['query']; 
        // gets value sent over search form
        
        $min_length = 3;
        
        if(strlen($query) >= $min_length){ 
            $query = htmlspecialchars($query); // changes characters used in html to their equivalents
            $query = mysql_real_escape_string($query); // makes sure nobody uses SQL injection
            
            $raw_results = mysql_query( // comment, forum, post
                "SELECT *
                FROM comment
                WHERE (`comment_text` LIKE '%".$query."%')

                UNION ALL

                SELECT *
                FROM forum
                WHERE (`forum_name` LIKE '%".$query."%') OR (`forum_about` LIKE '%".$query."%')

                UNION ALL

                SELECT *
                FROM post
                WHERE (`post_title` LIKE '%".$query."%') OR (`post_content` LIKE '%".$query."%')")
                
                or die(mysql_error())
            
            if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
                
                while($results = mysql_fetch_array($raw_results)){
                    // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
                
                    echo "<p><h3>".$results['comment_text']."</h3></p>";
                    echo "<p><h3>".$results['forum_name']."</h3>".$results['forum_about']."</p>";
                    echo "<p><h3>".$results['post_title']."</h3>".$results['post_content']."</p>";
                    // posts results gotten from database
                }
                
            }
            else{ // if there is no matching rows do following
                echo "No results";
            }
            
        }
        else{ // if query lenth > minimum
            echo "Minimum length is ".$min_length;
        }
    ?>
</body>
</html>