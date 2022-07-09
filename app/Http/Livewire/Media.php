<?php

namespace App\Http\Livewire;

use App\Models\Media as Medium;
use App\Services\Settings\Facades\Setting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Media extends Component
{
    use WithPagination;
    use WithFileUploads;

    public string $status;
    public string $perPage;
    public string $sort;
    public string $confirmId;

    public $upload;
    public $label;
    public $description;

    public $success;
    public $error;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->confirmId = '';
        $this->status = '';
        $this->sort = '';
        $this->perPage = '15';
    }

    public function render()
    {
        $query = Medium::query()
            ->when($this->sort, function ($query) {
                if (str_contains($this->sort, '_desc')) {
                    $sort = str_replace('_desc', '', $this->sort);
                    return $query->orderByDesc($sort);
                } else {
                    return $query->orderBy($this->sort);
                }
            });

        return View::make('manage.livewire.media')
            ->with('media', $query->paginate($this->perPage));
    }

    public function save()
    {
        $objectName = Str::uuid() . '.' . $this->upload->extension();
        $result = $this->upload->storeAs('uploads', $objectName);

        if ($result) {
            Medium::create([
                'label'           => $this->label,
                'description'     => $this->description,
                'size'            => $this->upload->getSize(),
                'filename'        => $this->upload->getClientOriginalName(),
                'mime'            => $this->upload->getMimeType(),
                'object_filename' => $objectName,
                'user_id'         => auth()->user()->id,
            ]);

            $this->success = $this->upload->getClientOriginalName() . ' has been uploaded successfully';
        } else {
            $this->error = 'Something went wrong with your upload. Please try again.';
        }

        $this->clearUpload();
        return;
    }

    public function clearUpload()
    {
        $this->upload = null;
        $this->label = null;
        $this->description = null;
        $this->success = null;
        $this->error = null;
    }

    public function setDeleteId($id)
    {
        $this->confirmId = $id;
    }

    public function delete()
    {
        $file = Medium::find($this->confirmId);

        if ($file) {
            Storage::disk('local')->delete('uploads/' . $file->object_filename);
            $file->destroy($this->confirmId);
        }
    }

}
