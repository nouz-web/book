<?php
    include_once("./models/mycfg.php");
    include_once("./models/book.php");
    $message = "";
    $tp = 0;  if (isset($_GET ["tp"])) { $tp = $_GET ["tp"]; }
    $un = ""; if (isset($_POST["un"])) { $un = $_POST["un"]; }
    $pw = ""; if (isset($_POST["pw"])) { $pw = $_POST["pw"]; }
    $wp = ""; if (isset($_POST["wp"])) { $wp = $_POST["wp"]; }
    $nm = ""; if (isset($_POST["nm"])) { $nm = $_POST["nm"]; }
    $ac = ""; if (isset($_POST["ac"])) { $ac = $_POST["ac"]; }
    $nt = ""; if (isset($_POST["nt"])) { $nt = $_POST["nt"]; }
    $ph = ""; if (isset($_POST["ph"])) { $ph = $_POST["ph"]; }
    $ad = ""; if (isset($_POST["ad"])) { $ad = $_POST["ad"]; }
    $em = ""; if (isset($_POST["em"])) { $em = $_POST["em"]; }
    $ig = ""; if (isset($_POST["ig"])) { $ig = $_POST["ig"]; }
    $fb = ""; if (isset($_POST["fb"])) { $fb = $_POST["fb"]; }
    $ds = ""; if (isset($_POST["ds"])) { $ds = $_POST["ds"]; }
    $tg = ""; if (isset($_POST["tg"])) { $tg = $_POST["tg"]; }
    $ex = ""; if (isset($_POST["ex"])) { $ex = $_POST["ex"]; }

    $wil = ""; if (isset($_POST["wil"])) { $wil = $_POST["wil"]; }
    
    // customer
    $fn = ""; if (isset($_POST["fn"])) { $fn = $_POST["fn"]; };
    $ln = ""; if (isset($_POST["ln"])) { $ln = $_POST["ln"]; };
    $sx = ""; if (isset($_POST["sx"])) { $sx = $_POST["sx"]; };
    $dt = ""; if (isset($_POST["dt"])) { $dt = $_POST["dt"]; };

    if (isset($_POST["cus"]))
    {
        if ($pw == $wp)
        {
            $user                   = new Book();
            $user->book_id          = 0;
            $user->book_un          = $un;
            $user->book_pw          = $pw;
            $user->book_name        = "";
            $user->book_activity    = "";
            $user->book_kind        = 0;
            $user->book_phone       = $ph;
            $user->book_adress      = $ad;
            $user->book_email       = $em;
            $user->book_insta       = "";
            $user->book_face        = "";
            $user->book_description = "";
            $user->book_tags        = "";
            $user->book_fname       = $fn;
            $user->book_lname       = $ln;
            $user->book_sex         = $sx;
            $user->book_birth       = $dt;
            $user->book_wilaya      = "";
            $user->book_ext         = "";

            $message = $user->create();
            if ($message == "") 
            { 
                session_start();
                $user->save_session();
                header("location:cus_home.php");
            }
        }
        else 
        {
            $message = "Mot de passe incorrect";
        }
    }

    if (isset($_POST["inc"]))
    {
        if ($pw == $wp)
        {
            if (isset($_FILES["fl"]))
            {
                $dir  = "imgs/";
                $temp = $_FILES["fl"]["name"];
                $size = $_FILES["fl"]["size"];
                $type = strtolower(pathinfo($temp, PATHINFO_EXTENSION));
            }
    
            $book                   = new Book();
            $book->book_id          = 0;
            $book->book_un          = $un;
            $book->book_pw          = $pw;
            $book->book_name        = $nm;
            $book->book_activity    = $ac;
            $book->book_kind        = $nt;
            $book->book_phone       = $ph;
            $book->book_adress      = $ad;
            $book->book_email       = $em;
            $book->book_insta       = $ig;
            $book->book_face        = $fb;
            $book->book_description = $ds;
            $book->book_tags        = $tg;
            $book->book_fname       = $fn;
            $book->book_lname       = $ln;
            $book->book_sex         = $sx;
            $book->book_birth       = $dt;
            $book->book_wilaya      = $wil;
            $book->book_ext         = $type;
    
            $message = $book->create();
            if ($message == "") 
            { 
                $target_file = $dir . $book->book_id . "." . $type;
                move_uploaded_file($_FILES["fl"]["tmp_name"], $target_file);
                session_start();
                $book->save_session();
                header("location:com_home.php");
            }
        }
        else 
        {
            $message = "Mot de passe incorrect";
        }

    }

    function company_form()
    {
        global $tp;
        global $un;
        global $pw;
        global $wp;
        global $nm;
        global $ac;
        global $nt;
        global $ph;
        global $ad;
        global $em;
        global $ig;
        global $fb;
        global $ds;
        global $tg;
        global $wil;
        ?>
        <div class="container">
            <form method="POST" action="?tp=<?= $tp ?>" enctype="multipart/form-data">
                <input type="hidden" name="inc" value="add" >
                <input type="hidden" name="nt"  value="<?= $tp ?>">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="f0">Nom d'utilisateur</label>
                        <input name="un" value="<?= $un  ?>" required type="text" class="form-control" id="f0" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="f1">Mot de passe</label>
                        <input name="pw" value="" required type="password" class="form-control" id="f1" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="f2">Confirmation</label>
                        <input name="wp" value="" required type="password" class="form-control" id="f2" placeholder="">
                    </div>
                </div>
                    <div class="form-group">
                        <label for="f3">Désignation</label>
                        <input name="nm" value="<?php $nm ?>" required type="text" class="form-control" id="f3" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="f4">Activité</label>
                        <input name="ac" value="<?= $ac ?>" required type="text" class="form-control" id="f4" placeholder="">
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="f6">Téléphone</label>
                        <input name="ph" value="<?= $ph ?>" required type="text" class="form-control" id="f6" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="f8">Email</label>
                        <input name="em" value="<?= $em ?>" required type="text" class="form-control" id="f8" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="wil">Wilaya</label>
                        <?php echo Book::select_wilaya_form($wil); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="ad">Adresse</label>
                        <input name="ad" value="<?= $ad ?>" required type="text" class="form-control" id="ad" placeholder="">
                    </div>            
                </div>        
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="f9">Instagramme</label>
                        <input name="ig" value="<?= $ig ?>" required type="text" class="form-control" id="f9" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="fb">Facebook</label>
                        <input name="fb" value="<?= $fb ?>" required type="text" class="form-control" id="fb" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="ds">Description</label>
                        <input name="ds" value="<?= $ds ?>" required type="text" class="form-control" id="ds" placeholder="">
                    </div>
                </div>
                    <div class="form-group">
                        <label for="tg">Tags</label>
                        <input name="tg" value="<?= $tg ?>" required type="text" class="form-control" id="tg" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="fl" value="" class="form-control" required>
                    </div>
                <button type="submit" class="btn btn-primary">Inscription</button>
            </form>
        </div>
    <?php
    }

    function customer_form()
    {
        global $tp;
        global $un;
        global $pw;
        global $wp;
        global $nm;
        global $ph;
        global $ad;
        global $em;
        global $fn;
        global $ln;
        global $sx;
        global $dt;

        ?>
        <div class="container">
            <form method="POST" action="?tp=<?= $tp ?>">
                <input type="hidden" name="cus" value="add" >
                <div class="form-row">
                    <div class="form-group col-4">
                        <label for="un">Nom d'utilisateur</label>
                        <input name="un" value="<?= $un ?>" required type="text" class="form-control" id="un" placeholder="">
                    </div>
                    <div class="form-group col-4">
                        <label for="pw">Mot de passe</label>
                        <input name="pw" value="" required type="password" class="form-control" id="pw" placeholder="">
                    </div>
                     <div class="form-group col-4">
                        <label for="wp">Confirmation</label>
                        <input name="wp" value="" required type="password" class="form-control" id="wp" placeholder="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-4">
                        <label for="fn">Nom</label>
                        <input name="fn" value="<?= $fn ?>" required type="text" class="form-control" id="fn" placeholder="">
                    </div>
                    <div class="form-group col-4">
                        <label for="ln">Prénom</label>
                        <input name="ln" value="<?= $ln ?>" required type="text" class="form-control" id="ln" placeholder="">
                    </div>                    
                    <div class="form-group col-2">
                        <label for="sx">Sexe</label>
                        <select name="sx" id="sx" class="form-control" required>
                            <option value="Homme" selected >Homme</option>
                            <option value="Femme"          >Femme</option>
                        </select>
                    </div>
                    <div class="form-group col-2">
                        <label for="dt">Date de naissance</label>
                        <input name="dt" value="<?= $dt ?>" required type="date" class="form-control" id="dt" placeholder="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-4">
                        <label for="ph">Téléphone</label>
                        <input name="ph" value="<?= $ph ?>" required type="text" class="form-control" id="ph" placeholder="">
                    </div>
                    <div class="form-group col-4">
                        <label for="ad">Adresse</label>
                        <input name="ad" value="<?= $ad ?>" required type="text" class="form-control" id="ad" placeholder="">
                    </div>
                    <div class="form-group col-4">
                        <label for="em">Email</label>
                        <input name="em" value="<?= $em ?>" required type="text" class="form-control" id="em" placeholder="">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Inscription</button>
            </form>
        </div>
        <?php
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Book</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="background-color: #eee;">
    <div class="container-fluid bg-dark">
        <div class="container bg-dark">
            <?php require_once("./components/main_navigator.php"); ?>
        </div>
        </div>
        <br>
        <br>
        <br>
    <?php 
        if ($message != "") { ?>
            <div class="container">
                <div class="alert alert-danger" role="alert"><?= $message; ?></div>
            </div>
        <?php }      
        switch ($tp) 
        {
            case 0: customer_form(); break;
            case 1: company_form (); break;
        }
    ?>
    <?php require_once("./components/js_footer.php"); ?>
</body>
</html>