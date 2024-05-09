<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category; // Import the Category model if not already imported

class AddCategory extends Component
{
    public $catName;

    public function AddCategory()
    {
        // Create the category using the provided name
        Category::create(['name' => $this->catName]);

        // Clear the input field after submission
        $this->catName = '';
    }

    public function render()
    {
        return view('livewire.add-category');
    }
}
