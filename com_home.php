<?php
include_once("./models/mycfg.php");
include_once("./models/comment.php");
include_once("./models/book.php");

$message = "";
session_start();
$book = Book::load_session();
if ($book == null) { header("location:index.php"); }

$cr = ""; if (isset($_POST["cr"] )) { $cr  = $_POST["cr"];  }
$pw = ""; if (isset($_POST["pw"] )) { $pw  = $_POST["pw"];  }
$wp = ""; if (isset($_POST["wp"] )) { $wp  = $_POST["wp"];  }

$tp = $book->book_id;          if (isset($_GET ["tp"] )) { $tp  = $_GET ["tp"];  }
$nm = $book->book_name;        if (isset($_POST["nm"] )) { $nm  = $_POST["nm"];  }
$ac = $book->book_activity;    if (isset($_POST["ac"] )) { $ac  = $_POST["ac"];  }
$nt = $book->book_kind;        if (isset($_POST["nt"] )) { $nt  = $_POST["nt"];  }
$ph = $book->book_phone;       if (isset($_POST["ph"] )) { $ph  = $_POST["ph"];  }
$ad = $book->book_adress;      if (isset($_POST["ad"] )) { $ad  = $_POST["ad"];  }
$em = $book->book_email;       if (isset($_POST["em"] )) { $em  = $_POST["em"];  }
$ig = $book->book_insta;       if (isset($_POST["ig"] )) { $ig  = $_POST["ig"];  }
$fb = $book->book_face;        if (isset($_POST["fb"] )) { $fb  = $_POST["fb"];  }
$ds = $book->book_description; if (isset($_POST["ds"] )) { $ds  = $_POST["ds"];  }
$tg = $book->book_tags;        if (isset($_POST["tg"] )) { $tg  = $_POST["tg"];  }
$wil= $book->book_wilaya;      if (isset($_POST["wil"])) { $wil = $_POST["wil"]; }

if (isset($_POST['com_user']))
{
    $comment = new Comment();
    $comment->com_user = $_POST['com_user'];
    $comment->com_book = $_POST['com_book'];
    $comment->com_text = $_POST['com_text'];
    $comment->create();
}

if (isset($_POST["sec"]))
{
    $current = md5($cr);
    if ($current == $book->book_pw)
    {
        if ($pw == $wp)
        {
            $book->book_pw = md5($pw);
            $book->update_password();
            $book->save_session();
            header("location:com_home.php");
        } 
        else { $message = "Confirmation incorrect!"; }    
    } 
    else { $message = "Mot de passe incorrect!"; }
}

if (isset($_POST["xyz"]))
{
    $book->book_phone  = $ph;
    $book->book_adress = $ad;
    $book->book_email  = $em;
    $book->book_insta  = $ig;
    $book->book_face   = $fb;
    $book->book_wilaya = $wil;
    $book->update();
    $book->save_session();
    header("location:com_home.php");
}

if (isset($_POST["inf"]))
{
    if (isset($_FILES["fl"])) 
    {
        $dir  = "imgs/";
        $temp = $_FILES["fl"]["name"];
        $size = $_FILES["fl"]["size"];
        $type = strtolower(pathinfo($temp, PATHINFO_EXTENSION));
        $target_file = $dir . $book->book_id . "." . $type;
        move_uploaded_file($_FILES["fl"]["tmp_name"], $target_file);
        $book->book_ext = $type;
    }

    $book->book_name       = $nm;
    $book->book_activity   = $ac;
    $book->book_description= $ds;
    $book->book_tags       = $tg;
    $book->update();

    $book->save_session();
    header("location:com_home.php");
}

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= $book->book_name ?>
        </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body style="background-color: #eee;">
    <div class="container-fluid bg-dark">
        <div class="container bg-dark">
            <?php require_once("./components/com_navigator.php"); ?>
        </div>
    </div>
    <div class="container pt-4">
        <?php if ($message != "") { ?><div class="alert alert-danger" role="alert"><?= $message; ?></div><?php } ?>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-7 col-xl-8 mt-2">
                <!-- Main gard -->
                <div class="card w-100">
                    <img class="card-img-top" src="./imgs/<?= $book->book_id ?>.jpg" alt="Card image cap">
                    <form method="post" enctype="multipart/form-data">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <label>Designation</label>
                            <input type="text" name="nm" value="<?= $book->book_name ?>" class="form-control" required>
                        </li>
                        <li class="list-group-item">
                            <label>Description</label>
                            <textarea name="ds" class="form-control" rows="6" required ><?= $book->book_description ?></textarea>
                        </li>
                        <li class="list-group-item">
                            <label>Image</label>
                            <input type="file" name="fl" value="" class="form-control">
                        </li>
                        <li class="list-group-item">
                            <label>Tags</label>
                            <input type="text" name="tg" value="<?= $tg ?>" class="form-control" required>
                        </li>                        
                        <li class="list-group-item">
                            <input type="submit" name="inf" value="Enregistrer les modifications" class="btn btn-sm btn-primary">
                        </li>
                    </ul>
                    </form>
                </div><!-- end Main gard -->
                <!-- Comments -->
                <div class="card w-100 mt-2">
                    <div class="card-header">Commentaires</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <form name="fcom" method="post" action="?id=<?= $book->book_id ?>">
                                <input type="hidden" name="com_book" value="<?= $book->book_id ?>">
                                <input type="hidden" name="com_user" value="<?= $book->book_id ?>">
                                <div class="row">
                                    <div class="col-9" ><input type="text" name="com_text" class="form-control w-100"></div>
                                    <div class="col-3" ><input type="submit" value="envoyer" class="btn btn-primary w-100" ></div>
                                </div>
                            </form>
                        </li>
                        <?php $book->load_comments(); foreach($book->book_comments as $comment) { ?>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-8" ><?= $comment->com_text ?></div>
                                <div class="col-2" ><?= $comment->com_name ?></div>
                                <div class="col-2" ><?= $comment->com_date." ".$comment->com_time ?></div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>                   
                </div><!-- end Comments -->








            </div><!-- en col 1 -->
            <div class="col-sm-12 col-md-6 col-lg-5 col-xl-4 mt-2">
                <form class="p-0 m-0" action="" method="POST">
                    <div class="card w-100">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <label>Mot de passe en cours</label>
                                <input type="password" name="cr" value="" class="form-control">
                            </li>
                            <li class="list-group-item">
                                <label>Nouveau lot de passe</label>
                                <input type="password" name="pw" value="" class="form-control">
                            </li>
                            <li class="list-group-item">
                                <label>Confirmation</label>
                                <input type="password" name="wp" value="" class="form-control">
                            </li>
                            <li class="list-group-item">
                                <input type="submit" name="sec" value="Enregistrer les modifications" class="btn btn-sm btn-primary">
                            </li>                            
                        </ul>
                    </div>
                </form>
                <br>
                <br>                
                <form class="p-0 m-0" action="" method="POST">
                    <div class="card w-100">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <label>Wilaya</label>
                                <?php echo Book::select_wilaya_form($wil); ?>
                            </li>
                            <li class="list-group-item">
                                <label>Adresse</label>
                                <input type="text" name="ad" value="<?= $book->book_adress ?>" class="form-control">
                            </li>
                            <li class="list-group-item">
                                <label>Téléphone</label>
                                <input type="text" name="ph" value="<?= $book->book_phone ?>" class="form-control">
                            </li>
                            <li class="list-group-item">
                                <label>Email</label>
                                <input type="email" name="em" value="<?= $book->book_email ?>" class="form-control">
                            </li>
                            <li class="list-group-item">
                                <label>Instagram</label>
                                <input type="text" name="ig" value="<?= $book->book_insta ?>" class="form-control">
                            </li>
                            <li class="list-group-item">
                                <label>Facebook</label>
                                <input type="text" name="fb" value="<?= $book->book_face ?>" class="form-control">
                            </li>
                            <li class="list-group-item">
                                <input type="submit" name="xyz" value="Enregistrer les modifications" class="btn btn-sm btn-primary">
                            </li>
                        </ul>
                    </div> 
                </form>
            </div><!-- en col 2 -->
        </div>
    </div><br><br><br><br><br><br><br><br><br><br>
    </body>
    <?php require_once("./components/js_footer.php"); ?>
</html>