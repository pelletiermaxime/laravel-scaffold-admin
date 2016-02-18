{{=<% %>=}}
@extends('admin.layouts.app')

@section('htmlheader_title')
    Posts
@endsection


@section('main-content')
<div class="container">
<div class="row col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Posts</h3>
        </div>
        <div class="box-body table-responsive no-padding">
            <div><a class="btn btn-primary" href="">Create new</a></div>
            <table class="table table-hover">
                <tbody>
                <tr>
                    <th>ID</th>
                    <th>Actions</th>
                </tr>
                @foreach ($<% viewName %> as $element)
                <tr>
                    <td>{{ $element->id }}</td>
                    <td>
                        <a href="{{ route('<% viewName %>.edit', $element->id) }}" class="btn btn-primary">
                            Edit
                        </a>
                        <form action="{{ route('<% viewName %>.destroy', $element->id) }}" method="POST" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody></table>
        </div>
    </div>
</div>
</div>
@endsection
