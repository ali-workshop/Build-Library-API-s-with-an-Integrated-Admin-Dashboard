<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;

class VisitorController extends Controller
{
   public function index() {
    $books=Book::with('category','subcategories')->get();
    return response()->json(BookResource::collection($books),$status=200);


   }
   public function CategoryFiler(Request $request)
   { 
       // dd($request->all());
       $categoryName = $request->catName; 
       $books = Book::whereHas('category', function ($query) use ($categoryName) {
           $query->where('name', 'like', '%'. $categoryName. '%');
       })->get();
       return response()->json(BookResource::collection($books),200);
   }

   public function subCategoryFiler(Request $request )
   {
       $subcategoryName = $request->input('subcatName'); 
// dd( $subcategoryName);
   $books = Book::whereHas('subcategories', function ($query) use ($subcategoryName) {
       $query->where('name', 'like', '%'.$subcategoryName.'%');
   })->get();
   return response()->json(BookResource::collection($books),200);
     }
        }
