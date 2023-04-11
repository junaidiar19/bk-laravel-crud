<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = DB::table('articles') // get all data from table articles
                    ->select('articles.id', 'title', 'content', 'categories.name as category_name') // select columns
                    ->join('categories', 'articles.category_id', '=', 'categories.id') // join table categories
                    ->orderBy('articles.id', 'desc') // order by id desc
                    ->get(); // get all data

        return view('articles', compact('articles'));
    }
}
