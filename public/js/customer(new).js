$(function () {
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
     * Home Banner Slider
     */
    var homeBannerImagePath = '/img/home-banner/';
    var banner = '';
    for (var i = 1; i <= 19; i++) {
        var image = homeBannerImagePath + 'home-' + i + '.jpg';
        var thumb = homeBannerImagePath + 'thumb/home-' + i + '_tn.jpg';
        banner += `
            <li data-thumb="${thumb}">
                <img src="${image}"/>
            </li>
        `;
    }
    $('#home-slider').html(banner);

    /**
     * Condo Units Slider
     */
    var condoImagePath = '/img/units/condo/';
    var condoImages = `
            <a href="${condoImagePath}condo-1.jpg" class="big room-thumb"> <img src="${condoImagePath}condo-1.jpg" alt="" class="img-responsive img-room" title="Condo Unit"/></a>
    `;
    for (var i = 1; i <= 8; i++) {
        var image = condoImagePath + 'condo-' + i + '.jpg';
        condoImages += `
            <a href="${image}" class="hide"> <img src="${image}" alt="" class="img-responsive img-room" title="Condo Unit"/></a>
        `;
    }
    $('#condo-units .room-images').prepend(condoImages);

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
        let condo = $('#condo-units .room-gallery a').simpleLightbox();
        let hotel = $('#hotel-units .room-gallery a').simpleLightbox();
    }

    /**
     * Search Rooms Lightbox
     */
    if ($('#select-room-container .room-list').length) {
        let rooms = $('.room-images a').simpleLightbox();
    }

    /**
     * Homepage Banner
     */
    if ($('#home-slider').length) {
        $('#home-slider').lightSlider({
            gallery: true,
            item: 1,
            loop: true,
            slideMargin: 0,
            thumbItem: 4
        });
    }

});