<?php

namespace Database\Seeders;

use App\Models\Folder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Folder::truncate();

        $datas = [
            [
                'document_id' => '2',
                'document_name' => 'IT SECTION',
                'folder_name' => 'SUPPORT DRIVER',
                'total_files' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'document_id' => '2',
                'document_name' => 'IT SECTION',
                'folder_name' => 'DAILY ACTIVITY',
                'total_files' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'document_id' => '2',
                'document_name' => 'IT SECTION',
                'folder_name' => 'SOFTWARE',
                'total_files' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        
        Folder::insert($datas);
    }
}
