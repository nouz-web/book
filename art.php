<?php
    include_once("../models/mycfg.php");
    include_once('../models/article.php');

    $act = $_GET["f"];
    $art = $_GET["a"];

    if ($act == "new")
    {
        ?>
            <input type="hidden" name="act" value="new" >
            <input type="hidden" name="art" value="0" >

            <label class="m-1" for="nm">Désignation</label>
            <input id="nm" type="text" class="form-control form-control-sm" name="ar" value="" required >

            <label class="m-1" for="pr">Prix</label> 
            <input id="pr" type="text" class="form-control form-control-sm" name="pr" value="" required >

            <label class="m-1" for="ds">Descripion</label>
            <input id="ds" type="text" class="form-control form-control-sm" name="ds" value="" required >

            <label class="m-1" for="im">Image</label>
            <input id="im" type="file" class="form-control form-control-sm" name="im" value="" required> 
        <?php        
    }

    if ($act == "edt")
    {
        $article = Article::getInstance($art);
        ?>
            <input type="hidden" name="act" value="edt" >
            <input type="hidden" name="art" value="<?= $art ?>" >

            <label class="m-1" for="nm">Désignation</label>
            <input id="nm" type="text" class="form-control form-control-sm" name="ar" value="<?= $article->art_name ?>" required >

            <label class="m-1" for="pr">Prix</label> 
            <input id="pr" type="text" class="form-control form-control-sm" name="pr" value="<?= $article->art_price ?>" required >

            <label class="m-1" for="ds">Descripion</label>
            <input id="ds" type="text" class="form-control form-control-sm" name="ds" value="<?= $article->art_text ?>" required >

            <label class="m-1" for="im">Image</label>
            <input id="im" type="file" class="form-control form-control-sm" name="im" value="" required> 
        <?php       
    }

    if ($act == "del")
    {
        ?>
            <input type="hidden" name="act" value="del" >
            <input type="hidden" name="art" value="<?= $art ?>" >
            <label class="m-1" for="sx">Voulez-vous supprimer?</label>
        <?php        
    }