<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\Author;
use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use PHPUnit\Framework\Exception;

class StoreBook extends Component
{

    public $title = '';
    public $favorite = false;
    public $publicationDate ='';
    public $src = '';

    public $briefDescription = '';
    public $category_name = '';
    public $subcategory_name = '';
    public $author_name = '';
    public $biography = '';

public function createBook(){


    $this->validate([
        'title' => 'required',
        'favorite' => 'required',
        'publicationDate' => 'required',
        'src' => 'required',
        'briefDescription' => 'required',
        'category_name' => 'required',
        'subcategory_name' => 'required',
        'author_name' => 'required',
        'biography' => 'required',
    ]);
    $category = Category::firstOrCreate(['name' => $this->category_name]);
    $subcategory = SubCategory::firstOrCreate(['name' => $this->subcategory_name], ['category_id' => $category->id]);
    $author = Author::firstOrCreate(['name' => $this->author_name], ['biography' =>$this->biography ]);
    
    try{
        $book=new Book;
        $book->title=$this->title;
        $book->favorite=$this->favorite;
        $book->publicationDate=$this->publicationDate;
        $book->src=$this->src;
        $book->briefDescription=$this->briefDescription;
        $book->category_id=$category->id;
        $book->subcategory_id=$subcategory->id;
        $book->author_id=$author->id;
        $book->rate_id=1;
        $book->save();

        // ,navigate:true
        return $this->redirect('/');

    } catch (Exception $e) {
        dd($e) ;
    }
    
}

    public function render()
    {
        return view('livewire.store-book');
    }
}
