<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
class PostController extends Controller
{
    /**
     * Show the form to create a new blog post.
     */
    public function create()
    {
        return view('posts.create');
    }
 
    /**
     * Store a new blog post.
     */
    public function store(Request $request)
    {
        // Proses Validasi ...
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Return success message...
        return 'Success';
    }
}