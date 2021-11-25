<div class="row">
    <div class="col-25">
        <label for="toroute">To</label>
    </div>
    <div class="col-75">
        <!-- <input type="text" id="toroute" name="to" placeholder="To"> -->
        <select class="districts" name="toroute" id="toroutes" required>
            <option value="" disabled selected hidden>To Route</option>
        </select>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<script src="../adminjs/api.js"></script>