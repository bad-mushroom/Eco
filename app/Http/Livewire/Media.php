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

        return View::make('livewire.media')
            ->with('media', $query->paginate($this->perPage));
    }

    public function save()
    {
        $objectName = Str::uuid() . '.' . $this->upload->getClientOriginalExtension();

        Medium::create([
            'label'           => $this->label,
            'description'     => $this->description,
            'size'            => $this->upload->getSize(),
            'filename'        => $this->upload->getClientOriginalName(),
            'mime'            => $this->upload->getMimeType(),
            'object_filename' => $objectName,
            'user_id'         => auth()->user()->id,
        ]);

        Storage::disk(Setting::get('storage_disk', 'local'))->put($objectName, file_get_contents($this->upload));

    }

    public function setDeleteId($id)
    {
        $this->confirmId = $id;
    }

    public function delete()
    {
        Medium::destroy($this->confirmId);
    }

}
