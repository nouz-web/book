<?php 
    class Book
    {
        public $book_id;
        public $book_name;
        public $book_kind;
        public $book_activity;
        public $book_phone;
        public $book_adress;
        public $book_wilaya;
        public $book_gps;
        public $book_email;
        public $book_insta;
        public $book_face;
        public $book_description;
        public $book_un;
        public $book_pw;
        public $book_tags;
        public $book_gallery;
        public $book_fname;
        public $book_lname;
        public $book_sex;
        public $book_ext;
        public $book_birth;
        public $book_inbox;
        public $book_sentbox;
        public $book_services;
        public $book_comments;
        public $book_rating;


        public function __construct() 
        {
            $this->book_id          = 0;
            $this->book_name        = "";
            $this->book_kind        = "";
            $this->book_activity    = "";
            $this->book_phone       = "";
            $this->book_adress      = "";
            $this->book_wilaya      = "";
            $this->book_gps         = "";
            $this->book_email       = "";
            $this->book_insta       = "";
            $this->book_face        = "";
            $this->book_description = "";
            $this->book_un          = "";
            $this->book_pw          = "";
            $this->book_tags        = "";
            $this->book_fname       = "";
            $this->book_lname       = "";
            $this->book_sex         = "";
            $this->book_ext         = "";
            $this->book_birth       = null;
            $this->book_inbox       = [];
            $this->book_sentbox     = [];
            $this->book_services    = [];
            $this->book_comments    = [];
            $this->book_rating      = 0;
        }

        public function load_rating()
        {
            $pdo = $GLOBALS["PDO"];
            $this->book_rating = 0;
            $rec = $pdo->query('SELECT IFNULL(AVG(rat_note), 0) as M FROM rating WHERE rat_book='.$this->book_id);
            if ($r = $rec->fetch(PDO::FETCH_ASSOC)) 
            {
                $this->book_rating = $r['M'];
            } 
            $rec->closeCursor();
        }

        public function get_note($bid)
        {
            $pdo = $GLOBALS["PDO"];
            $note = 999;
            $rec = $pdo->query('SELECT IFNULL((SELECT rat_note FROM rating WHERE rat_book='.$bid.' AND rat_user = '.$this->book_id.'), 0) AS N');
            if ($r = $rec->fetch(PDO::FETCH_ASSOC)) { $note = $r['N']; } $rec->closeCursor(); 
            return $note;
        }

        public function note_found($bid)
        {
            $pdo = $GLOBALS["PDO"];
            $found= 0;
            $rec = $pdo->query('SELECT count(*) AS C FROM rating WHERE (rat_book='.$bid.') AND (rat_user = '.$this->book_id.')');
            if ($r = $rec->fetch(PDO::FETCH_ASSOC)) { $found = $r['C']; } $rec->closeCursor();
            return $found;
        }

        public function set_note($bid, $note)
        {
            global $PDO;
            $sql = "INSERT INTO rating (`rat_note`, `rat_book`, `rat_user`) VALUES (?, ?, ?)";
            if ($this->note_found($bid) == 1) { $sql = "UPDATE rating SET rat_note=? WHERE (rat_book=?) AND (rat_user=?) "; }
            $stmt = $PDO->prepare($sql);
            $stmt->bindParam(1, $note,          PDO::PARAM_INT,  11);
            $stmt->bindParam(2, $bid,           PDO::PARAM_INT,  11);
            $stmt->bindParam(3, $this->book_id, PDO::PARAM_INT,  11);
            $stmt->execute();
            return "";            
        }

        public function update_password()
        {
            global $PDO;
            $stmt = $PDO->prepare("UPDATE books SET book_pw=? WHERE book_id=?");
            $stmt->bindParam(1, $this->book_pw, PDO::PARAM_STR, 250);
            $stmt->bindParam(2, $this->book_id, PDO::PARAM_INT,  11);
            $stmt->execute();
            return "";            
        }

        public function get_id()
        {
            global $PDO;
            $nid = 0;
            $rec = $PDO->query("SELECT IFNULL(max(book_id), 0) AS n FROM books");
            if ($usr = $rec->fetch(PDO::FETCH_ASSOC)) { $nid = $usr["n"]; }
            $rec->closeCursor();
            return $nid;
        }

        public function not_dispo($un)
        {
            global $PDO; $r = 0;
            $sql = "SELECT IFNULL(count(book_un), 0) as cnt from books WHERE book_un=\"".$un."\"";
            $rec = $PDO->query($sql);
            if ($usr = $rec->fetch(PDO::FETCH_ASSOC)) { $r = $usr["cnt"]; } $rec->closeCursor();
            return $r > 0; 
        }
        public function not_free($un)
        {
            global $PDO; $r = 0;
            $sql = "SELECT IFNULL(count(book_un), 0) as cnt from books WHERE book_un=\"".$this->$un."\"";
            $rec = $PDO->query($sql);
            if ($usr = $rec->fetch(PDO::FETCH_ASSOC)) { $r = $usr["cnt"]; } $rec->closeCursor();
            return $r > 0; 
        }

        public function create() 
        {
            if ($this->not_dispo($this->book_un)) { return "Le nom d'utilisateur existe déjà!"; }
            global $PDO; 
            $nid = 0;
            $PW = md5($this->book_pw);
            $sql = "INSERT INTO books (book_name, book_kind, book_activity, book_phone, book_adress, book_wilaya, book_gps, book_email, book_insta, book_face, book_description, book_un, book_pw, book_tags, book_fname, book_lname, book_sex, book_birth, book_ext) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $PDO->prepare($sql);
            $stmt->bindParam( 1, $this->book_name,        PDO::PARAM_STR, 250);
            $stmt->bindParam( 2, $this->book_kind,        PDO::PARAM_STR, 250);
            $stmt->bindParam( 3, $this->book_activity,    PDO::PARAM_STR, 250);
            $stmt->bindParam( 4, $this->book_phone,       PDO::PARAM_STR, 250);
            $stmt->bindParam( 5, $this->book_adress,      PDO::PARAM_STR, 250);
            $stmt->bindParam( 6, $this->book_wilaya,      PDO::PARAM_STR, 250);
            $stmt->bindParam( 7, $this->book_gps,         PDO::PARAM_STR, 250);
            $stmt->bindParam( 8, $this->book_email,       PDO::PARAM_STR, 250);
            $stmt->bindParam( 9, $this->book_insta,       PDO::PARAM_STR, 250);
            $stmt->bindParam(10, $this->book_face,        PDO::PARAM_STR, 250);
            $stmt->bindParam(11, $this->book_description, PDO::PARAM_STR, 250);
            $stmt->bindParam(12, $this->book_un,          PDO::PARAM_STR, 250);
            $stmt->bindParam(13, $PW,                     PDO::PARAM_STR, 250);
            $stmt->bindParam(14, $this->book_tags,        PDO::PARAM_STR, 250);
            $stmt->bindParam(15, $this->book_fname,       PDO::PARAM_STR, 250);
            $stmt->bindParam(16, $this->book_lname,       PDO::PARAM_STR, 250);
            $stmt->bindParam(17, $this->book_sex,         PDO::PARAM_STR, 250);
            $stmt->bindParam(18, $this->book_birth,       PDO::PARAM_STR, 250);
            $stmt->bindParam(19, $this->book_ext,         PDO::PARAM_STR, 250);
            
            if ($stmt->execute()) 
            {  
                $rec = $PDO->query("SELECT IFNULL(max(book_id), 0) AS n FROM books");
                if ($usr = $rec->fetch(PDO::FETCH_ASSOC)) { $nid = $usr["n"]; }
                $rec->closeCursor();
            }
            $this->book_id = $nid;
            return "";
        }

        public function update()
        {
            global $PDO; 
            $sql = "UPDATE books SET book_name=?, book_kind=?, book_activity=?, book_phone=?, book_adress=?, book_wilaya=?, book_gps=?, book_email=?, book_insta=?, book_face=?, book_description=?, book_tags=?, book_ext=? WHERE book_id=? ";
            $stmt = $PDO->prepare($sql);
            $stmt->bindParam( 1, $this->book_name,        PDO::PARAM_STR, 250);
            $stmt->bindParam( 2, $this->book_kind,        PDO::PARAM_STR, 250);
            $stmt->bindParam( 3, $this->book_activity,    PDO::PARAM_STR, 250);
            $stmt->bindParam( 4, $this->book_phone,       PDO::PARAM_STR, 250);
            $stmt->bindParam( 5, $this->book_adress,      PDO::PARAM_STR, 250);
            $stmt->bindParam( 6, $this->book_wilaya,      PDO::PARAM_STR, 250);
            $stmt->bindParam( 7, $this->book_gps,         PDO::PARAM_STR, 250);
            $stmt->bindParam( 8, $this->book_email,       PDO::PARAM_STR, 250);
            $stmt->bindParam( 9, $this->book_insta,       PDO::PARAM_STR, 250);
            $stmt->bindParam(10, $this->book_face,        PDO::PARAM_STR, 250);
            $stmt->bindParam(11, $this->book_description, PDO::PARAM_STR, 250);
            $stmt->bindParam(12, $this->book_tags,        PDO::PARAM_STR, 250);
            $stmt->bindParam(13, $this->book_ext,         PDO::PARAM_STR, 250);
            $stmt->bindParam(14, $this->book_id,          PDO::PARAM_INT,  11);
            $stmt->execute();
            return "";
        }

        public function update_user()
        {
            global $PDO; 
            $PW = md5($this->book_pw);
            $sql = "UPDATE books SET book_phone=?, book_adress=?, book_email=?, book_un=?, book_pw=?, book_fname=?, book_lname=?, book_sex=?, book_birth=? WHERE book_id=? ";
            $stmt = $PDO->prepare($sql);
            $stmt->bindParam( 1, $this->book_phone,       PDO::PARAM_STR, 250);
            $stmt->bindParam( 2, $this->book_adress,      PDO::PARAM_STR, 250);
            $stmt->bindParam( 3, $this->book_email,       PDO::PARAM_STR, 250);
            $stmt->bindParam( 4, $this->book_un,          PDO::PARAM_STR, 250);
            $stmt->bindParam( 5, $PW,                     PDO::PARAM_STR, 250);
            $stmt->bindParam( 6, $this->book_fname,       PDO::PARAM_STR, 250);
            $stmt->bindParam( 7, $this->book_lname,       PDO::PARAM_STR, 250);
            $stmt->bindParam( 8, $this->book_sex,         PDO::PARAM_STR, 250);
            $stmt->bindParam( 9, $this->book_birth,       PDO::PARAM_STR, 250);           
            $stmt->bindParam(10, $this->book_id,          PDO::PARAM_INT,  11);
            $stmt->execute();
            return "";
        }

        public function delete()
        {
            global $PDO; 
            $stmt = $PDO->prepare("DELETE FROM books WHERE book_id=".$this->book_id); $stmt->execute();
        }

        public function save_session() 
        {
            $_SESSION['book_id']          = $this->book_id;
            $_SESSION['book_name']        = $this->book_name;
            $_SESSION['book_kind']        = $this->book_kind;
            $_SESSION['book_activity']    = $this->book_activity;
            $_SESSION['book_phone']       = $this->book_phone;
            $_SESSION['book_adress']      = $this->book_adress;
            $_SESSION['book_wilaya']      = $this->book_wilaya;
            $_SESSION['book_gps']         = $this->book_gps;
            $_SESSION['book_email']       = $this->book_email;
            $_SESSION['book_insta']       = $this->book_insta;
            $_SESSION['book_face']        = $this->book_face;
            $_SESSION['book_description'] = $this->book_description;
            $_SESSION['book_un']          = $this->book_un;
            $_SESSION['book_pw']          = $this->book_pw;
            $_SESSION['book_tags']        = $this->book_tags;
            $_SESSION['book_fname']       = $this->book_fname;
            $_SESSION['book_lname']       = $this->book_lname;
            $_SESSION['book_sex']         =  $this->book_sex;
            $_SESSION['book_birth']       =  $this->book_birth;
            $_SESSION['book_ext']         =  $this->book_ext;
        }

        public function load_comments()
        {
            $pdo = $GLOBALS["PDO"];
            $this->book_comments = [];
            $cmd = $pdo->query("SELECT * FROM  comments , books WHERE (com_user = book_id) AND (com_book = ".$this->book_id.")"); 
            $lst = $cmd->fetchAll(PDO::FETCH_ASSOC);
            $cmd->closeCursor();

            foreach ($lst as $cm)
            {
                $comment = new Comment();
                $comment->com_id   = $cm['com_id'];
                $comment->com_user = $cm['com_user'];
                $comment->com_name = $cm['book_name'];
                $comment->com_book = $cm['com_book'];
                $comment->com_text = $cm['com_text'];
                $comment->com_date = $cm['com_date'];
                $comment->com_time = $cm['com_time'];
                $this->book_comments[] = $comment;
            }
        }

        public static function load_session()
        {
            if (isset($_SESSION["book_id"]))
            {
                $book = new Book();
                $book->book_id          = $_SESSION['book_id'];
                $book->book_name        = $_SESSION['book_name'];
                $book->book_kind        = $_SESSION['book_kind'];
                $book->book_activity    = $_SESSION['book_activity'];
                $book->book_phone       = $_SESSION['book_phone'];
                $book->book_adress      = $_SESSION['book_adress'];
                $book->book_wilaya      = $_SESSION['book_wilaya'];
                $book->book_gps         = $_SESSION['book_gps'];
                $book->book_email       = $_SESSION['book_email']; 
                $book->book_insta       = $_SESSION['book_insta'];
                $book->book_face        = $_SESSION['book_face'];
                $book->book_description = $_SESSION['book_description'];
                $book->book_un          = $_SESSION['book_un'];
                $book->book_pw          = $_SESSION['book_pw'];                
                $book->book_tags        = $_SESSION['book_tags'];
                $book->book_fname       = $_SESSION['book_fname'];
                $book->book_lname       = $_SESSION['book_lname'];
                $book->book_sex         = $_SESSION['book_sex'];
                $book->book_birth       = $_SESSION['book_birth'];
                $book->book_ext         = $_SESSION['book_ext'];
                return $book;
            }
            return null;
        }

        public static function login($UN, $PW) 
        { 
            $pdo = $GLOBALS["PDO"];
            $CPW = md5($PW);
            $rec = $pdo->query('SELECT * from books WHERE book_un="'.$UN.'" AND book_pw="'.$CPW.'"');
            if ($bk = $rec->fetch(PDO::FETCH_ASSOC)) 
            {
                $book                   = new Book(); 
                $book->book_id          = $bk['book_id'];
                $book->book_name        = $bk['book_name'];
                $book->book_kind        = $bk['book_kind'];
                $book->book_activity    = $bk['book_activity'];
                $book->book_phone       = $bk['book_phone'];
                $book->book_adress      = $bk['book_adress'];
                $book->book_wilaya      = $bk['book_wilaya'];
                $book->book_gps         = $bk['book_gps'];
                $book->book_email       = $bk['book_email'];
                $book->book_insta       = $bk['book_insta'];
                $book->book_face        = $bk['book_face'];
                $book->book_description = $bk['book_description'];
                $book->book_un          = $bk['book_un'];
                $book->book_pw          = $bk['book_pw'];                
                $book->book_tags        = $bk['book_tags'];
                $book->book_fname       = $bk['book_fname'];
                $book->book_lname       = $bk['book_lname'];
                $book->book_sex         = $bk['book_sex'];
                $book->book_ext         = $bk['book_ext'];

                $rec->closeCursor();
                $book->save_session();
                return $book;
            } else { $rec->closeCursor(); return NULL; }
        }

        public static function get_instance($id)
        {
            $pdo = $GLOBALS["PDO"];
            $book = null;
            $rec = $pdo->query("SELECT * from books WHERE book_id=".$id);
            if ($bk = $rec->fetch(PDO::FETCH_ASSOC)) 
            {
                $book                   = new Book(); 
                $book->book_id          = $bk['book_id'];
                $book->book_name        = $bk['book_name'];
                $book->book_kind        = $bk['book_kind'];
                $book->book_activity    = $bk['book_activity'];
                $book->book_phone       = $bk['book_phone'];
                $book->book_adress      = $bk['book_adress'];
                $book->book_wilaya      = $bk['book_wilaya'];
                $book->book_gps         = $bk['book_gps'];
                $book->book_email       = $bk['book_email'];
                $book->book_insta       = $bk['book_insta'];
                $book->book_face        = $bk['book_face'];
                $book->book_description = $bk['book_description'];
                $book->book_un          = $bk['book_un'];
                $book->book_pw          = $bk['book_pw'];      
                $book->book_tags        = $bk['book_tags'];
                $book->book_fname       = $bk['book_fname'];
                $book->book_lname       = $bk['book_lname'];
                $book->book_sex         = $bk['book_sex'];
                $book->book_ext         = $bk['book_ext'];
                $rec->closeCursor();
                return $book;
            } 
            else 
            { 
                $rec->closeCursor();
                return NULL;
            }            
        }

        public static function get_instance_by_un($un)
        {
            $pdo = $GLOBALS["PDO"];
            $book = null;
            $rec = $pdo->query('SELECT * from books WHERE book_un="'.$un.'"');
            if ($bk = $rec->fetch(PDO::FETCH_ASSOC)) 
            {
                $book                   = new Book(); 
                $book->book_id          = $bk['book_id'];
                $book->book_name        = $bk['book_name'];
                $book->book_kind        = $bk['book_kind'];
                $book->book_activity    = $bk['book_activity'];
                $book->book_phone       = $bk['book_phone'];
                $book->book_adress      = $bk['book_adress'];
                $book->book_wilaya      = $bk['book_wilaya'];
                $book->book_gps         = $bk['book_gps'];
                $book->book_email       = $bk['book_email'];
                $book->book_insta       = $bk['book_insta'];
                $book->book_face        = $bk['book_face'];
                $book->book_description = $bk['book_description'];
                $book->book_un          = $bk['book_un'];
                $book->book_pw          = $bk['book_pw'];      
                $book->book_tags        = $bk['book_tags'];
                $book->book_fname       = $bk['book_fname'];
                $book->book_lname       = $bk['book_lname'];
                $book->book_sex         = $bk['book_sex'];
                $book->book_ext         = $bk['book_ext'];
                $rec->closeCursor();
                return $book;
            } 
            else 
            { 
                $rec->closeCursor();
                return NULL;
            }            
        }

        public static function search($args)
        {
            $pdo = $GLOBALS["PDO"];
            $books = [];
            $cmd = $pdo->query($args); 
            $lst = $cmd->fetchAll(PDO::FETCH_ASSOC);
            $cmd->closeCursor();
            foreach ($lst as $bk)
            {
                $book                   = new Book(); 
                $book->book_id          = $bk['book_id'];
                $book->book_name        = $bk['book_name'];
                $book->book_kind        = $bk['book_kind'];
                $book->book_activity    = $bk['book_activity'];
                $book->book_phone       = $bk['book_phone'];
                $book->book_adress      = $bk['book_adress'];
                $book->book_wilaya      = $bk['book_wilaya'];
                $book->book_gps         = $bk['book_gps'];
                $book->book_email       = $bk['book_email'];
                $book->book_insta       = $bk['book_insta'];
                $book->book_face        = $bk['book_face'];
                $book->book_description = $bk['book_description'];
                $book->book_un          = $bk['book_un'];
                $book->book_pw          = $bk['book_pw'];      
                $book->book_tags        = $bk['book_tags'];
                $book->book_fname       = $bk['book_fname'];
                $book->book_lname       = $bk['book_lname'];
                $book->book_sex         = $bk['book_sex'];
                $book->book_wilaya      = $bk['book_wilaya'];
                $book->book_ext         = $bk['book_ext'];
                $books[] = $book;
            }
            return $books;
        }

        public static function select_rat($sl)
        {
            $code = '<select class="form-control" name="rat" id="rat">';
            $S = ""; if ($sl ==  0) { $S = "selected"; } $code .= "<option value= '0' ".$S." >00 / 10</option>";
            $S = ""; if ($sl ==  1) { $S = "selected"; } $code .= "<option value= '1' ".$S." >01 / 10</option>";
            $S = ""; if ($sl ==  2) { $S = "selected"; } $code .= "<option value= '2' ".$S." >02 / 10</option>";
            $S = ""; if ($sl ==  3) { $S = "selected"; } $code .= "<option value= '3' ".$S." >03 / 10</option>";
            $S = ""; if ($sl ==  4) { $S = "selected"; } $code .= "<option value= '4' ".$S." >04 / 10</option>";
            $S = ""; if ($sl ==  5) { $S = "selected"; } $code .= "<option value= '5' ".$S." >05 / 10</option>";
            $S = ""; if ($sl ==  6) { $S = "selected"; } $code .= "<option value= '6' ".$S." >06 / 10</option>";
            $S = ""; if ($sl ==  7) { $S = "selected"; } $code .= "<option value= '7' ".$S." >07 / 10</option>";
            $S = ""; if ($sl ==  8) { $S = "selected"; } $code .= "<option value= '8' ".$S." >08 / 10</option>";
            $S = ""; if ($sl ==  9) { $S = "selected"; } $code .= "<option value= '9' ".$S." >09 / 10</option>";
            $S = ""; if ($sl == 10) { $S = "selected"; } $code .= "<option value='10' ".$S." >10 / 10</option>";
            $code .= '</select>';
            return $code;
        }

        public static function select_kind($sl)
        {
            $code = '<select class="form-control" name="knd" id="knd">';
            $code .= "<option value='0'>Tous</option>";
            $S = ""; if ($sl == 1) { $S = "selected"; } $code .= "<option value='1' ".$S." >CLinique</option>";
            $S = ""; if ($sl == 2) { $S = "selected"; } $code .= "<option value='2' ".$S." >Pharmacie</option>";
            $S = ""; if ($sl == 3) { $S = "selected"; } $code .= "<option value='3' ".$S." >Labo d'analyses</option>";
            $code .= '</select>';
            return $code;
        }

        public static function select_wilaya($sl)
        {
            $wils = array("Adrar",
            "Chlef",
            "Laghouat",
            "Oum El Bouaghi",
            "Batna",
            "Béjaïa",
            "Biskra",
            "Béchar",
            "Blida",
            "Bouira",
            "Tamanrasset",
            "Tébessa",
            "Tlemcen",
            "Tiaret",
            "Tizi Ouzou",
            "Alger",
            "Djelfa",
            "Jijel",
            "Sétif",
            "Saïda",
            "Skikda",
            "Sidi Bel Abbès",
            "Annaba",
            "Guelma",
            "Constantine",
            "Médéa",
            "Mostaganem",
            "M'Sila",
            "Mascara",
            "Ouargla",
            "Oran",
            "El Bayadh",
            "Illizi",
            "Bordj Bou Arreridj",
            "Boumerdès",
            "El Tarf",
            "Tindouf",
            "Tissemsilt",
            "El Oued",
            "Khenchela",
            "Souk Ahras",
            "Tipaza",
            "Mila",
            "Aïn Defla",
            "Naâma",
            "Aïn Témouchent",
            "Ghardaïa",
            "Relizane",
            "Timimoun",
            "Bordj Badji Mokhtar",
            "Ouled Djellal",
            "Béni Abbès",
            "In Salah",
            "In Guezzam",
            "Touggourt",
            "Djanet",
            "El M'Ghair",
            "El Meniaa");

            $code = '<select class="form-control" name="wil" id="wil">';
            $code .= "<option value=''>Toutes les wilayas</option>";
            foreach($wils as $wil)
            {
                $S = ""; if ($sl == $wil) { $S = "selected"; } $code .= "<option value=\"".$wil."\" ".$S." >".$wil."</option>";
            }
            $code .= '</select>';
            return $code;
        }

        public static function select_wilaya_form($sl)
        {
            $wils = array("Adrar",
            "Chlef",
            "Laghouat",
            "Oum El Bouaghi",
            "Batna",
            "Béjaïa",
            "Biskra",
            "Béchar",
            "Blida",
            "Bouira",
            "Tamanrasset",
            "Tébessa",
            "Tlemcen",
            "Tiaret",
            "Tizi Ouzou",
            "Alger",
            "Djelfa",
            "Jijel",
            "Sétif",
            "Saïda",
            "Skikda",
            "Sidi Bel Abbès",
            "Annaba",
            "Guelma",
            "Constantine",
            "Médéa",
            "Mostaganem",
            "M'Sila",
            "Mascara",
            "Ouargla",
            "Oran",
            "El Bayadh",
            "Illizi",
            "Bordj Bou Arreridj",
            "Boumerdès",
            "El Tarf",
            "Tindouf",
            "Tissemsilt",
            "El Oued",
            "Khenchela",
            "Souk Ahras",
            "Tipaza",
            "Mila",
            "Aïn Defla",
            "Naâma",
            "Aïn Témouchent",
            "Ghardaïa",
            "Relizane",
            "Timimoun",
            "Bordj Badji Mokhtar",
            "Ouled Djellal",
            "Béni Abbès",
            "In Salah",
            "In Guezzam",
            "Touggourt",
            "Djanet",
            "El M'Ghair",
            "El Meniaa");

            $code = '<select class="form-control" name="wil" id="wil">';
            foreach($wils as $wil)
            {
                $S = ""; if ($sl == $wil) { $S = "selected"; } $code .= "<option value=\"".$wil."\" ".$S." >".$wil."</option>";
            }
            $code .= '</select>';
            return $code;
        }
    }