<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\SubcategoryResource;
use App\Http\Requests\StoreSubCategoryRequest;

class AdminController extends Controller
{
    public function creatCeategories(StoreCategoryRequest $request)
    {
             $NewCategory=$request->name;
             $category=Category::create(['name'=>$NewCategory]);
             return response()->json(new CategoryResource ($category), 201);
    }

    public function createSubcategories(StoreSubCategoryRequest $request)
    {
        $NewSubCategoryData=['name'=>$request->name,'category_id'=>$request->category_id];
        $subcategory=SubCategory::create($NewSubCategoryData);
        return response()->json(new SubcategoryResource ($subcategory),201);       
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
        'subcategory_id' => $subcategory->id,
        'author_id'=>$author->id,
        'rate_id'=>1,
    ]);
    return response()->json($book, 201);
}
}
