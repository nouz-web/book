<?php $curr_fn = basename($_SERVER['SCRIPT_NAME']);?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="Index.php">CASA FOOD</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active"><a class="nav-link" href="index.php" >Acceuil</a></li>        
        <li class="nav-item dropdown <?php  if ( $curr_fn == "inscription.php" ) { echo "active"; } ?> ">
            <a class="nav-link dropdown-toggle" href="inscription.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Inscription</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="inscription.php?tp=1">Magsin</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="inscription.php?tp=0">Client</a>
            </div>
        </li>

    </ul>
    <form class="form-inline my-2 my-lg-0" method="POST" action="login.php">
        <input class="form-control mr-sm-2" type="text"     name="un" placeholder="">
        <input class="form-control mr-sm-2" type="password" name="pw" placeholder="">
        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Login</button>
    </form>
    </div>
</nav>