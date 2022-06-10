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

        $postsPerPage = Setting::firstOrNew(['slug' => 'posts_per_page']);
        $postsPerPage->label = 'Posts Per Page';
        $postsPerPage->description = 'Total number of posts to show before requiring "next" page links.';
        $postsPerPage->value = 10;
        $postsPerPage->default = 10;
        $postsPerPage->setting_type_id = $this->lookupSettingType('content')->id;
        $postsPerPage->save();


        $title = Setting::firstOrNew(['slug' => 'site_title']);
        $title->label = 'Website Title';
        $title->description = 'The title for your website';
        $title->setting_type_id = $this->lookupSettingType('general')->id;
        $title->save();

        $headline = Setting::firstOrNew(['slug' => 'site_headline']);
        $headline->label = 'Website Headline';
        $headline->description = 'The headline for your website';
        $headline->setting_type_id = $this->lookupSettingType('general')->id;
        $headline->save();


    }

    protected function lookupSettingType(string $slug): ?SettingType
    {
        return SettingType::query()
            ->where('slug', $slug)
            ->first();
    }
}
