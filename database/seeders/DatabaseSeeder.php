<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\Service;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin RS Madani',
            'email' => 'admin@rsmadani.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'phone' => '021-12345678',
        ]);

        $services = [
            [
                'name' => 'IGD', 'category' => 'Layanan Medis', 'icon' => 'heart',
                'description' => 'Instalasi Gawat Darurat siap melayani pasien 24 jam non-stop dengan tenaga medis profesional dan peralatan lengkap untuk penanganan darurat.',
                'features' => ['Penanganan darurat medis 24 jam', 'Ambulans siap 24 jam', 'Dokter jaga dan perawat siaga'],
                'order' => 1,
            ],
            [
                'name' => 'Rawat Jalan', 'category' => 'Layanan Medis', 'icon' => 'monitor',
                'description' => 'Pelayanan rawat jalan dengan berbagai poli spesialis yang ditangani oleh dokter-dokter berpengalaman di bidangnya masing-masing.',
                'features' => ['Poli Umum & Spesialis', 'Pendaftaran online & offline', 'Jam operasional 07.00 - 21.00'],
                'order' => 2,
            ],
            [
                'name' => 'Rawat Inap', 'category' => 'Layanan Medis', 'icon' => 'bed',
                'description' => 'Fasilitas rawat inap yang nyaman dengan berbagai kelas perawatan, didukung tenaga medis profesional dan peralatan medis modern.',
                'features' => ['Ruang rawat inap kelas 1, 2, 3 & VIP', 'ICU, NICU, & PICU', '249 tempat tidur tersedia'],
                'order' => 3,
            ],
            [
                'name' => 'Radiologi', 'category' => 'Layanan Penunjang', 'icon' => 'shield',
                'description' => 'Pelayanan radiologi dengan peralatan modern untuk menunjang diagnosis penyakit secara akurat dan cepat.',
                'features' => ['Rontgen & USG', 'CT Scan & MRI', 'Mamografi & EKG'],
                'order' => 4,
            ],
            [
                'name' => 'Farmasi', 'category' => 'Layanan Penunjang', 'icon' => 'capsule',
                'description' => 'Apotek rumah sakit yang menyediakan obat-obatan lengkap dengan pelayanan informasi obat oleh apoteker profesional.',
                'features' => ['Obat resep & non-resep lengkap', 'Konsultasi apoteker', 'Layanan obat racik'],
                'order' => 5,
            ],
            [
                'name' => 'Laboratorium', 'category' => 'Layanan Penunjang', 'icon' => 'microscope',
                'description' => 'Laboratorium klinik dengan peralatan otomatis dan akurat untuk berbagai pemeriksaan diagnostik kesehatan.',
                'features' => ['Pemeriksaan darah lengkap', 'Pemeriksaan urine & feses', 'Kimia klinik & mikrobiologi'],
                'order' => 6,
            ],
            [
                'name' => 'TMS', 'category' => 'Layanan Unggulan', 'icon' => 'wave',
                'description' => 'Transcranial Magnetic Stimulation — terapi non-invasif menggunakan medan magnet untuk stimulasi otak dalam penanganan gangguan neurologis dan psikiatri.',
                'features' => ['Terapi non-invasif', 'Stimulasi otak dengan medan magnet', 'Penanganan gangguan neurologis'],
                'order' => 7,
            ],
            [
                'name' => 'Layanan Saraf', 'category' => 'Layanan Unggulan', 'icon' => 'brain',
                'description' => 'Pelayanan neurologi komprehensif untuk diagnosis dan terapi gangguan sistem saraf, termasuk stroke, epilepsi, dan neuropati.',
                'features' => ['Diagnosis gangguan sistem saraf', 'Terapi stroke & epilepsi', 'Penanganan neuropati'],
                'order' => 8,
            ],
            [
                'name' => 'Rehabilitasi Narkoba', 'category' => 'Layanan Unggulan', 'icon' => 'rehab',
                'description' => 'Program rehabilitasi terpadu untuk penyembuhan pecandu narkoba dengan pendekatan medis, psikologis, dan spiritual.',
                'features' => ['Program rehabilitasi terpadu', 'Pendekatan medis & psikologis', 'Pembinaan spiritual'],
                'order' => 9,
            ],
            [
                'name' => 'Kesehatan Jiwa Anak & Remaja', 'category' => 'Layanan Unggulan', 'icon' => 'mental',
                'description' => 'Pelayanan kesehatan jiwa khusus untuk anak dan remaja, menangani berbagai masalah psikologis dan gangguan mental.',
                'features' => ['Konsultasi psikologi anak & remaja', 'Terapi gangguan mental', 'Program tumbuh kembang'],
                'order' => 10,
            ],
        ];

        foreach ($services as $s) {
            $s['slug'] = \Illuminate\Support\Str::slug($s['name']);
            Service::create($s);
        }

        $doctorsData = [
            ['name' => 'dr. Sasono Udijanto, Sp.OG', 'specialization' => 'Spesialis Kandungan', 'clinic' => 'Klinik Kandungan'],
            ['name' => 'dr. Stevany R. Wulan, Sp.A', 'specialization' => 'Spesialis Anak', 'clinic' => 'Klinik Anak'],
            ['name' => 'dr. Rahma, M.Kes Sp.A', 'specialization' => 'Spesialis Anak', 'clinic' => 'Klinik Anak'],
            ['name' => 'dr. Gina Medika Putri Sunusi, Sp.PD', 'specialization' => 'Spesialis Penyakit Dalam', 'clinic' => 'Klinik Penyakit Dalam'],
            ['name' => 'dr. Jimmy Haskell Sampelling, Sp.PD', 'specialization' => 'Spesialis Penyakit Dalam', 'clinic' => 'Klinik Penyakit Dalam'],
            ['name' => 'dr. I Made Wirka, Sp.B', 'specialization' => 'Spesialis Bedah', 'clinic' => 'Klinik Bedah'],
            ['name' => 'dr. Roberthy D. Maelissa, Sp.B', 'specialization' => 'Spesialis Bedah', 'clinic' => 'Klinik Bedah'],
            ['name' => 'dr. Neni K. Parimo, Sp.M', 'specialization' => 'Spesialis Mata', 'clinic' => 'Klinik Mata'],
            ['name' => 'dr. Asrawati Sofyan, Sp.KK, M.Kes', 'specialization' => 'Spesialis Kulit & Kelamin', 'clinic' => 'Klinik Penyakit Kulit & Kelamin'],
            ['name' => 'dr. Karmiliyanti, Sp.N', 'specialization' => 'Spesialis Saraf', 'clinic' => 'Klinik Saraf/Neuro'],
            ['name' => 'dr. Alfrida M. Wara, Sp.S', 'specialization' => 'Spesialis Saraf', 'clinic' => 'Klinik Saraf/Neuro'],
            ['name' => 'dr. Patmawati, M.Kes, Sp.KJ', 'specialization' => 'Spesialis Jiwa', 'clinic' => 'Klinik Jiwa'],
            ['name' => 'dr. Merry Tjandra, M.Kes, Sp.KJ', 'specialization' => 'Spesialis Jiwa', 'clinic' => 'Klinik Jiwa'],
            ['name' => 'drg. Esther Natalia', 'specialization' => 'Spesialis Gigi & Mulut', 'clinic' => 'Klinik Gigi & Mulut'],
            ['name' => 'drg. Rysmah', 'specialization' => 'Spesialis Gigi & Mulut', 'clinic' => 'Klinik Gigi & Mulut'],
            ['name' => 'dr. Christin Rony Nayoan, Sp.THT-KL', 'specialization' => 'Spesialis THT', 'clinic' => 'Klinik THT'],
            ['name' => 'dr. Prasie Jeremia, Sp.JP', 'specialization' => 'Spesialis Jantung', 'clinic' => 'Klinik Jantung & Pembuluh Darah'],
            ['name' => 'dr. Nyoman Sumiati, M.Biomed., Sp.KJ', 'specialization' => 'Spesialis Tumbuh Kembang', 'clinic' => 'Klinik Tumbuh Kembang'],
        ];

        $days = [
            ['day' => 'Senin', 'start_time' => '07:30', 'end_time' => '16:00'],
            ['day' => 'Selasa', 'start_time' => '07:30', 'end_time' => '16:00'],
            ['day' => 'Rabu', 'start_time' => '07:30', 'end_time' => '16:00'],
            ['day' => 'Kamis', 'start_time' => '07:30', 'end_time' => '16:00'],
            ['day' => 'Jumat', 'start_time' => '07:30', 'end_time' => '16:30'],
        ];

        foreach ($doctorsData as $d) {
            $d['slug'] = \Illuminate\Support\Str::slug($d['name']);
            $doctor = Doctor::create($d);

            foreach ($days as $schedule) {
                Schedule::create(array_merge(['doctor_id' => $doctor->id], $schedule));
            }
        }

        $profilesData = [
            'about' => 'RS Madani adalah rumah sakit modern yang berkomitmen memberikan pelayanan kesehatan terbaik dengan mengedepankan nilai-nilai Islami. Didukung oleh tenaga medis profesional dan peralatan medis terkini, kami siap melayani masyarakat dengan sepenuh hati.',
            'history' => 'RS Madani didirikan pada tahun 2010 dengan visi menjadi rumah sakit terkemuka yang memberikan pelayanan kesehatan berkualitas. Berawal dari sebuah klinik kecil, RS Madani terus berkembang hingga menjadi rumah sakit modern dengan berbagai layanan unggulan.',
            'vision_mission' => "Visi:\nMenjadi rumah sakit terpercaya dan terdepan dalam pelayanan kesehatan yang profesional, islami, dan bermartabat.\n\nMisi:\n1. Memberikan pelayanan kesehatan yang berkualitas dan terjangkau\n2. Mengembangkan sumber daya manusia yang profesional dan berakhlak mulia\n3. Menyediakan sarana dan prasarana medis yang modern dan lengkap\n4. Menjalin kerjasama dengan berbagai pihak untuk meningkatkan derajat kesehatan masyarakat",
            'director_message' => 'Assalamualaikum Warahmatullahi Wabarakatuh,\n\nSelamat datang di RS Madani. Kami berkomitmen untuk memberikan pelayanan kesehatan terbaik bagi seluruh pasien. Dengan didukung oleh tenaga medis yang profesional dan peralatan modern, kami siap melayani Anda dan keluarga.\n\nKami percaya bahwa kesehatan adalah anugerah yang harus dijaga. Oleh karena itu, RS Madani hadir sebagai mitra kesehatan Anda untuk mewujudkan masyarakat yang sehat dan berkualitas.\n\nWassalamualaikum Warahmatullahi Wabarakatuh',
            'organizational_structure' => 'Struktur organisasi RS Madani terdiri dari:\n- Direktur Utama\n- Wakil Direktur Pelayanan Medis\n- Wakil Direktur Keuangan & Logistik\n- Wakil Direktur SDM & Pendidikan\n- Kepala Instalasi Rawat Inap\n- Kepala Instalasi Rawat Jalan\n- Kepala Instalasi Gawat Darurat\n- Kepala Instalasi Penunjang Medis\n- Kepala Bidang Keperawatan\n- Kepala Bidang Farmasi',
            'accreditation' => 'RS Madani telah terakreditasi PARIPURNA oleh Komisi Akreditasi Rumah Sakit (KARS) dan terdaftar sebagai rumah sakit rujukan di wilayah ini.',
        ];

        foreach ($profilesData as $key => $value) {
            Profile::create(['key' => $key, 'value' => $value]);
        }

        Article::create([
            'title' => 'RS Madani Meraih Akreditasi Paripurna',
            'slug' => 'rs-madani-meraih-akreditasi-paripurna',
            'content' => 'RS Madani dengan bangga mengumumkan bahwa kami telah berhasil meraih akreditasi paripurna dari Komisi Akreditasi Rumah Sakit (KARS). Penghargaan ini merupakan bukti komitmen kami dalam memberikan pelayanan kesehatan yang berkualitas dan aman bagi seluruh pasien.\n\nAkreditasi paripurna adalah status tertinggi dalam sistem akreditasi rumah sakit di Indonesia. Capaian ini menunjukkan bahwa RS Madani telah memenuhi standar mutu dan keselamatan pasien yang ketat.\n\nKami mengucapkan terima kasih kepada seluruh tim medis, staf, dan manajemen yang telah bekerja keras untuk mencapai prestasi ini. Kami akan terus berupaya meningkatkan kualitas pelayanan kami ke depannya.',
            'excerpt' => 'RS Madani berhasil meraih akreditasi paripurna dari KARS sebagai bukti komitmen pelayanan kesehatan berkualitas.',
            'author' => 'Tim Humas RS Madani',
            'status' => 'publish',
            'published_at' => now(),
        ]);

        Article::create([
            'title' => 'Layanan Terapi Magnetic Stimulation (TMS) Kini Tersedia',
            'slug' => 'layanan-tms-kini-tersedia',
            'content' => 'RS Madani kini menghadirkan layanan terbaru yaitu Terapi Magnetic Stimulation (TMS) untuk penanganan berbagai gangguan neurologis. TMS adalah metode terapi non-invasif yang menggunakan medan magnet untuk merangsang sel-sel saraf di otak.\n\nTerapi ini efektif untuk menangani berbagai kondisi seperti depresi, gangguan kecemasan, migrain, dan gangguan neurologis lainnya. TMS dilakukan oleh tim dokter spesialis saraf yang berpengalaman.\n\nUntuk informasi lebih lanjut tentang layanan TMS, silakan menghubungi nomor layanan kami atau datang langsung ke RS Madani.',
            'excerpt' => 'RS Madani menghadirkan layanan Terapi Magnetic Stimulation (TMS) untuk penanganan gangguan neurologis.',
            'author' => 'Tim Humas RS Madani',
            'status' => 'publish',
            'published_at' => now()->subDays(1),
        ]);

        Article::create([
            'title' => 'Program Rehabilitasi Narkoba di RS Madani',
            'slug' => 'program-rehabilitasi-narkoba',
            'content' => 'RS Madani membuka program rehabilitasi narkoba yang komprehensif bagi pasien yang ingin pulih dari ketergantungan narkoba. Program ini dirancang dengan pendekatan medis, psikologis, dan spiritual.\n\nProgram rehabilitasi kami meliputi:\n1. Detoksifikasi medis\n2. Konseling individu dan kelompok\n3. Terapi perilaku kognitif\n4. Program aftercare\n5. Dukungan keluarga\n\nTim kami terdiri dari dokter spesialis jiwa, psikolog, dan konselor adiksi yang berpengalaman. Kami berkomitmen membantu pasien mencapai pemulihan yang berkelanjutan.',
            'excerpt' => 'Program rehabilitasi narkoba komprehensif dengan pendekatan medis, psikologis, dan spiritual.',
            'author' => 'Tim Humas RS Madani',
            'status' => 'publish',
            'published_at' => now()->subDays(2),
        ]);
    }
}
