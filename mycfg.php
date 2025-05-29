<?php
    $options = [ PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ];
    $PDO = new PDO('mysql:host=localhost;dbname=book_db', "root", "", $options);
    $user = null;

    function existe($t, $f, $v)
    {
        global $PDO;
        $cmd =  $PDO->query("SELECT COUNT(*) AS cnt FROM $t WHERE $f=\"$v\"");
        $lst = $cmd->fetchAll(PDO::FETCH_ASSOC);
        $cmd->closeCursor();         
        return $lst[0]["cnt"] == 0;
    }

    function isdispo($t, $f, $v, $if, $iv)
    {
        global $PDO;
        $cmd =  $PDO->query("SELECT COUNT(*) AS cnt FROM $t WHERE $f=\"$v\" AND $if <> \"$iv\"");
        $lst = $cmd->fetchAll(PDO::FETCH_ASSOC);
        $cmd->closeCursor();
        return $lst[0]["cnt"] == 0;
    }