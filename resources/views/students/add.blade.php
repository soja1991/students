@extends('layout')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <h1>Add</h1>


            <div class="col-sm-12">
                <form class="form-horizontal" method="post" action="{{url('students')}}">
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
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="number" class="form-control" id="age" name="age">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <div class="radio">
                            <label><input type="radio" name="gender" value="1" id="male"> Male</label>
                            <label><input type="radio" name="gender" value="2" id="female"> Female</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender">Reporting Teacher:</label>
                        <select class="form-control" id="teacher" name="teacher">
                            <option value="">Select Teacher</option>
                            @if(!empty($teachers))
                                @foreach($teachers as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</section>
@stop