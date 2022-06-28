<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Story;
use App\Services\Settings\Facades\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class FilesController extends Controller
{
    public function download(Request $request, File $file)
    {
        return Storage::disk(Setting::get('storage_disk', 'local'))->download($file->object_filename);
    }
}
