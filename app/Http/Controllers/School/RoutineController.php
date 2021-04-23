<?php
namespace App\Http\Controllers\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Section;
use App\Models\Klass;
use App\Models\Routine;


class RoutineController extends Controller
{

	public function index() {
		
		$classes = Klass::all();
		// $routines = Routine::aLL();
		// $data = [];
		// $info = [];
		// foreach($routines as $routine) {
		// 	$info[] = $routine->day_name;
		// 	$info[] = Klass::find($routine->class_id);
		// 	foreach (json_decode($routine->teacher_id) as $key => $id) {
		// 		$info[] = Teacher::find($id);
		// 	}
		// 	foreach (json_decode($routine->subject_id) as $key => $id) {
		// 		$info[] = Subject::find($id);
		// 	}


		// }
		// 	dd($info);
		

		// dd(gettype(json_decode($routines->teacher_id)));
		// foreach($routines as $key => $routine)
		// {
		// 	$data[] = $routine->day_name;
		// 	$data[] = Klass::find($routine->class_id);
		// 	$data[] = json_decode($routine->teacher_id, true );
		// 	$data[] = json_decode($routine->teacher_id, true);
		// }
		// 	foreach ($teachers as $key => $id) {
		// 		$teachers_info = Teacher::find($id);
		// 	}

		// 	foreach($subjects as $key => $id) {
		// 		$subjects_info[] = Subject::find($id);
		// 	}
		// dump($teachers_info);
		// dump($subjects_info);
		// dump($classnames);
		// dd($days);

		return view('admin.school.routine.index', compact('classes'));
	}


	public function create() {
		$teachers = Teacher::all();
		$subjects = Subject::all();
		$sections = Section::all();
		$classes = Klass::all();

		return view('admin.school.routine.add-routine', compact('teachers', 'subjects', 'sections', 'classes'));

	}

	public function getSectionFromClass(Request $request) 
	{
		if($request->ajax()) 
		{
			$data = Section::where('class_id', $request->class_id)->get();
			return response(json_encode($data));
		}
	}

	public function store(Request $request) 
	{
		$this->validate($request, [
			'class_id' => 'required',
			'section_id' => 'required',
			'day_name' => 'required',
			'teacher_id' => 'required',
			'subject_id'=> 'required',
		]);
		$data = new Routine;
		$routine = $request->all();
		// dd(gettype($routine));
		// dd($routine['teacher_id']);
		$teacher = [];
		foreach($routine['teacher_id'] as $key => $value) 
		{
			$teacher[++$key] = $value;
		}
		$subject = [];
		foreach($routine['subject_id'] as $key => $value)
		{
			$subject[++$key] = $value;
		}
		$data->class_id = $request->class_id;
		$data->section_id = $request->section_id;
		$data->day_name = $request->day_name;
		$data->teacher_id = json_encode($teacher);
		$data->subject_id = json_encode($subject);

		$check = $data->save();
		return redirect(__setLink('school/routine/list'))->with('success', 'routine added successfully.');
	}

	public function getSchoolRoutineByClassAndSection(Request $request)
	{
		if($request->ajax())
		{
		$classes = Klass::all();
		$routines = Routine::where('section_id', $request->section_id)->where('class_id', $request->class_id)->get();
		$data = [];
		foreach($routines as $routine)
		{
			$data['day'] = $routine->day_name;
			$data['class_name'] = Klass::find($routine->class_id);

			foreach (json_decode($routine->teacher_id, true ) as $key => $id) {
				$data[] = array(Teacher::find($id));
			}
			foreach(json_decode($routine->teacher_id, true) as $key => $id) {
				$data['subjects'] = Subject::find($id);
			}
		}
		}
			return view('admin.school.routine.index', compact('datas'));
	}
}