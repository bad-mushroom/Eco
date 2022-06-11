<?php

namespace Database\Seeders;

use App\Models\SettingType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = SettingType::firstOrNew(['slug' => 'content']);
        $content->label = 'Content';
        $content->description = 'Settings relating to content writing and reading.';
        $content->save();

        $general = SettingType::firstOrNew(['slug' => 'general']);
        $general->label = 'General';
        $general->description = 'General website settings';
        $general->save();
    }
}
