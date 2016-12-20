<?php

use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ZipInfo;

class ZipInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::filter('chunk')->load(database_path("seeds/csv/zip_info.csv"))->chunk(250, function($results){
            foreach ($results as $result) {
                $zip_info = ZipInfo::create([
                    "zip_code" => $result->postcode,
                    "city" => $result->woonplaats,
                    "alt_name" => $result->alternatieve_schrijfwijzen,
                    "town" => $result->gemeente,
                    "district" => $result->provincie,
                    "netnumber" => $result->netnummer,
                    "latitude" => $result->latitude,
                    "longitude" => $result->longitude,
                    "types" => $result->soort
                ]);
            }
        });
    }
}
