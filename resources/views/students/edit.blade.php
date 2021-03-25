@extends('layout')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <h1>Edit</h1>


            <div class="col-sm-12">
                <form class="form-horizontal" method="post"  action="{{ url('students/'.$student->id) }}">
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
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$student->name}}">
                    </div>
                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="number" class="form-control" id="age" name="age" value="{{$student->age}}">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <div class="radio">
                            <label><input type="radio" name="gender" value="1" id="male" {{  ($student->gender == 1 ? ' checked' : '') }} > Male</label>
                            <label><input type="radio" name="gender" value="2" id="female" {{  ($student->gender == 2 ? ' checked' : '') }}> Female</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender">Reporting Teacher:</label>
                        <select class="form-control" id="teacher" name="teacher">
                            <option value="">Select Teacher</option>
                            @if(!empty($teachers))
                                @foreach($teachers as $teacher)
                                <option value="{{$teacher->id}}" {{ $student->teacher_id == $teacher->id ? 'selected' : '' }} >{{$teacher->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="submit" class="btn btn-default">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</section>
@stop