<?php

function getAllAccounts()
{
    try {
        $sql = "SELECT * FROM accounts ORDER BY id DESC;";
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

function login($username, $password)
{
    try {
        $user = getAccountByUsername($username);
        if ($user) {
            if (verifyPassword($password, $user['password'])) {
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function signup($email, $username, $password)
{
    try {
        $sql = "INSERT INTO
            accounts (email, username, password)
            VALUES
            ('$email', '$username', '$hashedPassword');";
        pdo_execute($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
