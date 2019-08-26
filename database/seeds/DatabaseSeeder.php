<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('usertypes')->insert([
            [
                'type' => 'Superadmin'
            ],
            [
                'type' => 'Admin'
            ]
        ]);

        DB::table('users')->insert([
            [
                'usertype_id' => 1,
                'name' => 'Super',
                'email' => 'super@super.com',
                'username' => 'super',
                'password' => bcrypt('super@super.com')
            ],
            [
                'usertype_id' => 1,
                'name' => 'Master',
                'email' => 'master@master.com',
                'username' => 'master',
                'password' => bcrypt('master@master.com')
            ],
            [
                'usertype_id' => 2,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'username' => 'admin',
                'password' => bcrypt('admin@admin.com')
            ],
            [
                'usertype_id' => 2,
                'name' => 'Admin 2',
                'email' => 'admin2@admin2.com',
                'username' => 'admin2',
                'password' => bcrypt('admin2@admin2.com')
            ]
        ]);

        DB::table('room_types')->insert([
            [
                'type' => 'Single',
                'capacity' => 1
            ],
            [
                'type' => 'Double',
                'capacity' => 2
            ],
            [
                'type' => 'Double Deluxe',
                'capacity' => 3
            ]
        ]);

        DB::table('rooms')->insert([
            [
                'roomtype_id' => '1',
                'number' => '1',
                'price' => '999.99',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. '
            ],
            [
                'roomtype_id' => '1',
                'number' => '2',
                'price' => '999.99',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. '
            ],
            [
                'roomtype_id' => '1',
                'number' => '3',
                'price' => '999.99',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. '
            ],
            [
                'roomtype_id' => '1',
                'number' => '4',
                'price' => '999.99',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. '
            ],
            [
                'roomtype_id' => '2',
                'number' => '5',
                'price' => '1599.99',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. '
            ],
            [
                'roomtype_id' => '2',
                'number' => '6',
                'price' => '1599.99',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. '
            ],
            [
                'roomtype_id' => '2',
                'number' => '7',
                'price' => '1599.99',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. '
            ],
            [
                'roomtype_id' => '2',
                'number' => '8',
                'price' => '1599.99',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. '
            ],
            [
                'roomtype_id' => '3',
                'number' => '9',
                'price' => '1999.99',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. '
            ],
            [
                'roomtype_id' => '3',
                'number' => '10',
                'price' => '1999.99',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. '
            ],
            [
                'roomtype_id' => '3',
                'number' => '11',
                'price' => '1999.99',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. '
            ],
            [
                'roomtype_id' => '3',
                'number' => '12',
                'price' => '1999.99',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. '
            ]
        ]);

        DB::table('booking_statuses')->insert([
            [
                'status' => 'Pending Booking'
            ],
            [
                'status' => 'Booked'
            ]
        ]);

        DB::table('bookings')->insert([
            [
                'first_name' => 'Mister',
                'last_name' => 'Bean',
                'contact_number' => '1234567890',
                'email' => 'test@test.com',
                'address' => 'Disneyland',
                'adult' => '2',
                'children' => '0',
                'room_id' => 5,
                'date_in' => '2019-08-24 00:00:00',
                'date_out' => '2019-08-28 00:00:00',
                'booking_status_id' => 2
            ],
            [
                'first_name' => 'Frank',
                'last_name' => 'Castle',
                'contact_number' => '1234567890',
                'email' => 'test2@test.com',
                'address' => 'New York',
                'adult' => '1',
                'children' => '2',
                'room_id' => 9,
                'date_in' => '2019-08-27 00:00:00',
                'date_out' => '2019-08-30 00:00:00',
                'booking_status_id' => 2
            ],
            [
                'first_name' => 'Ed',
                'last_name' => 'Nygma',
                'contact_number' => '1234567890',
                'email' => 'test3@test.com',
                'address' => 'Arkham, Gotham',
                'adult' => '2',
                'children' => '2',
                'room_id' => 10,
                'date_in' => '2019-08-30 00:00:00',
                'date_out' => '2019-09-01 00:00:00',
                'booking_status_id' => 2
            ]
        ]);

        DB::table('booking_schedules')->insert([
            [
                'booking_id' => '1',
                'room_id' => 5,
                'roomtype_id' => 2,
                'booking_status_id' => 2,
                'date_in' => '2019-08-24 00:00:00',
                'date_out' => '2019-08-28 00:00:00',
            ],
            [
                'booking_id' => '2',
                'room_id' => 9,
                'roomtype_id' => 3,
                'booking_status_id' => 2,
                'date_in' => '2019-08-27 00:00:00',
                'date_out' => '2019-08-30 00:00:00',
            ],
            [
                'booking_id' => '3',
                'room_id' => 10,
                'roomtype_id' => 3,
                'booking_status_id' => 2,
                'date_in' => '2019-08-30 00:00:00',
                'date_out' => '2019-09-01 00:00:00',
            ]
        ]);

        DB::table('purchases')->insert([
            [
                'booking_id' => '2',
                'origin' => 'Canteen',
                'description' => '2 San Mig Light, 1 Mineral Water, 1 12" Hawaiian Pizza',
                'price' => '850',
                'date' => '2019-08-27 00:00:00'
            ],
            [
                'booking_id' => '2',
                'origin' => 'Front Desk',
                'description' => 'Van rental going to the paradise',
                'price' => '2500',
                'date' => '2019-08-27 00:00:00'
            ],
            [
                'booking_id' => '3',
                'origin' => 'Canteen',
                'description' => '2 Pcs Chicken, 1 Red Horse',
                'price' => '250',
                'date' => '2019-08-30 00:00:00'
            ]
        ]);
    }
}
