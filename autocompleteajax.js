var preloader = document.getElementById("loading");

    function myfunction() {
      preloader.style.display = 'none';
    };

    $(window).scroll(
      function () {
        $('nav').toggleClass('scrolled', $(this).scrollTop() > 50);
      }
    );

    $(document).ready(function () {
      $('#fromroute').keyup(function () {
        var fromText = $(this).val();
        if (fromText != '') {
          var action ="autofrom";
          $.ajax({
            url: 'admin/action.php',
            method: 'POST',
            data: {
              query: fromText,
              action:action
            },
            success: function (response) {
              $("#show-list-from").html(response);
            }
          });
        } else
          $('#show-list-from').html('');
      });
      $(document).on('click', '.from-item', function () {
        $('#fromroute').val($(this).text());
        $("#show-list-from").html('');
      });

      $('#toroute').keyup(function () {
        var toText = $(this).val();
        if (toText != '') {
          var action ="autoto";
          $.ajax({
            url: 'admin/action.php',
            method: 'POST',
            data: {
              query: toText,
              action:action
            },
            success: function (response) {
              $("#show-list-to").html(response);
            }
          });
        } else
          $('#show-list-to').html('');
      });
      $(document).on('click', '.to-item', function () {
        $('#toroute').val($(this).text());
        $("#show-list-to").html('');
      });
    });