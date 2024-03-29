@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/posts/create" class="btn btn-primary">Create Post</a>

                    @if (count($posts)>0)
                        <h3>Your Posts</h3>
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach ($posts as $post)
                            <tr>
                                <td><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></td>
                                <td><a href="/posts/{{ $post->id }}/edit" class="btn btn-default">Edit</a></td>
                                <td>{!! Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                                {!! Form::hidden('_method', 'DELETE') !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}</td>
                            </tr>
                            @endforeach
                        </table>
                    @else
                        <h1>You Have No Post</h1>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
