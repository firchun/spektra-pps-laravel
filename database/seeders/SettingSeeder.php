<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settting')->insert([
            'nama_kadis' => 'NAMA KEPALA DINAS',
            'sambutan_kadis' => 'Assalamu’alaikum Warahmatullahi Wabarakatuh.Puji syukur ke hadirat Allah SWT yang telah memberikan rahmat dan karunia-Nya sehingga kita semua bisa terus bekerja sama dalam membangun dan memajukan instansi ini. Sebagai Kepala Dinas, saya berharap seluruh pihak dapat memberikan dukungan penuh dalam menjalankan setiap program kerja yang telah direncanakan. Kami terus berkomitmen untuk meningkatkan pelayanan dan memberikan yang terbaik bagi masyarakat, serta menciptakan perubahan positif untuk masa depan yang lebih baik.Terima kasih atas segala dukungan dan kerjasama dari seluruh pegawai dan masyarakat.Wassalamu’alaikum Warahmatullahi Wabarakatuh.',
        ]);
    }
}
