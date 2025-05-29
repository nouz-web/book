<?php
include_once("./models/mycfg.php");
include_once("./models/book.php");

session_start();
$user = Book::load_session();
if ($user == null) { header("location:index.php"); }

$arg = ""; if (isset($_POST["arg"])){ $arg = $_POST["arg"]; }
$wil = ""; if (isset($_POST["wil"])){ $wil = $_POST["wil"]; }

$SQL = 'SELECT * FROM books WHERE (book_kind > 0) ';
if ($wil != "") { $SQL .= ' AND (book_wilaya = "'.$wil.'") '; }

if ($arg != "") 
{ 
    $SQL .= 'AND (';  
    $SQL .= ' (book_wilaya LIKE "%'.$arg.'%")';
    $SQL .= 'OR (book_description LIKE "%'.$arg.'%")';
    $SQL .= 'OR (book_adress LIKE "%'.$arg.'%")';
    $SQL .= 'OR (book_tags LIKE "%'.$arg.'%")';
    $SQL .= ')';
}
$books = Book::search($SQL);

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $user->book_un ?></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body style="background-color: #eee;">
    <div class="container-fluid bg-dark">
        <div class="container bg-dark">
            <?php require_once("./components/cus_navigator.php"); ?>
        </div>
    </div>
    <main>
        <div class="container mt-4">
            <form method="POST" accept="" class="p-0 m-0">
                <div class="row">
                    <div class="col-8 p-1"><input type="text" name="arg" value="<?= $arg ?>" class="form-control"></div>
                    <div class="col-3 p-1"><?php echo Book::select_wilaya($wil); ?></div>
                    <div class="col-1 p-1"><input type="submit" value="Chercher" class="btn btn-primary"></div>
                </div>
            </form>
        </div>
    </main>
    <div class="container mt-4">  
            <div class="row">
                <?php foreach($books as $book) { $book->load_rating(); ?>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 p-1">
                    <div class="card">
                        <img class="card-img-top" src="./imgs/<?= $book->book_id.".".$book->book_ext ?>" alt="Card image cap">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item pt-1 pb-0 text-white bg-primary"><h6><?= $book->book_activity ?></h6></li>
                        </ul>
                        <div class="card-body" style="min-height:220; max-height:220; height:220px; ">
                            <h5 class="card-title"><?= $book->book_name ?></h5>
                            <p class="card-text"><?= substr($book->book_description, 0, 160)." ..." ?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">wilaya de: <?= $book->book_wilaya ?></li>
                            <li class="list-group-item">Note: <?= number_format($book->book_rating, 2, ',', ' '); ?></li>
                            <li class="list-group-item text-right">
                                <a href="cus_book.php?id=<?= $book->book_id ?>" class="btn btn-sm btn-<?= $bg ?>">Afficher plus...</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

    <?php require_once("./components/js_footer.php"); ?>
</html>