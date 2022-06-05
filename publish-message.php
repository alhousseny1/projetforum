<?php
    require('actions/utilisateurs/securityAction.php');
    require('actions/message/publishMessageAction.php');
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/head.php'; ?>
</head>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br><br>
    <form class="container" method="POST">

            <?php 
            if(isset($errorMsg)){
                echo '<p>'.$errorMsg.'</p>';
                }elseif(isset($successMsg)){
                    echo '<p>'.$successMsg.'</p>';
                }
            ?>
            
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Sujet</label>
            <input type="text" class="form-control" name="sujet">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">message</label>
            <textarea class="form-control" name="message"></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary" name="validate">Publier le message</button>
    </form>
                <?php //var_dump($_SESSION); ?>
</body>
</html>