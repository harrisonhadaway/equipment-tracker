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
        	'purchase_miles' => '10,000',
        	'purchase_hours' => '450',
        	'purchase_from' => 'Carlos',
        	'purchase_date' => '1-2-12',
        	'purchase_price' => '12,000',
        	'serial_number' => '123456789',
        	'vin_number' => '123456789',
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]);

        DB::table('equipment')->insert([
        	'owner_id' => '1',
        	'make' => 'Kubota',
        	'model' => 'ZD-326',
        	'year' => '2011',
        	'highlighted' => true,
        	'purchase_miles' => 'n/a',
        	'purchase_hours' => '300',
        	'purchase_from' => 'Jimmy',
        	'purchase_date' => '1-2-12',
        	'purchase_price' => '10,000',
        	'serial_number' => '123456789',
        	'vin_number' => '123456789',
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]);
    }
}
