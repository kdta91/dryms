$(function () {
    /**
     * Sidebar
     */
    function openNav() {
        $('#sidebar').css('width', '250px');
        $('#app').css('marginLeft', '250px');
    }

    if (!$('#sidebar').length) {
        $('#app').css('marginLeft', '0');
    }

    function closeNav() {
        $('#sidebar').css('width', '0');
        $('#app').css('marginLeft', '0');
    }

    $('.sidebar-toggle-btn').on('click', function () {
        let sidebarStatus = $(this).data('sidebarstatus');

        if (sidebarStatus === 'open') {
            closeNav();
            $(this).data('sidebarstatus', 'close');
            $('.nav-toggle').removeClass('fa-chevron-left');
            $('.nav-toggle').addClass('fa-bars');
        } else {
            openNav();
            $(this).data('sidebarstatus', 'open');
            $('.nav-toggle').removeClass('fa-bars');
            $('.nav-toggle').addClass('fa-chevron-left');
        }
    });

    /**
     * Enable tooltips
     */
    $('[data-toggle="tooltip"]').tooltip();

    /**
     * Delete action modal
     */
    $(document).on('click', '.open-delete-modal', function () {
        $('.btn-delete').data('id', $(this).data('id'));
        $('.btn-delete').data('action', $(this).data('action'));
    });

    $('.btn-delete').on('click', function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/admin/' + $(this).data('action') + '/' + $(this).data('id'),
            type: 'DELETE',
            success: function (res) {
                console.log(res);
                if (res.status === 1) {
                    window.location.reload();
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    });

    /**
     * Booking Datepicker
     */
    if ($('#booking_date')[0]) {
        fecha = fecha.default;

        let hdpkr = new HotelDatepicker($('#booking_date')[0], {
            format: 'MMM DD, YYYY',
            showTopbar: false
        });
    }
});