@if(isset($errors))
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
{!! Form::open(['route' => ['books.store'], 'method' => 'post']) !!}
    @include(Laraviet\LaravelBook\Helpers\Constants::PACKAGE . "::books._form")
    {!! Form::submit('Create') !!}
{!! Form::close() !!}