<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Auth;
use Illuminate\View\View;

/**
 * Class TeacherController
 * @package App\Http\Controllers\School
 */
class TeacherController extends Controller
{
    /**
     * @return Factory|Application|View
     */
    public function index()
    {
        $users = Teacher::where('school_id', Auth::guard('school')->user()->id)->get();

        return view('admin.school.teacher.index', compact('users'));
    }

    /**
     * @return Factory|Application|View
     */
    public function show()
    {
        return view('admin.school.teacher.form');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:teachers,email',
            'contact' => 'required',
            'password' => 'required|confirmed',
            'image' => 'image|required',
        ]);
        try {
            $teacher = new Teacher;
            $teacher->name = $request->name;
            $teacher->email = $request->email;
            $teacher->password = Hash::make($request->password);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '-' . mt_rand(0, 100000) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('teacher-image', $filename);
                $teacher->image = $path;
            }
            $teacher->contactno = $request->contact;
            $teacher->school_id = Auth::guard('school')->user()->id;
            $teacher->save();
            $notification = array(
                'message' => 'Teacher Created Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('school.teacher')->with($notification);
        } catch (\Exception $e) {
            $notification = array(
                'message' => 'Something went wrong! Please try later.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }

    /**
     * @param $user
     * @return Factory|Application|RedirectResponse|View
     */
    public function edit($user)
    {
        $user = Teacher::where('school_id', '=', Auth::guard('school')->user()->id)->where('id', $user)->first();
        if (!$user) {
            $notification = array(
                'message' => 'Something went wrong! Please try later.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        return view('admin.school.teacher.edit-form', compact('user'));
    }

    /**
     * @param Request $request
     * @param $user
     * @return RedirectResponse
     */
    public function update(Request $request, $user)
    {
        $this->validate($request, [
            'email' => 'required|unique:users,email,' . $user,

        ]);
        try {
            $teacher = Teacher::where('school_id', Auth::guard('school')->user()->id)->where('id', $user)->first();
            if (!$teacher) {
                $notification = array(
                    'message' => 'Something went wrong! Please try later.',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
            $teacher->name = $request->name;
            $teacher->email = $request->email;
            if ($request->has('password'))
                $teacher->password = Hash::make($request->password);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '-' . mt_rand(0, 100000) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('teacher-image', $filename);
                $teacher->image = $path;
            }
            $teacher->contactno = $request->contact;
            $teacher->status = $request->status ? 1 : 0;
            $teacher->save();
            $notification = array(
                'message' => 'Teacher Updated Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('school.teacher')->with($notification);
        } catch (\Exception $e) {
            $notification = array(
                'message' => 'Something went wrong! Please try later.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    /**
     * @param $user
     * @return RedirectResponse
     */
    public function destroy($user)
    {
        $teacher = Teacher::where('school_id', Auth::guard('school')->user()->id)->where('id', $user)->first();
        if (!$teacher) {
            $notification = array(
                'message' => 'Something went wrong! Please try later.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        try {
            $teacher->delete();
            $notification = array(
                'message' => 'Teacher deleted Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('school.teacher')->with($notification);

        } catch (\Exception $e) {
            $notification = array(
                'message' => 'Something went wrong! Please try later.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    /**
     * @param Teacher $teacher
     * @return RedirectResponse
     */
    public function toggleStatus(Teacher $teacher)
    {
        request('status') ? $teacher->blocked() : $teacher->unblocked();

        $notification = array(
            'message' => 'Successfully updated status.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
