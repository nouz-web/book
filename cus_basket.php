<?php
    include_once("./models/mycfg.php");
    include_once("./models/book.php");
    include_once("./models/article.php");
    include_once("./models/basket.php");

    session_start();
    $user = Book::load_session();
    if ($user == null) { header("location:index.php"); }

    if (isset($_POST["del"]) && $_POST["del"] > 0) 
    {
        $basket = Basket::delete($_POST["del"]);
    }   

    if (isset($_POST["confirm"])) 
    {
        $temp = Basket::cus_getAll($user->book_id);
        foreach ($temp as $itm) 
        {
            $sql = "INSERT INTO orders (cus, art, qte, prx, ttc, date) VALUES (:cus, :art, :qte, :prx, :ttc, NOW())";
            $stmt = $PDO->prepare($sql);
            $stmt->bindParam(':cus', $itm->cus);
            $stmt->bindParam(':art', $itm->art);
            $stmt->bindParam(':qte', $itm->qte);
            $stmt->bindParam(':prx', $itm->prx);
            $stmt->bindParam(':ttc', $itm->ttc);
            $stmt->execute();
        }

        $confirmed = "<div class='alert alert-success'>Votre commande a été confirmée avec succès.</div>";
        $PDO->query("DELETE FROM basket WHERE cus = ".$user->book_id);
    }   

    $basket = Basket::cus_getAll($user->book_id);
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
        <div class="container mt-4">  
            <?php if (isset($confirmed)) echo $confirmed; ?>
            <h1 class="text-center">Mon Panier</h1>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Article</th>
                        <th>Quantité</th>
                        <th>Prix Unitaire</th>
                        <th>Total TTC</th>
                        <th width="1%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($basket as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item->date) ?></td>
                            <td><?= htmlspecialchars($item->art_name) ?></td>
                            <td><?= htmlspecialchars($item->qte) ?></td>
                            <td><?= htmlspecialchars($item->prx) ?> DA</td>
                            <td><?= htmlspecialchars($item->ttc) ?> DA</td>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="del" value="<?= $item->id ?>">
                                    <button type="submit" class="btn btn-sm btn-danger">Retirer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php if (count($basket) == 0){ ?>
                <div class="alert alert-info">Votre panier est vide.</div> 
            <?php } else { ?>
            <form method="post">
                <input type="submit" name="confirm" class="btn btn-primary" value="Valider la commande">
            </form>

            <?php } ?>
        </div>
    <?php require_once("./components/js_footer.php"); ?>
</html>