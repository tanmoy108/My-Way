$(document).ready(function () {
    load_data();
    load_data2();
    load_data3();
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
    function load_data2() {
        var action = "Load2";
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {
                action: action
            },
            success: function (data) {
                $('#user_table2').html(data);
            }
        });
    }
    function load_data3() {
        var action = "Load3";
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {
                action: action
            },
            success: function (data) {
                $('#user_table3').html(data);
            }
        });
    }

    $('#user_form').on('submit', function (event) {
        event.preventDefault();
        var busname = $('#busname').val();
        var fromroute = $('#fromroutes').val();
        var toroute = $('#toroutes').val();
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
        if (fromroute != toroute ) {
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
        } else if (fromroute == toroute ) {
            alert("From route and to Route can't be same");
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
                $('#fromroutes').val(data.fromroute);
                $('#toroutes').val(data.toroute);
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