<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SubCategory;
use PHPUnit\Framework\Exception;

class AddSubCategory extends Component
{
    

    public $sub_cat_name = '';
    public $cat_id =0 ;
    

    
    
    public function saveSubCategory(){
        
                $this->validate([
                    'sub_cat_name' => 'required',
                    'cat_id' => ['required',]#'exists:categori,column'],
                ]);
                try {
                    $new_sub_cat = new SubCategory;
                    $new_sub_cat->name = $this->sub_cat_name;
                    $new_sub_cat->category_id = $this->cat_id;
                    $new_sub_cat->save();
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
        return view('livewire.add-sub-category');
    }
}
