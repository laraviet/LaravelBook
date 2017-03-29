<div>Title: {{ $book->getTitle() }}</div>
<div>Author: {{ $book->getAuthor() }}</div>
<div><a href="{{ route('books.index') }}">Back</a></div>