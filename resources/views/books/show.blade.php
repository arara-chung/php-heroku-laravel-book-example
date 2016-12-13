@extends('layouts.app')

@section('content')



<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <!--
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Book
                </div>

                <div class="panel-body">
                    @include('common.errors')
                </div>
            </div>
        -->

        @if (count($book) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                書籍詳細
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                        <th>Book Title</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="table-text">
                                <div>{{ $book->title }}</div>
                            </td>
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
                        <tr>
                            <td colspan="2" class="table-text">
                                <span><b>Excerpt</b></span>
                                <span>{{ $book->excerpt }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="table-text">
                                <span><b>Description</b></span>
                                <span>{{ $book->description }}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
</div>


@endsection