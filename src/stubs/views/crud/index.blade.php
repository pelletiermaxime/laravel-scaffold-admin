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
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>ID</th>
                        </tr>
                        @foreach ($<% viewName %> as $element)
                        <tr>
                            <td>{{ $element->id }}</td>
                        </tr>
                        @endforeach
                    </tbody></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
