<?php

session_start();
if (isset($_SESSION['id'])) { unset($_SESSION['id']); };
if (isset($_SESSION['un'])) { unset($_SESSION['un']); };
if (isset($_SESSION['fn'])) { unset($_SESSION['fn']); };
if (isset($_SESSION['ln'])) { unset($_SESSION['ln']); };
if (isset($_SESSION["em"])) { unset($_SESSION["em"]); };
if (isset($_SESSION['ph'])) { unset($_SESSION['ph']); };
if (isset($_SESSION['ad'])) { unset($_SESSION['ad']); };
if (isset($_SESSION["dt"])) { unset($_SESSION["dt"]); };
if (isset($_SESSION['sx'])) { unset($_SESSION['sx']); }; 
if (isset($_SESSION['book_id']))          { unset($_SESSION['book_id']); }
if (isset($_SESSION['book_name']))        { unset($_SESSION['book_name']); }
if (isset($_SESSION['book_kind']))        { unset($_SESSION['book_kind']); }
if (isset($_SESSION['book_activity']))    { unset($_SESSION['book_activity']); }
if (isset($_SESSION['book_phone']))       { unset($_SESSION['book_phone']); }
if (isset($_SESSION['book_adress']))      { unset($_SESSION['book_adress']); }
if (isset($_SESSION['book_gps']))         { unset($_SESSION['book_gps']); }
if (isset($_SESSION['book_email']))       { unset($_SESSION['book_email']); }
if (isset($_SESSION['book_insta']))       { unset($_SESSION['book_insta']); }
if (isset($_SESSION['book_face']))        { unset($_SESSION['book_face']); }
if (isset($_SESSION['book_description'])) { unset($_SESSION['book_description']); }
if (isset($_SESSION['book_un']))          { unset($_SESSION['book_un']); }
if (isset($_SESSION['book_tags']))        { unset($_SESSION['book_tags']); }
session_destroy();
header("location:index.php");
?>