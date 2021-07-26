<?php 

    include_once '../lib/Database.php';
    include_once '../helpers/Format.php';

    class Post{

        public $db;
        public $fr;

        public function __construct()
        {
            $this->db = new Database();
            $this->fr = new Format();
        }


        public function AddPost($data, $file){
            $userId = $this->fr->validation($data['userId']);
            $title = $this->fr->validation($data['title']);
            $catId = $this->fr->validation($data['catId']);
            $disOne = $this->fr->validation($data['disOne']);
            $disTwo = $this->fr->validation($data['disTwo']);
            $postType = $this->fr->validation($data['postType']);
            $tags = $this->fr->validation($data['tags']);

            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['imageOne']['name'];
            $file_size = $file['imageOne']['size'];
            $file_temp = $file['imageOne']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $upload_image = "upload/".$unique_image;

            //For Image two
            $permited_two = array('jpg', 'jpeg', 'png', 'gif');
            $file_name_two = $file['imageTwo']['name'];
            $file_size_two = $file['imageTwo']['size'];
            $file_temp_two = $file['imageTwo']['tmp_name'];

            $div_two = explode('.', $file_name_two);
            $file_ext_two = strtolower(end($div_two));
            $unique_image_two = substr(md5(rand().time()), 0, 10).'.'. $file_ext_two;
            $upload_image_two = "upload/".$unique_image_two;

            if (empty($title) || empty($catId) || empty($disOne) || empty( $disTwo) || empty($postType) || empty($tags)) {
                $msg = "Filds Must Not Be Empty";
                return $msg;
            }elseif($file_size > 1048567){
                $msg = "File Size Must Be less than 1 MB";
                return $msg;
            }elseif($file_size_two > 1048567){
                $msg = "File Size Must Be less than 1 MB";
                return $msg;
            }elseif (in_array($file_ext, $permited) == false) {
                $msg = "You Can Upload Only:-". implode(', ', $permited);
                return $msg;
            }elseif (in_array($file_ext_two, $permited) == false) {
                $msg = "You Can Upload Only:-". implode(', ', $permited);
                return $msg;
            }else {
                move_uploaded_file($file_temp, $upload_image);
                move_uploaded_file($file_temp_two, $upload_image_two);

                $query = "INSERT INTO `tbl_post`(`userId`, `title`, `catId`, `imageOne`, `disOne`, `imageTwo`, `disTwo`, `postType`, `tags`) VALUES ('$userId', '$title', '$catId', '$upload_image', '$disOne', '$upload_image_two', '$disTwo', '$postType', '$tags')";

                $result = $this->db->insert($query);
                if ($result) {
                    $msg = "Post Inserted Successfully";
                    return $msg;
                }else {
                    $msg = "Something Wrong Post is not added";
                    return $msg;
                }
            }

        }


       public function GetAllPost($id){
           $gp = "SELECT tbl_post.*, tbl_category.catName, tbl_user.userId FROM tbl_post INNER JOIN tbl_category ON tbl_post.catId = tbl_category.catId INNER JOIN tbl_user ON tbl_post.userId = tbl_user.userId WHERE tbl_user.userId = '$id'";
           $gr = $this->db->select($gp);
           return $gr;
       }

       public function modelData(){
           $md = "SELECT tbl_post.*, tbl_category.catName FROM tbl_post INNER JOIN tbl_category ON tbl_post.catId = tbl_category.catId";
           $mr = $this->db->select($md);
           return $mr;
       }

       //Post For Edit start
       public function getPostForEdit($id){
           $get_query = "SELECT * FROM tbl_post WHERE postId = '$id'";

           $get_result = $this->db->select($get_query);

           return $get_result;
       }
       //Post For Edit end

       public function EditPost($data, $file, $id){
           $title = $this->fr->validation($data['title']);
            $catId = $this->fr->validation($data['catId']);
            $disOne = $this->fr->validation($data['disOne']);
            $disTwo = $this->fr->validation($data['disTwo']);
            $postType = $this->fr->validation($data['postType']);
            $tags = $this->fr->validation($data['tags']);

            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['imageOne']['name'];
            $file_size = $file['imageOne']['size'];
            $file_temp = $file['imageOne']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $upload_image = "upload/".$unique_image;

            //For Image two
            $permited_two = array('jpg', 'jpeg', 'png', 'gif');
            $file_name_two = $file['imageTwo']['name'];
            $file_size_two = $file['imageTwo']['size'];
            $file_temp_two = $file['imageTwo']['tmp_name'];

            $div_two = explode('.', $file_name_two);
            $file_ext_two = strtolower(end($div_two));
            $unique_image_two = substr(md5(rand().time()), 0, 10).'.'. $file_ext_two;
            $upload_image_two = "upload/".$unique_image_two;

            if (empty($title) || empty($catId) || empty($disOne) || empty( $disTwo) || empty($postType) || empty($tags)) {
                $msg = "Filds Must Not Be Empty";
                return $msg;
            }else {
                if (!empty($file_name) || !empty($file_name_two)) {
                    if($file_size > 1048567){
                        $msg = "File Size Must Be less than 1 MB";
                        return $msg;
                    }elseif($file_size_two > 1048567){
                        $msg = "File Size Must Be less than 1 MB";
                        return $msg;
                    }elseif (in_array($file_ext, $permited) == false) {
                        $msg = "You Can Upload Only:-". implode(', ', $permited);
                        return $msg;
                    }elseif (in_array($file_ext_two, $permited) == false) {
                        $msg = "You Can Upload Only:-". implode(', ', $permited);
                        return $msg;
                    }else {
                        move_uploaded_file($file_temp, $upload_image);
                        move_uploaded_file($file_temp_two, $upload_image_two);

                        $query = "UPDATE `tbl_post` SET `title`='$title',`catId`='$catId',`imageOne`='$upload_image',`disOne`='$disOne',`imageTwo`='$upload_image_two',`disTwo`='$disTwo',`postType`='$postType',`tags`='$tags' WHERE postId = '$id'";

                        $result = $this->db->insert($query);
                        if ($result) {
                            $msg = "Post Updated Successfully";
                            return $msg;
                        }else {
                            $msg = "Something Wrong Post is not Updated";
                            return $msg;
                        }
                    }
                }else {
                    $query = "UPDATE `tbl_post` SET `title`='$title',`catId`='$catId',`disOne`='$disOne',`disTwo`='$disTwo',`postType`='$postType',`tags`='$tags' WHERE postId = '$id'";

                        $result = $this->db->insert($query);
                        if ($result) {
                            $msg = "Post Updated Successfully";
                            return $msg;
                        }else {
                            $msg = "Something Wrong Post is not Updated";
                            return $msg;
                        }
                }
            }
            
       }

       //Delete Post Start
       public function deletePost($id){
           $img_query = "SELECT * FROM tbl_post WHERE postId = '$id'";
           $img_result = $this->db->select($img_query);
           if ($img_result) {
               while ($img = mysqli_fetch_assoc($img_result)) {
                   $imgOne = $img['imageOne'];
                   unlink($imgOne);
                   $imgTwo = $img['imageTwo'];
                   unlink($imgTwo);
               }
           }

           $del_query = "DELETE FROM tbl_post WHERE postId = '$id'";
           $del_result = $this->db->delete($del_query);
           if ($del_result) {
               $msg = "Post Delete Successfully";
               return $msg;
           }else {
                $msg = "Post Not Delete";
                return $msg;
           }

       }
       //Delete Post End

       public function activePost($aid){
           $aq = "UPDATE tbl_post SET status = '0' WHERE postId = '$aid'";
           $ar = $this->db->update($aq);
           if ($ar) {
               $msg = "Post Deactive";
                    return $msg;
           }
       }
        
      public function deactivePost($did){
          $dq = "UPDATE tbl_post SET status = '1' WHERE postId = '$did'";
          $d_result = $this->db->update($dq);
          if ($d_result) {
              $msg = "Post Active";
                    return $msg;
          }
      }

    }

?>