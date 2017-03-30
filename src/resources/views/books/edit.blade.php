@if(isset($errors))
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
{!! Form::model($book, ['route' => ['books.update', $book->id], 'method' => 'patch']) !!}
    @include(Laraviet\LaravelBook\Helpers\Constants::PACKAGE . "::books._form")
    {!! Form::submit('Save') !!}
{!! Form::close() !!}