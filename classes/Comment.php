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
            $userId = $this->fr->validation($data['userId']);
            $postId = $this->fr->validation($data['postId']);
            $name = $this->fr->validation($data['name']);
            $email = $this->fr->validation($data['email']);
            $website = $this->fr->validation($data['website']);
            $message = $this->fr->validation($data['message']);

            if ($name == '' || $email == '' || $message == '') {
                $msg = "Filds Must Not be empty";
                return $msg;
            }else {
                $insert_cmt = "INSERT INTO `tbl_comment`(`userId`, `postId`, `name`, `email`, `website`, `message`) VALUES ('$userId', '$postId', '$name', '$email', '$website', '$message')";
                $result = $this->db->insert($insert_cmt);
                if ($result) {
                    $msg = "Comment success";
                    return $msg;
                }
            }
        }


        public function allComment($id){
            $select_cmt = "SELECT tbl_comment.*, tbl_post.postId, tbl_user.username, tbl_user.image FROM tbl_comment INNER JOIN tbl_post ON tbl_comment.postId = tbl_post.postId INNER JOIN tbl_user ON tbl_comment.userId = tbl_user.userId  WHERE tbl_comment.postId = '$id' AND tbl_comment.status = '1'";
            $select_result = $this->db->select($select_cmt);
            return $select_result;
        }

        public function adminComment($id){
            $admin_cmt = "SELECT tbl_comment.*, tbl_user.userId FROM tbl_comment INNER JOIN tbl_user ON tbl_comment.userId = tbl_user.userId WHERE tbl_comment.userId = '$id'";
            $result = $this->db->select($admin_cmt);
            return $result;
        }

        //Post Active & Deactive Start
            public function activePost($aid){
            $aq = "UPDATE tbl_comment SET status = '0' WHERE cmtId = '$aid'";
            $ar = $this->db->update($aq);
            if ($ar) {
                $msg = "Comment Deactive And not show";
                        return $msg;
            }
        }
            
        public function deactivePost($did){
            $dq = "UPDATE tbl_comment SET status = '1' WHERE cmtId = '$did'";
            $d_result = $this->db->update($dq);
            if ($d_result) {
                $msg = "Comment Active & Show";
                        return $msg;
            }
        }
        //Post Active & Deactive End


        //select comment for update and reply
        public function commentSelect($id){
            $select_cmt = "SELECT * FROM tbl_comment WHERE cmtId = '$id'";
            $select_res = $this->db->select($select_cmt);
            return $select_res;
        }

        //Admin SEnd reply
        public function Addreply($relpy, $id){
            $relpy = $this->fr->validation($relpy);
            $update_date = date("M d, Y");

            if (empty($relpy)) {
                $msg = "Reply Fild must be required";
                return $msg;
            }else {
                $update = "UPDATE tbl_comment SET admin_reply = '$relpy', update_date = '$update_date' WHERE cmtId = '$id'";
                $up_res = $this->db->update($update);
                if ($up_res) {
                    $msg = "Reply Success";
                    return $msg;
                }else {
                    $msg = "Reply Failed";
                    return $msg;
                }
            }
        }

        //For Delete Comment
        public function deleteCmt($id){
            $delete = "DELETE FROM tbl_comment WHERE cmtId = '$id'";
            $del = $this->db->delete($delete);
            if ($del) {
               $msg = "Comment Delete Success";
                return $msg;
            }else {
                $msg = "Comment is not delete";
                return $msg;
            }
        }

    }

?>