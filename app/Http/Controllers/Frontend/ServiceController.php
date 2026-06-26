<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Doctor;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    private $clinics = [
        'Klinik Kandungan' => [
            'icon' => 'maternity',
            'short_description' => 'Pelayanan kesehatan ibu hamil, persalinan, dan kesehatan reproduksi wanita.',
            'description' => 'Klinik Kandungan dan Kebidanan RS Madani memberikan pelayanan komprehensif untuk kesehatan ibu dan reproduksi wanita. Mulai dari pemeriksaan kehamilan rutin (ANC), persalinan normal maupun caesar, konseling KB, hingga penanganan gangguan reproduksi seperti miom, kista ovarium, dan infertilitas. Didukung oleh dokter spesialis kandungan berpengalaman dan fasilitas USG 4D untuk pemantauan janin secara detail.',
            'color' => 'from-pink-500 to-rose-600',
            'schedule' => ['weekday' => '07:00 - 20:00', 'saturday' => '07:00 - 16:00', 'holiday' => '07:00 - 13:00'],
        ],
        'Klinik Anak' => [
            'icon' => 'child',
            'short_description' => 'Pelayanan kesehatan anak mulai dari bayi baru lahir hingga remaja.',
            'description' => 'Klinik Anak RS Madani menangani kesehatan bayi, anak, dan remaja secara menyeluruh. Layanan meliputi pemeriksaan tumbuh kembang, imunisasi, konsultasi gizi dan MPASI, penanganan demam, infeksi saluran napas, diare, alergi, serta penyakit infeksi lainnya. Dengan pendekatan ramah anak dan tenaga dokter spesialis anak yang sabar serta komunikatif, setiap kunjungan dibuat senyaman mungkin.',
            'color' => 'from-sky-400 to-blue-600',
            'schedule' => ['weekday' => '07:00 - 21:00', 'saturday' => '07:00 - 17:00', 'holiday' => '08:00 - 14:00'],
        ],
        'Klinik Penyakit Dalam' => [
            'icon' => 'internal',
            'short_description' => 'Diagnosis dan terapi berbagai penyakit dalam pada dewasa.',
            'description' => 'Klinik Penyakit Dalam RS Madani menangani diagnosis, terapi, dan pencegahan berbagai penyakit pada pasien dewasa. Mulai dari hipertensi, diabetes melitus, kolesterol tinggi, infeksi, gangguan ginjal, gangguan pencernaan, hingga penyakit autoimun. Dilengkapi dengan pemeriksaan penunjang seperti EKG, laboratorium, dan monitoring tekanan darah, dokter spesialis penyakit dalam siap memberikan penanganan terbaik sesuai kondisi Anda.',
            'color' => 'from-emerald-500 to-teal-600',
            'schedule' => ['weekday' => '07:00 - 21:00', 'saturday' => '07:00 - 17:00', 'holiday' => '07:00 - 14:00'],
        ],
        'Klinik Bedah' => [
            'icon' => 'surgery',
            'short_description' => 'Pelayanan bedah umum dan spesialis dengan teknologi modern.',
            'description' => 'Klinik Bedah RS Madani melayani konsultasi dan penanganan tindakan bedah umum maupun spesialis. Layanan meliputi bedah digestif (lambung, usus, hati), bedah tumor dan kanker, bedah tiroid, bedah hernia, bedah minor (kista, lipoma, abses), serta konsultasi pra dan pasca operasi. Ditangani oleh dokter spesialis bedah berpengalaman dengan teknik minimal invasif untuk pemulihan yang lebih cepat.',
            'color' => 'from-violet-500 to-purple-700',
            'schedule' => ['weekday' => '07:00 - 20:00', 'saturday' => '07:00 - 16:00', 'holiday' => '07:00 - 13:00'],
        ],
        'Klinik Mata' => [
            'icon' => 'eye',
            'short_description' => 'Pemeriksaan dan terapi gangguan penglihatan serta kesehatan mata.',
            'description' => 'Klinik Mata RS Madani menyediakan pemeriksaan dan pengobatan gangguan penglihatan secara komprehensif. Layanan meliputi pemeriksaan visus, refraksi (kacamata), deteksi glaukoma, katarak, kelainan retina, mata kering, alergi mata, dan infeksi mata. Tersedia alat pemeriksaan modern seperti slit lamp, tonometer, dan funduskopi untuk diagnosis yang akurat oleh dokter spesialis mata.',
            'color' => 'from-cyan-400 to-blue-500',
            'schedule' => ['weekday' => '08:00 - 19:00', 'saturday' => '08:00 - 15:00', 'holiday' => '08:00 - 13:00'],
        ],
        'Klinik Penyakit Kulit & Kelamin' => [
            'icon' => 'skin',
            'short_description' => 'Penanganan masalah kulit, kelamin, dan alergi secara komprehensif.',
            'description' => 'Klinik Kulit dan Kelamin RS Madani menangani berbagai permasalahan kulit, rambut, kuku, dan penyakit menular seksual. Mulai dari jerawat, eksim, psoriasis, alergi kulit, infeksi jamur, kutil, hingga pemeriksaan dan pengobatan penyakit kelamin. Ditangani secara profesional oleh dokter spesialis kulit dan kelamin dengan menjaga kerahasiaan dan kenyamanan pasien.',
            'color' => 'from-orange-400 to-red-500',
            'schedule' => ['weekday' => '08:00 - 19:00', 'saturday' => '08:00 - 15:00', 'holiday' => 'Tutup'],
        ],
        'Klinik Saraf/Neuro' => [
            'icon' => 'brain',
            'short_description' => 'Pelayanan neurologi untuk gangguan sistem saraf dan otak.',
            'description' => 'Klinik Saraf RS Madani memberikan pelayanan neurologi untuk diagnosis dan terapi gangguan sistem saraf pusat maupun tepi. Layanan meliputi penanganan stroke (akut dan rehabilitasi), epilepsi, sakit kepala kronis (migrain, tension headache), neuropati diabetik, parkinson, vertigo, dan gangguan tidur. Dilengkapi EEG dan EMG untuk menunjang diagnosis secara akurat.',
            'color' => 'from-indigo-500 to-purple-600',
            'schedule' => ['weekday' => '07:00 - 20:00', 'saturday' => '07:00 - 16:00', 'holiday' => '07:00 - 14:00'],
        ],
        'Klinik Jiwa' => [
            'icon' => 'mental',
            'short_description' => 'Konsultasi dan terapi kesehatan jiwa serta gangguan mental.',
            'description' => 'Klinik Jiwa RS Madani menyediakan konsultasi dan terapi untuk berbagai gangguan kesehatan mental. Layanan meliputi penanganan depresi, kecemasan berlebih (gangguan panik, fobia), gangguan bipolar, skizofrenia, insomnia, gangguan stres pasca trauma (PTSD), serta kecanduan narkoba dan alkohol. Seluruh layanan dilakukan dengan pendekatan humanis, empati, dan tanpa stigma oleh psikiater berpengalaman.',
            'color' => 'from-amber-400 to-orange-600',
            'schedule' => ['weekday' => '08:00 - 18:00', 'saturday' => '08:00 - 15:00', 'holiday' => 'Tutup'],
        ],
        'Klinik Gigi & Mulut' => [
            'icon' => 'dental',
            'short_description' => 'Perawatan gigi, mulut, dan bedah mulut oleh dokter gigi spesialis.',
            'description' => 'Klinik Gigi dan Mulut RS Madani memberikan pelayanan perawatan gigi menyeluruh untuk semua usia. Layanan meliputi pemeriksaan dan scaling (pembersihan karang gigi), penambalan gigi, perawatan saluran akar (root canal), pencabutan gigi, pembuatan gigi palsu, bleaching (pemutihan gigi), serta bedah mulut ringan. Dilengkapi dengan dental unit modern untuk kenyamanan pasien.',
            'color' => 'from-sky-300 to-cyan-500',
            'schedule' => ['weekday' => '08:00 - 20:00', 'saturday' => '08:00 - 16:00', 'holiday' => '08:00 - 13:00'],
        ],
        'Klinik THT' => [
            'icon' => 'ent',
            'short_description' => 'Diagnosis dan terapi gangguan telinga, hidung, dan tenggorokan.',
            'description' => 'Klinik THT RS Madani menangani berbagai gangguan pada telinga, hidung, dan tenggorokan. Layanan meliputi penanganan gangguan pendengaran (otosklerosis, serumen), infeksi telinga kronis, sinusitis, rhinitis alergi, polip hidung, amandel dan adenoid, gangguan suara (polip pita suara), serta deteksi dini kanker THT. Pemeriksaan menggunakan alat endoskopi untuk diagnosis yang lebih presisi.',
            'color' => 'from-teal-400 to-green-600',
            'schedule' => ['weekday' => '07:00 - 19:00', 'saturday' => '07:00 - 15:00', 'holiday' => '07:00 - 13:00'],
        ],
        'Klinik Jantung & Pembuluh Darah' => [
            'icon' => 'heart',
            'short_description' => 'Pelayanan kardiologi untuk kesehatan jantung dan pembuluh darah.',
            'description' => 'Klinik Jantung dan Pembuluh Darah RS Madani memberikan pelayanan kardiologi komprehensif untuk pencegahan, diagnosis, dan pengobatan penyakit jantung. Layanan meliputi konsultasi penyakit jantung koroner, gagal jantung, hipertensi, aritmia (gangguan irama jantung), katup jantung, serta pemeriksaan penunjang seperti EKG, ekokardiografi (USG jantung), treadmill test, dan monitoring tekanan darah 24 jam.',
            'color' => 'from-red-500 to-rose-700',
            'schedule' => ['weekday' => '07:00 - 20:00', 'saturday' => '07:00 - 16:00', 'holiday' => '07:00 - 14:00'],
        ],
        'Klinik Tumbuh Kembang' => [
            'icon' => 'growth',
            'short_description' => 'Pemantauan dan stimulasi tumbuh kembang anak secara optimal.',
            'description' => 'Klinik Tumbuh Kembang RS Madani membantu memantau dan menstimulasi tumbuh kembang anak secara optimal sejak dini. Layanan meliputi skrining perkembangan (DDST, M-CHAT deteksi autisme), konsultasi keterlambatan bicara dan motorik, gangguan perilaku dan emosi pada anak, terapi okupasi, konsultasi ASI dan MPASI, serta konseling parenting. Ditangani oleh dokter spesialis anak konsultan tumbuh kembang.',
            'color' => 'from-green-400 to-emerald-600',
            'schedule' => ['weekday' => '08:00 - 18:00', 'saturday' => '08:00 - 15:00', 'holiday' => 'Tutup'],
        ],
    ];

    public function index()
    {
        $layananMedis = Service::where('category', 'Layanan Medis')->orderBy('order')->get();
        $layananPenunjang = Service::where('category', 'Layanan Penunjang')->orderBy('order')->get();
        $layananUnggulan = Service::where('category', 'Layanan Unggulan')->orderBy('order')->get();

        return view('frontend.services', compact('layananMedis', 'layananPenunjang', 'layananUnggulan'));
    }

    public function detail($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();

        $doctors = collect();
        $clinicCards = collect();

        if ($service->slug === 'rawat-jalan') {
            foreach ($this->clinics as $name => $meta) {
                $clinicDoctors = Doctor::where('clinic', $name)->get();
                $clinicCards->push([
                    'slug' => Str::slug($name),
                    'name' => $name,
                    'icon' => $meta['icon'],
                    'description' => $meta['short_description'],
                    'color' => $meta['color'],
                    'doctors' => $clinicDoctors,
                    'doctor_count' => $clinicDoctors->count(),
                ]);
            }
        } elseif ($service->related_clinics) {
            $doctors = Doctor::whereIn('clinic', $service->related_clinics)->get();
        }

        return view('frontend.service-detail', compact('service', 'doctors', 'clinicCards'));
    }

    public function clinicDetail($clinicSlug)
    {
        $slugToName = [];
        foreach ($this->clinics as $name => $meta) {
            $slugToName[Str::slug($name)] = $name;
        }

        $clinicName = $slugToName[$clinicSlug] ?? null;
        if (!$clinicName) {
            abort(404);
        }

        $service = Service::where('slug', 'rawat-jalan')->firstOrFail();
        $meta = $this->clinics[$clinicName];
        $doctors = Doctor::where('clinic', $clinicName)->with('schedules')->get();

        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $schedule = [];
        foreach ($days as $day) {
            $times = $doctors->pluck('schedules')->flatten()->where('day', $day)->where('is_active', true);
            if ($times->count()) {
                $schedule[$day] = $times->min('start_time') . ' - ' . $times->max('end_time');
            }
        }

        return view('frontend.clinic-detail', [
            'service' => $service,
            'clinic' => [
                'name' => $clinicName,
                'icon' => $meta['icon'],
                'slug' => $clinicSlug,
                'description' => $meta['description'],
                'color' => $meta['color'],
                'schedule' => $schedule,
                'default_schedule' => $meta['schedule'],
                'doctors' => $doctors,
                'doctor_count' => $doctors->count(),
            ],
        ]);
    }

    private $inpatientRooms = [
        'non-jiwa' => [
            'perinatologi' => [
                'name' => 'Ruangan Perinatologi',
                'slug' => 'perinatologi',
                'fruit_icon' => 'perinatologi',
                'fruit_color' => '#8ECAE6',
                'description' => 'Perawatan intensif untuk bayi baru lahir dengan pengawasan medis ketat dan fasilitas inkubator modern.',
                'long_description' => 'Ruangan Perinatologi RS Madani menyediakan perawatan intensif bagi bayi baru lahir yang memerlukan pengawasan medis khusus. Dilengkapi dengan inkubator modern, monitor jantung janin, fototerapi, dan alat bantu pernapasan neonatus. Ditangani oleh dokter spesialis anak konsultan perinatologi dan perawat neonatus terlatih yang siap memberikan pelayanan 24 jam.',
                'capacity' => 10,
                'facilities' => ['Inkubator', 'Monitor bayi', 'Fototerapi', 'Alat bantu napas', 'Suction', 'Infus pump'],
                'availability' => 'Tersedia 4 tempat tidur',
                'status' => 'tersedia',
                'classes' => ['Perinatologi'],
            ],
            'cerry' => [
                'name' => 'Ruangan Cerry',
                'slug' => 'cerry',
                'fruit_icon' => 'cherry',
                'fruit_color' => '#DC143C',
                'description' => 'Ruangan nyaman dengan suasana hangat untuk pemulihan pasien pasca operasi dan perawatan medis.',
                'long_description' => 'Ruangan Cerry didesain dengan interior bernuansa hangat dan menenangkan untuk mendukung proses pemulihan pasien. Setiap kamar dilengkapi dengan tempat tidur elektrik, nurse call system, TV, AC, dan kamar mandi dalam. Cocok untuk pasien pasca operasi, perawatan penyakit dalam, dan observasi medis dengan kenyamanan optimal.',
                'capacity' => 24,
                'facilities' => ['Tempat tidur elektrik', 'Nurse call', 'TV', 'AC', 'Kamar mandi dalam', 'Lemari pasien', 'Meja nakas'],
                'availability' => 'Tersedia 6 tempat tidur',
                'status' => 'tersedia',
                'classes' => ['Kelas 1', 'Kelas 2', 'Kelas 3'],
            ],
            'semangka' => [
                'name' => 'Ruangan Semangka',
                'slug' => 'semangka',
                'fruit_icon' => 'watermelon',
                'fruit_color' => '#2E8B57',
                'description' => 'Ruangan luas dengan pencahayaan alami yang baik untuk kenyamanan pasien selama masa perawatan.',
                'long_description' => 'Ruangan Semangka menawarkan ruang perawatan yang luas dan terang dengan pencahayaan alami yang melimpah. Desain interior yang segar dan modern menciptakan suasana terapi yang mendukung penyembuhan. Dilengkapi fasilitas lengkap termasuk tempat tidur nyaman, sistem panggilan perawat, dan area duduk untuk keluarga pendamping.',
                'capacity' => 20,
                'facilities' => ['Tempat tidur', 'Nurse call', 'TV', 'AC', 'Kamar mandi dalam', 'Area keluarga', 'WiFi'],
                'availability' => 'Tersedia 8 tempat tidur',
                'status' => 'tersedia',
                'classes' => ['Kelas 1', 'Kelas 2'],
            ],
            'melon' => [
                'name' => 'Ruangan Melon',
                'slug' => 'melon',
                'fruit_icon' => 'melon',
                'fruit_color' => '#7CCD7C',
                'description' => 'Ruangan perawatan dengan suasana asri dan ventilasi udara yang baik untuk kenyamanan maksimal.',
                'long_description' => 'Ruangan Melon mengutamakan kenyamanan dengan sirkulasi udara yang baik dan pemandangan taman rumah sakit. Ruangan ini cocok untuk pasien yang membutuhkan perawatan jangka menengah dengan suasana yang mendukung relaksasi dan ketenangan. Setiap tempat tidur dilengkapi dengan tirai privasi dan fasilitas pendukung lainnya.',
                'capacity' => 18,
                'facilities' => ['Tempat tidur', 'Nurse call', 'AC', 'Kamar mandi dalam', 'Tirai privasi', 'Lemari pasien'],
                'availability' => 'Tersedia 5 tempat tidur',
                'status' => 'tersedia',
                'classes' => ['Kelas 2', 'Kelas 3'],
            ],
            'nangka' => [
                'name' => 'Ruangan Nangka',
                'slug' => 'nangka',
                'fruit_icon' => 'jackfruit',
                'fruit_color' => '#DAA520',
                'description' => 'Ruangan perawatan dengan kapasitas besar dan fasilitas lengkap untuk berbagai jenis perawatan.',
                'long_description' => 'Ruangan Nangka merupakan ruang perawatan dengan kapasitas besar yang mampu menampung banyak pasien. Setiap area dilengkapi dengan tirai pemisah untuk menjaga privasi pasien. Cocok untuk perawatan penyakit dalam, observasi, dan perawatan lanjutan dengan dukungan tim medis yang profesional dan responsif.',
                'capacity' => 28,
                'facilities' => ['Tempat tidur', 'Nurse call', 'AC', 'Tirai privasi', 'Lemari pasien', 'Ruang bersama'],
                'availability' => 'Penuh',
                'status' => 'penuh',
                'classes' => ['Kelas 3'],
            ],
            'rambutan' => [
                'name' => 'Ruangan Rambutan',
                'slug' => 'rambutan',
                'fruit_icon' => 'rambutan',
                'fruit_color' => '#CD5C5C',
                'description' => 'Ruangan perawatan dengan desain interior hangat dan fasilitas yang mendukung pemulihan pasien.',
                'long_description' => 'Ruangan Rambutan menawarkan suasana perawatan yang hangat dan ramah dengan desain interior yang menenangkan. Dilengkapi dengan tempat tidur yang nyaman, sistem pencahayaan yang dapat diatur, dan fasilitas hiburan untuk mengurangi kejenuhan selama masa perawatan. Tim perawat siap melayani dengan penuh perhatian dan empati.',
                'capacity' => 16,
                'facilities' => ['Tempat tidur', 'Nurse call', 'TV', 'AC', 'Kamar mandi dalam', 'Pencahayaan adjustable'],
                'availability' => 'Tersedia 3 tempat tidur',
                'status' => 'tersedia',
                'classes' => ['Kelas 1', 'Kelas 2'],
            ],
            'jambu' => [
                'name' => 'Ruangan Jambu',
                'slug' => 'jambu',
                'fruit_icon' => 'guava',
                'fruit_color' => '#90EE90',
                'description' => 'Ruangan perawatan segar dan nyaman dengan fasilitas pendukung untuk pemulihan optimal.',
                'long_description' => 'Ruangan Jambu memberikan nuansa segar dan alami yang membantu menciptakan lingkungan penyembuhan yang ideal. Fasilitas lengkap termasuk tempat tidur yang ergonomis, sistem monitoring pasien, dan akses mudah ke stasiun perawat. Dirancang untuk memberikan kenyamanan maksimal bagi pasien dan keluarga selama masa perawatan.',
                'capacity' => 22,
                'facilities' => ['Tempat tidur ergonomis', 'Nurse call', 'AC', 'Kamar mandi dalam', 'Monitoring pasien', 'Area duduk'],
                'availability' => 'Tersedia 7 tempat tidur',
                'status' => 'tersedia',
                'classes' => ['Kelas 1', 'Kelas 2', 'Kelas 3'],
            ],
            'jeruk' => [
                'name' => 'Ruangan Jeruk',
                'slug' => 'jeruk',
                'fruit_icon' => 'orange',
                'fruit_color' => '#FF8C00',
                'description' => 'Ruangan perawatan dengan suasana cerah dan fasilitas modern untuk pemulihan yang menyenangkan.',
                'long_description' => 'Ruangan Jeruk menghadirkan suasana cerah dan energetik yang membantu meningkatkan semangat pasien selama masa pemulihan. Interior didesain dengan warna-warna hangat dan pencahayaan yang optimal. Dilengkapi dengan tempat tidur modern, sistem panggilan perawat digital, TV kabel, dan kamar mandi dalam yang bersih dan nyaman.',
                'capacity' => 20,
                'facilities' => ['Tempat tidur modern', 'Nurse call digital', 'TV kabel', 'AC', 'Kamar mandi dalam', 'WiFi', 'Lemari pasien'],
                'availability' => 'Tersedia 4 tempat tidur',
                'status' => 'tersedia',
                'classes' => ['Kelas 1', 'Kelas 2'],
            ],
            'markisa' => [
                'name' => 'Ruangan Markisa',
                'slug' => 'markisa',
                'fruit_icon' => 'passion',
                'fruit_color' => '#8B008B',
                'description' => 'Ruangan perawatan eksklusif dengan suasana tenang dan privasi tinggi untuk kenyamanan pasien.',
                'long_description' => 'Ruangan Markisa menawarkan suasana perawatan yang tenang dan eksklusif dengan prioritas pada privasi dan kenyamanan pasien. Setiap kamar dirancang dengan akustik yang baik untuk meminimalkan kebisingan. Cocok untuk pasien yang membutuhkan ketenangan ekstra selama masa pemulihan dengan fasilitas premium dan pelayanan perawat yang personal.',
                'capacity' => 12,
                'facilities' => ['Tempat tidur premium', 'Nurse call', 'TV', 'AC', 'Kamar mandi dalam', 'Kedap suara', 'Area santai'],
                'availability' => 'Tersedia 2 tempat tidur',
                'status' => 'tersedia',
                'classes' => ['Kelas 1', 'VIP'],
            ],
        ],
        'jiwa' => [
            'sawo' => [
                'name' => 'Ruangan Sawo',
                'slug' => 'sawo',
                'fruit_icon' => 'sapodilla',
                'fruit_color' => '#8B4513',
                'description' => 'Ruangan perawatan jiwa dengan suasana hangat dan terapeutik untuk mendukung pemulihan mental.',
                'long_description' => 'Ruangan Sawo didesain khusus untuk pasien dengan gangguan jiwa ringan hingga sedang. Suasana hangat dan terapeutik dengan pencahayaan alami yang cukup membantu proses penyembuhan. Dilengkapi dengan area konseling, ruang terapi, dan sistem keamanan yang memadai. Ditangani oleh tim psikiater, psikolog, dan perawat jiwa yang berpengalaman.',
                'capacity' => 15,
                'facilities' => ['Tempat tidur terapeutik', 'Area konseling', 'Ruang terapi', 'Taman', 'Sistem keamanan', 'Nurse call'],
                'availability' => 'Tersedia 5 tempat tidur',
                'status' => 'tersedia',
                'classes' => ['Kelas 1', 'Kelas 2'],
            ],
            'manggis' => [
                'name' => 'Ruangan Manggis',
                'slug' => 'manggis',
                'fruit_icon' => 'mangosteen',
                'fruit_color' => '#4B0082',
                'description' => 'Ruangan perawatan jiwa dengan pendekatan holistik dan fasilitas terapi yang lengkap.',
                'long_description' => 'Ruangan Manggis menyediakan perawatan jiwa dengan pendekatan holistik yang menggabungkan terapi medis, psikologis, dan sosial. Setiap pasien mendapatkan rencana perawatan individual yang disusun oleh tim multidisiplin. Fasilitas meliputi ruang terapi individu dan kelompok, area rekreasi, serta taman terapi yang mendukung proses pemulihan secara menyeluruh.',
                'capacity' => 12,
                'facilities' => ['Tempat tidur', 'Ruang terapi individu', 'Ruang terapi kelompok', 'Area rekreasi', 'Taman terapi', 'Sistem keamanan'],
                'availability' => 'Tersedia 3 tempat tidur',
                'status' => 'tersedia',
                'classes' => ['Kelas 1', 'Kelas 2'],
            ],
            'salak' => [
                'name' => 'Ruangan Salak',
                'slug' => 'salak',
                'fruit_icon' => 'salak',
                'fruit_color' => '#D2691E',
                'description' => 'Ruangan perawatan jiwa dengan lingkungan aman dan mendukung untuk terapi intensif.',
                'long_description' => 'Ruangan Salak dirancang untuk pasien yang membutuhkan perawatan jiwa intensif dengan lingkungan yang aman dan terkontrol. Setiap kamar dilengkapi dengan sistem pengamanan khusus tanpa mengorbankan kenyamanan. Program terapi mencakup terapi okupasi, seni, dan musik yang diintegrasikan dengan pengobatan medis untuk hasil yang optimal.',
                'capacity' => 10,
                'facilities' => ['Tempat tidur keamanan', 'Terapi okupasi', 'Terapi seni', 'Area olahraga ringan', 'Sistem keamanan 24 jam', 'Nurse call'],
                'availability' => 'Tersedia 2 tempat tidur',
                'status' => 'tersedia',
                'classes' => ['Kelas 2', 'Kelas 3'],
            ],
            'srikaya' => [
                'name' => 'Ruangan Srikaya',
                'slug' => 'srikaya',
                'fruit_icon' => 'srikaya',
                'fruit_color' => '#228B22',
                'description' => 'Ruangan perawatan jiwa dengan konsep alam terbuka untuk mendukung pemulihan mental secara alami.',
                'long_description' => 'Ruangan Srikaya mengusung konsep terapi alam terbuka dengan taman interior dan pencahayaan alami yang melimpah. Lingkungan yang asri dan tenang membantu menenangkan pikiran pasien dan mempercepat pemulihan. Program perawatan mencakup horticulture therapy, terapi relaksasi, dan konseling individual yang dilakukan oleh tim profesional.',
                'capacity' => 8,
                'facilities' => ['Tempat tidur', 'Taman interior', 'Terapi relaksasi', 'Area meditasi', 'Konseling', 'Sistem keamanan'],
                'availability' => 'Tersedia 4 tempat tidur',
                'status' => 'tersedia',
                'classes' => ['Kelas 1', 'VIP'],
            ],
            'anggur' => [
                'name' => 'Ruangan Anggur',
                'slug' => 'anggur',
                'fruit_icon' => 'grape',
                'fruit_color' => '#6B3FA0',
                'description' => 'Ruangan perawatan jiwa premium dengan fasilitas lengkap dan pendekatan terapi modern.',
                'long_description' => 'Ruangan Anggur merupakan ruang perawatan jiwa premium yang menawarkan fasilitas terbaik untuk pasien. Setiap kamar dilengkapi dengan interior mewah, sistem hiburan, dan area privasi yang luas. Program terapi menggunakan pendekatan modern yang terintegrasi dengan teknologi terkini, termasuk terapi virtual reality, biofeedback, dan konseling digital yang didampingi oleh psikiater konsultan.',
                'capacity' => 6,
                'facilities' => ['Tempat tidur premium', 'TV', 'AC', 'Kamar mandi dalam', 'Area privasi', 'Terapi VR', 'Biofeedback', 'Ruang keluarga'],
                'availability' => 'Tersedia 1 tempat tidur',
                'status' => 'tersedia',
                'classes' => ['VIP', 'VVIP'],
            ],
        ],
    ];

    public function rawatInap()
    {
        return view('frontend.rawat-inap', [
            'nonJiwaRooms' => $this->inpatientRooms['non-jiwa'],
            'jiwaRooms' => $this->inpatientRooms['jiwa'],
        ]);
    }

    public function rawatInapDetail($roomSlug)
    {
        $allRooms = array_merge($this->inpatientRooms['non-jiwa'], $this->inpatientRooms['jiwa']);
        $room = $allRooms[$roomSlug] ?? null;

        if (!$room) {
            abort(404);
        }

        $category = isset($this->inpatientRooms['non-jiwa'][$roomSlug]) ? 'Rawat Inap Non Jiwa' : 'Rawat Inap Jiwa';
        $categorySlug = isset($this->inpatientRooms['non-jiwa'][$roomSlug]) ? 'non-jiwa' : 'jiwa';

        return view('frontend.rawat-inap-detail', [
            'room' => $room,
            'category' => $category,
            'categorySlug' => $categorySlug,
        ]);
    }
}
