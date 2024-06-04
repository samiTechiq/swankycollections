<?php

namespace App\Livewire;

use Livewire\WithFileUploads;
use App\Models\Gallery;
use App\Traits\DeleteFileTrait;
use App\Traits\ProductImageHandler;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class GalleryComponent extends Component
{
    use LivewireAlert;
    use ProductImageHandler;
    use DeleteFileTrait;
    use WithFileUploads;
    public $id;
    public $product_id;
    public $image;
    public $status;
    public $editID;
    public $oldImage;
    public $editStatus;


    public function mount(){
        $this->product_id = $this->id;
    }

    public function hideModal()
    {
        $this->dispatch('closeGalleryModal');
    }

    private function openEditModal(){
        $this->dispatch('openGalleryEditModal');
    }

    private function closeEditModal(){
        $this->dispatch('closeGalleryEditModal');
    }

    public function save(){
        $data = $this->validate([
            'product_id' => 'required|integer',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif|max:3000',
            'status' => 'required|integer|max:1'
        ]);

        Gallery::create([
            'product_id' => $data['product_id'],
            'image' => $this->handle($data['image']),
            'status' => $data['status']
        ]);

        $this->hideModal();
        $this->alert('success', 'Image saved successfully!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        $this->reset('image', 'status');

    }

    // edit data
    public function edit($id){
        $image = Gallery::findOrFail($id);
        $this->editID = $image->id;
        $this->oldImage  = $image->image;
        $this->editStatus = $image->status;
        $this->openEditModal();
    }

    // update data
    public function update(){
      $this->validate([
            'image' => 'image|mimes:png,jpg,jpeg,webp,gif',
            'editStatus' => 'required',
        ]);

        $image = $this->oldImage;

        if(!empty($this->image)){
            $image = $this->handle($this->image);
        }

        $editImage = Gallery::findOrFail($this->editID)->update([
            'image' => $image,
            'status' => $this->editStatus,
        ]);

        if( $editImage){
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
       $image = Gallery::findOrFail($id);
       if(!empty($image->image) && file_exists(public_path($image->image))){
        unlink(public_path($image->image));
       }
       $image->delete();
       if( $image){
            $this->alert('success', 'Deleted successfully!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }else{
            $this->alert('error', 'fail to Delete!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }
    }

    public function render()
    {
        $images = Gallery::where('product_id', $this->id)->get();
        return view('livewire.gallery-component', compact('images'));
    }
}
