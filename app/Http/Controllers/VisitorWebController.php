<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class VisitorWebController extends Controller
{
    
    public function index()
    {   #laod two realtions instead of one realtion 
        // and also i figure way to child relationship using the dot notation  like this(category.subcategory)
        $books=Book::with(['category','subcategories'])->get();
        // dd($books);
        return view('Visitor.index',['books'=>$books]);
    }

    public function getCategoryFiler()
    {
       return view('Visitor.categoryFilter');
    }
    public function CategoryFiler(Request $request)
    { 
        
        $categoryName = $request->cat; 
        $books = Book::whereHas('category', function ($query) use ($categoryName) {
            $query->where('name', 'like', '%'. $categoryName. '%');
        })->get();
        return view('Visitor.index',['books'=>$books]);
    }
    public function getsubCategoryFiler()
    {
        return view('Visitor.subCategoryFilter');
    }
    public function subCategoryFiler(Request $request )
    {
         $subcategoryName = $request->input('subcat'); 
        $books = Book::whereHas('subcategories', function ($query) use ($subcategoryName) {
            $query->where('name', 'like', '%'.$subcategoryName.'%');
                })->get();
        return view('Visitor.index',['books'=>$books]);
    }
    
}
