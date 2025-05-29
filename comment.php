<?php 
    class Comment
    {
        public $com_id;
        public $com_user;
        public $com_name;
        public $com_book;
        public $com_text;
        public $com_date;
        public $com_time;
        
        public function _construct()
        {
            $this->com_id   = 0;
            $this->com_user = 0;
            $this->com_name = "";
            $this->com_book = 0;
            $this->com_text = "";
            $this->com_date = null;
            $this->com_time = null;
        }

        public function create()
        {
            global $PDO; 
            $stmt = $PDO->prepare("INSERT INTO comments (com_date, com_time, com_text, com_user, com_book) VALUES (NOW(), NOW(), ?, ?, ?)");
            $stmt->bindParam(1, $this->com_text, PDO::PARAM_STR, 250);
            $stmt->bindParam(2, $this->com_user, PDO::PARAM_INT, 11);
            $stmt->bindParam(3, $this->com_book, PDO::PARAM_INT, 11);
            $stmt->execute(); 
        }
    }