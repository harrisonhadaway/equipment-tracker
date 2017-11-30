<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class Maintenance_logsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('maintenance_logs')->insert([
        	'equipment_id' => '1',
        	'service_description' => 'Oil Change',
        	'serviced_by' => 'Nicky Rodger',
        	'usage_at_service' => '3000',
        	'service_cost' => '40',
        	'service_notes' => 'First Oil Change and all checked out well!',
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]);
        DB::table('maintenance_logs')->insert([
        	'equipment_id' => '1',
        	'service_description' => 'New Tires',
        	'serviced_by' => 'Dal Sansing',
        	'usage_at_service' => '5000',
        	'service_cost' => '1200',
        	'service_notes' => 'BF Goodrich All Terrian KO2 tires',
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]);
        DB::table('maintenance_logs')->insert([
        	'equipment_id' => '2',
        	'service_description' => 'Oil Change',
        	'serviced_by' => 'Nicky Rodger',
        	'usage_at_service' => '3000',
        	'service_cost' => '40',
        	'service_notes' => 'First Oil Change and all checked out well!',
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]);
        DB::table('maintenance_logs')->insert([
        	'equipment_id' => '2',
        	'service_description' => 'New Tires',
        	'serviced_by' => 'Dal Sansing',
        	'usage_at_service' => '5000',
        	'service_cost' => '1200',
        	'service_notes' => 'BF Goodrich All Terrian KO2 tires',
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]);
        DB::table('maintenance_logs')->insert([
        	'equipment_id' => '3',
        	'service_description' => 'Oil Change',
        	'serviced_by' => 'Nicky Rodger',
        	'usage_at_service' => '3000',
        	'service_cost' => '40',
        	'service_notes' => 'First Oil Change and all checked out well!',
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]);
        DB::table('maintenance_logs')->insert([
        	'equipment_id' => '3',
        	'service_description' => 'New Tires',
        	'serviced_by' => 'Dal Sansing',
        	'usage_at_service' => '5000',
        	'service_cost' => '1200',
        	'service_notes' => 'BF Goodrich All Terrian KO2 tires',
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]);
        DB::table('maintenance_logs')->insert([
        	'equipment_id' => '4',
        	'service_description' => 'Oil Change',
        	'serviced_by' => 'Nicky Rodger',
        	'usage_at_service' => '3000',
        	'service_cost' => '40',
        	'service_notes' => 'First Oil Change and all checked out well!',
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]);
        DB::table('maintenance_logs')->insert([
        	'equipment_id' => '4',
        	'service_description' => 'New Tires',
        	'serviced_by' => 'Dal Sansing',
        	'usage_at_service' => '5000',
        	'service_cost' => '1200',
        	'service_notes' => 'BF Goodrich All Terrian KO2 tires',
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]);
        DB::table('maintenance_logs')->insert([
        	'equipment_id' => '5',
        	'service_description' => 'Oil Change',
        	'serviced_by' => 'Nicky Rodger',
        	'usage_at_service' => '3000',
        	'service_cost' => '40',
        	'service_notes' => 'First Oil Change and all checked out well!',
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]);
        DB::table('maintenance_logs')->insert([
        	'equipment_id' => '5',
        	'service_description' => 'New Tires',
        	'serviced_by' => 'Dal Sansing',
        	'usage_at_service' => '5000',
        	'service_cost' => '1200',
        	'service_notes' => 'BF Goodrich All Terrian KO2 tires',
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]);
        

        
    }
}
