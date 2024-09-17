<?php

namespace App\Livewire\User;

use App\Models\Address;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AddAddress extends Component
{

   public $fname;
   public $lname;
   public $phone;
   public $email;
   public $company;
   public $country;
   public $line1;
   public $line2;
   public $city;
   public $state;
   public $zip;
   public $make_as;


   public function save(){
      $this->validate([
         'fname' => 'required',
         'lname' => 'required',
         'phone' => 'required',
         'email' => 'required|email',
         'country' => 'required',
         'state' => 'required',
         'city' => 'required',
         'line1' => 'required',
         'zip' => 'required',
      ]);

      sleep(2);

      $address = new Address();
      $address->user_id = Auth::user()->id;
      $address->firstname = $this->fname;
      $address->lastname = $this->lname;
      $address->mobile = $this->phone;
      $address->email = $this->email;
      $address->company = $this->company;
      $address->country = $this->country;
      $address->line1 = $this->line1;
      $address->line2 = $this->line2;
      $address->city = $this->city;
      $address->state = $this->state;
      $address->zipcode = $this->zip;
      $address->make_as = $this->make_as;
      $address->save();

      //get user first address and make it default
      $first_address = Address::where('user_id', Auth::user()->id)->first();
      if($first_address){
         $first_address->update([
            'make_default' => true
         ]);
      }

      return redirect()->route('user.address-book');
      session()->flash('saved', 'Address added successfully!');
   }


   public function render()
   {
      return view('livewire.user.add-address');
   }
}
