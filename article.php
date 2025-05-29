<?php
    class Article
    {
        public int    $art_id;
        public string $art_name;
        public string $art_text;
        public float  $art_price;
        public int    $art_book;
        public string $art_image;
        public string $art_category;


        public function __construct() 
        {
            $this->art_id       = 0;
            $this->art_name     = "";
            $this->art_text     = "";
            $this->art_price    = 0;
            $this->art_book     = 0;
            $this->art_image    = "";
            $this->art_category = "";
        }

        public function create() 
        {
            global $PDO; 
            $nid = 0;
            $sql = "INSERT INTO articles (art_name, art_text, art_price, art_book, art_image, art_category) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $PDO->prepare($sql);
            $stmt->bindParam(1, $this->art_name,     PDO::PARAM_STR, 250);
            $stmt->bindParam(2, $this->art_text,     PDO::PARAM_STR, 250);
            $stmt->bindParam(3, $this->art_price,    PDO::PARAM_STR,  11);
            $stmt->bindParam(4, $this->art_book,     PDO::PARAM_STR,  11);
            $stmt->bindParam(5, $this->art_image,    PDO::PARAM_STR, 250);
            $stmt->bindParam(6, $this->art_category, PDO::PARAM_STR, 250);
            if ($stmt->execute()) 
            {  
                $rec = $PDO->query("SELECT IFNULL(max(ser_id), 0) AS n FROM services");
                if ($art = $rec->fetch(PDO::FETCH_ASSOC)) { $nid = $art["n"]; }
                $rec->closeCursor();
            }
            $this->art_id = $nid;
            return "";
        }

        public function update() 
        {
            global $PDO; 
            $nid = 0;
            $sql = "UPDATE articles SET art_name=?, art_text=?, art_price=?, art_image=? WHERE art_id=?";
            $stmt = $PDO->prepare($sql);
            $stmt->bindParam(1, $this->art_name,     PDO::PARAM_STR, 250);
            $stmt->bindParam(2, $this->art_text,     PDO::PARAM_STR, 250);
            $stmt->bindParam(3, $this->art_price,    PDO::PARAM_STR,  11);
            $stmt->bindParam(4, $this->art_image,    PDO::PARAM_STR, 250);
            $stmt->bindParam(5, $this->art_id,       PDO::PARAM_INT,  11);
            $stmt->execute();
        }

        public function delete() 
        {
            global $PDO; 
            $stmt = $PDO->prepare("DELETE FROM articles WHERE art_id=".$this->art_id);
            if ($stmt->execute())
            {
                if (file_exists('./articles/'.$this->art_image)) { unlink('./articles/'.$this->art_image); }
            } 
            return "";
        }

        public static function getInstance($id = 0)
        {
            $art = new Article();
            if ($id > 0)
            {
                $pdo = $GLOBALS["PDO"];
                $cmd = $pdo->query("SELECT * FROM articles WHERE art_id=".$id); 
                $sr = $cmd->fetch(PDO::FETCH_ASSOC);
                $cmd->closeCursor();
                if ($sr)
                {
                    $art->art_id       = $sr['art_id'];
                    $art->art_name     = $sr['art_name'];
                    $art->art_text     = $sr['art_text'];
                    $art->art_price    = $sr['art_price'];
                    $art->art_book     = $sr['art_book'];
                    $art->art_image    = $sr['art_image'];
                    $art->art_category = $sr['art_category'];
                }
            }
            return $art;
        }
        
        public static function load($B)
        {
            $pdo = $GLOBALS["PDO"];
            $articles = [];
            $cmd = $pdo->query("SELECT * FROM articles WHERE art_book=".$B); 
            $lst = $cmd->fetchAll(PDO::FETCH_ASSOC);
            $cmd->closeCursor();
            foreach ($lst as $sr)
            {
                $art               = new Article(); 
                $art->art_id       = $sr['art_id'];
                $art->art_name     = $sr['art_name'];
                $art->art_text     = $sr['art_text'];
                $art->art_price    = $sr['art_price'];
                $art->art_book     = $sr['art_book'];
                $art->art_image    = $sr['art_image'];
                $art->art_category = $sr['art_category'];

                $articles[] = $art;
            }
            return $articles;
        }
    }