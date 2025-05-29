<?php
    include_once("./models/mycfg.php");
    include_once("./models/book.php");
    include_once("./models/article.php");
    include_once("./models/basket.php");

    $js_script = "";

    session_start();
    $user = Book::load_session();
    if ($user == null) { header("location:index.php"); }

    if (isset($_POST["art_id"]) && $_POST["art_id"] > 0) 
    {
        $art = Article::getInstance($_POST["art_id"]);
        if ($art != null) 
        {
            $basket = new Basket();
            $basket->cus = $user->book_id;
            $basket->art = $art->art_id;
            $basket->qte = 1; // Default quantity
            $basket->prx = $art->art_price;
            $basket->ttc = $art->art_price; // Assuming no tax for simplicity
            if ($basket->create()) {
                $js_script = '<script>alert("Article ajouté au panier avec succès !");</script>';
            } else {
                $js_script = '<script>alert("Erreur lors de l\'ajout de l\'article au panier.");</script>';
            }
        }
    }

    $arg = ""; if (isset($_POST["arg"]) ){ $arg = $_POST["arg"]; }

    $SQL = 'SELECT * FROM books, articles WHERE (book_id > 0)  AND (book_id = art_book) ';

    if ($arg != "") 
    { 
        $SQL .= 'AND (';  
        $SQL .= '(art_name LIKE "%'.$arg.'%")';
        $SQL .= 'OR (art_text LIKE "%'.$arg.'%")';
        $SQL .= ')';
    }
    $cmd = $PDO->query($SQL); 
    $lst = $cmd->fetchAll(PDO::FETCH_ASSOC);
    $cmd->closeCursor();
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
                    <div class="col-11 p-1"><input type="search" name="arg" value="<?= $arg ?>" class="form-control"></div>
                    <div class="col-1 p-1"><input type="submit" value="Chercher" class="btn btn-primary"></div>
                </div>
            </form>
        </div>
    </main>
    <div class="container mt-4">  
            <div class="row">
                <?php foreach($lst as $itm) { ?>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 p-1">
                    <div class="card">
                        <div class="card-header">Magasin :<?= $itm['book_name'] ?></div>
                        <img class="card-img-top" style="max-height: 120px;" src="./articles/<?= $itm['art_image'] ?>">
                        <div class="card-body" style="min-height:220; max-height:220; height:220px; ">
                            <h5 class="card-title"><?= $itm['art_name'] ?></h5>
                            <h5 class="card-title text-right"><?= $itm['art_price']." DA" ?></h5>
                            <p class="card-text"><?= substr($itm['art_text'], 0, 160)." ..." ?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-right">
                                <form name="a<?= $itm['art_id'] ?>" method="POST">
                                    <input type="hidden" name="art_id" value="<?= $itm['art_id'] ?>">
                                    <input type="submit" class="btn btn-sm btn-primary" value="Ajouter au panier">
                                </form>
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

    <?php if ($js_script != "") { echo $js_script; } ?>
    <?php require_once("./components/js_footer.php"); ?>
</html>