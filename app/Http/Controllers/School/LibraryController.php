<?php
namespace App\Http\Controllers\School;
use App\Models\Books;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;

class LibraryController extends Controller{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function index(){
        $books = Books::with('category')->where('school_id', Auth::guard('school')->user()->id)->latest()->get();
        return view('admin.school.library.index', compact('books'));
    }
}
