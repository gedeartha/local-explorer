<?php

namespace Database\Seeders;

use App\Models\Documents;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Documents::truncate();

        $datas = [
            [
                'document' => 'HR SECTION',
                'password' => 'HR SECTION',
                'total_folders' => 0,
                'total_files' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'document' => 'IT SECTION',
                'password' => 'IT SECTION',
                'total_folders' => 3,
                'total_files' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'document' => 'FINANCE',
                'password' => 'FINANCE',
                'total_folders' => 0,
                'total_files' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'document' => 'GA SECTION',
                'password' => 'GA SECTION',
                'total_folders' => 0,
                'total_files' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'document' => 'EXM & PURCHASE',
                'password' => 'EXM & PURCHASE',
                'total_folders' => 0,
                'total_files' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'document' => 'SHE SECTION',
                'password' => 'SHE SECTION',
                'total_folders' => 0,
                'total_files' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'document' => 'PRODUCTION SECTION',
                'password' => 'PRODUCTION SECTION',
                'total_folders' => 0,
                'total_files' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'document' => 'MAINTENANCE',
                'password' => 'MAINTENANCE',
                'total_folders' => 0,
                'total_files' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'document' => 'QC SECTION',
                'password' => 'QC SECTION',
                'total_folders' => 0,
                'total_files' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        
        Documents::insert($datas);
    }
}
