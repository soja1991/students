@extends('layout')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <h1>Add</h1>


            <div class="col-sm-12">
                <form class="form-horizontal" method="post" action="{{url('marks')}}">
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
                                <option value="{{$student->id}}">{{$student->name}}</option>
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
                                <option value="{{$term->id}}">{{$term->term}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="age">Maths:</label>
                        <input type="number" class="form-control" id="maths" name="maths">
                    </div>
                    <div class="form-group">
                        <label for="age">Science:</label>
                        <input type="number" class="form-control" id="science" name="science">
                    </div>
                    <div class="form-group">
                        <label for="age">History:</label>
                        <input type="number" class="form-control" id="history" name="history">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</section>
@stop