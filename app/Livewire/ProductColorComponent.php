<?php

namespace App\Livewire;

use App\Models\ProductColor;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class ProductColorComponent extends Component
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
        $this->dispatch('closeAddModal');
    }

    private function openEditModal(){
        $this->dispatch('openColorEditModal');
    }

    private function closeEditModal(){
        $this->dispatch('closeColorEditModal');
    }

    public function save(){
        $data = $this->validate([
            'product_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'status' => 'required|integer|max:1'
        ]);

        ProductColor::create($data);
        $this->hideModal();
        $this->alert('success', 'Product color saved successfully!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        $this->reset('name', 'status');

    }

    // edit data
    public function edit($id){
        $size = ProductColor::findOrFail($id);
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

        $size = ProductColor::findOrFail($this->editID)->update([
            'name' => $this->editName,
            'status' => $this->editStatus,
        ]);

        if($size){
            $this->alert('success', 'Product Color updated successfully!', [
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
        ProductColor::findOrFail($id)->delete();
    }
    public function render()
    {
        $colors = ProductColor::where('product_id', $this->id)->get();
        return view('livewire.product-color-component', compact('colors') );
    }
}
