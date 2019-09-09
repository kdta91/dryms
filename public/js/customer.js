$(function () {
    /**
     * Book Now
     */
    $('#btn-booknow').on('click', function (e) {
        e.preventDefault();

        let booking_date = $('#booking_date').val();
        let adult = $('#adult').val();
        let children = $('#children').val();

        if (booking_date && adult && children) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/search',
                type: 'POST',
                data: {
                    booking_date: booking_date,
                    adult: adult,
                    children: children
                },
                dataType: 'json',
                success: function (res) {
                    console.log(res);
                    if (res.success === true) {
                        location.href = '/search/rooms';
                    }
                },
                error: function (res) {
                    console.log(res);
                    console.log(res.status);
                }
            });
        } else {
            $('.invalid-feedback').css('display', 'block');
            $('.booking-form-error').html('Please select your dates');
        }
    });

    $('.btn-book-room').on('click', function (e) {
        e.preventDefault();

        let room_type_id = $(this).data('room-type-id');
        let room_type = $(this).data('room-type');
        let room_price = $(this).data('room-price');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/search/rooms/book',
            type: 'POST',
            data: {
                room_type_id: room_type_id,
                room_type: room_type,
                room_price: room_price
            },
            success: function (res) {
                console.log(res);
                if (res.success === true) {
                    location.href = '/search/checkout';
                }
            },
            error: function (res) {
                console.log(res);
                console.log(res.status);
            }
        });
    });
});


$(window).on('load', function () {
    /**
     * Home Slider
     */
    var homeBannerImagePath = '/img/home-banner/';
    var banner = '';
    for (var i = 1; i <= 5; i++) {
        var image = homeBannerImagePath + 'home-' + i + '.jpg';
        banner += `
            <div style="background-image: url(${image})"></div>
        `;
    }
    $('#homeBanner').append(banner);

    /**
     * Condo Units Slider
     */
    var condoImagePath = '/img/units/condo/';
    var condoImages = `<a href="${condoImagePath}condo-1.JPG" class="big room-thumb"><img src="${condoImagePath}condo-1.JPG" alt="" class="img-responsive img-room" title="Condo" /></a>`;
    for (var i = 1; i <= 5; i++) {
        var image = condoImagePath + 'condo-' + i + '.JPG';
        // condoImages += `
        //     <div>
        //         <img src="${image}" alt="${image}">
        //     </div>
        // `;
        condoImages += `
            <a href="${image}" class="hide"><img src="${image}" alt="" class="img-responsive img-room" title="Condo" /></a>
        `;
    }
    $('#condo-units .room-images').prepend(condoImages);
    $('#select-room-container .room-images').prepend(condoImages);

    /**
     * Hotel Units Slider
     */
        // var hotelImagePath = '/img/units/hotel/';
        // var hotelImages = '';
        // for (var i = 1; i <= 1; i++) {
        //     var image = hotelImagePath + 'hotel-' + i + '.jpg';
        //     hotelImages += `
        //         <div>
        //             <img src="${image}" alt="${image}">
        //         </div>
        //     `;
        // }
        // $('#hotel-units .room-images').prepend(hotelImages);
        // $('#select-room-container .room-images').prepend(hotelImages);

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
     * Rooms Section Lightbox
     */
    if ($('#rooms').length) {
        $('#condo-units .room-gallery a').simpleLightbox({
            captions: false,
            close: false,
            showCounter: false
        });
        $('#hotel-units .room-gallery a').simpleLightbox({
            captions: false,
            close: false,
            showCounter: false
        });
    }

    /**
     * Search Rooms Lightbox
     */
    if ($('#select-room-container .room-list').length) {
        $('.room-images a').simpleLightbox({
            captions: false,
            close: false,
            showCounter: false
        });
    }

    /**
     * Homepage Banner
     */
    if ($('#home').length) {
        $("#homeBanner").skippr({
            transition: 'slide',
            speed: 1000,
            easing: 'easeOutQuart',
            navType: 'block',
            childrenElementType: 'div',
            arrows: true,
            autoPlay: true,
            autoPlayDuration: 3000,
            keyboardOnAlways: true,
            hidePrevious: false
        });
    }
});