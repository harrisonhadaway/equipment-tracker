<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;

class EquipmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipment')->insert([
        	'owner_id' => '1',
        	'make' => 'John Deere',
        	'model' => '4020',
        	'year' => '1972',
        	'highlighted' => true,
        	'hours_or_miles' => 'Hours',
        	'purchase_usage' => '2793',
        	'purchase_from' => 'Gavin Cheng',
        	'purchase_date' => '1-2-12',
        	'purchase_price' => '12000',
        	'serial_number' => 'n/a',
        	'vin_number' => '4T1GB10E0SU001134',
            'imageurl' => '',
        	'created_at' => '2016-12-07 12:36:53',
        	'updated_at' => '2017-06-07 12:36:53'
        	]);

        DB::table('equipment')->insert([
        	'owner_id' => '1',
        	'make' => 'Toyota',
        	'model' => 'Tundra',
        	'year' => '2011',
        	'highlighted' => false,
        	'hours_or_miles' => 'Miles',
        	'purchase_usage' => '152505',
        	'purchase_from' => 'Auto Sales',
        	'purchase_date' => '6-7-10',
        	'purchase_price' => '12300',
        	'serial_number' => '123456789',
        	'vin_number' => '4T1GB10E0SU001134',
            'imageurl' => '',
        	'created_at' => '2015-8-07 12:36:53',
        	'updated_at' => '2017-11-07 12:36:53'
        	]);
        DB::table('equipment')->insert([
            'owner_id' => '1',
            'make' => 'Kubota',
            'model' => 'ZD-326',
            'year' => '2009',
            'highlighted' => true,
            'hours_or_miles' => 'Hours',
            'purchase_usage' => '0',
            'purchase_from' => 'Jimbo Gary',
            'purchase_date' => '6-2-10',
            'purchase_price' => '14000',
            'serial_number' => '123456789',
            'vin_number' => '123456789',
            'imageurl' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

        DB::table('equipment')->insert([
            'owner_id' => '1',
            'make' => 'Ford',
            'model' => 'Bronco',
            'year' => '1975',
            'highlighted' => true,
            'hours_or_miles' => 'Miles',
            'purchase_usage' => '60000',
            'purchase_from' => 'Elvis Presley',
            'purchase_date' => '6-4-80',
            'purchase_price' => '10000',
            'serial_number' => '123456789',
            'vin_number' => '1N4AL2AP6BN459824',
            'imageurl' => '',
            'created_at' => '2014-11-07 12:36:53',
            'updated_at' => '2016-11-07 12:36:53'
            ]);
        DB::table('equipment')->insert([
            'owner_id' => '1',
            'make' => 'John Deere',
            'model' => '2155',
            'year' => '1992',
            'highlighted' => false,
            'hours_or_miles' => 'Hours',
            'purchase_usage' => '3456',
            'purchase_from' => 'Jimmy Dale',
            'purchase_date' => '8-19-17',
            'purchase_price' => '7500',
            'serial_number' => '123456789',
            'vin_number' => '123456789',
            'imageurl' => '',
            'created_at' => '2017-08-20 12:36:53',
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

        DB::table('equipment')->insert([
            'owner_id' => '1',
            'make' => 'Nissan',
            'model' => 'GTR',
            'year' => '2017',
            'highlighted' => true,
            'hours_or_miles' => 'Miles',
            'purchase_usage' => '0',
            'purchase_from' => 'Nissan Dealer',
            'purchase_date' => '11-30-17',
            'purchase_price' => '150000',
            'serial_number' => '123456789',
            'vin_number' => '123456789',
            'imageurl' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

        DB::table('equipment')->insert([
            'owner_id' => '1',
            'make' => 'John Deere',
            'model' => '5525',
            'year' => '2008',
            'highlighted' => true,
            'hours_or_miles' => 'Hours',
            'purchase_usage' => '1700',
            'purchase_from' => 'Wade Inc',
            'purchase_date' => '11-30-09',
            'purchase_price' => '65692',
            'serial_number' => '123456789',
            'vin_number' => '1GDJ7C1346F927837',
            'imageurl' => '',
            'created_at' => '2008-08-20 12:36:53',
            'updated_at' => '2017-08-20 12:36:53'
            ]);

        DB::table('equipment')->insert([
            'owner_id' => '1',
            'make' => 'Catepillar',
            'model' => '299D',
            'year' => '2016',
            'highlighted' => true,
            'hours_or_miles' => 'Hours',
            'purchase_usage' => '0',
            'purchase_from' => 'Thompson Cat',
            'purchase_date' => '11-30-09',
            'purchase_price' => '65692',
            'serial_number' => '123456789',
            'vin_number' => '1GDJ7C1346F927837',
            'imageurl' => '',
            'created_at' => '2008-08-20 12:36:53',
            'updated_at' => '2017-08-20 12:36:53'
            ]);


    }
}
