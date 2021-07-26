<?php 

    include_once '../lib/Database.php';
    include_once '../helpers/Format.php';

    class User{

        public function __construct()
        {
            $this->db = new Database();
            $this->fr = new Format();
        }

        public function allUser(){
            $user_query = "SELECT * FROM tbl_user";
            $result = $this->db->select($user_query);
            return $result;
        }

    }

?>