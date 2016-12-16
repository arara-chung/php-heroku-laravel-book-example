@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                New Book
            </div>

            <div class="panel-body">
                @include('common.errors')

                {!! Form::open(['route' => 'b2.store', 'class' => 'form-horizontal']) !!}

                <div class="form-group">
                    {!! Form::label('task-title', 'Title:', [
                        'class' => 'col-sm-3 control-label',
                    ]) !!}
                    <div class="col-sm-6">
                        {!! Form::text('title', null, [
                            'name' => "title",
                            'id' => "book-title",
                            'class' => "form-control",
                        ]) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('task-excerpt', 'Excerpt:', [
                        'class' => 'col-sm-3 control-label',
                    ]) !!}
                    <div class="col-sm-6">
                        {!! Form::textarea('excerpt', null, [
                            'name' => "excerpt",
                            'id' => "book-excerpt",
                            'class' => "form-control",
                        ]) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('task-description', 'Description:', [
                        'class' => 'col-sm-3 control-label',
                    ]) !!}
                    <div class="col-sm-6">
                        {!! Form::textarea('description', null, [
                            'name' => "description",
                            'id' => "book-description",
                            'class' => "form-control",
                        ]) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('task-date', 'Published at:', [
                        'class' => 'col-sm-3 control-label',
                    ]) !!}
                    <div class="col-sm-6">
                        {!! Form::input('date', 'published_at', date('Y-m-d'), [
                            'id' => "book-date",
                            'class' => "form-control",
                        ]) !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        {!! Form::submit('本を追加する', ['class' => 'btn btn-default']) !!}
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>

        @if (count($books) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                書籍一覧
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                        <th>Book</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                        <tr>
                            <td class="table-text">
                                <div>
                                    <a href="{{ url('/b2', $book->id) }}">
                                        {{ $book->title }}
                                    </a>  
                                </div>
                            </td>
                            <td>
                                <form action="/b2/{{ $book->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>削除
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="/b2/{{ $book->id }}/edit" method="GET">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-pencil-square-o"></i>修正
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection