<?php 
session_start();
require('actions/message/showAllMessageAction.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br><br>
    
    <div class="container">

        <form>

            <div class="form-group row">

            <div class="col-8">
                <input type="search" name="search" class="form-control">
            </div>
            <div class="col-4">
                <button class="btn btn-success" type="submit">Rechercher</button>
            </div>

            </div>
        </form>
            <br>
            <?php
                while($message =  $getAllMessages->fetch()){
                    ?>
                    <div class="card">
                        <div class="card-header">
                              <a href= "article.php?id=<?= $message['id']?>">
                               <?= $message['sujet']; ?>
                              </a>
                        </div>
                        <div class="card-body">
                        <?= $message['message']; ?>
                        </div>
                        <div class="card-footer">
                            Publié par <a href="profile.php?id=<?= $message['id_auteur']; ?>"><?= $message['pseudo_auteur']; ?></a> le <?= $message['date_publication']; ?>
                        </div>
                    </div>
                    <br>
                    <?php
                }
              
            ?>
    <div>
</body>
</html>