<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    // define category variable
    public $categories;

    public function __construct()
    {
        // get all categories
        $this->categories = Category::all();
    }

    /**
     * Display a listing of books.
     */
    public function index()
    {
        // get row per page
        $row = request('row', 10);

        // define params
        $params = request();

        // get all books
        $books = Book::with('category')
                ->filter($params)
                ->latest()
                ->paginate($row);

        // get all categories
        $categories = $this->categories;

        return view('books.index', compact('books', 'categories'));
    }

    /**
     * Show the form for creating a new book.\
     */
    public function create()
    {
        // get all categories
        $categories = $this->categories;

        return view('books.create', compact('categories'));
    }

    /**
     * Save the newly created book into the database.
     */
    public function store(BookRequest $request)
    {
        // validate request
        $attr = $request->validated();

        // check if the uploaded data contains a file
        if ($request->hasFile('image')) {
            // upload image
            $attr['image'] = $this->uploadFile($request);
        }

        // create new book
        Book::create($attr);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    /*
    * Edit the specified book.
    */
    public function edit(Book $book)
    {
        // get all categories
        $categories = $this->categories;

        return view('books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified book in the database.
     */
    public function update(BookRequest $request, Book $book)
    {
        // validate request
        $attr = $request->validated();

        // check if the uploaded data contains a file
        if ($request->hasFile('image')) {
            // delete old image
            $this->deleteFile($book);

            // upload new image
            $attr['image'] = $this->uploadFile($request);
        }

        // update book
        $book->update($attr);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    /**
     * Delete the specified book from the database.
     */
    public function destroy(Book $book)
    {
        // delete image
        $this->deleteFile($book);

        // delete book
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }

    /**
     * Upload File
     */
    private function uploadFile(Request $request)
    {
        // get image 
        $image = $request->file('image');

        // upload image to storage/books
        $imageName = Storage::putFile('books', $image);

        // return image name
        return $imageName;
    }

    /**
     * Delete File
     */
    private function deleteFile($book)
    {
        // delete image
        if($book->image && file_exists(storage_path('app/public/' . $book->image))) {
            Storage::delete($book->image);
        }
    }
}
