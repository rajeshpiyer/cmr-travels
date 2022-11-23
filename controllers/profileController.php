<?php
session_start();
include_once 'dbConnection.php';

if (isset($_POST['adminUpDetails']) && $_POST['adminUpDetails'] == true) {
    //define data
    $profileFName = $_POST['profileFName'];
    $profileLName = $_POST['profileLName'];
    $profileGender = $_POST['profileGender'];
    $profilePhone = $_POST['profilePhone'];
    $profileEmail = $_POST['profileEmail'];

    $sql = "UPDATE admin SET fname='" . $profileFName . "', lname='" . $profileLName . "',gender='" . $profileGender . "', phone='" . $profilePhone . "', email='" . $profileEmail . "' WHERE id='" . $_SESSION["admin_id"] . "'";

    if ($con->query($sql) === TRUE) {
        //update sessions
        $_SESSION["admin_fname"] = $profileFName;
        $_SESSION["admin_lname"] = $profileLName;
        $_SESSION["admin_name"] = $profileFName . " " . $profileLName;
        $_SESSION["admin_gender"] = $profileGender;
        $_SESSION["admin_phone"] = $profilePhone;
        $_SESSION["admin_email"] = $profileEmail;

        echo json_encode(['status' => '1', 'msg' => 'Profile Updated']);
    } else {
        echo json_encode(['status' => '0', 'msg' => $con->error]);
    }
    $con->close();
} else if (isset($_POST['adminUpPassword']) && $_POST['adminUpPassword'] == true) {
    //define data
    $profileNewPass = $_POST['profileNewPass'];
    $profileRePass = $_POST['profileRePass'];

    if ($profileNewPass == $profileRePass) {

        $md5_pass = md5($profileNewPass);
        $crypt_pass = crypt($md5_pass, "db");
        $shal_pass = Sha1($crypt_pass); //encrypting password

        $sql = "UPDATE admin SET password='" . $shal_pass . "' WHERE id='" . $_SESSION["admin_id"] . "'";

        if ($con->query($sql) === TRUE) {
            echo json_encode(['status' => '1', 'msg' => 'Password Updated']);
        } else {
            echo json_encode(['status' => '0', 'msg' => $con->error]);
        }
        $con->close();
    } else {
        echo json_encode(['status' => '0', 'msg' => 'Password Mismatch']);
    }
} else if (isset($_POST['userUpDetails']) && $_POST['userUpDetails'] == true) {
    //define data
    $profileNIC = $_POST['profileNIC'];
    $profileFName = $_POST['profileFName'];
    $profileLName = $_POST['profileLName'];
    $profileGender = $_POST['profileGender'];
    $profilePhone = $_POST['profilePhone'];
    $profileEmail = $_POST['profileEmail'];

    $sql = "UPDATE passenger SET nic='" . $profileNIC . "', fname='" . $profileFName . "', lname='" . $profileLName . "',gender='" . $profileGender . "', phone='" . $profilePhone . "', email='" . $profileEmail . "' WHERE nic='" . $_SESSION["user_nic"] . "'";

    if ($con->query($sql) === TRUE) {
        //update sessions
        $_SESSION["user_nic"] = $profileNIC;
        $_SESSION["user_fname"] = $profileFName;
        $_SESSION["user_lname"] = $profileLName;
        $_SESSION["user_gender"] = $profileGender;
        $_SESSION["user_phone"] = $profilePhone;
        $_SESSION["user_email"] = $profileEmail;

        echo json_encode(['status' => '1', 'msg' => 'Profile Updated']);
    } else {
        echo json_encode(['status' => '0', 'msg' => $con->error]);
    }
    $con->close();
} else if (isset($_POST['userUpPassword']) && $_POST['userUpPassword'] == true) {
    //define data
    $profileNewPass = $_POST['profileNewPass'];
    $profileRePass = $_POST['profileRePass'];

    if ($profileNewPass == $profileRePass) {

        $md5_pass = md5($profileNewPass);
        $crypt_pass = crypt($md5_pass, "db");
        $shal_pass = Sha1($crypt_pass); //encrypting password

        $sql = "UPDATE passenger SET password='" . $shal_pass . "' WHERE nic='" . $_SESSION["user_nic"] . "'";

        if ($con->query($sql) === TRUE) {
            echo json_encode(['status' => '1', 'msg' => 'Password Updated']);
        } else {
            echo json_encode(['status' => '0', 'msg' => $con->error]);
        }
        $con->close();
    } else {
        echo json_encode(['status' => '0', 'msg' => 'Password Mismatch']);
    }
} else if (isset($_POST['nicCheck']) && $_POST['nicCheck'] == true) {

    $nic = $_POST['nic'];
    $Query = "SELECT * FROM passenger WHERE nic = '" . $nic . "'";
    try {
        $Result = $con->query($Query);
        if ($Result->num_rows > 0) {
            echo json_encode(['status' => '0', 'msg' => 'NIC Already Registered']);
        } else {
            echo json_encode(['status' => '1', 'msg' => 'NIC Available']);
        }
    } catch (Exception $th) {
        echo json_encode(['status' => '0', 'msg' => $th]);
    }
} else {
    echo json_encode(['status' => '0', 'msg' => 'executed outside']);
}
