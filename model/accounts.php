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
        LIMIT 5;";

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
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'anhdo13072004@gmail.com';
        $mail->Password   = 'jfoh cejs vmjp hdop';
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;
        //Recipients
        $mail->setFrom('anhdo13072004@gmail.com', 'Mailer');
        $mail->addAddress($email, $user);
        //Content
        $mail->isHTML(true);
        $mail->Subject = '=?UTF-8?B?' . base64_encode('[FastFood] Khôi phục mật khẩu') . '?=';
        $mail->Body = '   
      <h1>Fass Food</h1>
      <h2>Khôi phục mật khẩu</h2>
      <hr>
      <p>Xin chào ' . $user . '</p>
      <p>Mật khẩu khôi phục của bạn là: <strong>' . $password . '</strong></p>
      <p>
        Vui lòng <a href="#">bấm vào đây</a> để đăng nhập vào tài khoản
        FastFood của bạn bằng mật khẩu này
      </p>
      <p>Trân trọng</p>  
        ';
        $mail->send();
    } catch (Exception $e) {
        echo "Loi gui email. Mailer Error: {$mail->ErrorInfo}";
    }
}

function updateProfile($id, $username, $email, $fullname, $avatar, $address, $tel)
{
    try {
        $sql = "UPDATE accounts SET username = '$username', email = '$email', fullname = '$fullname', avatar = '$avatar', address = '$address', tel = '$tel' WHERE id = $id";
        pdo_execute($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function contact($name, $email, $message)
{
    require './assets//PHPMailer/src/Exception.php';
    require './assets//PHPMailer/src/PHPMailer.php';
    require './assets//PHPMailer/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'anhdo13072004@gmail.com';
        $mail->Password   = 'jfoh cejs vmjp hdop';
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;
        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('anhdo13072004@gmail.com');
        //Content 
        $mail->Subject = '=?UTF-8?B?' . base64_encode('Liên hệ từ khách hàng') . '?=';
        $mail->Body    = "Tên khách hàng: $name\nEmail: $email\n\nNội dung:\n$message";
        $mail->send();
    } catch (Exception $e) {
        echo "Loi gui email. Mailer Error: {$mail->ErrorInfo}";
    }
}
