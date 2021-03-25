@extends('layout')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <h1>Students</h1>
            <a href="{{ url('/students/create') }}" class="btn btn-primary pull-right">Add</a>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Reporting Techer</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($students))
                        @foreach($students as $student)
                        <tr>
                            <td>{{$student->name}}</td>
                            <td>{{$student->age}}</td>
                            <td>
                                @if($student->gender == 1)
                                    Male
                                @else
                                    Female
                                @endif
                            </td>
                            <td>{{$student->teacher->name}}</td>
                            <td>
                                <a href="{{ route('students.edit', $student->id) }}">Edit</a>/
                                <form class="delete" action="{{ route('students.destroy', $student->id) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    {{ csrf_field() }}
                                    <input type="submit" value="Delete">
                                </form></td>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</section>

<script>
    $(".delete").on("submit", function(){
        return confirm("Are you sure?");
    });
</script>
@stop