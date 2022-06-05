<?php session_start();
    require('actions/utilisateurs/ShowAUserProfileAction.php');   
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php';?>
<body>
    <?php include 'includes/navbar.php';?>
<br><br>
    <div class="container">
    <?php 
            if(isset($errorMsg)){echo $errorMsg;}

            if(isset($GetUsersMessage)){
            ?>
                <div class="card">
                    <div class="card-body">
                        <h4>@<?= $user_pseudo ;?></h4>
                        <hr>
                        <p><?= $user_nom ;?></p>
                    </div>
                </div>
                    <br>
                    <?php
                    
                    while($message = $GetUsersMessage->fetch()){
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <?= $message['sujet']; ?>
                            </div>
                            <div class="card-body">
                                <?= $message ['message'];?>
                            </div>
                            <div class="card-footer">
                                Par <?= $message['pseudo_auteur'] ;?> le <?= $message['date_publication'] ;?>
                            </div>
                        </div>
                    <br>
                        <?php
                    }
                    ?>
            <?php
             }
    ?>
    </div>
</body>
</html>