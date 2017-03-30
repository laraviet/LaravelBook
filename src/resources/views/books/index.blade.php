<!DOCTYPE html>
<html>
<head>
    <title>Book Index</title>
</head>
<body>
    <h1>Book List</h1>
    <div><a href="{{ route('books.create') }}">Create</a></div>
    <ul>
        @foreach($books as $book)
            <li>
                {{ $book->title }} - {{ $book->author }}
                <a href="{{ route('books.show', [$book->id]) }}">show</a>
                <a href="{{ route('books.edit', [$book->id]) }}">edit</a>
                {!! Form::open(['route' => ['books.destroy', $book->id], 'method' => 'delete']) !!}
                    {!! Form::submit('delete') !!}
                {!! Form::close() !!}
            </li>
        @endforeach
    </ul>
    <div>{{ $books->links() }}</div>
</body>
</html>