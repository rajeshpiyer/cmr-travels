<?php
session_start();
include_once 'dbConnection.php';


if (isset($_POST['adminCreateBooking']) && $_POST['adminCreateBooking'] == true) {
    //define data
    $booking_passenger_nic = $_SESSION["user_nic"];
    $booking_seat_id = $_POST['bookingSeatId'];
    $booking_route_id = $_POST['bookingRouteId'];
    $booking_date = $_POST['bookingDate'];


    $sql = "INSERT INTO `booking`(`passengerNIC`, `seatId`, `routeId`, `date`) 
    VALUES ('" . $booking_passenger_nic . "','" . $booking_seat_id . "','" . $booking_route_id . "','" . $booking_date . "')";

    if ($con->query($sql) === TRUE) {
        echo json_encode(['status' => '1', 'msg' => 'Booking Created']);
    } else {
        echo json_encode(['status' => '0', 'msg' => $con->error]);
    }
    $con->close();
} else {
    echo json_encode(['status' => '0', 'msg' => 'executed outside']);
}
