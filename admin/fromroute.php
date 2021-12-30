 <div class="row">
    <div class="col-25">
        <label for="formroute">From</label>
    </div>
    <div class="col-75 searchbox">
        <!-- <input type="text" id="formroute" name="form" placeholder="From"> -->
        <select class="fromroute" name="fromroute" id="fromroutes" class="selectpicker" required>
        <!-- <option value="" disabled selected hidden>From Route</option> -->
            <?php include_once("route.php") ?>
        </select>

    </div>
</div>