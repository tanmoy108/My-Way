<link rel="stylesheet" href="../adminstyle/dashboard.css">
<div id="dashboard">
    <div class="addbus">
        <h4 class="h4">ADD BUS</h4>

        <button type="button" name="add" class="btn btn-success" data-toggle="collapse"
            data-target="#user_collapse">Add</button>
        <br><br>
        <div id="user_collapse" class="collapse">
            <form action="" method="post" id="user_form" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-25">
                        <label for="busname">Bus Name</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="busname" name="busname" placeholder="Bus name.." required>
                    </div>
                </div>
                <?php include_once("fromroute.php"); ?>
                <?php include_once("toroute.php"); ?>
                <div class="row">
                    <div class="col-25">
                        <label for="dateroute">Travel Date</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="dateroute" name="dateroute" placeholder="Date"
                            onfocus="(this.type='date')" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="timeroute">Departure Time</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="dtimeroute" name="dtimeroute" placeholder="Depature Time"
                            onfocus="(this.type='time')" pattern="[0-9]{2}:[0-9]{2}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="timeroute">Arrival Time</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="atimeroute" name="atimeroute" placeholder="Arrival Time"
                            onfocus="(this.type='time')" pattern="[0-9]{2}:[0-9]{2}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="bustype">Bus Type</label>
                    </div>
                    <div class="col-75">
                        <select id="bustype" name="bustype" required>
                            <option value="AC">AC</option>
                            <option value="NonAc">Non-AC</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="picture">Picture</label>
                    </div>
                    <div class="col-75">
                        <input type="file" id="picture" name="picture" required>
                        <input type="hidden" name="hidden_user_image" id="hidden_user_image" />
                        <span id="uploaded_image"></span>
                    </div>
                </div>
                <div class="row submitbtn">
                    <!-- action এর নাম বসবে এখানে  ----------------------------------------------------------->
                    <input type="hidden" name="action" id="action" />
                    <!-- এখানে আইডি বসবে    ----------------------------------------------------->
                    <input type="hidden" name="user_id" id="user_id" />
                    <input type="submit" name="button_action" id="button_action" value="Insert">
                </div>
            </form>

        </div>
    </div>
    <div style="overflow-x: auto;" class="table-responsive" id="user_table">

    </div>

</div>

<?php
    include_once("../includes/script.php"); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  var date = new Date();
  var tdate = date.getDate(); 
  if(tdate < 10)
  {
    tdate = "0" + tdate;
  }
  var month =date.getMonth()+1;
  if(month < 10)
  {
    month = "0" + month;
  }
  var year = date.getUTCFullYear();
var minDate = year + "-" + month + "-" + tdate;
  document.getElementById("dateroute").setAttribute('min',minDate);
  console.log(minDate);
  </script>
<script type="text/javascript">
    $(document).ready(function () {
        load_data();
        $('#action').val("Insert");
        $('#add').click(function () {
            $('#user_form')[0].reset();
            $('#uploaded_image').html('');
            $('#button_action').val("Insert");

        });

        function load_data() {
            var action = "Load";
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {
                    action: action
                },
                success: function (data) {
                    $('#user_table').html(data);
                }
            });
        }
        $('#user_form').on('submit', function (event) {
            event.preventDefault();
            var busname = $('#busname').val();
            var fromroute = $('#fromroute').val();
            var toroute = $('#toroute').val();
            var dateroute = $('#dateroute').val();
            var dtimeroute = $('#dtimeroute').val();
            var atimeroute = $('#atimeroute').val();
            var bustype = $('#bustype').val();
            var picture = $('#picture').val().split('.').pop().toLowerCase();
            if (picture != '') {
                if (jQuery.inArray(picture, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                    alert("Invalid Image File");
                    $('#picture').val('');
                    return false;
                }
            }
            if (busname != '' && fromroute != '' && toroute != '' && dateroute != '' && dtimeroute !=
                '' && atimeroute != '' && bustype != '' && picture != '') {
                $.ajax({
                    url: "action.php",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        alert(data);
                        $('#user_form')[0].reset();
                        load_data();
                        $('#action').val("Insert");
                        $('#button_action').val("Insert");
                        $('#uploaded_image').html('');
                    }
                });
            } else {
                alert("Both Fields are Required");
            }
        });

        $(document).on('click', '.update', function () {
            var valueid = $(this).attr("id");
            //    $(".collapse").collapse('show');
            // alert(valueid);
            var action = "Fetch Single Data";
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {
                    valueid: valueid,
                    action: action
                },
                dataType: "json",
                success: function (data) {
                    // console.log("update");
                    // $('.collapse').collapse("show");
                    $('#busname').val(data.busname);
                    $('#fromroute').val(data.fromroute);
                    $('#toroute').val(data.toroute);
                    $('#dateroute').val(data.dateroute);
                    $('#dtimeroute').val(data.dtimeroute);
                    $('#atimeroute').val(data.atimeroute);
                    $('#bustype').val(data.bustype);
                    $('#uploaded_image').html(data.pictureimage)
                    $('#hidden_user_image').val(data.picture);
                    $('#button_action').val("Edit");
                    $('#action').val("Edit");
                    $('#user_id').val(valueid);
                }

            });
        });
        $(document).on('click', '.delete', function () {

            var valueid = $(this).attr("id");
            var action = "delete";
            jQuery.ajax({
                url: "action.php",
                method: "POST",
                data: {
                    valueid: valueid,
                    action: action
                },
                success: function (data) {
                    alert(data);
                    load_data();
                }
            });
        });
    });
</script>