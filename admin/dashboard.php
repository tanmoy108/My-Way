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
                            onfocus="(this.type='time')" pattern="[0-9]{2}:[0-9]{2}" onchange="onTimeChange()" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="timeroute">Arrival Time</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="atimeroute" name="atimeroute" placeholder="Arrival Time"
                            onfocus="(this.type='time')" pattern="[0-9]{2}:[0-9]{2}" onchange="onTimeChange()" required>
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
<script src ="../js/date.js" ></script>
<script type="text/javascript" src="../adminjs/dashboard.js" ></script>