<?php

namespace App\Livewire\User;

use App\Models\Address;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AddressBook extends Component
{
   public function render()
   {
      return view('livewire.user.address-book');
   }


   public function delete($id){
      $address = Address::where('id', $id)->where('user_id', Auth::user()->id)->first();
      if($address){
         if($address->make_default == true){
            $second_address = Address::where('user_id', Auth::user()->id)
            ->where('id', '!=', $address->id)->first();

            $second_address->update([
               'make_default' => true
            ]);
         }

         $address->delete();
         session()->flash('deleted', 'Address deleted successfully!');
      }
   }

   public function setDefault($id)
   {
      $current_default = Address::where('user_id', Auth::user()->id)->where('make_default', true)->first();

      if($current_default){
         $current_default->make_default = false;
         $current_default->save();
      }

      $address = Address::where('id', $id)->where('user_id', Auth::user()->id)->first();
      if($address){
         $address->make_default = true;
         $address->save();

         session()->flash('default', 'Address has been set as default !');
      }
   }
}
