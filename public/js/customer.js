$(function() {
    var nav = $('nav.fixed-top');

    function scrollNavbar() {
        nav.toggleClass('scroll-nav', $(this).scrollTop() > nav.height());
        // $('.navbar-brand>div').toggleClass('navbar-brand-scroll', $(this).scrollTop() > nav.height());
    }

    if (window.scrollY > nav.height()) {
        scrollNavbar();
    }

    $(document).scroll(function () {
        scrollNavbar();
    });

    /**
     * Rooms Section Lightbox
     */
    if ($('#rooms').length) {
        var single_room = $('#single-room .room-gallery a').simpleLightbox();
        var double_room = $('#double-room .room-gallery a').simpleLightbox();
        var double_deluxe_room = $('#double-deluxe-room .room-gallery a').simpleLightbox();
    }

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

    /**
     * Book Now
     */
    $('#btn-booknow').on('click', function(e) {
        e.preventDefault();

        let booking_date = $('#booking_date').val();
        let adult = $('#adult').val();
        let children = $('#children').val();

        if (booking_date && adult && children) {
            // location.href = `/book/${booking_date}/${adult}/${children}`;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/book',
                type: 'POST',
                data: {
                    booking_date: booking_date,
                    adult: adult,
                    children: children
                },
                success: function (data) {
                    console.log(data);

                },
                error: function (data) {
                    console.log(data);
                    console.log(data.status);
                    if (data.status === 200) {
                        location.href = '/book/rooms';
                    }
                }
            });
        } else {
            $('.invalid-feedback').css('display', 'block');
            $('.booking-form-error').html('Please select your dates');
        }

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        // // var first_name = $('#first_name').val();
        // // var last_name = $('#last_name').val();
        // // var contact_number = $('#contact_number').val();
        // // var address = $('#address').val();
        // var booking_date = $('#booking_date').val();
        // var adult = $('#adult').val();
        // var children = $('#children').val();
        // // var remarks = $('#remarks').val();

        // console.log(booking_date);
        // console.log(adult);
        // console.log(children);

        // $.ajax({
        //     url: `/book/${booking_date}/${adult}/${children}`,
        //     type: 'GET',
        //     data: {
        //         // first_name: first_name,
        //         // last_name: last_name,
        //         // contact_number: contact_number,
        //         // address: address,
        //         booking_date: booking_date,
        //         adult: adult,
        //         children: children,
        //         // remarks: remarks
        //     },
        //     success: function (data) {
        //         console.log(data);
        //         $("#book-now-modal form")[0].reset();
        //         $('#book-now-modal .alert').show().html(data.success);
        //     },
        //     error: function (data) {
        //         console.log(data);
        //         console.log(data.status);
        //         if (data.status === 422) {
        //             var errors = $.parseJSON(data.responseText);
        //             $.each(errors, function (key, value) {
        //                 // console.log(key+ " " +value);
        //                 // $('#response').addClass("alert alert-danger");

        //                 if ($.isPlainObject(value)) {
        //                     $.each(value, function (key, value) {
        //                         console.log(key + " " + value);
        //                         $('.invalid-' + key).show().html('<strong>' + value + '</strong>');
        //                     });
        //                 } else {
        //                     console.log(value);
        //                 }
        //             });
        //         }
        //     }
        // });
    });
});