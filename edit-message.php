<?php
require('actions/utilisateurs/securityAction.php');
require('actions/message/getInfosOfEditedMessageAction.php');
require('actions/message/editMessageAction.php');

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php';?>

    <br><br>
    <div class="container">
    <?php 
            if(isset($errorMsg)){
                echo '<p>'.$errorMsg.'</p>';}
            ?>
            <?php 

                if(isset($message_message)){
                    ?>
            <form  method="POST">
                <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Sujet</label>
                    <input type="text" class="form-control" name="sujet" value=<?=$message_sujet?>>
                </div>
                    <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">message</label>
                <textarea class="form-control" name="message"><?=$message_message?>
                </textarea>
                </div>
                    <br>
                    <button type="submit" class="btn btn-primary"   name="validate">Modifier le message</button>
                </form>

                </div>
            </body>
            </html>
                    <?php

                }
//<?=$message... affiche le contenue du message par défaut
            ?>
 