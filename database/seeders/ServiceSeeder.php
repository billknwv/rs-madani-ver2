<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::truncate();

        $services = [
            [
                'name' => 'IGD', 'category' => 'Layanan Medis', 'icon' => 'heart',
                'description' => 'Instalasi Gawat Darurat siap melayani pasien 24 jam non-stop dengan tenaga medis profesional dan peralatan lengkap untuk penanganan darurat.',
                'features' => ['Penanganan darurat medis 24 jam', 'Ambulans siap 24 jam', 'Dokter jaga dan perawat siaga'],
                'related_clinics' => null,
                'order' => 1,
            ],
            [
                'name' => 'Rawat Jalan', 'category' => 'Layanan Medis', 'icon' => 'monitor',
                'description' => 'Pelayanan rawat jalan dengan berbagai poli spesialis yang ditangani oleh dokter-dokter berpengalaman di bidangnya masing-masing.',
                'features' => ['Poli Umum & Spesialis', 'Pendaftaran online & offline', 'Jam operasional 07.00 - 21.00'],
                'related_clinics' => ['Klinik Kandungan', 'Klinik Anak', 'Klinik Penyakit Dalam', 'Klinik Bedah', 'Klinik Mata', 'Klinik Penyakit Kulit & Kelamin', 'Klinik Saraf/Neuro', 'Klinik Jiwa', 'Klinik Gigi & Mulut', 'Klinik THT', 'Klinik Jantung & Pembuluh Darah', 'Klinik Tumbuh Kembang'],
                'order' => 2,
            ],
            [
                'name' => 'Rawat Inap', 'category' => 'Layanan Medis', 'icon' => 'bed',
                'description' => 'Fasilitas rawat inap yang nyaman dengan berbagai kelas perawatan, didukung tenaga medis profesional dan peralatan medis modern.',
                'features' => ['Ruang rawat inap kelas 1, 2, 3 & VIP', 'ICU, NICU, & PICU', '249 tempat tidur tersedia'],
                'related_clinics' => null,
                'order' => 3,
            ],
            [
                'name' => 'Radiologi', 'category' => 'Layanan Penunjang', 'icon' => 'shield',
                'description' => 'Pelayanan radiologi dengan peralatan modern untuk menunjang diagnosis penyakit secara akurat dan cepat.',
                'features' => ['Rontgen & USG', 'CT Scan & MRI', 'Mamografi & EKG'],
                'related_clinics' => null,
                'order' => 4,
            ],
            [
                'name' => 'Farmasi', 'category' => 'Layanan Penunjang', 'icon' => 'capsule',
                'description' => 'Apotek rumah sakit yang menyediakan obat-obatan lengkap dengan pelayanan informasi obat oleh apoteker profesional.',
                'features' => ['Obat resep & non-resep lengkap', 'Konsultasi apoteker', 'Layanan obat racik'],
                'related_clinics' => null,
                'order' => 5,
            ],
            [
                'name' => 'Laboratorium', 'category' => 'Layanan Penunjang', 'icon' => 'microscope',
                'description' => 'Laboratorium klinik dengan peralatan otomatis dan akurat untuk berbagai pemeriksaan diagnostik kesehatan.',
                'features' => ['Pemeriksaan darah lengkap', 'Pemeriksaan urine & feses', 'Kimia klinik & mikrobiologi'],
                'related_clinics' => null,
                'order' => 6,
            ],
            [
                'name' => 'TMS', 'category' => 'Layanan Unggulan', 'icon' => 'wave',
                'description' => 'Transcranial Magnetic Stimulation — terapi non-invasif menggunakan medan magnet untuk stimulasi otak dalam penanganan gangguan neurologis dan psikiatri.',
                'features' => ['Terapi non-invasif', 'Stimulasi otak dengan medan magnet', 'Penanganan gangguan neurologis'],
                'related_clinics' => ['Klinik Saraf/Neuro', 'Klinik Jiwa'],
                'order' => 7,
            ],
            [
                'name' => 'Layanan Saraf', 'category' => 'Layanan Unggulan', 'icon' => 'brain',
                'description' => 'Pelayanan neurologi komprehensif untuk diagnosis dan terapi gangguan sistem saraf, termasuk stroke, epilepsi, dan neuropati.',
                'features' => ['Diagnosis gangguan sistem saraf', 'Terapi stroke & epilepsi', 'Penanganan neuropati'],
                'related_clinics' => ['Klinik Saraf/Neuro'],
                'order' => 8,
            ],
            [
                'name' => 'Rehabilitasi Narkoba', 'category' => 'Layanan Unggulan', 'icon' => 'rehab',
                'description' => 'Program rehabilitasi terpadu untuk penyembuhan pecandu narkoba dengan pendekatan medis, psikologis, dan spiritual.',
                'features' => ['Program rehabilitasi terpadu', 'Pendekatan medis & psikologis', 'Pembinaan spiritual'],
                'related_clinics' => ['Klinik Jiwa'],
                'order' => 9,
            ],
            [
                'name' => 'Kesehatan Jiwa Anak & Remaja', 'category' => 'Layanan Unggulan', 'icon' => 'mental',
                'description' => 'Pelayanan kesehatan jiwa khusus untuk anak dan remaja, menangani berbagai masalah psikologis dan gangguan mental.',
                'features' => ['Konsultasi psikologi anak & remaja', 'Terapi gangguan mental', 'Program tumbuh kembang'],
                'related_clinics' => ['Klinik Jiwa', 'Klinik Tumbuh Kembang'],
                'order' => 10,
            ],
        ];

        foreach ($services as $data) {
            $data['slug'] = Str::slug($data['name']);
            Service::create($data);
        }

        $this->command->info('Services seeded successfully!');
    }
}
