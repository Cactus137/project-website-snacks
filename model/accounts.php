<?php
function getAllAccounts()
{
    try {
        $sql = "SELECT accounts.*, roles.name as role_name  FROM accounts 
        JOIN roles ON accounts.id_role = roles.id
        ORDER BY id DESC;";
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

function getAllRoles() {
    try {
        $sql = "SELECT * FROM roles;";
        return pdo_query($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function login($username, $password)
{
    try {
        $user = getAccountByUsername($username);
        if ($user) {
            if ($user['password'] == $password) {
                $_SESSION['user'] = $user;
                return true;
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