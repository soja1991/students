@extends('layout')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <h1>Add</h1>


            <div class="col-sm-12">
                <form class="form-horizontal" method="post" action="{{ url('marks/'.$mark->id) }}">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="gender">Student:</label>
                        <select class="form-control" id="student" name="student">
                            <option value="">Select Student</option>
                            @if(!empty($students))
                                @foreach($students as $student)
                                <option value="{{$student->id}}" {{ $mark->student_id == $student->id ? 'selected' : '' }}>{{$student->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gender">Term:</label>
                        <select class="form-control" id="term" name="term">
                            <option value="">Select Term</option>
                            @if(!empty($terms))
                                @foreach($terms as $term)
                                <option value="{{$term->id}}" {{ $mark->term_id == $term->id ? 'selected' : '' }}>{{$term->term}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="age">Maths:</label>
                        <input type="number" class="form-control" id="maths" name="maths" value="{{$mark->maths_mark}}">
                    </div>
                    <div class="form-group">
                        <label for="age">Science:</label>
                        <input type="number" class="form-control" id="science" name="science" value="{{$mark->science_mark}}">
                    </div>
                    <div class="form-group">
                        <label for="age">History:</label>
                        <input type="number" class="form-control" id="history" name="history" value="{{$mark->history_mark}}">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</section>
@stop