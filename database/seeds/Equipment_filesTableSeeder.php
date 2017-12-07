<?php

use Illuminate\Database\Seeder;

class Equipment_filesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('equipmentfiles')->insert([
        	'equipment_id' => '1',
        	'user_id' => '1',
        	'filename' => "Owner's Manual",
        	'fileurl' => 'https://s3.us-east-2.amazonaws.com/equipmenttrackerf17/userfiles/9031.pdf',
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]);
         DB::table('equipmentfiles')->insert([
        	'equipment_id' => '2',
        	'user_id' => '1',
        	'filename' => "Owner's Manual",
        	'fileurl' => 'https://s3.us-east-2.amazonaws.com/equipmenttrackerf17/userfiles/9031.pdf',
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]);
         DB::table('equipmentfiles')->insert([
        	'equipment_id' => '3',
        	'user_id' => '1',
        	'filename' => "Owner's Manual",
        	'fileurl' => 'https://s3.us-east-2.amazonaws.com/equipmenttrackerf17/userfiles/9031.pdf',
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]);
         DB::table('equipmentfiles')->insert([
        	'equipment_id' => '4',
        	'user_id' => '1',
        	'filename' => "Owner's Manual",
        	'fileurl' => 'https://s3.us-east-2.amazonaws.com/equipmenttrackerf17/userfiles/9031.pdf',
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]);
         DB::table('equipmentfiles')->insert([
        	'equipment_id' => '5',
        	'user_id' => '1',
        	'filename' => "Owner's Manual",
        	'fileurl' => 'https://s3.us-east-2.amazonaws.com/equipmenttrackerf17/userfiles/9031.pdf',
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]);
         DB::table('equipmentfiles')->insert([
        	'equipment_id' => '6',
        	'user_id' => '1',
        	'filename' => "Owner's Manual",
        	'fileurl' => 'https://s3.us-east-2.amazonaws.com/equipmenttrackerf17/userfiles/9031.pdf',
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]);
         DB::table('equipmentfiles')->insert([
        	'equipment_id' => '7',
        	'user_id' => '1',
        	'filename' => "Owner's Manual",
        	'fileurl' => 'https://s3.us-east-2.amazonaws.com/equipmenttrackerf17/userfiles/9031.pdf',
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]);
         DB::table('equipmentfiles')->insert([
        	'equipment_id' => '8',
        	'user_id' => '1',
        	'filename' => "Owner's Manual",
        	'fileurl' => 'https://s3.us-east-2.amazonaws.com/equipmenttrackerf17/userfiles/9031.pdf',
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]);
         DB::table('equipmentfiles')->insert([
        	'equipment_id' => '9',
        	'user_id' => '1',
        	'filename' => "Owner's Manual",
        	'fileurl' => 'https://s3.us-east-2.amazonaws.com/equipmenttrackerf17/userfiles/9031.pdf',
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]);
         DB::table('equipmentfiles')->insert([
        	'equipment_id' => '10',
        	'user_id' => '1',
        	'filename' => "Owner's Manual",
        	'fileurl' => 'https://s3.us-east-2.amazonaws.com/equipmenttrackerf17/userfiles/9031.pdf',
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]);
    }
}
