<?php

include_once 'dbConnection.php';


if (isset($_POST['adminCreateSeat']) && $_POST['adminCreateSeat'] == true) {
    //define data
    $seat_number = $_POST['seat_number'];
    $seat_type = $_POST['seat_type'];
    $seat_bus_number = $_POST['seat_bus_number'];


    $sql = "INSERT INTO `seat`(`seatNumber`, `seatType`, `busNumber`) 
    VALUES ('" . $seat_number . "','" . $seat_type . "','" . $seat_bus_number . "')";

    if ($con->query($sql) === TRUE) {
        echo json_encode(['status' => '1', 'msg' => 'Seat Created']);
    } else {
        echo json_encode(['status' => '0', 'msg' => $con->error]);
    }
    $con->close();
} else if (isset($_POST['adminDeleteSeat']) && $_POST['adminDeleteSeat'] == true) {
    //define data
    $id = $_POST['del_seat_id'];

    $sql = "DELETE FROM seat WHERE seatId='" . $id . "'";

    if ($con->query($sql) === TRUE) {
        echo json_encode(['status' => '1', 'msg' => 'Seat Deleted']);
    } else {
        echo json_encode(['status' => '0', 'msg' => $con->error]);
    }
    $con->close();
} else if (isset($_POST['adminUpdateSeat']) && $_POST['adminUpdateSeat'] == true) {
    //define data
    $seat_id = $_POST['up_seat_id'];
    $seat_number = $_POST['up_seat_number'];
    $seat_type = $_POST['up_seat_type'];
    $seat_bus_number = $_POST['up_seat_bus_number'];



    $sql = "UPDATE seat SET seatNumber='" . $seat_number . "', seatType='" . $seat_type . "',busNumber='" . $seat_bus_number . "' WHERE seatId='" . $seat_id . "'";

    if ($con->query($sql) === TRUE) {
        echo json_encode(['status' => '1', 'msg' => 'Seat Updated']);
    } else {
        echo json_encode(['status' => '0', 'msg' => $con->error]);
    }
    $con->close();
} else {
    echo json_encode(['status' => '0', 'msg' => 'executed outside']);
}
