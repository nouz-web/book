<?php
    class Service
    {
        public $ser_id;
        public $ser_name;
        public $ser_text;
        public $ser_ext;
        public $ser_book;

        public function __construct() 
        {
            $this->ser_id   = 0;
            $this->ser_name = "";
            $this->ser_text = "";
            $this->ser_ext  = "";
            $this->ser_book = "";
        }

        public function create() 
        {
            global $PDO; 
            $nid = 0;
            $sql = "INSERT INTO services (ser_name, ser_text, ser_ext, ser_book) VALUES (?, ?, ?, ?)";
            $stmt = $PDO->prepare($sql);
            $stmt->bindParam(1, $this->ser_name, PDO::PARAM_STR, 250);
            $stmt->bindParam(2, $this->ser_text, PDO::PARAM_STR, 250);
            $stmt->bindParam(3, $this->ser_ext,  PDO::PARAM_STR, 250);
            $stmt->bindParam(4, $this->ser_book, PDO::PARAM_STR,  11);
            if ($stmt->execute()) 
            {  
                $rec = $PDO->query("SELECT IFNULL(max(ser_id), 0) AS n FROM services");
                if ($ser = $rec->fetch(PDO::FETCH_ASSOC)) { $nid = $ser["n"]; }
                $rec->closeCursor();
            }
            $this->ser_id = $ser;
            return "";
        }

        public function update() 
        {
            global $PDO; 
            $nid = 0;
            $sql = "UPDATE services SET ser_name=?, ser_text=?, ser_ext=?, ser_book=? WHERE set_id=?";
            $stmt = $PDO->prepare($sql);
            $stmt->bindParam(1, $this->ser_name, PDO::PARAM_STR, 250);
            $stmt->bindParam(2, $this->ser_text, PDO::PARAM_STR, 250);
            $stmt->bindParam(3, $this->ser_ext,  PDO::PARAM_STR, 250);
            $stmt->bindParam(4, $this->ser_book, PDO::PARAM_INT,  11);
            $stmt->bindParam(5, $this->ser_id,   PDO::PARAM_INT,  11);
            $stmt->execute(); 
            return "";
        }

        public static function delete($id, $fl) 
        {
            global $PDO; 
            $stmt = $PDO->prepare("DELETE FROM services WHERE set_id=".$id);
            if ($stmt->execute())
            {
                if (file_exists($fl)) { unlink($fl); }
            } 
            return "";
        }

        public static function load($B)
        {
            $pdo = $GLOBALS["PDO"];
            $services = [];
            $cmd = $pdo->query("SELECT * FROM services WHERE ser_book=".$B); 
            $lst = $cmd->fetchAll(PDO::FETCH_ASSOC);
            $cmd->closeCursor();
            foreach ($lst as $sr)
            {
                $ser           = new Service(); 
                $ser->ser_id   = $sr['ser_id'];
                $ser->ser_name = $sr['ser_name'];
                $ser->ser_text = $sr['ser_text'];
                $ser->ser_ext  = $sr['ser_ext'];
                $ser->ser_book = $sr['ser_book'];
                $services[] = $ser;
            }
            return $services;
        }
    }