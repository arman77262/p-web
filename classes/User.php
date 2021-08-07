<?php 

    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');

    class User{

        public function __construct()
        {
            $this->db = new Database();
            $this->fr = new Format();
        }

        public function userInfo($id){
            $user_Query = "SELECT * FROM tbl_user WHERE userId = '$id'";
            $result = $this->db->select($user_Query);
            return $result;
        }

        //Show Forneted User Info
        public function userBio(){
            $user_Query = "SELECT * FROM tbl_user";
            $result = $this->db->select($user_Query);
            return $result;
        }

        public function userUpdate($data, $file, $id){
            $username = $this->fr->validation($data['username']);
            $user_bio = $this->fr->validation($data['user_bio']);
        
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $upload_image = "upload/".$unique_image;

            if (empty($username) || empty($user_bio)) {
                $msg = "User Name & User Bio Fild must not be empty";
                return $msg;
            }else {
                if (!empty($file_name)) {
                    if($file_size > 1048567){
                        $msg = "File Size Must Be less than 1 MB";
                        return $msg;
                    }elseif (in_array($file_ext, $permited) == false) {
                        $msg = "You Can Upload Only:-". implode(', ', $permited);
                        return $msg;
                    }else {
                        move_uploaded_file($file_temp, $upload_image);

                        $query = "UPDATE tbl_user SET username = '$username', image='$upload_image', user_bio = '$user_bio' WHERE userId = '$id'";

                        $result = $this->db->insert($query);
                        if ($result) {
                            $msg = "Profile Updated Successfully";
                            return $msg;
                        }else {
                            $msg = "Something Wrong Profile is not Updated";
                            return $msg;
                        }
                    }
                }else {
                    $query = "UPDATE tbl_user SET username = '$username', user_bio = '$user_bio' WHERE userId = '$id'";

                        $result = $this->db->insert($query);
                        if ($result) {
                            $msg = "Profile Updated Successfully";
                            return $msg;
                        }else {
                            $msg = "Something Wrong Profile is not Updated";
                            return $msg;
                        }
                }
            }
        }

        //dashboard total user
        public function totalUser(){
           $toal_q = "SELECT * FROM tbl_user";
           $total_r = $this->db->select($toal_q);
           return $total_r;
       }
    }

?>