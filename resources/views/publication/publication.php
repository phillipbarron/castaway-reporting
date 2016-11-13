<html>
<!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css"/>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css"/>
<div class="container">
    <div class="row">
        <h2>Select a date for publication report</h2>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="row">
                    <label>Applcation</label>
                    <select class="form-control" id="application">
                        <option>castaway</option>
                    </select>
                </div>
                <div class="row">
                    <label>Action</label>
                    <select class="form-control" id="event">
                        <option>publish</option>
                        <option>update</option>
                        <option>revoke</option>
                    </select>
                </div>
                <div class="row">
                    <label>Date range</label>
                    <input type="text" name="datepicker" class="form-control"/>
                </div>

            </div>
        </div>
        <div class="col-md-4 form-group "">
            <div class="row">
                <label>Results</label>
                <div id="report"></div>
            </div>
        </div>
    </div>



    <script type="text/javascript">
        $(function() {
            $('input[name="datepicker"]').daterangepicker({
                "startDate": "11/06/2016",
                "endDate": "11/12/2016"
                }, function(start, end, label) {
                getReport(start, end);
            });

        });

        function getReport(startDate, endDate) {
        var app = $("#application").val();
        var event = $("#event").val();
        $.get("http://localhost:8090/report/" + app + "/" + event + "/" + startDate + "/" + endDate, function( data ) {
            $("#report").html("<strong>" + data + "</strong> " + event + " events found for range");
        });
        }
    </script>

</div>
</html>
