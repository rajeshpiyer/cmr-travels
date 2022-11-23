    <!-- Edit model -->
    <div class="modal fade" id="editRoute" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="card stacked-form">
                <div class="card-header">
                    <h4 class="card-title" style="margin-left: 9rem; margin-top: 1rem">
                        Edit Information
                    </h4>
                </div>
                <div class="card-body">
                    <form id="updateRouteForm">
                        <input type="text" class="cs-hide" id="up_route_id" name="up_route_id" />
                        <div class="form-group">
                            <label>To</label>
                            <input type="text" placeholder="Enter Departure Location" class="form-control" id="up_route_to" name="up_route_to" required>
                        </div>
                        <div class="form-group">
                            <label>From</label>
                            <input type="text" placeholder="Enter Arrival Location" class="form-control" id="up_route_from" name="up_route_from" required>
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
        $("#updateRouteForm").submit(function(event) {
            updateRouteFun('editRoute');
            event.preventDefault();
        });


        function SetRouterUpdateVal(id, to, from) {
            document.getElementById("up_route_id").value = id;
            document.getElementById("up_route_to").value = to;
            document.getElementById("up_route_from").value = from;
        }
    </script>