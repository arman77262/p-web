<?php 

    include_once '../lib/Database.php';
    include_once '../helpers/Format.php';

    include_once '../PHPmailer/PHPMailer.php';
    include_once '../PHPmailer/SMTP.php';
    include_once '../PHPmailer/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    class PasswordReset{

        private $db;
        private $fr;

        public function __construct()
        {
            $this->db = new Database();
            $this->fr = new Format();
        }

        public function PasswordReset($email){

            function send_password_reset($name, $email, $v_token){
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->SMTPAuth = true;

                $mail->Host  = 'smtp.gmail.com';                                  
                $mail->Username = 'robartjack79@gmail.com';                     
                $mail->Password  = '77262646211';
                
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                
                $mail->setFrom('robartjack79@gmail.com', $name);
                $mail->addAddress($email);

                $mail->isHTML(true);                                
                $mail->Subject = 'Email Varification From Web Master';

                $email_template = "
                    <h2>You have register with web master</h2>
                    <h5>Verify your email address to login please click the link below</h5>
                    <a href='http://localhost/pweb/admin/password-change.php?token=$v_token&email=$email'>Click Here</a>
                ";

                $mail->Body = $email_template;
                $mail->send();
            }


            $email = $this->fr->validation($email);
            $v_token = md5(rand());

            if (empty($email)) {
               $error = "Email fild must not be empty !";
               return $error;
            }else {
                $check_email = "SELECT * FROM tbl_user WHERE email='$email'";
                $email_result = $this->db->select($check_email);

                if (mysqli_num_rows($email_result) > 0) {
                    
                    $row = mysqli_fetch_assoc($email_result);
                    $name = $row['username'];
                    $email = $row['email'];
                    $query = "UPDATE tbl_user SET v_token='$v_token' WHERE email='$email' LIMIT 1";

                    $update_token = $this->db->update($query);

                    if ($update_token) {
                        
                        send_password_reset($name, $email, $v_token);
                        $success = "Password reset email send in your email";
                        return $success;

                    }else {
                        $error = "Something Wrong Token Is not updated";
                        return $error;
                    }

                }else {
                    $error = "Email Not Found";
                    return $error;
                }
            }


        }
    }

?>