<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">CASA FOOD</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php $curr_fn = basename($_SERVER['SCRIPT_NAME']);?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item <?php  if ( $curr_fn == "cus_home.php"      ) { echo "active"; } ?>"><a class="nav-link" href="cus_home.php"     >Acceuil</a></li>
        <li class="nav-item <?php  if ( $curr_fn == "cus_search.php"    ) { echo "active"; } ?>"><a class="nav-link" href="cus_search.php"   >Recherche</a></li>
        <li class="nav-item <?php  if ( $curr_fn == "cus_basket.php"    ) { echo "active"; } ?>"><a class="nav-link" href="cus_basket.php"   >Panier</a></li>
        <li class="nav-item <?php  if ( $curr_fn == "cus_massanger.php" ) { echo "active"; } ?>"><a class="nav-link" href="cus_massanger.php">Messagerie</a></li>
        <li class="nav-item <?php  if ( $curr_fn == "cus_profil.php"    ) { echo "active"; } ?>"><a class="nav-link" href="cus_profil.php"   >Profil</a></li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="logout.php">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Fermer la session</button>
    </form>
    </div>
</nav>