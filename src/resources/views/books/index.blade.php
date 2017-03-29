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
                {{ $book->getTitle() }} - {{ $book->getAuthor() }}
                <a href="{{ route('books.show', [$book->getId()]) }}">show</a>
                <a href="{{ route('books.edit', [$book->getId()]) }}">edit</a>
                <form action="{{ route('books.destroy', [$book->getId()]) }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value="delete">
                </form>
            </li>
        @endforeach
    </ul>
    <div>{{ $books->links() }}</div>
</body>
</html>