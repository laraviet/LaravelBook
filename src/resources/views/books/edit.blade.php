@if(isset($errors))
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form action="{{ route('books.update', [$book->getId()] ) }}" method="POST">
    <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
    <input type="hidden" name="_method" value="PATCH">
    <input type="text" name="title" value="{{ $book->getTitle() }}">
    <input type="text" name="author" value="{{ $book->getAuthor() }}">
    <input type="submit" value="Save">
</form>