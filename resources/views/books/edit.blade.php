@extends('layouts.app')

@section('content')



<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        @if (count($book) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                書籍修正
            </div>

            <div class="panel-body">
                @include('common.errors')

                {!! Form::model($book, ['method' => 'PATCH',
                'action' => ['BooksController@update', $book->id],
                'class' => 'form-horizontal',
                ]) !!}

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
                        {!! Form::submit('本を修正する', ['class' => 'btn btn-default']) !!}
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
        @else
        <div class="panel panel-default">
            <div class="panel-heading">
                書籍修正
            </div>
            <div class="panel-body">
                <p>No book to edit</p>
            </div>
        </div>
        @endif
    </div>
</div>


@endsection