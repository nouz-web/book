<?php
    if (isset($_POST["un"]))
    {
        include_once("./models/mycfg.php");
        include_once("./models/book.php");
        
        session_start();
        $book = Book::login($_POST["un"], $_POST["pw"]);
        if ($book != null) 
        { 
            if ($book->book_kind == 0) 
            { header("location:cus_home.php"); } 
            else 
            { header("location:com_home.php"); }
        } 
        else
        {
            header("location:index.php?error=79");        
        }
    }
    else
    {
        header("location:index.php");
    }
    
?>