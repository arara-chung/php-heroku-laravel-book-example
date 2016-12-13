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

                    {!! Form::open() !!}

                        {{ csrf_field() }}

                        <div class="form-group">
                            {!! Form::label('task-title', 'Title:', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('title', null, [name => "title",
                                    id => "book-title",
                                    class => "form-control",
                                    value => "{{ old('book') }}",
                                    ]) 
                                !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('task-excerpt', 'Excerpt:', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::textarea('excerpt', null, [name => "excerpt",
                                    id => "book-excerpt",
                                    class => "form-control",
                                    value => "{{ old('book') }}",
                                    ]) 
                                !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('task-description', 'Description:', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::textarea('description', null, [name => "description",
                                    id => "book-description",
                                    class => "form-control",
                                    value => "{{ old('book') }}",
                                    ]) 
                                !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::submit('<i class="fa fa-plus"></i>本を追加する', 'Description:', ['class' => 'btn btn-default']) !!}
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
                                        <td class="table-text"><div>{{ $book->title }}</div></td>

                                        <td>
                                            <form action="/book/{{ $book->id }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>削除
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