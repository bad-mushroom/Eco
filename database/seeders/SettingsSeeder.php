<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\SettingType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'label'           => 'Posts per page',
            'description'     => 'Total number of posts to show before requiring "next" page links',
            'value'           => 10,
            'default'         => 10,
            'setting_type_id' => $this->lookupSettingType('content')->id,
        ]);
    }

    protected function lookupSettingType(string $slug): ?SettingType
    {
        return SettingType::query()
            ->where('slug', $slug)
            ->first();
    }
}
