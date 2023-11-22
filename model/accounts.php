<?php
function getAllAccounts()
{
    try {
        $sql = " SELECT * FROM accounts ORDER BY id DESC;";
        return pdo_query($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function getAccountById($id)
{
    try {
        $sql = "SELECT * FROM accounts WHERE id = $id;";
        return pdo_query_one($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function getAccountByUsername($username)
{
    try {
        $sql = "SELECT * FROM accounts WHERE username = '$username';";
        return pdo_query_one($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}


function addAccount($username, $password, $fullname, $avatar, $email, $address, $tel, $id_role)
{
    try {
        $sql = "INSERT INTO accounts (username, password, fullname, avatar, email, address, tel, id_role)
            VALUES ('$username', '$password', '$fullname', '$avatar', '$email', '$address', '$tel', $id_role);";
        pdo_execute($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function editAccount($id, $username, $password, $fullname, $avatar, $email, $address, $tel, $id_role)
{
    try {
        $sql = "UPDATE accounts SET username = '$username', password = '$password', fullname = '$fullname', avatar = '$avatar', email = '$email', address = '$address', tel = '$tel', id_role = $id_role WHERE id = $id";
        pdo_execute($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function deleteAccount($id)
{
    try {
        $sql = "DELETE FROM accounts WHERE id = $id";
        pdo_execute($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function getAllRoles()
{
    try {
        $sql = "SELECT * FROM roles;";
        return pdo_query($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} 

function signup($username, $email, $password)
{
    try {
        $sql = "INSERT INTO accounts (username, email, password) VALUES ('$username', '$email', '$password');"; 
        pdo_execute($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function getCountAccounts()
{
    try {
        $sql = "SELECT COUNT(*) as count FROM accounts;";
        return pdo_query_one($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function getLoyalCustomers()
{
    try {
        $sql = "SELECT
            a.id,
            a.username, 
            a.avatar, 
            SUM(od.total_amount) AS total_amount
        FROM
            accounts a
        JOIN
            orders o ON a.id = o.id_account
        JOIN
            order_details od ON o.id = od.id_order
        WHERE
            o.id_status = 4
        GROUP BY
            a.id
        ORDER BY 
            total_amount DESC
        LIMIT 10;";

        return pdo_query($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function forgotPassword($user, $email, $password)
{
    require './assets//PHPMailer/src/Exception.php';
    require './assets//PHPMailer/src/PHPMailer.php';
    require './assets//PHPMailer/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.google.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'thanhlvph39393@fpt.edu.vn';                     //SMTP username
        $mail->Password   = 'egjw ampt quer qtga';                               //SMTP password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('thanhlvph39393@fpt.edu.vn', 'Mailer');
        $mail->addAddress($email, $user);     //Add a recipient  

        //Attachments
        $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Test gui mat khau';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'Day la mat khau cua ban:' . $password ;

        $mail->send();
        echo 'Gui email thanh cong';
    } catch (Exception $e) {
        echo "Loi gui email. Mailer Error: {$mail->ErrorInfo}";
    }
}
