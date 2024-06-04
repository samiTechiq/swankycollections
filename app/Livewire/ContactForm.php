<?php

namespace App\Livewire;

use App\Mail\ContactFormMail;
use App\Models\AppSetting;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ContactForm extends Component
{
    use LivewireAlert;
    #[Validate('required|string|max:100')]
    public $name;
    #[Validate('required|email|max:121')]
    public $email;
    #[Validate('required|string|max:100')]
    public $subject;
    #[Validate('required|string|max:20')]
    public $phone;
    #[Validate('required|string|max:500')]
    public $message;

    public function save()
    {
       $contact = $this->validate();
       $message = Contact::create($contact);
       $setting = AppSetting::first();
       Mail::to($setting->email)->send(new ContactFormMail($message));
       $this->reset('name', 'email', 'subject', 'phone', 'message');
       $this->alert('success', 'Message sent successfully, We would get in touch with you shortly Thanks!.', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
