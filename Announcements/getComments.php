<!DOCTYPE html>
<head></head>
<body>
<?php
if(isset($_GET['id'])){
    $db = new PDO('mysql:host=localhost;dbname=news', 'root', '');
    $comments = $db->query("Select * from comments WHERE annoucementID=". $_GET['id'] ." ORDER BY id DESC");
    if($comments != FALSE && $comments->rowCount() != 0){
    foreach ($comments as $comment){
        echo "<div name='".$comment['annoucementID']."C'style='background-color: white;'>\r\n<p style='width: 100%;'>".nl2br(htmlspecialchars($comment['content']))."</p>\r\n".
              "<p>".$comment['created']."</p>\r\n</div>";
    }
    }else{
        echo "<div name='".$_GET['id']."C'style='background-color: white;'>\r\n<p style='width: 100%;'>No comments could be found</p>".
              "\r\n</div>";
    }
}
?>
</body>
