<?php 
    class Message
    {
        public $msg_id;
        public $msg_from;
        public $msg_to;
        public $msg_subject;
        public $msg_text;
        public $msg_date;
        public $msg_time;
        public $msg_status;
        public $other_name;
        public $file_extension;
        
        public function _construct()
        {
            $this->msg_id         = 0;
            $this->msg_from       = 0;
            $this->msg_to         = 0;
            $this->msg_subject    = "";
            $this->msg_text       = "";
            $this->msg_date       = null;
            $this->msg_time       = null;
            $this->msg_status     = 0;   
            $this->other_name     = "";          
            $this->file_extension = "";
        }

        public function file_name()
        {
            return "./files/".$this->msg_id.".".$this->file_extension;
        }

        public function create()
        {
            global $PDO; 
            $nid = 0;
            $stmt = $PDO->prepare("INSERT INTO messages (msg_from, msg_to, msg_subject, msg_text, msg_date, msg_time, msg_ext) VALUES (?, ?, ?, ?, NOW(), NOW(), ?)");
            $stmt->bindParam(1, $this->msg_from,       PDO::PARAM_STR, 250);
            $stmt->bindParam(2, $this->msg_to,         PDO::PARAM_STR, 250);
            $stmt->bindParam(3, $this->msg_subject,    PDO::PARAM_STR, 250);
            $stmt->bindParam(4, $this->msg_text,       PDO::PARAM_STR, 250);
            $stmt->bindParam(5, $this->file_extension, PDO::PARAM_STR, 250);
            if ($stmt->execute()) 
            {
                $rec = $PDO->query("SELECT IFNULL(max(msg_id), 0) AS n FROM messages");
                if ($msg = $rec->fetch(PDO::FETCH_ASSOC)) { $nid = $msg["n"]; }
                $rec->closeCursor();
            }
            $this->msg_id = $nid;
        }

        public static function delete($id, $fn)
        {
            global $PDO;
            $stmt = $PDO->prepare("DELETE FROM messages WHERE msg_id=".$id);
            if ($stmt->execute()) { if (file_exists($fn)) { unlink($fn); }}
        }

        public static function get_inbox($id)
        {
            $msgs = [];
            $pdo = $GLOBALS["PDO"];
            $cmd = $pdo->query("SELECT * FROM messages, books WHERE (msg_to=".$id.") AND (book_id = msg_from)"); 
            $lst = $cmd->fetchAll(PDO::FETCH_ASSOC);
            $cmd->closeCursor();
            foreach ($lst as $msg)
            {
                $m = new Message(); 
                $m->msg_id        = $msg['msg_id'];
                $m->msg_from      = $msg['msg_from'];
                $m->msg_to        = $msg['msg_to'];
                $m->msg_subject   = $msg['msg_subject'];
                $m->msg_text      = $msg['msg_text'];
                $m->msg_date      = $msg['msg_date'];
                $m->msg_time      = $msg['msg_time'];
                $m->msg_status    = $msg['msg_status'];
                
                if ($msg['book_kind'] == 0)
                { 
                    $m->other_name = $msg['book_fname']." ".$msg['book_lname'];
                }
                else 
                { 
                    $m->other_name = $msg['book_name'];
                }

                $msgs[] = $m;
            }
            return $msgs;
        }

        public static function get_sentbox($sender)
        {
            $msgs = [];
            $pdo = $GLOBALS["PDO"];
            $cmd = $pdo->query("SELECT * FROM messages, books WHERE (msg_from=".$sender.") AND (book_id = msg_to)"); 
            $lst = $cmd->fetchAll(PDO::FETCH_ASSOC);
            $cmd->closeCursor();
            foreach ($lst as $msg)
            {
                $m = new Message(); 
                $m->msg_id         = $msg['msg_id'];
                $m->msg_from       = $msg['msg_from'];
                $m->msg_to         = $msg['msg_to'];
                $m->msg_subject    = $msg['msg_subject'];
                $m->msg_text       = $msg['msg_text'];
                $m->msg_date       = $msg['msg_date'];
                $m->msg_time       = $msg['msg_time'];
                $m->msg_status     = $msg['msg_status'];
                $m->file_extension = $msg['msg_ext'];
                
                if ($msg['book_kind'] == 0)
                { 
                    $m->other_name = $msg['book_fname']." ".$msg['book_lname'];
                }
                else 
                { 
                    $m->other_name = $msg['book_name'];
                }

                $msgs[] = $m;
            }
            return $msgs;
        }

        public static function send_message($mgs, $kd)
        {
            $id = 0;
            return $id;
        }

        public static function get_instance($id)
        {
            $pdo = $GLOBALS["PDO"];
            $cmd = $pdo->query("SELECT * FROM messages, books WHERE (msg_id=".$id.") AND (book_id = msg_to)"); 
            $lst = $cmd->fetchAll(PDO::FETCH_ASSOC);
            $cmd->closeCursor();
            $m = null;
            foreach ($lst as $msg)
            {
                $m = new Message(); 
                $m->msg_id         = $msg['msg_id'];
                $m->msg_from       = $msg['msg_from'];
                $m->msg_to         = $msg['msg_to'];
                $m->msg_subject    = $msg['msg_subject'];
                $m->msg_text       = $msg['msg_text'];
                $m->msg_date       = $msg['msg_date'];
                $m->msg_time       = $msg['msg_time'];
                $m->msg_status     = $msg['msg_status'];
                $m->file_extension = $msg['msg_ext'];

                if ($msg['book_kind'] == 0)
                { 
                    $m->other_name = $msg['book_fname']." ".$msg['book_lname'];
                }
                else 
                { 
                    $m->other_name = $msg['book_name'];
                }
                return $m;
            }
            return $m;
        }
    }