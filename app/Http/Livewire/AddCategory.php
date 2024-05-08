<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use PHPUnit\Event\Exception;

class AddCategory extends Component
{    public $cat_name = '';

    public function saveCategory(){
        
                $this->validate([
                    'cat_name' => 'required',
                ]);
                try {
                    $new_cat = new Category;
                    $new_cat->name = $this->cat_name;
                    $new_cat->save();
                    // ,navigate:true for the SPA 
                    return $this->redirect('/'); 
                    // add the last parameter it's important for not reloading the whole page..
                    // and give us the way to achieve the SPA..
                } catch (Exception $e) {
                    dd($e) ;
                }
    
    
    
    
            }
    
  
    
    public function render()
    {
        return view('livewire.add-category');
    }
}
