<div style="width:500px; border:1px solid #00000045; border-top: 0;">

     <div style="text-align:center;">
        <div style="background-color:#222222;">
            <h1 style="padding: 12px; margin: 0;"><span style="color:#ffff00;">DRYMS</span><span style="color:#249fe8;">LISTINGS</span></h1>
        </div>

        <div style="background-color:#F64C56; color: #ffffff;">
            <h2 style="padding: 25px; margin: 0;">Thank you for booking with us!</h2>
        </div>
    </div>

    <div style="padding: 18px 18px 0 18px;">
        Hi {{ $name }},

        <p>
            We have received your booking request with the following information.
        </p>

        <p>
            <span>Check In: </span> {{ $details['date_in']->toFormattedDateString() }} <br>
            <span>Check Out: </span> {{ $details['date_out']->toFormattedDateString() }} <br>
            <span>No. of Nights: </span> {{ $details['nights'] }} <br>
            <span>Guests: </span> {{ $details['guests'] }} <br>
            <span>Special Request: </span> {{ $details['special_request'] }} <br>
            <span>Total Price: </span> &#x20B1;{{ $details['total_payment'] }}
        </p>

        <p>
            Please pay the amount of &#x20B1;{{ $details['total_payment'] }} at WHERE TO PAY and send an image of the receipt at <a href="mailto:info@drymslistings.com">info@drymslistings.com</a>.
        </p>

        <p>
            Thank you for booking with us. We look forward to hosting you.
        </p>
    </div>

    <div style="padding: 18px; text-align: center;">
        <div style="border-top: 1px solid #00000045; padding-top: 18px;">info@drymslistings.com | (+63) 9178402565</div>
    </div>

</div>