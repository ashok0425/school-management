<?php

namespace App\Http\Controllers\School;

use App\Models\Books;
use App\Models\Categories;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BooksController extends Controller
{
    /**
     * @return Factory|Application|View
     */
    public function index()
    {
        $books = Books::with('category')->where('school_id', Auth::guard('school')->user()->id)->latest()->get();
        $categories = Categories::where('school_id', Auth::guard('school')->user()->id)->latest()->get();
        return view('admin.school.books.index', compact('books', 'categories'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->getValidate($request);
        Books::create([
            'category_id' => request('category_id'),
            'book_title' => request('book_title'),
            'book_author' => request('book_author'),
            'book_isbn' => request('book_isbn'),
            'school_id' => Auth::guard('school')->user()->id
        ]);
        $notification = array(
            'message' => 'Created Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * @param Books $books
     * @return mixed
     */
    public function edit(Books $books)
    {
        $categories = Categories::where('school_id', Auth::guard('school')->user()->id)->latest()->get();
        return view('admin.school.books.edit', compact('books', 'categories'));
    }

    /**
     * @param Request $request
     * @param Books $books
     * @return mixed
     */
    public function update(Request $request, Books $books)
    {
        $this->getValidate($request);
        $books->update([
            'category_id' => request('category_id'),
            'book_title' => request('book_title'),
            'book_author' => request('book_author'),
            'book_isbn' => request('book_isbn'),
            'school_id' => Auth::guard('school')->user()->id
        ]);
    }

    /**
     * Delete all the record from Books table and also deletes the record form the assign books table
     * @param Books $books
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Books $books)
    {
        $books->assignedBooks()->delete();
        $books->delete();
    }

    /**
     * @param Request $request
     */
    protected function getValidate(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'book_title' => 'required',
            'book_author' => 'required',
            'book_isbn' => 'required',
        ]);
    }
}
