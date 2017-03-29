<!DOCTYPE html>
<html>
<head>
    <title>Book Index</title>
</head>
<body>
    <h1>Book List</h1>
    <ul>
        @foreach($books as $book)
            <li>{{ $book->getTitle() }} - {{ $book->getAuthor() }} <a href="{{ url('books/edit/' . $book->getId() )}}">edit</a></li>
        @endforeach
    </ul>
    <div>{{ $books->links() }}</div>
</body>
</html>