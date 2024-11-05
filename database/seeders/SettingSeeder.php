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
            'email_dinas' => 'nakertrans@papuaselatan.go.id',
            'google_maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4070.7694079441903!2d140.38820273640198!3d-8.492188984993785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2sid!4v1728953962572!5m2!1sen!2sid" width="650" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'visi' => '"Papua yang Mandiri Secara Sosial, Budaya, Ekonomi dan Politik"',
            

        ]);
    }
}