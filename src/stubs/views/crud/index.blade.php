{{=<% %>=}}
@extends('admin.layouts.app')

@section('htmlheader_title')
    Posts
@endsection


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
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
                                <a href="/<% viewName %>/edit/{{ $element->id }}" class="btn btn-primary">Edit</a>
                                <a href="/<% viewName %>/delete/{{ $element->id }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
