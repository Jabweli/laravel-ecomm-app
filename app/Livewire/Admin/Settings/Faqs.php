<?php

namespace App\Livewire\Admin\Settings;

use App\Models\Faq;
use Livewire\Component;

class Faqs extends Component
{
  public $faqs;

  // models
  public $qtn;
  public $ans;

  public function mount()
  {
    $this->faqs = Faq::orderBy('id', 'DESC')->get();
  }


  public function render()
  {
    return view('livewire.admin.settings.faqs');
  }


  public function submit()
  {
    $this->validate([
      'qtn' => 'required|string',
      'ans' => 'required|string',
    ]);

    sleep(2);
    Faq::create([
      'question' => $this->qtn,
      'answer' => $this->ans
    ]);
    session()->flash('faqAdded', 'FAQ added successfully');
    $this->mount();
    $this->reset(['qtn', 'ans']);
  }

  public function delete($id)
  {
    $faq = Faq::where('id', $id)->first();

    if ($faq) {
      $faq->delete();

      $this->mount();
      session()->flash('faqdeleted', 'FAQ deleted successfully');
    } else {
      session()->flash('failed', 'Something wrong happened, try again!');
    }
  }


  public $edit_qtn;
  public $edit_ans;
  public $faq_id;
  // fetch faq
  public function fetch($id)
  {
    $faq = Faq::where('id', $id)->first();

    if ($faq) {
      $this->edit_qtn = $faq->question;
      $this->edit_ans = $faq->answer;
      $this->faq_id = $faq->id;
    }
  }

  // update faq
  public function update($id)
  {
    $faq = Faq::where('id', $id)->first();

    if ($faq) {
      $faq->update([
        'question' => $this->edit_qtn,
        'answer' => $this->edit_ans
      ]);

      session()->flash('faqEdited', 'FAQ updated successfully');
      $this->mount();
    }
  }
}
