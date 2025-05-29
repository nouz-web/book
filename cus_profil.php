<?php
include_once("./models/mycfg.php");
include_once("./models/book.php");

$un = ""; if (isset($_POST["un"])) { $un = $_POST["un"]; }
$pw = ""; if (isset($_POST["pw"])) { $pw = $_POST["pw"]; }
$wp = ""; if (isset($_POST["wp"])) { $wp = $_POST["wp"]; }
$ph = ""; if (isset($_POST["ph"])) { $ph = $_POST["ph"]; }
$ad = ""; if (isset($_POST["ad"])) { $ad = $_POST["ad"]; }
$em = ""; if (isset($_POST["em"])) { $em = $_POST["em"]; }
$fn = ""; if (isset($_POST["fn"])) { $fn = $_POST["fn"]; }
$ln = ""; if (isset($_POST["ln"])) { $ln = $_POST["ln"]; }
$sx = ""; if (isset($_POST["sx"])) { $sx = $_POST["sx"]; }
$dt = ""; if (isset($_POST["dt"])) { $dt = $_POST["dt"]; }

session_start();
$user = Book::load_session();
if ($user == null) { header("location:index.php"); }

if (isset($_POST["un"]))
{ 
    $user->book_un          = $un;
    $user->book_pw          = $pw;
    $user->book_fname       = $fn;
    $user->book_lname       = $ln;
    $user->book_sex         = $sx;
    $user->book_birth       = $dt;
    $user->book_phone       = $ph;
    $user->book_email       = $em;
    $user->book_adress      = $ad;
    $message = $user->update_user();
}









?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $user->book_un ?></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
    <div class="container-fluid bg-dark">
        <div class="container bg-dark">
            <?php require_once("./components/cus_navigator.php"); ?>
        </div>
    </div>
    <!-- -->
    <div class="container mt-4">
        <form method="POST" action="">
            <input type="hidden" name="inc" value="add" >
            <div class="form-row">
                <div class="form-group col-4">
                    <label for="un">Nom d'utilisateur</label>
                    <input name="un" value="<?= $user->book_un ?>" required type="text" class="form-control" id="un" readonly placeholder="">
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
                    <input name="fn" value="<?= $user->book_fname ?>" required type="text" class="form-control" id="fn" placeholder="">
                </div>
                <div class="form-group col-4">
                    <label for="ln">Prénom</label>
                    <input name="ln" value="<?= $user->book_lname ?>" required type="text" class="form-control" id="ln" placeholder="">
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
                    <input name="dt" value="<?= $user->book_birth ?>" required type="date" class="form-control" id="dt" placeholder="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-4">
                    <label for="ph">Téléphone</label>
                    <input name="ph" value="<?= $user->book_phone ?>" required type="text" class="form-control" id="ph" placeholder="">
                </div>
                <div class="form-group col-4">
                    <label for="ad">Adresse</label>
                    <input name="ad" value="<?= $user->book_adress ?>" required type="text" class="form-control" id="ad" placeholder="">
                </div>
                <div class="form-group col-4">
                    <label for="em">Email</label>
                    <input name="em" value="<?= $user->book_email ?>" required type="text" class="form-control" id="em" placeholder="">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Appliquer les modifications</button>
        </form>
    </div>
    <!-- -->
    <?php require_once("./components/js_footer.php"); ?>
</html>