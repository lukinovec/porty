<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CustomizeProject extends Component
{
    public $project;
    public $updatable;

    protected $listeners = ['upload-image' => 'storeImage'];

    public function mount($project)
    {
        $this->project = $project;
        $this->updatable = $project;
    }

    public function updatedUpdatable()
    {
        $this->emit('projectUpdated', $this->updatable);
    }

    public function removeImage($picture_to_remove)
    {
        $this->updatable['pictures'] = collect($this->updatable['pictures'])->reject(function ($picture) use ($picture_to_remove) {
            return $picture['download_url'] == $picture_to_remove;
        })->toArray();
        $this->emit('projectUpdated', $this->updatable);
    }

    public function resetImages()
    {
        $this->updatable['pictures'] = $this->project['pictures'];
        $this->emit('projectUpdated', $this->updatable);
    }

    public function uploadImage()
    {
        $this->dispatchBrowserEvent('swal:upload-image', [
            'name' => $this->project['name'],
            'owner' => $this->project['owner']['login']
        ]);
    }

    public function storeImage($upload)
    {
        if ($this->project['owner']['login'] == $upload['owner'] && $this->project['name'] == $upload['name']) {
            $this->updatable['pictures'][] = [
                'download_url' => $upload['url'],
            ];
            $this->emit('projectUpdated', $this->updatable);
        }
    }

    public function render()
    {
        return view('livewire.customize-project');
    }
}
