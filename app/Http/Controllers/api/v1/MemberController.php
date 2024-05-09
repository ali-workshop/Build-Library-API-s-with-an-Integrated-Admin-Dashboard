<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{

    /**
 * @OA\Put(
 *     path="/api/add/to/favorite/book/{id}",
 *     tags={"Member API'S"},
 *     summary="Add or update favorite status of a book",
 *     description="Add or update the favorite status of a book identified by its ID.",
 *     operationId="addToFavorite",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the book to add or update favorite status",
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         description="Favorite status data",
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 required={"favorite"},
 *                 @OA\Property(
 *                     property="favorite",
 *                     type="boolean",
 *                     example=true
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Favorite status updated successfully.",
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
 *                 property="favorite",
 *                 type="boolean",
 *                 description="Indicates whether the book is a favorite",
 *                 example=true
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Book not found."
 *     )
 * )
 */

    public function addToFavorite(Request $request,$id)
    {
            $book=Book::find($id);
            $book->favorite=$request->favorite;
            $book->save();
            return response()->json($book);
    }

    /**
 * @OA\Put(
 *     path="/api/rate/book/{id}",
 *     tags={"Member API'S"},
 *     summary="Rate a book",
 *     description="Rate a book identified by its ID.",
 *     operationId="rateBook",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the book to rate",
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         description="Rate data",
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 required={"rate"},
 *                 @OA\Property(
 *                     property="rate",
 *                     type="integer",
 *                     example=5
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Book rated successfully.",
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
 *                 property="rate_id",
 *                 type="integer",
 *                 description="ID of the rate associated with the book",
 *                 example=5
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Book not found."
 *     )
 * )
 */

    public function rateBook(Request $request,$id)
    {
        $book=Book::find($id);
        $book->rate_id=$request->rate;
        $book->save();
        return response()->json($book);

    }
}
