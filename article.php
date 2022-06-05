<?php 
session_start();
require('actions/message/showMessageContentAction.php');
require('actions/message/postAnswerAction.php');
require('actions/message/showAllAnswersAction.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br><br>

    <div class="container">


        <?php 
            if(isset($errorMsg)){ echo $errorMsg; }


            if(isset($message_date_publication)){
                ?>
                <section class="show-content">
                    <h3><?= $message_sujet; ?></h3>
                    <hr>
                    <p><?= $message_message; ?></p>
                    <hr>
                    <small> par <?= $message_pseudo_auteur . ' le ' . $message_date_publication; ?></small>
                </section>
                <br>
                <section class="show-answer">

                    <form class="form-group" method="POST">
                   <br>
                        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Réponse :</label>
            <textarea class="form-control" name="answer"></textarea>
                </div>
                    <br>
                <button type="submit" class="btn btn-primary" name="validate">Répondre</button>
                    </form>
                    <br>
                        <?php
                        while($answer = $getAllAnswerOfAMessage->fetch()){
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    <?= $answer['pseudo_auteur']; ?>
                                </div>
                                <div class="card-body">
                                    <?= $answer['reponse']; ?>
                                </div>
                            </div>
                            <br>
                            <?php
                        }
                    ?>
                </section>
                <?php
            }
        ?>

    </div>

</body>
</html>