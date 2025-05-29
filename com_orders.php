<?php
include_once("./models/mycfg.php");
    include_once("./models/comment.php");
    include_once("./models/book.php");
    include_once("./models/article.php");
    include_once("./models/basket.php");

    $message = "";
    session_start();
    $book = Book::load_session();
    if ($book == null) { header("location:index.php"); }

    $basket = Basket::com_getAll($book->book_id);

    $customers = [];
    $sql  = "SELECT DISTINCT cus FROM orders, books, articles WHERE book_id = ".$book->book_id." AND book_id = art_book AND art = art_id";
    $stmt = $PDO->query($sql);            
    $lst  =  $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($lst as $itm) { $customers[] = $itm["cus"]; }
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

    <?php foreach($customers as $cus)
    {
        $cust = Book::get_instance($cus); ?>
        <h5>Commande de :<?= $cust->book_fname." ".$cust->book_lname ?></h5>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Article</th>
                    <th>Quantité</th>
                    <th>Prix Unitaire</th>
                    <th>Total TTC</th>
                </tr>
            </thead>
                <tbody>
                    <?php foreach ($basket as $item): if ($item->cus == $cus): ?>
                        <tr>
                            <td><?= htmlspecialchars($item->date) ?></td>
                            <td><?= htmlspecialchars($item->art_name) ?></td>
                            <td><?= htmlspecialchars($item->qte) ?></td>
                            <td><?= htmlspecialchars($item->prx) ?> DA</td>
                            <td><?= htmlspecialchars($item->ttc) ?> DA</td>
                        </tr>
                    <?php endif; endforeach; ?>
                </tbody>

        </table>
    <?php } ?>


    </div>
    </div><br><br><br><br><br><br><br><br><br><br>
    </body>
    <?php require_once("./components/js_footer.php"); ?>
</html>