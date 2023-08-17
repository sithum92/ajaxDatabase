<?php

require '/xampp/htdocs/ajax/ajaxDatabase/db.php';
if(isset($_POST['commentNewCount'])) { // Check if the value is setif(isset($_POST['commentNewCount'])) { // Check if the value is set
$commentNewCount = $_POST['commentNewCount'];
        $sql = "SELECT * FROM comments LIMIT $commentNewCount ";
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
    }
