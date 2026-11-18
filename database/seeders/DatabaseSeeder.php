<?php
namespace Database\Seeders;

use App\Models\{Keahlian, Status, Wilayah, Institusi};
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['To Do', 'In Progress', 'Review', 'Done'] as $s) {
            Status::create(['nama_status' => $s]);
        }
        foreach (['UI/UX Designer', 'Frontend Dev', 'Backend Dev', 'Mobile Dev', 'Data Analyst', 'QA Tester', 'Product Manager'] as $k) {
            Keahlian::create(['nama_keahlian' => $k]);
        }
        $sby = Wilayah::create(['nama_provinsi' => 'Jawa Timur', 'nama_kabupaten_kota' => 'Surabaya']);
        $jkt = Wilayah::create(['nama_provinsi' => 'DKI Jakarta', 'nama_kabupaten_kota' => 'Jakarta']);
        Institusi::create(['nama_institusi' => 'Universitas Airlangga', 'wilayah_id' => $sby->id]);
        Institusi::create(['nama_institusi' => 'Universitas Indonesia', 'wilayah_id' => $jkt->id]);
    }
}
