<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;

class AddSubCategory extends Component
{
    public $name;
    public $categories;
    
    public $category_id; 

    protected $rules = [
        'name' => 'required',
        'category_id' => 'required|exists:categories,id', 
    ];

    public function addSubCategory()
    {
        // Validate input data
        $validatedData = $this->validate();

        // Create the sub-category using the provided data
        SubCategory::create($validatedData);
    }

    public function render()
    { $this->categories = Category::all();
        return view('livewire.add-sub-category');
    }
}
