    <!-- Create model -->
    <div class="modal fade" id="createRoute" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="card stacked-form">
                <div class="card-header">
                    <h4 class="card-title" style="margin-left: 9rem; margin-top: 1rem">
                        Create New Route
                    </h4>
                </div>
                <div class="card-body">
                    <form id="createRouteForm">
                        <div class="form-group">
                            <label>To</label>
                            <input type="text" placeholder="Enter Trip ending location" class="form-control" id="route_to" name="route_to" required>
                        </div>
                        <div class="form-group">
                            <label>From</label>
                            <input type="text" placeholder="Enter Trip starting location" class="form-control" id="route_from" name="route_from" required>
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
        $("#createRouteForm").submit(function(event) {
            cerateRouteFun('createRoute');
            event.preventDefault();
        });
    </script>