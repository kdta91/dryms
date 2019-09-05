<?php

namespace App\Http\Controllers\Customer;

use Carbon\Carbon;
use App\Booking;
use App\BookingSchedule;
use App\Room;
use App\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\PayPalClient;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;

class BookingController extends Controller
{
    // Booking
    public function index()
    {

    }

    public function create(Booking $Booking)
    {
        $minDate = Carbon::today()->toDateString();

        return view('customer.booking.create', compact('minDate'));
        // return view('partials.customer.book');
    }

    public function store()
    {
        $data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'contact_number' => 'required',
            'address' => 'required',
            // 'booking_date' => 'required',
            // 'date_in' => 'required|date',
            // 'date_out' => 'required|date',
            'special_request' => 'nullable'
        ]);

        $room_type = request()->session()->get('room_type');
        $date_in = request()->session()->get('date_in');
        $date_out = request()->session()->get('date_out');
        $nights = request()->session()->get('nights');
        $adults = request()->session()->get('adults');
        $children = request()->session()->get('children');
        $total_payment = request()->session()->get('total_payment');

        // $booking_date = explode(' - ', $data['booking_date']);

        Booking::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'contact_number' => $data['contact_number'],
            'email' => $data['email'],
            'address' => $data['address'],
            'adult' => $adults,
            'children' => $children,
            'date_in' => Carbon::parse($date_in),
            'date_out' => Carbon::parse($date_out),
            'special_request' => $data['special_request']
        ]);

        $to_name = $data['first_name'] . ' ' . $data['last_name'];
        $to_email = $data['email'];
        $from_email = env('SITE_EMAIL');
        $details = [
            'date_in' => $date_in,
            'date_out' => $date_out,
            'room_type' => $room_type,
            'nights' => $nights,
            'guests' => $adults + $children,
            'total_payment' => $total_payment,
            'special_request' => $data['special_request'],
        ];
        $this->sendToCustomer($to_name, $to_email, $from_email, $details);

        return response()->json(['success' => 'Thank you for booking with us']);
    }

    private function sendToCustomer($to_name, $to_email, $from_email, $details)
    {
        $data = [
            'name' => $to_name,
            'details' => $details
        ];
        Mail::send('emails.confirmation', $data, function($message) use ($to_name, $to_email, $from_email) {
            $message->to($to_email, $to_name)->subject('Laravel Test Mail');
            $message->from($from_email,'Test Mail');
        });
    }

    public function show()
    {

    }
    // End Booking

    // Search Room, Book and Checkout
    public function search()
    {
        $booking_date = explode(' - ', request()->post('booking_date'));
        $date_in = Carbon::parse($booking_date[0]);
        $date_out = Carbon::parse($booking_date[1]);
        $nights = date_diff($date_in, $date_out)->format('%a');
        $adults = request()->post('adult');
        $children = request()->post('children');

        // var_dump($date_in);
        // var_dump($date_out);
        // var_dump($adults);
        // var_dump($children);

        request()->session()->put('date_in', $date_in);
        request()->session()->put('date_out', $date_out);
        request()->session()->put('nights', $nights);
        request()->session()->put('adults', $adults);
        request()->session()->put('children', $children);

        return response()->json(['success' => true]);
    }

    public function rooms()
    {
        $date_in = request()->session()->get('date_in');
        $date_out = request()->session()->get('date_out');
        $nights = request()->session()->get('nights');
        $adults = request()->session()->get('adults');
        $children = request()->session()->get('children');
        $guests = $adults + $children;

        // var_dump($date_in);
        // var_dump($date_out);
        // var_dump($adults);
        // var_dump($children);
        // var_dump(request()->session()->get('nights'));
        // var_dump('Guests: ' . $guests);

        // $schedules = BookingSchedule::whereNotBetween('date_in', [$date_in, $date_out])->whereNotBetween('date_out', [$date_in, $date_out])->get();
        // $room_ids = array();
        // $room_types = RoomType::where('capacity', '>=', $guests)->get();
        $room_types = RoomType::where('capacity', '>=', $guests)->where('id', 4)->orWhere('id', 5)->get()->map(function ($room_type) use ($nights) {
            if ($nights >= 8 && $nights <=21) {
                $room_type->price -= ($room_type->id === 4) ? 200 : 500;
            } else if ($nights >= 22) {
                $room_type->price -= ($room_type->id === 4) ? 500 : 650;
            }

            return $room_type;
        });
        // $room_type_ids = array();

        // print("<pre>".print_r($room_types,true)."</pre>");

        // foreach ($schedules as $schedule) {
        //     array_push($room_ids, $schedule->room_id);
        // }

        // foreach ($room_types as $room_type) {
        //     array_push($room_type_ids, $room_type->id);
        // }

        // $rooms = Room::with('roomtype')->whereNotIn('id', $room_ids)->whereIn('roomtype_id', $room_type_ids)->get();

        // var_dump($rooms);

        // return view('partials.customer.book', compact('rooms'));
        return view('partials.customer.book', compact('room_types'));
    }

    public function book()
    {
        $room_type_id = request()->post('room_type_id');
        $room_type = request()->post('room_type');
        $room_price = request()->post('room_price');

        request()->session()->put('room_type_id', $room_type_id);
        request()->session()->put('room_type', $room_type);
        request()->session()->put('room_price', $room_price);

        return response()->json(['success' => true]);
    }

    public function checkout()
    {
        $room_type_id = request()->session()->get('room_type_id');
        $room_type = request()->session()->get('room_type');
        $date_in = request()->session()->get('date_in');
        $date_out = request()->session()->get('date_out');
        $nights = request()->session()->get('nights');
        $adults = request()->session()->get('adults');
        $children = request()->session()->get('children');
        $guests = $adults + $children;

        $schedules = BookingSchedule::whereNotBetween('date_in', [$date_in, $date_out])->whereNotBetween('date_out', [$date_in, $date_out])->get();
        $room_ids = [];

        foreach ($schedules as $schedule) {
            array_push($room_ids, $schedule->room_id);
        }

        $room = Room::with('roomtype')->whereNotIn('id', $room_ids)->where('roomtype_id', $room_type_id)->first();

        $discount = 0;

        if ($nights >= 8 && $nights <=21) {
            $discount = ($room->roomtype->id === 4) ? 200 : 500;
        } else if ($nights >= 22) {
            $discount = ($room->roomtype->id === 4) ? 500 : 650;
        }

        $total = ($room->roomtype->price - $discount) * $nights;

        request()->session()->put('room', $room);
        request()->session()->put('total_payment', $total);

        $data = [
            'date_in' => $date_in,
            'date_out' => $date_out,
            'nights' => $nights,
            'adults' => $adults,
            'children' => $children,
            'guests' => $guests,
            'room' => $room,
            'total' => $total
        ];

        // print("<pre>".print_r($data,true)."</pre>");

        return view('customer.checkout.index', compact('data'));
    }

    // public function proceedToPayment()
    // {
    //     $data = request()->validate([
    //         'first_name' => 'required',
    //         'last_name' => 'required',
    //         'email' => 'required',
    //         'contact_number' => 'required',
    //         'address' => 'required',
    //         'special_request' => 'nullable'
    //     ]);
    //     $data['room_type'] = request()->session()->get('room_type');
    //     $data['date_in'] = request()->session()->get('date_in');
    //     $data['date_out'] = request()->session()->get('date_out');
    //     $data['nights'] = request()->session()->get('nights');
    //     $data['adults'] = request()->session()->get('adults');
    //     $data['children'] = request()->session()->get('children');
    //     $data['guests'] = $data['adults'] + $data['children'];

    //     // var_dump($data);

    //     return view('customer.checkout.pay', compact('data'));
    // }
    // End Search Room

    // PayPal Payment
    public function createPayment($debug=true)
    {
        $request = new OrdersCreateRequest();
        $request->headers["prefer"] = "return=representation";
        // $request->prefer('return=representation');
        $request->body = self::buildRequestBody();
        // 3. Call PayPal to set up a transaction
        $client = PayPalClient::client();
        $response = $client->execute($request);
        if ($debug)
        {
        print "Status Code: {$response->statusCode}\n";
        print "Status: {$response->result->status}\n";
        print "Order ID: {$response->result->id}\n";
        print "Intent: {$response->result->intent}\n";
        print "Links:\n";
        foreach($response->result->links as $link)
        {
            print "\t{$link->rel}: {$link->href}\tCall Type: {$link->method}\n";
        }

        // To print the whole response body, uncomment the following line
        echo json_encode($response->result, JSON_PRETTY_PRINT);
        }

        // 4. Return a successful response to the client.
        return $response;
    }

    public function buildRequestBody()
    {
        // var_dump(request()->session()->get('total_payment'));
        return array(
            'intent' => 'CAPTURE',
            'application_context' =>
                array(
                    'return_url' => 'https://example.com/return',
                    'cancel_url' => 'https://example.com/cancel'
                ),
            'purchase_units' =>
                array(
                    0 =>
                        array(
                            'amount' =>
                                array(
                                    'currency_code' => 'USD',
                                    'value' => request()->session()->get('total_payment')
                                )
                        )
                )
        );
    }
    // End PayPal Payment
}
