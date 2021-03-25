<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\{Teacher,Student, Mark};

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('teacher')->get();
        return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('students.add',compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,20',
            'age' => 'required',
            'gender' => 'required',
            'teacher' => 'required',
        ]);
        if ($validator->fails()) {
            $teachers = Teacher::all();
            return view('students.add',compact('teachers'));
        }
        $student            = new Student;
        $student->name      = $request->name;
        $student->age       = $request->age;
        $student->gender    = $request->gender;
        $student->teacher_id= $request->teacher;
        $student->save();
        return Redirect::route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $teachers = Teacher::all();
        return view('students.edit',compact('teachers','student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,20',
            'age' => 'required',
            'gender' => 'required',
            'teacher' => 'required',
        ]);
        if ($validator->fails()) {
            $student = Student::findOrFail($id);
            $teachers = Teacher::all();
            return view('students.edit',compact('teachers','student'));
        }
        $student            = Student::findOrFail($id);
        $student->name      = $request->name;
        $student->age       = $request->age;
        $student->gender    = $request->gender;
        $student->teacher_id= $request->teacher;
        $student->save();
        return Redirect::route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $student = Student::find($id);
            $mark = Mark::where('student_id',$id)->delete();
            $student->delete();
            return Redirect::route('students.index');
        } catch (Exception $e) {
            dd($e);
        }
        
    }
}
