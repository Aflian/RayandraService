<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->seedUsers();
        $this->seedServices();
        $this->seedWorkspaces();
        $this->seedCms();
    }

    private function seedUsers(): void
    {
        User::factory()->superAdmin()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@rayandra.id',
        ]);

        User::factory()->admin()->create([
            'name' => 'Admin',
            'email' => 'admin@rayandra.id',
        ]);

        User::factory()->workspace()->create([
            'name' => 'Workspace User',
            'email' => 'workspace@rayandra.id',
        ]);

        User::factory()->customerDigital()->create([
            'name' => 'Customer',
            'email' => 'customer@rayandra.id',
        ]);

        User::factory()->customerInvitation()->create([
            'name' => 'Invitation Customer',
            'email' => 'invitation@rayandra.id',
        ]);
    }

    private function seedServices(): void
    {
        $services = [
            [
                'name' => 'Undangan Digital',
                'slug' => 'undangan-digital',
                'icon' => 'heroicon-o-envelope',
                'categories' => [
                    ['name' => 'Pernikahan', 'slug' => 'pernikahan'],
                    ['name' => 'Lamaran', 'slug' => 'lamaran'],
                    ['name' => 'Tunangan', 'slug' => 'tunangan'],
                    ['name' => 'Aqiqah', 'slug' => 'aqiqah'],
                    ['name' => 'Khitanan', 'slug' => 'khitanan'],
                    ['name' => 'Ulang Tahun', 'slug' => 'ulang-tahun'],
                    ['name' => 'Wisuda', 'slug' => 'wisuda'],
                    ['name' => 'Seminar', 'slug' => 'seminar'],
                    ['name' => 'Workshop', 'slug' => 'workshop'],
                    ['name' => 'Webinar', 'slug' => 'webinar'],
                    ['name' => 'Gathering', 'slug' => 'gathering'],
                    ['name' => 'Reuni', 'slug' => 'reuni'],
                    ['name' => 'Anniversary', 'slug' => 'anniversary'],
                    ['name' => 'Corporate Event', 'slug' => 'corporate-event'],
                    ['name' => 'Grand Opening', 'slug' => 'grand-opening'],
                    ['name' => 'Custom', 'slug' => 'custom'],
                ],
            ],
            [
                'name' => 'Pendampingan Akademik',
                'slug' => 'pendampingan-akademik',
                'icon' => 'heroicon-o-academic-cap',
                'categories' => [
                    ['name' => 'Skripsi & Tugas Akhir', 'slug' => 'skripsi-tugas-akhir', 'children' => [
                        ['name' => 'Konsultasi', 'slug' => 'konsultasi'],
                        ['name' => 'Pendampingan Proposal', 'slug' => 'pendampingan-proposal'],
                        ['name' => 'Bab I', 'slug' => 'bab-i'],
                        ['name' => 'Bab II', 'slug' => 'bab-ii'],
                        ['name' => 'Bab III', 'slug' => 'bab-iii'],
                        ['name' => 'Revisi', 'slug' => 'revisi-skripsi'],
                        ['name' => 'Editing', 'slug' => 'editing-skripsi'],
                        ['name' => 'Format', 'slug' => 'format'],
                        ['name' => 'Parafrase', 'slug' => 'parafrase'],
                        ['name' => 'Daftar Pustaka', 'slug' => 'daftar-pustaka'],
                        ['name' => 'Sitasi', 'slug' => 'sitasi'],
                    ]],
                    ['name' => 'Jurnal', 'slug' => 'jurnal', 'children' => [
                        ['name' => 'Editing Jurnal', 'slug' => 'editing-jurnal'],
                        ['name' => 'Pendampingan Penulisan', 'slug' => 'pendampingan-penulisan'],
                        ['name' => 'Submission', 'slug' => 'submission'],
                    ]],
                    ['name' => 'Analisis Data', 'slug' => 'analisis-data', 'children' => [
                        ['name' => 'SPSS', 'slug' => 'spss'],
                        ['name' => 'Python', 'slug' => 'python'],
                        ['name' => 'R', 'slug' => 'r'],
                        ['name' => 'RapidMiner', 'slug' => 'rapidminer'],
                        ['name' => 'Machine Learning', 'slug' => 'ml-akademik'],
                        ['name' => 'Data Mining', 'slug' => 'data-mining'],
                        ['name' => 'GIS', 'slug' => 'gis'],
                    ]],
                ],
            ],
            [
                'name' => 'Jasa Pemrograman',
                'slug' => 'jasa-pemrograman',
                'icon' => 'heroicon-o-code-bracket',
                'categories' => [
                    ['name' => 'Website', 'slug' => 'website', 'children' => [
                        ['name' => 'Company Profile', 'slug' => 'company-profile'],
                        ['name' => 'Landing Page', 'slug' => 'landing-page'],
                        ['name' => 'E-Commerce', 'slug' => 'e-commerce'],
                        ['name' => 'Sistem Informasi', 'slug' => 'sistem-informasi'],
                        ['name' => 'Website Sekolah', 'slug' => 'website-sekolah'],
                        ['name' => 'Website Kampus', 'slug' => 'website-kampus'],
                        ['name' => 'Website Organisasi', 'slug' => 'website-organisasi'],
                        ['name' => 'Portal Berita', 'slug' => 'portal-berita'],
                        ['name' => 'Dashboard Admin', 'slug' => 'dashboard-admin'],
                    ]],
                    ['name' => 'Framework', 'slug' => 'framework', 'children' => [
                        ['name' => 'Laravel', 'slug' => 'laravel'],
                        ['name' => 'CodeIgniter', 'slug' => 'codeigniter'],
                        ['name' => 'PHP Native', 'slug' => 'php-native'],
                    ]],
                    ['name' => 'API', 'slug' => 'api', 'children' => [
                        ['name' => 'REST API', 'slug' => 'rest-api'],
                    ]],
                ],
            ],
            [
                'name' => 'Desain Grafis',
                'slug' => 'desain-grafis',
                'icon' => 'heroicon-o-paint-brush',
                'categories' => [
                    ['name' => 'Branding', 'slug' => 'branding', 'children' => [
                        ['name' => 'Logo', 'slug' => 'logo'],
                        ['name' => 'Brand Identity', 'slug' => 'brand-identity'],
                        ['name' => 'Company Profile', 'slug' => 'desain-company-profile'],
                    ]],
                    ['name' => 'Promosi', 'slug' => 'promosi', 'children' => [
                        ['name' => 'Poster', 'slug' => 'poster'],
                        ['name' => 'Banner', 'slug' => 'banner'],
                        ['name' => 'Brosur', 'slug' => 'brosur'],
                        ['name' => 'Flyer', 'slug' => 'flyer'],
                        ['name' => 'Spanduk', 'slug' => 'spanduk'],
                        ['name' => 'X-Banner', 'slug' => 'x-banner'],
                    ]],
                    ['name' => 'Dokumen', 'slug' => 'dokumen', 'children' => [
                        ['name' => 'CV ATS', 'slug' => 'cv-ats'],
                        ['name' => 'Resume', 'slug' => 'resume'],
                        ['name' => 'Portofolio', 'slug' => 'portofolio-desain'],
                        ['name' => 'Presentasi', 'slug' => 'presentasi'],
                    ]],
                ],
            ],
            [
                'name' => 'AI & Machine Learning',
                'slug' => 'ai-machine-learning',
                'icon' => 'heroicon-o-cpu-chip',
                'categories' => [
                    ['name' => 'Artificial Intelligence', 'slug' => 'ai', 'children' => [
                        ['name' => 'Chatbot', 'slug' => 'chatbot'],
                        ['name' => 'NLP', 'slug' => 'nlp'],
                        ['name' => 'Face Recognition', 'slug' => 'face-recognition'],
                        ['name' => 'Recommendation System', 'slug' => 'recommendation-system'],
                    ]],
                    ['name' => 'Machine Learning', 'slug' => 'machine-learning', 'children' => [
                        ['name' => 'Prediksi', 'slug' => 'prediksi'],
                        ['name' => 'Klasifikasi', 'slug' => 'klasifikasi'],
                        ['name' => 'Clustering', 'slug' => 'clustering'],
                        ['name' => 'Forecasting', 'slug' => 'forecasting'],
                        ['name' => 'Sentiment Analysis', 'slug' => 'sentiment-analysis'],
                        ['name' => 'Computer Vision', 'slug' => 'computer-vision'],
                        ['name' => 'Image Classification', 'slug' => 'image-classification'],
                    ]],
                ],
            ],
            [
                'name' => 'Website & Hosting',
                'slug' => 'website-hosting',
                'icon' => 'heroicon-o-globe-alt',
                'categories' => [
                    ['name' => 'Hosting', 'slug' => 'hosting', 'children' => [
                        ['name' => 'Domain + Hosting', 'slug' => 'domain-hosting'],
                        ['name' => 'Shared Hosting', 'slug' => 'shared-hosting'],
                        ['name' => 'Cloud Hosting', 'slug' => 'cloud-hosting'],
                    ]],
                    ['name' => 'Deployment', 'slug' => 'deployment', 'children' => [
                        ['name' => 'Deploy Website', 'slug' => 'deploy-website'],
                        ['name' => 'Deploy Laravel', 'slug' => 'deploy-laravel'],
                    ]],
                    ['name' => 'Optimization', 'slug' => 'optimization', 'children' => [
                        ['name' => 'Website Speed Optimization', 'slug' => 'speed-optimization'],
                        ['name' => 'SEO', 'slug' => 'seo'],
                    ]],
                ],
            ],
        ];

        $sort = 0;

        foreach ($services as $serviceData) {
            $service = Service::create([
                'name' => $serviceData['name'],
                'slug' => $serviceData['slug'],
                'icon' => $serviceData['icon'],
                'sort_order' => $sort++,
            ]);

            $catSort = 0;

            foreach ($serviceData['categories'] as $catData) {
                $category = $service->categories()->create([
                    'name' => $catData['name'],
                    'slug' => $catData['slug'],
                    'sort_order' => $catSort++,
                ]);

                if (! empty($catData['children'])) {
                    $childSort = 0;

                    foreach ($catData['children'] as $childData) {
                        $category->children()->create([
                            'service_id' => $service->id,
                            'name' => $childData['name'],
                            'slug' => $childData['slug'],
                            'sort_order' => $childSort++,
                        ]);
                    }
                }
            }
        }
    }

    private function seedWorkspaces(): void
    {
        $workspace = Workspace::create(['name' => 'Tim Development']);

        $workspace->users()->attach(
            User::where('email', 'workspace@rayandra.id')->first(),
            ['role_in_workspace' => 'lead']
        );
    }

    private function seedCms(): void
    {
        $admin = User::where('email', 'admin@rayandra.id')->first();

        Blog::factory()->count(3)->create(['author_id' => $admin->id, 'is_published' => true]);
        Portfolio::factory()->count(5)->create(['is_published' => true]);
        Faq::factory()->count(5)->create();
    }
}
