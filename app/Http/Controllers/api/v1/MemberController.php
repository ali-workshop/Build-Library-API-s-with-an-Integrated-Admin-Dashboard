<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function addToFavorite(Request $request,$id)
    {
            $book=Book::find($id);
            $book->favorite=$request->favorite;
            $book->save();
            return response()->json($book);
    }

    public function rateBook(Request $request,$id)
    {
        $book=Book::find($id);
        $book->rate_id=$request->rate;
        $book->save();
        return response()->json($book);

    }
}
