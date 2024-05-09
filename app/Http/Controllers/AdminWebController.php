<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\SubcategoryResource;
use App\Http\Requests\StoreSubCategoryRequest;

class AdminWebController extends Controller
{
    
    public function getCategoryName()
    {

        return view('Admin.CreateCategory');

    }


    public function creatCeategories(StoreCategoryRequest $request)
    {
             $NewCategory=$request->catName;
             $category=Category::create(['name'=>$NewCategory]);
             return redirect()->route('home')->with('success','the category created successfuly');
    }

    public function getSubCategoryName()
    {

        return view('Admin.CreateSubCategory');

    }
    
    public function createSubcategories(StoreSubCategoryRequest $request)
    {
        $NewSubCategoryData=['name'=>$request->subCatName,'category_id'=>$request->category_id];
        $subcategory=SubCategory::create($NewSubCategoryData);
        return redirect()->route('home')->with('success','the sub category created successfuly');
    }



    public function createBook()
    {

        return view('Admin.CreateBook');

    }
    public function storeBook(StoreBookRequest $request)    
    
    {

    $category = Category::firstOrCreate(['name' => $request->category_name]);
    // Find or create the subcategory
    $subcategory = SubCategory::firstOrCreate(['name' => $request->subcategory_name], ['category_id' => $category->id]);
    $author = Author::firstOrCreate(['name' => $request->author_name], ['biography' =>$request->biography ]);
    // Create the book and associate it with the category and subcategory
    $book = Book::create([
        'title' => $request->title,
        'favorite' => $request->favorite,
        'publicationDate' => $request->publicationDate,
        'src' => $request->src,
        'briefDescription' => $request->briefDescription,
        'category_id' => $category->id,
        'sub_category_id' => $subcategory->id,
        'author_id'=>$author->id,
        'rate_id'=>1,
    ]);
    return redirect()->route('home')->with('success','the book created successfuly');
    }
    }
