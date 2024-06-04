<?php

namespace App\Livewire;

use App\Models\ProductSize;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class SizeComponent extends Component
{
    use LivewireAlert;
    public $id;
    public $product_id;
    public $name;
    public $status;
    public $editID;
    public $editName;
    public $editStatus;

    public function mount(){
        $this->product_id = $this->id;
    }

    public function hideModal()
    {
        $this->dispatch('closeModal');
    }

    private function openEditModal(){
        $this->dispatch('openSizeEditModal');
    }

    private function closeEditModal(){
        $this->dispatch('closeSizeEditModal');
    }

    public function save(){
        $data = $this->validate([
            'product_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'status' => 'required|integer|max:1'
        ]);

        ProductSize::create($data);
        $this->hideModal();
        $this->alert('success', 'Size saved successfully!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        $this->reset('name', 'status');

    }

    // edit data
    public function edit($id){
        $size = ProductSize::findOrFail($id);
        $this->editID = $size->id;
        $this->editName = $size->name;
        $this->editStatus = $size->status;
        $this->openEditModal();
    }

    // update data
    public function update(){
      $this->validate([
            'editName' => 'required',
            'editStatus' => 'required',
        ]);

        $size = ProductSize::findOrFail($this->editID)->update([
            'name' => $this->editName,
            'status' => $this->editStatus,
        ]);

        if($size){
            $this->alert('success', 'Size updated successfully!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }else{
            $this->alert('error', 'fail to update!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }
        $this->closeEditModal();
    }

    public function delete($id){
        ProductSize::findOrFail($id)->delete();
    }

    // render the component
    public function render()
    {
        $sizes = ProductSize::where('product_id', $this->id)->get();
        return view('livewire.size-component', ['sizes' => $sizes, ]);
    }
}
