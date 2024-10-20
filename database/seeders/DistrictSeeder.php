<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts = [
            ['name' => 'Bagerhat'],
            ['name' => 'Bandarban'],
            ['name' => 'Barguna'],
            ['name' => 'Barisal'],
            ['name' => 'Bhola'],
            ['name' => 'Bogura'],
            ['name' => 'Brahmanbaria'],
            ['name' => 'Chandpur'],
            ['name' => 'Chapai Nawabganj'],
            ['name' => 'Chattogram'],
            ['name' => 'Chuadanga'],
            ['name' => 'Cox\'s Bazar'],
            ['name' => 'Cumilla'],
            ['name' => 'Dhaka'],
            ['name' => 'Dinajpur'],
            ['name' => 'Faridpur'],
            ['name' => 'Feni'],
            ['name' => 'Gaibandha'],
            ['name' => 'Gazipur'],
            ['name' => 'Gopalganj'],
            ['name' => 'Habiganj'],
            ['name' => 'Jamalpur'],
            ['name' => 'Jashore'],
            ['name' => 'Jhalokathi'],
            ['name' => 'Jhenaidah'],
            ['name' => 'Joypurhat'],
            ['name' => 'Khagrachari'],
            ['name' => 'Khulna'],
            ['name' => 'Kishoreganj'],
            ['name' => 'Kurigram'],
            ['name' => 'Kushtia'],
            ['name' => 'Lakshmipur'],
            ['name' => 'Lalmonirhat'],
            ['name' => 'Madaripur'],
            ['name' => 'Magura'],
            ['name' => 'Manikganj'],
            ['name' => 'Meherpur'],
            ['name' => 'Moulvibazar'],
            ['name' => 'Munshiganj'],
            ['name' => 'Mymensingh'],
            ['name' => 'Naogaon'],
            ['name' => 'Narail'],
            ['name' => 'Narayanganj'],
            ['name' => 'Narsingdi'],
            ['name' => 'Natore'],
            ['name' => 'Netrokona'],
            ['name' => 'Nilphamari'],
            ['name' => 'Noakhali'],
            ['name' => 'Pabna'],
            ['name' => 'Panchagarh'],
            ['name' => 'Patuakhali'],
            ['name' => 'Pirojpur'],
            ['name' => 'Rajbari'],
            ['name' => 'Rajshahi'],
            ['name' => 'Rangamati'],
            ['name' => 'Rangpur'],
            ['name' => 'Satkhira'],
            ['name' => 'Shariatpur'],
            ['name' => 'Sherpur'],
            ['name' => 'Sirajganj'],
            ['name' => 'Sunamganj'],
            ['name' => 'Sylhet'],
            ['name' => 'Tangail'],
            ['name' => 'Thakurgaon'],
        ];

        District::truncate();
        District::insert($districts);
    }
}
