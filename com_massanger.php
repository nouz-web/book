<?php
  include_once("./models/mycfg.php");
  include_once("./models/message.php");
  include_once("./models/book.php");

  $error_message = "";
  session_start();
  $book = Book::load_session();
  if ($book == null) { header("location:index.php"); }
  
  $B = 1; if (isset($_GET["b"] )) { $B  = $_GET["b"];  }
  $M = 0; if (isset($_GET["m"] )) { $M  = $_GET["m"];  }
  $t = 0; if (isset($_GET["t"] )) { $t  = $_GET["t"];  }
  $n =""; if (isset($_GET["n"] )) { $n  = $_GET["n"];  }

  $to =""; if (isset($_POST["to"])) { $to = $_POST["to"]; }

  $msg = Message::get_instance($M);

  if (isset($_POST["nmsg"]))
  {
    $to_book = Book::get_instance_by_un($to);
    if ($to_book != null)
    {
      $dir  = "files/";
      $temp = $_FILES["fl"]["name"];
      $size = $_FILES["fl"]["size"];
      $type = strtolower(pathinfo($temp, PATHINFO_EXTENSION));
 
      $ob = ""; if (isset($_POST["ob"])) { $ob = $_POST["ob"]; }
      $lg = ""; if (isset($_POST["lg"])) { $lg = $_POST["lg"]; }
  
      $message = new Message();
      $message->msg_id         = 0;
      $message->msg_from       = $book->book_id;
      $message->msg_to         = $to_book->book_id;
      $message->msg_subject    = $ob;
      $message->msg_text       = $lg;
      $message->msg_status     = 0;
      $message->file_extension = $type;
      $message->create();
      if ($message->msg_id > 0) 
      {
          $target_file = $dir . $message->msg_id . "." . $type;
          move_uploaded_file($_FILES["fl"]["tmp_name"], $target_file);
      }
      $B=2;
    }
    else 
    {
      $error_message = "Nom d'utilisateur introuvable";
    }
  }

  if (isset($_POST["id"]))
  {
    $id = $_POST["id"];
    $fl = $_POST["fl"];
    Message::delete($id, $fl);
  }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $book->book_name ?></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        
    </head>
    <body>
    <div class="container-fluid bg-dark">
        <div class="container bg-dark">
            <?php require_once("./components/com_navigator.php"); ?>
        </div>
    </div>

    <?php
    switch ($B)
    {
      case 0: ?>
        <div class="container pt-4">
          <?php if ($error_message !="") { ?>
            <div class="alert alert-danger" role="alert"><?= $error_message ?></div>
          <?php }  ?>
          <h3>Ecrir un nouveau message:</h3>
          <form method="POST" action="?b=0" enctype="multipart/form-data">
            <input type="hidden" name="nmsg" value="1">
            <div class="form-row"><label>Destination</label><input type="text" name="to" value="<?= $to ?>" class="form-control" required></div>
            <div class="form-row"><label>Sujet      </label><input type="text" name="ob" value="" class="form-control" required></div>
            <div class="form-row"><label>Fichier    </label><input type="file" name="fl" value="" class="form-control" ></div>
            <div class="form-row"><label>Legende    </label><textarea name="lg" value="" class="form-control" rows="8" required></textarea></div>
            <input type="submit" value="Envoyer" class="btn btn-primary mt-2"></div>
          </form>
        </div>
        <?php break;

        case 1: $inbox = Message::get_inbox($book->book_id); ?>
          <div class="container pt-4">
          <h3>Boite de réception</h3>
            <?php foreach($inbox as $msg) { ?>
              <div class="card mt-2">
                    <div class="card-header">
                        <div style="float: left;" ><strong><?= $msg->other_name ?></strong></div>
                        <div style="float: right;" >envoyé le: <strong><?= $msg->msg_date ?></strong> à <strong><?= $msg->msg_time ?></strong></div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $msg->msg_subject ?></h5>
                        <p class="card-text"><?= $msg->msg_text ?></p>
                      <?php if (file_exists($msg->file_name())) { ?>
                        <a href="<?= $msg->file_name() ?>" class="btn btn-sm btn-primary" style="float: left;">Télécharger le fichier</a>
                      <?php } ?>
                        <form action="?b=1" method="POST" style="float: right;">
                            <input type="hidden" name="fl" value="<?= $msg->file_name() ?>">
                            <input type="hidden" name="id" value="<?= $msg->msg_id ?>">
                            <button class="btn btn-sm btn-danger">Supprimer le message</button></td>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>        
          
        <?php break;
        case 2: $sents = Message::get_sentbox($book->book_id); ?>
        <div class="container pt-4">
          <h3>Méssage envoyés</h3>
            <?php foreach($sents as $msg) { ?>
              <div class="card mt-2">
                    <div class="card-header">
                        <div style="float: left;" ><strong><?= $msg->other_name ?></strong></div>
                        <div style="float: right;" >envoyé le: <strong><?= $msg->msg_date ?></strong> à <strong><?= $msg->msg_time ?></strong></div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $msg->msg_subject ?></h5>
                        <p class="card-text"><?= $msg->msg_text ?></p>
                        <?php if (file_exists($msg->file_name())) { ?>
                        <a href="<?= $msg->file_name() ?>" class="btn btn-sm btn-primary" style="float: left;">Télécharger le fichier</a>
                        <?php } ?>
                        <form action="?b=1" method="POST" style="float: right;">
                            <input type="hidden" name="fl" value="<?= $msg->file_name() ?>">
                            <input type="hidden" name="id" value="<?= $msg->msg_id ?>">
                            <button class="btn btn-sm btn-danger">Supprimer le message</button></td>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php break;

        case 4: ?>
          <div class="container pt-4">
            <h3>Méssage: <?= $msg->msg_id ?></h3>
          </div>
        <?php break;
      }
      ?>
    <?php require_once("./components/js_footer.php"); ?>
</html>