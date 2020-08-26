<?php

namespace App\Http\Controllers\School;
use App\Models\AssignBooks;
use App\Models\Books;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AssignBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Factory|Application|Response|View
     */
    public function index(){
        $books = \DB::table('students')
            ->join('assign_books', 'students.id', '=', 'assign_books.student_id')
            ->join('books', 'books.id', '=', 'assign_books.book_id')
            ->select('students.name', 'students.phonno', 'books.book_title', 'books.book_author', 'books.book_isbn', 'assign_books.taken_date', 'assign_books.returned_date', 'assign_books.id')
            ->where('assign_books.school_id', '=', Auth::guard('school')->user()->id)
            ->get();
        $bookslists = Books::where('school_id', '=', Auth::guard('school')->user()->id)->latest()->get();
        $students = Student::where('school_id', '=', Auth::guard('school')->user()->id)->latest()->get();
        return view('admin.school.assign.index', compact('books', 'bookslists', 'students'));
    }
    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'book_id' => 'required',
            'student_id' => 'required',
        ]);
        AssignBooks::create([
            'book_id' => request('book_id'),
            'student_id' => request('student_id'),
            'school_id' => Auth::guard('school')->user()->id,
            'taken_date' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Successfully Assigned.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    /**
     * Display the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id){
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id){
        //
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id){
        //
    }

    /**
     * @param AssignBooks $assignbooks
     * @return RedirectResponse
     */
    public function updatedate(AssignBooks $assignbooks){
        request('status') ? $assignbooks->returned() : $assignbooks->notreturned();
        $notification = array(
            'message' => 'Successfully updated status.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     * @param AssignBooks $assignbooks
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(AssignBooks $assignbooks){
        $assignbooks->delete();
        $notification = array(
            'message' => 'Successfully Deleted.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
