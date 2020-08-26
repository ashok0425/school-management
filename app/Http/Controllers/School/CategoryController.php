<?php

namespace App\Http\Controllers\School;

use App\Models\Categories;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * @return Factory|Application|View
     */
    public function index()
    {
        $categories = Categories::where('school_id', Auth::guard('school')->user()->id)->latest()->get();
        return view('admin.school.category.index', compact('categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        Categories::create([
            'title' => request('title'),
            'school_id' => Auth::guard('school')->user()->id
        ]);
        $notification = array(
            'message' => 'Created Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * @param Request $request
     * @param Categories $categories
     * @return mixed
     */
    public function update(Request $request, Categories $categories)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        $categories->update([
            'title' => request('title'),
            'school_id' => Auth::guard('school')->user()->id
        ]);
    }

    /**
     * Delete all the record from Categories table and associated category_id from books table.
     * @param Categories $categories
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Categories $categories)
    {
        $categories->books()->delete();
        $categories->delete();
    }
}
