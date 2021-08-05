<?php 

    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');

    class SiteOption{

        public $db;
        public $fr;

        public function __construct()
        {
            $this->db = new Database();
            $this->fr = new Format();
        }

        public function allSocial(){
            $select_que = "SELECT * FROM tbl_social WHERE sId = '1'";
            $select_res = $this->db->select($select_que);
            return $select_res;
        }

        public function updateLinks($data){
            $tw = $data['twtter'];
            $fb = $data['facebook'];
            $insta = $data['insta'];
            $you = $data['youtube'];

            $update_que = "UPDATE tbl_social SET twtter = '$tw', facebook='$fb', insta = '$insta', youtube = '$you'";
            $update_res = $this->db->update($update_que);
            if ($update_res) {
                $msg = "Link Update Successfully";
                return $msg;
            }else {
                $msg = "Link Not Update";
                return $msg;
            }
        }

        //Site Logo
        public function siteLogo(){
            $select_query = "SELECT * FROM tbl_logo WHERE logoId = '1'";
            $logo = $this->db->select($select_query);
            return $logo;
        }

        public function updateLogo($data){
            $logo = $this->fr->validation($data['logo']);

            $update_logo = "UPDATE tbl_logo SET logoName = '$logo' WHERE logoId = '1'";
            $logo_result = $this->db->update($update_logo);
            if ($logo_result) {
                $msg = "Logo Update Successfully";
                return $msg;
            }else {
                $msg = "Logo Not Update";
                return $msg;
            }
        }

        //About Us Option
        public function aboutInfo(){
            $about_que = "SELECT * FROM tbl_about WHERE aboutId = '1'";
            $about_result = $this->db->select($about_que);
            return $about_result;
        }

        public function aboutUpdate($data, $file){
            $username = $this->fr->validation($data['username']);
            $user_details = $this->fr->validation($data['user_details']);
        
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $upload_image = "upload/".$unique_image;

            if (empty($username) || empty($user_details)) {
                $msg = "User Name & User Details Fild must not be empty";
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

                        $query = "UPDATE tbl_about SET username='$username', image = '$upload_image', userDetails = '$user_details' WHERE aboutId = '1'";

                        $result = $this->db->insert($query);
                        if ($result) {
                            $msg = "About Updated Successfully";
                            return $msg;
                        }else {
                            $msg = "Something Wrong About is not Updated";
                            return $msg;
                        }
                    }
                }else {

                        $query = "UPDATE tbl_about SET username='$username', userDetails = '$user_details' WHERE aboutId = '1'";    
                        $result = $this->db->insert($query);
                        if ($result) {
                            $msg = "About Updated Successfully";
                            return $msg;
                        }else {
                            $msg = "Something Wrong About is not Updated";
                            return $msg;
                        }
                }
            }
        
        }

        //About Page Latest Post
         public function latestPost(){
            $post_query = "SELECT tbl_post.*, tbl_user.username, tbl_user.image FROM tbl_post INNER JOIN tbl_user ON tbl_post.userId = tbl_user.userId WHERE tbl_post.status = '1' ORDER BY tbl_post.postId DESC LIMIT 4";

            $post_result = $this->db->select($post_query);
            return $post_result;
        }
    }

?>