<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;

class VisitorController extends Controller
{
/**
 * @OA\Get(
 *     path="/api/all/books",
 *     tags={"Visitors API'S"},
 *     summary="Get all books",
 *     description="Retrieve a list of all books",
 *     operationId="index",
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Invalid status value",
 *     )
 * )
 */

   public function index() {
    $books=Book::with('category','subcategories')->get();
    return response()->json(BookResource::collection($books),$status=200);


   }
/**
 * @OA\Get(
 *     path="/api/filter/category",
 *     tags={"Visitors API'S"},
 *     summary="Filter books by category",
 *     description="Filter books based on a provided category name.",
 *     operationId="CategoryFilter",
 *     @OA\Parameter(
 *         name="catName",
 *         in="query",
 *         required=true,
 *         description="Category name to filter books by.",
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation. Returns books filtered by the specified category.",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/Book")
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Bad request. Invalid input data provided."
 *     )
 * )
 * 
 * @OA\Schema(
 *     schema="Book",
 *     title="Book",
 *     description="Book object",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         format="int64",
 *         description="Unique identifier for the book",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="title",
 *         type="string",
 *         description="Title of the book",
 *         example="The Hobbit"
 *     ),
 *     @OA\Property(
 *         property="author",
 *         type="string",
 *         description="Author of the book",
 *         example="J.R.R. Tolkien"
 *     ),
 *     @OA\Property(
 *         property="category",
 *         type="string",
 *         description="Category of the book",
 *         example="Fantasy"
 *     ),
 *     @OA\Property(
 *         property="published_at",
 *         type="string",
 *         format="date",
 *         description="Publishing date of the book",
 *         example="1937-09-21"
 *     )
 * )
 */


   public function CategoryFiler(Request $request)
   { 
       // dd($request->all());
       $categoryName = $request->catName; 
       $books = Book::whereHas('category', function ($query) use ($categoryName) {
           $query->where('name', 'like', '%'. $categoryName. '%');
       })->get();
       return response()->json(BookResource::collection($books),200);
   }

/**
 * @OA\Get(
 *     path="/api/filter/sub/category",
 *     tags={"Visitors API'S"},
 *     summary="Filter books by subcategory",
 *     description="Filter books based on a provided subcategory name.",
 *     operationId="subCategoryFilter",
 *     @OA\Parameter(
 *         name="subcatName",
 *         in="query",
 *         required=true,
 *         description="Subcategory name to filter books by.",
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation. Returns books filtered by the specified subcategory.",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/Book")
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Bad request. Invalid input data provided."
 *     )
 * )
 */


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
