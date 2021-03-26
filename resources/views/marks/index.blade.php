@extends('layout')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <h1>Marks</h1>
            <a href="{{ url('/marks/create') }}" class="btn btn-primary pull-right">Add</a>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Maths</th>
                        <th>Science</th>
                        <th>History</th>
                        <th>Term</th>
                        <th>Total Marks</th>
                        <th>Created On</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($marks))
                        @foreach($marks as $mark)
                        <tr>
                            <td>{{$mark->student->name}}</td>
                            <td>{{$mark->maths_mark}}</td>
                            <td>{{$mark->science_mark}}</td>
                            <td>{{$mark->history_mark}}</td>
                            <td>{{$mark->term->term}}</td>
                            <td>{{$mark->total_marks}}</td>
                            <td>{{$mark->created_at->format('M d,Y H:i A')}}</td>
                            <td>
                                <a href="{{ route('marks.edit', $mark->id) }}">Edit</a>/
                                <form class="delete" action="{{ route('marks.destroy', $mark->id) }}" method="POST">
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