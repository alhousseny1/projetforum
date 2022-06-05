<?php 
require('actions/utilisateurs/securityAction.php');  
require('actions/message/myMessageAction.php');

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

        <br><br>
        <div class="container">
        <?php
        while($message = $getAllMyMessages->fetch()){
            ?>
            <div class="card">
        <h5 class="card-header">
        <a href= "article.php?id=<?php echo $message['id']; ?>">
            <?= $message['sujet']; ?>
         </a>
        </h5>
            <div class="card-body">
                <p class="card-text">
                    <?= $message['message'] ?>
                </p>
                <a href="article.php?id=<?= $message['id'];?>" class="btn btn-primary">Acceder au message</a>
                <a href="edit-message.php?id=<?= $message['id'] ?>" class="btn btn-warning">Modifier le message</a>
                <a href="actions/message/deleteMessageAction.php?id=<?= $message['id']?>" class="btn btn-danger">Supprimer le message</a>
            </div>
         </div> 
         <br>
            <?php
        }
        ?>
        </div>
        <br>
</body>
</html>