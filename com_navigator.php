<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">CASA FOOD</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php $curr_fn = basename($_SERVER['SCRIPT_NAME']);?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item <?php  if ( $curr_fn == "com_home.php"      ) { echo "active"; } ?>"><a class="nav-link" href="com_home.php"     >Acceuil</a></li>
        <li class="nav-item <?php  if ( $curr_fn == "com_shop.php"      ) { echo "active"; } ?>"><a class="nav-link" href="com_shop.php"     >Magasin</a></li>
        <li class="nav-item <?php  if ( $curr_fn == "com_orders.php"    ) { echo "active"; } ?>"><a class="nav-link" href="com_orders.php"     >Commandes</a></li>
        <li class="nav-item <?php  if ( $curr_fn == "com_massanger.php" ) { echo "active"; } ?>"><a class="nav-link" href="com_massanger.php">Messagerie</a></li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="logout.php">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Fermer la session</button>
    </form>
    </div>
</nav>