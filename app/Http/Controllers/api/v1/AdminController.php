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

    /**
 * @OA\Post(
 *     path="/api/create/category",
 *     tags={"Admin API'S"},
 *     summary="Create a new category",
 *     description="Create a new category with the provided name.",
 *     operationId="createCategory",
 *     @OA\RequestBody(
 *         required=true,
 *         description="Category data",
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 required={"name"},
 *                 @OA\Property(
 *                     property="name",
 *                     type="string",
 *                     example="Fantasy"
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Category created successfully.",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="id",
 *                 type="integer",
 *                 format="int64",
 *                 description="Unique identifier for the category",
 *                 example=1
 *             ),
 *             @OA\Property(
 *                 property="name",
 *                 type="string",
 *                 description="Name of the category",
 *                 example="Fantasy"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error. Invalid input data provided."
 *     )
 * )
 */

    public function creatCeategories(StoreCategoryRequest $request)
    {
             $NewCategory=$request->name;
             $category=Category::create(['name'=>$NewCategory]);
             return response()->json(new CategoryResource ($category), 201);
    }

    /**
 * @OA\Post(
 *     path="/api/create/sub/category",
 *     tags={"Admin API'S"},
 *     summary="Create a new subcategory",
 *     description="Create a new subcategory with the provided name and category ID.",
 *     operationId="createSubcategory",
 *     @OA\RequestBody(
 *         required=true,
 *         description="Subcategory data",
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 required={"name", "category_id"},
 *                 @OA\Property(
 *                     property="name",
 *                     type="string",
 *                     example="Science Fiction"
 *                 ),
 *                 @OA\Property(
 *                     property="category_id",
 *                     type="integer",
 *                     example=1
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Subcategory created successfully.",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="id",
 *                 type="integer",
 *                 format="int64",
 *                 description="Unique identifier for the subcategory",
 *                 example=1
 *             ),
 *             @OA\Property(
 *                 property="name",
 *                 type="string",
 *                 description="Name of the subcategory",
 *                 example="Science Fiction"
 *             ),
 *             @OA\Property(
 *                 property="category_id",
 *                 type="integer",
 *                 description="ID of the parent category",
 *                 example=1
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error. Invalid input data provided."
 *     )
 * )
 */
public function createSubcategories(StoreSubCategoryRequest $request)
    {
        $NewSubCategoryData=['name'=>$request->name,'category_id'=>$request->category_id];
        $subcategory=SubCategory::create($NewSubCategoryData);
        return response()->json(new SubcategoryResource ($subcategory),201);       
    }


    /**
 * @OA\Post(
 *     path="/api/create/book",
 *     tags={"Admin API'S"},
 *     summary="Create a new book",
 *     description="Create a new book with the provided details.",
 *     operationId="storeBook",
 *     @OA\RequestBody(
 *         required=true,
 *         description="Book data",
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 required={"title", "category_name", "subcategory_name", "author_name", "publicationDate", "src", "briefDescription"},
 *                 @OA\Property(
 *                     property="title",
 *                     type="string",
 *                     example="The Hobbit"
 *                 ),
 *                 @OA\Property(
 *                     property="category_name",
 *                     type="string",
 *                     example="Fantasy"
 *                 ),
 *                 @OA\Property(
 *                     property="subcategory_name",
 *                     type="string",
 *                     example="Adventure"
 *                 ),
 *                 @OA\Property(
 *                     property="author_name",
 *                     type="string",
 *                     example="J.R.R. Tolkien"
 *                 ),
 *                 @OA\Property(
 *                     property="biography",
 *                     type="string",
 *                     example="John Ronald Reuel Tolkien was an English writer, poet, philologist, and academic."
 *                 ),
 *                 @OA\Property(
 *                     property="publicationDate",
 *                     type="string",
 *                     format="date",
 *                     example="1937-09-21"
 *                 ),
 *                 @OA\Property(
 *                     property="src",
 *                     type="string",
 *                     example="https://example.com/the-hobbit.jpg"
 *                 ),
 *                 @OA\Property(
 *                     property="briefDescription",
 *                     type="string",
 *                     example="The Hobbit is a fantasy novel by J.R.R. Tolkien."
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Book created successfully.",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="id",
 *                 type="integer",
 *                 format="int64",
 *                 description="Unique identifier for the book",
 *                 example=1
 *             ),
 *             @OA\Property(
 *                 property="title",
 *                 type="string",
 *                 description="Title of the book",
 *                 example="The Hobbit"
 *             ),
 *             @OA\Property(
 *                 property="favorite",
 *                 type="boolean",
 *                 description="Indicates whether the book is a favorite",
 *                 example=false
 *             ),
 *             @OA\Property(
 *                 property="publicationDate",
 *                 type="string",
 *                 format="date",
 *                 description="Publishing date of the book",
 *                 example="1937-09-21"
 *             ),
 *             @OA\Property(
 *                 property="src",
 *                 type="string",
 *                 description="Source URL of the book",
 *                 example="https://example.com/the-hobbit.jpg"
 *             ),
 *             @OA\Property(
 *                 property="briefDescription",
 *                 type="string",
 *                 description="Brief description of the book",
 *                 example="The Hobbit is a fantasy novel by J.R.R. Tolkien."
 *             ),
 *             @OA\Property(
 *                 property="category_id",
 *                 type="integer",
 *                 description="ID of the category associated with the book"
 *             ),
 *             @OA\Property(
 *                 property="sub_category_id",
 *                 type="integer",
 *                 description="ID of the subcategory associated with the book"
 *             ),
 *             @OA\Property(
 *                 property="author_id",
 *                 type="integer",
 *                 description="ID of the author associated with the book"
 *             ),
 *             @OA\Property(
 *                 property="rate_id",
 *                 type="integer",
 *                 description="ID of the rate associated with the book"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error. Invalid input data provided."
 *     )
 * )
 */

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
    return response()->json($book, 201);
}
}
