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
        $postsPerPage->datatype = 'number';
        $postsPerPage->setting_type_id = $this->lookupSettingType('content')->id;
        $postsPerPage->save();

        $title = Setting::firstOrNew(['slug' => 'site_title']);
        $title->label = 'Website Title';
        $title->value = 'My Website';
        $title->description = 'The title of your website';
        $title->setting_type_id = $this->lookupSettingType('general')->id;
        $title->save();

        $headline = Setting::firstOrNew(['slug' => 'site_headline']);
        $headline->label = 'Website Headline';
        $headline->value = 'Welcome to my new home on the web!';
        $headline->description = 'A headline or tag line for your website';
        $headline->setting_type_id = $this->lookupSettingType('general')->id;
        $headline->save();

        $description = Setting::firstOrNew(['slug' => 'site_Description']);
        $description->label = 'Website Description';
        $description->description = 'A brief description for your website';
        $description->setting_type_id = $this->lookupSettingType('general')->id;
        $description->save();

        $dateFormat = Setting::firstOrNew(['slug' => 'date_format']);
        $dateFormat->label = 'Date Format';
        $dateFormat->value = 'F jS Y';
        $dateFormat->default = 'F jS Y';
        $dateFormat->description = 'The format to use when displaying dates.';
        $dateFormat->setting_type_id = $this->lookupSettingType('general')->id;
        $dateFormat->save();

        $timeFormat = Setting::firstOrNew(['slug' => 'time_format']);
        $timeFormat->label = 'Time Format';
        $timeFormat->value = 'h:i:s a';
        $timeFormat->default = 'h:i:s a';
        $timeFormat->description = 'The format to use when displaying times.';
        $timeFormat->setting_type_id = $this->lookupSettingType('general')->id;
        $timeFormat->save();

        $allowComments = Setting::firstOrNew(['slug' => 'allow_comments']);
        $allowComments->label = 'Allow Comments';
        $allowComments->value = false;
        $allowComments->default = false;
        $allowComments->description = 'Allow comments from visitors';
        $allowComments->setting_type_id = $this->lookupSettingType('comments')->id;
        $allowComments->save();
    }

    protected function lookupSettingType(string $slug): ?SettingType
    {
        return SettingType::query()
            ->where('slug', $slug)
            ->first();
    }
}
