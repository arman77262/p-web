<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath . '/../lib/Database.php');
    include_once($filepath . '/../helpers/Format.php');

    class Comment
    {

        public $db;
        public $fr;

        public function __construct()
        {
            $this->db = new Database();
            $this->fr = new Format();
        }

        public function addComment($data){
            $postId = $this->fr->validation($data['postId']);
            $name = $this->fr->validation($data['name']);
            $email = $this->fr->validation($data['email']);
            $website = $this->fr->validation($data['website']);
            $message = $this->fr->validation($data['message']);

            if ($name == '' || $email == '' || $message == '') {
                $msg = "Filds Must Not be empty";
                return $msg;
            }else {
                $insert_cmt = "INSERT INTO `tbl_comment`(`postId`, `name`, `email`, `website`, `message`) VALUES ('$postId', '$name', '$email', '$website', '$message')";
                $result = $this->db->insert($insert_cmt);
                if ($result) {
                    $msg = "Comment success";
                    return $msg;
                }
            }
        }


        public function allComment($id){
            $select_cmt = "SELECT tbl_comment.*, tbl_post.postId FROM tbl_comment INNER JOIN tbl_post ON tbl_comment.postId = tbl_post.postId WHERE tbl_comment.postId = '$id'";
            $select_result = $this->db->select($select_cmt);
            return $select_result;
        }
    }

?>