<?php
session_start();
include_once 'dbConnection.php';

if (isset($_POST['adminLogPassword'])) {
    if (isset($_POST['adminLog']) && $_POST['adminLog'] == true) {

        $adminEmail = $_POST['adminLogEmail'];
        $adminPassword = $_POST['adminLogPassword'];

        $md5_pass = md5($adminPassword);
        $crypt_pass = crypt($md5_pass, "db");
        $shal_pass = Sha1($crypt_pass); //encrypting password

        $Query = "SELECT * FROM admin WHERE email = '" . $adminEmail . "'";
        try {
            $Result = $con->query($Query);
            if ($Result->num_rows > 0) {
                while ($r = $Result->fetch_assoc()) {
                    if ($r["password"] == $shal_pass) {

                        $_SESSION["admin_id"] = $r["id"];
                        $_SESSION["admin_fname"] = $r["fname"];
                        $_SESSION["admin_lname"] = $r["lname"];
                        $_SESSION["admin_name"] = $r["fname"] . " " . $r["lname"];
                        $_SESSION["admin_gender"] = $r["gender"];
                        $_SESSION["admin_phone"] = $r["phone"];
                        $_SESSION["admin_email"] = $r["email"];
                        $_SESSION["admin_status"] = "logged";

                        echo json_encode(['status' => '1', 'msg' => 'Logged in']);
                    } else {
                        echo json_encode(['status' => '0', 'msg' => 'Incorrect password']);
                    }
                }
            } else {
                echo json_encode(['status' => '0', 'msg' => 'Email Address not found !']);
            }
        } catch (Exception $th) {
            echo json_encode(['status' => '0', 'msg' => $th]);
        }
    }
} else if (isset($_POST['adminReg']) && $_POST['adminReg'] == true) {
    //define data
    $userFname = $_POST['userFname'];
    $userLname = $_POST['userLname'];
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];
    $userRePassword = $_POST['userRePassword'];


    if ($userPassword == $userRePassword) {

        $md5_pass = md5($userPassword);
        $crypt_pass = crypt($md5_pass, "db");
        $shal_pass = Sha1($crypt_pass); //encrypting password

        $sql = "INSERT INTO passenger(fname, lname, email, password) VALUES ('" . $userFname . "','" . $userLname . "','" . $userEmail . "','" . $shal_pass . "')";

        if ($con->query($sql) === TRUE) {
            echo json_encode(['status' => '1', 'msg' => 'Account Created']);
        } else {
            echo json_encode(['status' => '0', 'msg' => $con->error]);
        }
        $con->close();
    } else {
        echo json_encode(['status' => '0', 'msg' => 'Password Mismatch']);
    }
} else {
    echo json_encode(['status' => '0', 'msg' => 'Outside error']);
}
