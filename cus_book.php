<?php
include_once("./models/mycfg.php");
include_once("./models/service.php");
include_once("./models/comment.php");
include_once("./models/book.php");

session_start();
$user = Book::load_session();
//if ($user == null) { header("location:index.php"); }

$id = 0; if (isset($_GET["id"])){ $id = $_GET["id"]; }
$book = Book::get_instance($id);


if (isset($_POST['rat'])) { $user->set_note($book->book_id, $_POST['rat']); }

if (isset($_POST['com_user']))
{
    $comment = new Comment();
    $comment->com_user = $_POST['com_user'];
    $comment->com_book = $_POST['com_book'];
    $comment->com_text = $_POST['com_text'];
    $comment->create();
}

$gived_note = $user->get_note($book->book_id);
$book->load_rating();

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $user->book_un ?></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body style="background-color: #eee;">
    <div class="container-fluid bg-dark">
        <div class="container bg-dark">
            <?php require_once("./components/cus_navigator.php"); ?>
        </div>
    </div> 
    <div class="container pt-4">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-7 col-xl-8 mt-2">
                <!-- Main gard -->
                <div class="card w-100">
                    <img class="card-img-top" src="./imgs/<?= $book->book_id.".".$book->book_ext ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5><?= $book->book_name ?></h5>
                        <p class="card-text"><?= $book->book_description?></p>
                        <a href="cus_massanger.php?b=0&t=<?= $book->book_id ?>&n=<?= $book->book_name ?>"><button class="btn btn-danger">Envoyer un message</button></a>
                    </div>                    
                </div><!-- end Main gard -->

                <!-- Service gard -->
                <div class="card w-100 mt-2">
                    <div class="card-header">Services</div>
                    <ul class="list-group list-group-flush">
                    <?php 
                    $book->book_services = Service::load($book->book_id); 
                    foreach($book->book_services as $ser) { ?>
                        <li class="list-group-item">
                            <h5><?= $ser->ser_name ?></h5>
                            <p><?= $ser->ser_text ?></p>
                        </li>
                    <?php } ?>
                    </ul>                   
                </div><!-- end Service gard -->

                <!-- Rating -->
                <div class="card w-100 mt-2">
                    <div class="card-header">Evalution</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <form name="frat" method="post" action="?id=<?= $book->book_id ?>">
                                <div class="row">
                                    <div class="col-9" ><?= Book::select_rat($gived_note) ?></div>
                                    <div class="col-3" ><input type="submit" value="Donner la note" class="btn btn-primary w-100" ></div>
                                </div>
                            </form>
                        </li>
                    </ul>                   
                </div><!-- end Service gard -->

                <!-- Comments -->
                <div class="card w-100 mt-2">
                    <div class="card-header">Commentaires</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <form name="fcom" method="post" action="?id=<?= $book->book_id ?>">
                                <input type="hidden" name="com_book" value="<?= $book->book_id ?>">
                                <input type="hidden" name="com_user" value="<?= $user->book_id ?>">
                                <div class="row">
                                    <div class="col-9" ><input type="text" name="com_text" class="form-control w-100"></div>
                                    <div class="col-3" ><input type="submit" value="envoyer" class="btn btn-primary w-100" ></div>
                                </div>
                            </form>
                        </li>
                        <?php $book->load_comments(); foreach($book->book_comments as $comment) { ?>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-8" ><?= $comment->com_text ?></div>
                                <div class="col-2" ><?= $comment->com_name ?></div>
                                <div class="col-2" ><?= $comment->com_date." ".$comment->com_time ?></div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>                   
                </div><!-- end Comments -->
                
                

            </div><!-- en col 1 -->
            <div class="col-sm-12 col-md-6 col-lg-5 col-xl-4 mt-2">
                
                <div class="card w-100">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="text-primary pr-2 fa fa-map"       style="font-size:20px;"></i><?= $book->book_wilaya ?></li>
                        <li class="list-group-item"><i class="text-primary pr-2 fa fa-map"       style="font-size:20px;"></i><?= $book->book_adress ?></li>
                        <li class="list-group-item"><i class="text-primary pr-2 fa fa-phone"     style="font-size:20px;"></i><?= $book->book_phone  ?></li>
                        <li class="list-group-item"><i class="text-primary pr-2 fa fa-envelope"  style="font-size:20px;"></i><?= $book->book_email  ?></li>
                        <li class="list-group-item"><i class="text-primary pr-2 fa fa-instagram" style="font-size:20px;"></i><?= $book->book_insta  ?></li>
                        <li class="list-group-item"><i class="text-primary pr-2 fa fa-facebook"  style="font-size:20px;"></i><?= $book->book_face   ?></li>
                    </ul>
                </div>
            </div><!-- en col 2 -->
        </div>
    </div><br><br><br><br><br><br><br><br><br><br>
    </body>
    <script>
        (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})        
        ({key: "AIzaSyCq-9cG0HU6HM57Ho4Qjc_BNgyut3CFxGo", v: "weekly"});
    </script>
    <?php require_once("./components/js_footer.php"); ?>
</html>