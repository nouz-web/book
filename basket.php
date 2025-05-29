<?php
    class Basket
    {
        public $id;
        public $cus;
        public $art;
        public $qte;
        public $prx;
        public $ttc;
        public $date;
        public $stat;
        public $art_name;
        public $art_shop;
        public $shop_id;

        public function __construct()
        {
            $this->id   = 0;
            $this->cus  = 0;
            $this->art  = 0;
            $this->qte  = 0;
            $this->prx  = 0;
            $this->ttc  = 0;
            $this->date = date('Y-m-d H:i:s');
            $this->stat = 0;
            $this->art_name = "";
            $this->art_shop = "";
            $this->shop_id  = 0;

        }

        public function create()
        {
            global $PDO;
            $sql = "INSERT INTO basket (cus, art, qte, prx, ttc, date) VALUES (:cus, :art, :qte, :prx, :ttc, NOW())";
            $stmt = $PDO->prepare($sql);
            $stmt->bindParam(':cus', $this->cus);
            $stmt->bindParam(':art', $this->art);
            $stmt->bindParam(':qte', $this->qte);
            $stmt->bindParam(':prx', $this->prx);
            $stmt->bindParam(':ttc', $this->ttc);
            return $stmt->execute();
        }

        public function update()
        {
            global $PDO;
            $sql = "UPDATE basket SET qte = :qte, ttc = :ttc WHERE id = :id";
            $stmt = $PDO->prepare($sql);
            $stmt->bindParam(':qte', $this->qte);
            $stmt->bindParam(':ttc', $this->ttc);
            $stmt->bindParam(':id',  $this->id);
            return $stmt->execute();
        }

        public static function delete($id)
        {
            global $PDO;
            $sql = "DELETE FROM basket WHERE id = :id";
            $stmt = $PDO->prepare($sql);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }

        public static function com_getAll($com)
        {
            global $PDO;
            $temp = [];
            $sql  = "SELECT * FROM orders, books, articles WHERE art_id= art AND book_id = art_book AND book_id";
            $stmt = $PDO->query($sql);            
            $lst  =  $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($lst as $itm) 
            {
                $i           = new Basket();
                $i->id       = $itm['id'];
                $i->cus      = $itm['cus'];
                $i->art      = $itm['art'];
                $i->qte      = $itm['qte'];
                $i->prx      = $itm['prx'];
                $i->ttc      = $itm['ttc'];
                $i->date     = $itm['date'];
                $i->stat     = $itm['stat'];
                $i->art_name = $itm['art_name'];
                $i->art_shop = $itm['book_name'];
                $i->shop_id  = $itm['book_id'];
                $temp[] = $i;
            }
            return $temp;
        }

        public static function cus_getAll($cus)
        {
            global $PDO;
            $temp = [];
            $sql  = "SELECT * FROM basket, books, articles WHERE art_id= art AND book_id = art_book AND cus = ".$cus." AND stat = 0 ORDER BY date DESC";
            $stmt = $PDO->query($sql);            
            $lst  =  $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($lst as $itm) 
            {
                $i           = new Basket();
                $i->id       = $itm['id'];
                $i->cus      = $itm['cus'];
                $i->art      = $itm['art'];
                $i->qte      = $itm['qte'];
                $i->prx      = $itm['prx'];
                $i->ttc      = $itm['ttc'];
                $i->date     = $itm['date'];
                $i->stat     = $itm['stat'];
                $i->art_name = $itm['art_name'];
                $i->art_shop = $itm['book_name'];
                $i->shop_id  = $itm['book_id'];
                $temp[] = $i;
            }
            return $temp;
        }
    }