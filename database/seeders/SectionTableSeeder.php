<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Section Table Seeder
        $sectionRecords = [
            [
                'id'        => 1,
                'name'      => 'Men',
                'status'    => 1
            ],
            [
                'id'        => 2,
                'name'      => 'Women',
                'status'    => 1
            ],
            [
                'id'        => 3,
                'name'      => 'Kids',
                'status'    => 1
            ],
        ];
        //Section Insert
        Section::insert($sectionRecords);
    }
}