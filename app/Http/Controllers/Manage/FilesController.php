<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Services\Settings\Facades\Setting;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Throwable;

class FilesController extends Controller
{
    /**
     * Show all files.
     *
     */
    public function index()
    {
        return View::make('manage.pages.library.index')
            ->with('files', File::paginate());
    }

    public function store()
    {
        $objectName = Str::uuid() . '.' . $this->request->file->getClientOriginalExtension();

        try {
            Storage::disk(Setting::get('storage_disk', 'local'))->put($objectName, file_get_contents($this->request->file));
        } catch(Throwable $e) {
            Log::error($e->getMessage());
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }

        File::create([
            'label'           => $this->request->input('label'),
            'description'     => $this->request->input('description'),
            'size'            => $this->request->file->getSize(),
            'filename'        => $this->request->file->getClientOriginalName(),
            'mime'            => $this->request->file->getMimeType(),
            'object_filename' => $objectName,
            'user_id'         => auth()->user()->id,

        ]);

        return redirect()
            ->back()
            ->with('success', 'The file was uploaded successfully.');
    }

    public function destroy(File $file)
    {
        Storage::disk(Setting::get('storage_disk', 'local'))->delete($file->object_filename);

        $file->delete();

        return redirect()
            ->back()
            ->with('success', 'The file was deleted successfully.');
    }
}
