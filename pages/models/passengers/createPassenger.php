    <!-- Create model -->
    <div class="modal fade" id="createPassenger" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="card stacked-form">
                <div class="card-header">
                    <h4 class="card-title" style="margin-left: 9rem; margin-top: 1rem">
                        Create New Passenger
                    </h4>
                </div>
                <div class="card-body">
                    <form id="createPassengerForm">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" placeholder="Enter First Namer" class="form-control" id="passenger_fname" name="passenger_fname" required>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" placeholder="Enter Last Namer" class="form-control" id="passenger_lname" name="passenger_lname" required>
                        </div>
                        <div class="form-group">
                            <label>NIC</label>
                            <input type="text" placeholder="Enter NIC" class="form-control" id="passenger_nic" name="passenger_nic" required>
                        </div>
                        <div class="form-group">
                            <label>Phone number</label>
                            <input type="text" placeholder="Enter Phone number" class="form-control" id="passenger_phone" name="passenger_phone" required>
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <select class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="passenger_gender" name="passenger_gender">
                                <option selected hidden>Select Gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" placeholder="Enter Email" class="form-control" id="passenger_email" name="passenger_email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" placeholder="Enter Password" class="form-control" id="passenger_password" name="passenger_password" required>
                        </div>
                        <button type="submit" class="btn btn-fill btn-success float-right">
                            Create Now
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
        $("#createPassengerForm").submit(function(event) {
            ceratePassengerFun('createPassenger');
            event.preventDefault();
        });
    </script>