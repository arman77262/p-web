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
    }

?>