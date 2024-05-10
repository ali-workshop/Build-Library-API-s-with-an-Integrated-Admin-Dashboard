<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category; 

class AddCategory extends Component
{
    public $name;
    protected $rules=[
        'name'=>'required'
    ];
    public function addCategory()
    {
        // Create the category using the provided name
        
        $validateData=$this->validate();
        Category::create($validateData);

      
    }
// test
    public function render()
    {
        return view('livewire.add-category');
    }
}
