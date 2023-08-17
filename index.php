<?php
require '/xampp/htdocs/ajax/ajaxDatabase/db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        //jQuery code here
        $(document).ready(function() {
            // This code runs when the document is fully loaded and ready
            var commentCount = 2;
            $("button").click(function() {
                 // This function runs when the button is clicked
                commentCount += 2;
                $("#comments").load("load-comments.php",{
                    // Send an AJAX request to "load-comments.php"
        // The data object contains the parameters to send to the server
                    commentNewCount : commentCount,
                    Name : "Sithum"
                });
            });
        });
    </script>
    <title>Document</title>
</head>

<body>
    <div id="comments">
    <?php
        $sql = "SELECT * FROM comments LIMIT 2 ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<p>";
                echo "<strong>" . $row['author'] . "</strong><br>";
                echo "<span>" . $row['message'] . "</span>";
                echo "</p>";
            }
        } else {
            echo "There are no comments!";
        }
        ?>
    </div>
    <button class="btn">Show more</button>

</body>

</html>