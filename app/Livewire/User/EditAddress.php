<?php

namespace App\Livewire\User;

use App\Models\Address;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class EditAddress extends Component
{
   public function render()
   {
      return view('livewire.user.edit-address')->extends('layouts.user');
   }

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
   public $address_id;

   public function mount($id){
      $address = Address::where('id', $id)->where('user_id', Auth::user()->id)->first();

      if($address){
         $this->address_id = $address->id;
         $this->fname = $address->firstname;
         $this->lname = $address->lastname;
         $this->phone = $address->mobile;
         $this->email = $address->email;
         $this->company = $address->company;
         $this->country = $address->country;
         $this->line1 = $address->line1;
         $this->line2 = $address->line2;
         $this->city = $address->city;
         $this->state = $address->state;
         $this->zip = $address->zipcode;
         $this->make_as = $address->make_as;
      }
   }

   public function update($id)
   {
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

      $address = Address::where('id', $id)->where('user_id', Auth::user()->id)->first();

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

      session()->flash('updated', 'Address updated successfully!');
      return redirect()->route('user.address-book');
   }
}
