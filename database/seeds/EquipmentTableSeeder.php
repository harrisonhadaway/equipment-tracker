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
        	'year' => '1975',
        	'highlighted' => true,
        	'hours_or_miles' => 'Hours',
        	'purchase_usage' => '130',
        	'purchase_from' => 'Carlos',
        	'purchase_date' => '1-2-12',
        	'purchase_price' => '12000',
        	'serial_number' => '123456789',
        	'vin_number' => '123456789',
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]);

        DB::table('equipment')->insert([
        	'owner_id' => '1',
        	'make' => 'Toyota',
        	'model' => 'Tundra',
        	'year' => '2011',
        	'highlighted' => false,
        	'hours_or_miles' => 'Miles',
        	'purchase_usage' => '150000',
        	'purchase_from' => 'Auto Sales',
        	'purchase_date' => '1-2-12',
        	'purchase_price' => '10000',
        	'serial_number' => '123456789',
        	'vin_number' => '123456789',
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]);
        DB::table('equipment')->insert([
            'owner_id' => '1',
            'make' => 'Kubota',
            'model' => 'ZD-326',
            'year' => '2009',
            'highlighted' => true,
            'hours_or_miles' => 'Hours',
            'purchase_usage' => '1230',
            'purchase_from' => 'Jimbo Gary',
            'purchase_date' => '6-2-10',
            'purchase_price' => '18000',
            'serial_number' => '123456789',
            'vin_number' => '123456789',
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
            'vin_number' => '123456789',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
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
            'purchase_price' => '5000',
            'serial_number' => '123456789',
            'vin_number' => '123456789',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
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
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
    }
}
