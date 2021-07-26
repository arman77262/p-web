<?php 

    include_once '../lib/Database.php';
    include_once '../helpers/Format.php';

    class Category{

        public $db;
        public $fr;

        public function __construct()
        {
            $this->db = new Database();
            $this->fr = new Format();
        }

        public function AddCategory($catName){
            $catName = $this->fr->validation($catName);

            if (empty($catName)) {
                $msg = "Category Name Fild Must Not Be Empty";
                return $msg;
            }else{

                $select_que = "SELECT * FROM tbl_category WHERE catName='$catName'";
                $select_re = $this->db->select($select_que);

                if ($select_re > 0) {
                    $msg = "This Category already exsist";
                    return $msg;
                }else {
                    $insert_que = "INSERT INTO tbl_category(catName) VALUES('$catName')";
                    $insert_result = $this->db->insert($insert_que);

                    if ($insert_result) {
                        $msg = "Category Inserted Successfully";
                        return $msg;
                    }else {
                        $msg = "Something Wrong Category Is not added";
                        return $msg;
                    }
                }

            }
        }


        //Select All Category
        public function AllCategory(){
            $select_cat = "SELECT * FROM tbl_category ORDER BY catId DESC";
            $all_cat = $this->db->select($select_cat);
            if ($all_cat != false) {
                return $all_cat;
            }else {
                return false;
            }
        }

       //Edit Cat Data
       public function getEditCat($id){
           $edit_data = "SELECT * FROM tbl_category WHERE catId = '$id'";
           $eidt_result = $this->db->select($edit_data);
           return $eidt_result;
       }

       //Update Category
       public function UpdateCategory($catName, $id){

            $catName = $this->fr->validation($catName);

            if (empty($catName)) {
                $msg = "Category Name Fild Must Not Be Empty";
                return $msg;
            }else{

                $select_que = "SELECT * FROM tbl_category WHERE catName='$catName'";
                $select_re = $this->db->select($select_que);

                if ($select_re > 0) {
                    $msg = "This Category already exsist";
                    return $msg;
                }else {
                    $update_que = "UPDATE tbl_category SET catName = '$catName' WHERE catId = '$id'";
                    $update_result = $this->db->insert($update_que);

                    if ($update_result) {
                        header('location:categorylist.php');
                        $msg = "Category Updated Successfully";
                        return $msg;
                        
                    }else {
                        $msg = "Something Wrong Category Is not Updated";
                        return $msg;
                    }
                }

            }

       }

       //Delete Cat
       public function DeleteCategory($id){
           $delete_query = "DELETE FROM tbl_category WHERE catId = '$id'";
           $result = $this->db->delete($delete_query);
           if ($result) {
               $msg = "Category Delete Successfully";
               return $msg;
           }else {
               $msg = "Something Wrong Category Is not Delete";
                        return $msg;
           }
       }

       public function modelData(){
           $mq = "SELECT * FROM tbl_category";
           $mr = $this->db->select($mq);
           return $mr;
       }

       public function userInfo($id){
           $uq = "SELECT * FROM tbl_user WHERE userId = '$id'";
           $ur = $this->db->select($uq);
           return $ur;
       }

       public function updateUser($data, $file, $id){
           $username = $this->fr->validation($data['username']);

            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $upload_image = "upload/".$unique_image;

            if (empty($username)) {
                $msg = "Fild Must Not Be Empty";
                return $msg;
            }else {
                if (!empty($file_name) || !empty($file_name_two)) {
                    if($file_size > 1048567){
                        $msg = "File Size Must Be less than 1 MB";
                        return $msg;
                    }elseif (in_array($file_ext, $permited) == false) {
                        $msg = "You Can Upload Only:-". implode(', ', $permited);
                        return $msg;
                    }else {
                        move_uploaded_file($file_temp, $upload_image);

                        $query = "UPDATE tbl_user SET username='$username', image = '$upload_image' WHERE userId = '$id'";

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
                    $query = "UPDATE tbl_user SET username='$username' WHERE userId = '$id'";

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
    }

?>