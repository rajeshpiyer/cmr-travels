    <!-- Edit model -->
    <div class="modal fade" id="editBooking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="card stacked-form">
                <div class="card-header">
                    <h4 class="card-title" style="margin-left: 9rem; margin-top: 1rem">
                        Edit Information
                    </h4>
                </div>
                <div class="card-body">
                    <form id="updateBookingForm">
                        <input type="text" class="cs-hide" id="up_booking_id" name="up_booking_id">
                        <div class="form-group">
                            <label>Passenger Id</label>
                            <select class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="up_booking_passenger_NIC" name="up_booking_passenger_NIC" required>
                                <option selected hidden>Select Passenger Id</option>
                                <?php
                                include_once '../../controllers/dbConnection.php';
                                $loadDataSql = "SELECT * FROM passenger";
                                $loadDataResult = $con->query($loadDataSql);
                                if ($loadDataResult->num_rows > 0) {
                                    // output data of each row
                                    while ($loadDataRow = $loadDataResult->fetch_assoc()) {
                                        echo '
                                                <option value="' . $loadDataRow["nic"] . '">' . $loadDataRow["fname"] . ' ' . $loadDataRow["lname"] . '</option>
                                            ';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Seat Id</label>
                            <select class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="up_booking_seat_id" name="up_booking_seat_id" required>
                                <option selected hidden>Select Seat Id</option>
                                <?php
                                include_once '../../controllers/dbConnection.php';
                                $loadDataSql = "SELECT * FROM seat";
                                $loadDataResult = $con->query($loadDataSql);
                                if ($loadDataResult->num_rows > 0) {
                                    // output data of each row
                                    while ($loadDataRow = $loadDataResult->fetch_assoc()) {
                                        echo '
                                                <option value="' . $loadDataRow["seatId"] . '">' . $loadDataRow["seatNumber"] . '</option>
                                            ';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Route Id</label>
                            <select class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="up_booking_route_id" name="up_booking_route_id" required>
                                <option selected hidden>Select Route Id</option>
                                <?php
                                include_once '../../controllers/dbConnection.php';
                                $loadDataSql = "SELECT * FROM route";
                                $loadDataResult = $con->query($loadDataSql);
                                if ($loadDataResult->num_rows > 0) {
                                    // output data of each row
                                    while ($loadDataRow = $loadDataResult->fetch_assoc()) {
                                        echo '
                                                <option value="' . $loadDataRow["routeId"] . '">' . $loadDataRow["routeFrom"] . ' - ' . $loadDataRow["routeTo"] . '</option>
                                            ';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Booking Date</label>
                            <input id="datepicker" type="text" class="form-control datepicker" placeholder="Select Date" id="up_booking_date" name="up_booking_date" value="<?= $bookingDate ?>" required>
                        </div>
                        <button type="submit" class="btn btn-fill btn-success float-right">
                            Update Now
                        </button>
                        <button class="btn btn-fill btn-danger float-right mr-2" data-dismiss="modal" aria-label="Close">
                            Close
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- model end -->
    <script>
        $("#updateBookingForm").submit(function(event) {
            updateBookingFun('editBooking');
            event.preventDefault();
        });

        function SetUpdateVal(id, date) {
            document.getElementById("up_booking_id").value = id;
            document.getElementById("up_booking_date").value = date;

        }
    </script>