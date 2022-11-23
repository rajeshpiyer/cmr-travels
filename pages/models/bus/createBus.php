    <!-- Create model -->
    <div class="modal fade" id="createBus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="card stacked-form">
                <div class="card-header">
                    <h4 class="card-title" style="margin-left: 9rem; margin-top: 1rem">
                        Create New Bus
                    </h4>
                </div>
                <form id="modelCreateBusForm">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Bus Number</label>
                            <input type="text" placeholder="Enter Bus Number" class="form-control" id="input_bus_number" name="input_bus_number" required>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" placeholder="Enter Name" class="form-control" id="input_bus_name" name="input_bus_name" required>
                        </div>
                        <div class="form-group">
                            <label>Departure Time</label>

                            <input type="text" class="form-control timepicker" placeholder="Departure time" id="input_dep_time" name="input_dep_time" required>
                        </div>
                        <div class="form-group">
                            <label>Arrival Time</label>

                            <input type="text" class="form-control timepicker" placeholder="Arrival time" id="input_ari_time" name="input_ari_time" required>
                        </div>
                        <div class="form-group">
                            <label>Route Id</label>
                            <select class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="input_route_id" name="input_route_id">
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
                            <label>Type</label>
                            <select class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="input_bus_type" name="input_bus_type">
                                <option selected hidden>Select Bus Type</option>
                                <option value="Normal">Normal</option>
                                <option value="Semi Luxury">Semi Luxury</option>
                                <option value="Luxury">Luxury</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer mb-2">
                        <button type="submit" class="btn btn-fill btn-success float-right">
                            Create Now
                        </button>
                        <button class="btn btn-fill btn-danger float-right mr-2" data-dismiss="modal" aria-label="Close">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- model end -->
    <script>
        $("#modelCreateBusForm").submit(function(event) {
            modelCreateBusFun('createBus');
            event.preventDefault();
        });
    </script>