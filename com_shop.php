<?php
    include_once("./models/mycfg.php");
    include_once("./models/book.php");
    include_once("./models/article.php");

    session_start();
    $book = Book::load_session();
    if ($book == null) { header("location:index.php"); }

    $message = "";
    $_art = isset($_POST["art"]) ? $_POST["art"] : 0;
    $_mod = isset($_POST["mod"]) ? $_POST["mod"] : 0;
    $_act = isset($_POST["act"]) ? $_POST["act"] : 0;

    if ($_act == 1)
    {
        if (isset($_FILES['im']))
        {
            $fileTmpPath = $_FILES['im']['tmp_name'];
            $fileName = $_FILES['im']['name'];
            $fileSize = $_FILES['im']['size'];
            $fileType = $_FILES['im']['type'];

            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $uploadFolder = './articles/';
            $newFileName = uniqid('file_', true) . '.' . $fileExtension;
            $destPath = $uploadFolder . $newFileName;
            move_uploaded_file($fileTmpPath, $destPath);        
        }

        $article = new Article();
        $article->art_id    = 0;
        $article->art_name  = $_POST["nm"] ?? "";
        $article->art_text  = $_POST["ds"] ?? "";
        $article->art_price = $_POST["pr"] ?? 0;
        $article->art_book  = $book->book_id;
        if (isset($newFileName)) { $article->art_image = $newFileName; }
        $article->create();
        $_mod = 0;
    }

    if ($_act == 2)
    {
        if (isset($_FILES['im']))
        {
            $fileTmpPath = $_FILES['im']['tmp_name'];
            $fileName    = $_FILES['im']['name'];
            $fileSize    = $_FILES['im']['size'];
            $fileType    = $_FILES['im']['type'];

            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $uploadFolder = './articles/';
            $newFileName = uniqid('file_', true) . '.' . $fileExtension;
            $destPath = $uploadFolder . $newFileName;
            move_uploaded_file($fileTmpPath, $destPath);        
        }

        $article            = Article::getInstance($_POST["art"]);
        $article->art_name  = $_POST["nm"];
        $article->art_text  = $_POST["ds"];
        $article->art_price = $_POST["pr"];
        if (isset($newFileName)) { $article->art_image = $newFileName; }
        $article->update();
        $_mod = 0;
    }

    if ($_act == 3)
    {
        $article = Article::getInstance($_POST["art"]);
        $article->delete();
        $_mod = 0;
    }

    function show_list()
    { ?>
        <form name="newart" method="post" class="text-right">
            <input type="hidden" name="mod" value="1">
            <input type="hidden" name="art" value="0">
            <input type="submit" value="Ajouter un nouvel article" class="btn btn-primary mb-3">
        </form>
        <div class="row">
            <?php global $book; $articles = Article::load($book->book_id); foreach ($articles as $art) { ?>
                <div class="col-md-3">
                    <div class="card mb-4 shadow-sm">
                        <img src="./articles/<?= $art->art_image ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?= $art->art_name ?></h5>
                            <p class="card-text"><?= $art->art_text ?></p>
                            <p class="card-text"><strong>Price:</strong> <?= $art->art_price ?> DA</p>

                            <div class="row">
                                <div class="col-6">
                                    <form name="e<?= $art->art_id ?>" method="post">
                                        <input type="hidden" name="mod" value="2">
                                        <input type="hidden" name="art" value="<?= $art->art_id ?>">
                                        <input type="submit" class="btn btn-sm btn-secondary w-100" value="Modifier">
                                    </form>
                                </div>
                                <div class="col-6">
                                    <form name="d<?= $art->art_id ?>" method="post">
                                        <input type="hidden" name="mod" value="3">
                                        <input type="hidden" name="art" value="<?= $art->art_id ?>">
                                        <input type="submit" value="Supprimer" class="btn btn-sm btn-danger w-100" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php }

    function insert_form () 
    { ?>
        <form name="new_art" method="post" enctype="multipart/form-data">
            <input type="hidden" name="act" value="1">
            <input type="hidden" name="art" value="0">

            <div class="form-group">
                <label for="nm">Désignation</label>
                <input id="nm" type="text" class="form-control form-control-sm" name="nm" value="" required>
            </div>
            <div class="form-group">
                <label for="pr">Prix</label>
                <input id="pr" type="text" class="form-control form-control-sm" name="pr" value="" required>
            </div>
            <div class="form-group">
                <label for="ds">Description</label>
                <input id="ds" type="text" class="form-control form-control-sm" name="ds" value="" required>
            </div>
            <div class="form-group">
                <label for="im">Image</label>
                <input id="im" type="file" class="form-control form-control-sm" name="im" value="" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-sm btn-primary" value="Enregistrer">
            </div>
        </form>
    <?php }

    function update_form ($id)
     { 
        $art = Article::getInstance($id);
        ?>
        <h5>Modifier l'article <?= $id ?></h5>
        <form name="edt_art" method="post" enctype="multipart/form-data">
            <input type="hidden" name="act" value="2">
            <input type="hidden" name="art" value="<?= $id ?>">

            <div class="form-group">
                <label for="nm">Désignation</label>
                <input id="nm" type="text" class="form-control form-control-sm" name="nm" value="<?= $art->art_name ?>" required>
            </div>
            <div class="form-group">
                <label for="pr">Prix</label>
                <input id="pr" type="text" class="form-control form-control-sm" name="pr" value="<?= $art->art_price ?>" required>
            </div>
            <div class="form-group">
                <label for="ds">Description</label>
                <input id="ds" type="text" class="form-control form-control-sm" name="ds" value="<?= $art->art_text ?>" required>
            </div>
            <div class="form-group">
                <label for="im">Image</label>
                <input id="im" type="file" class="form-control form-control-sm" name="im" value="" >
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-sm btn-primary" value="Enregistrer">
            </div>
        </form>

    <?php }

   function delete_form ($id)
    { ?>
        <table>
            <tr>
                <td colspan="2"><h1>Voulez-vous upprimer l'article <?= $id ?> ?</h1></td>
            </tr>  
            <tr>
                <td Width="1%">
                    <form name="can_art" method="post">
                        <input type="hidden" name="mod" value="0">
                        <input type="submit" class="btn btn-secondary" value="Retour">
                    </form>
                </td>
                <td>
                    <form name="new_art" method="post">
                        <input type="hidden" name="act" value="3">
                        <input type="hidden" name="art" value="<?= $id ?>">
                        <input type="submit" class="btn btn-danger" value="Supprimer">
                    </form>        
                </td>
            </tr>  
        </table>
    <?php }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $book->book_name ?></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
    <div class="container-fluid bg-dark">
        <div class="container bg-dark">
            <?php require_once("./components/com_navigator.php"); ?>
        </div>
    </div>

    <div class="container pt-5">
    <?php 
        if ($message != "") { ?>
            <div class="container">
                <div class="alert alert-danger" role="alert"><?= $message; ?></div>
            </div>
        <?php }      
        switch ($_mod) 
        {
            case 0: show_list(); break;
            case 1: insert_form(); break;
            case 2: update_form($_art); break;
            case 3: delete_form($_art); break;
        }
    ?>
    </div>
    <?php require_once("./components/js_footer.php"); ?>
</html>