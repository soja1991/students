<?php

namespace App\Http\Controllers;
use Validator;
use App\Models\{Student, Mark, Term};
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marks = Mark::with('student','term')->get();
        return view('marks.index',compact('marks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        $terms = Term::all();
        return view('marks.add',compact('students', 'terms'));
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
            'student' => 'required',
            'term' => 'required',
            'maths' => 'required',
            'science' => 'required',
            'history' => 'required',
        ]);
        if ($validator->fails()) {
            $students = Student::all();
            $terms = Term::all();
            return view('marks.add',compact('students', 'terms'));
        }
        $mark                   = new Mark;
        $mark->student_id       = $request->post('student');
        $mark->term_id          = $request->post('term');
        $mark->maths_mark       = $request->post('maths');
        $mark->science_mark     = $request->post('science');
        $mark->history_mark     = $request->post('history');
        $mark->total_marks      = $request->post('history') + $request->post('maths') + $request->post('science');
        $mark->save();
        return Redirect::route('marks.index');
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
        $mark = Mark::findOrFail($id);
        $students = Student::all();
        $terms = Term::all();
        return view('students.edit',compact('mark','students','terms'));
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
            'student' => 'required',
            'term' => 'required',
            'maths' => 'required',
            'science' => 'required',
            'history' => 'required',
        ]);
        if ($validator->fails()) {
            $mark = Mark::findOrFail($id);
            $students = Student::all();
            $terms = Term::all();
            return view('students.edit',compact('mark','students','terms'));
        }
        $mark                   = Student::findOrFail($id);
        $mark->student_id       = $request->post('student');
        $mark->term_id          = $request->post('term');
        $mark->maths_mark       = $request->post('maths');
        $mark->science_mark     = $request->post('science');
        $mark->history_mark     = $request->post('history');
        $mark->total_marks      = $request->post('history') + $request->post('maths') + $request->post('science');
        $mark->save();
        return Redirect::route('marks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mark = Mark::find($id);
        $mark->delete();
        return Redirect::route('students.index');
    }
}
