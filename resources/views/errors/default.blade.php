@extends('template.master')

@section('content')
    <h1>asda
        @{{ $exception->getStatusCode() }}
    </h1>

    <p>
        @if(!empty($exception->getMessage()))
            @{{ $exception->getMessage() }}
        @else
            @{{ \Symfony\Component\HttpFoundation\Response::$statusTexts[$exception->getStatusCode()] }}
        @endif
    </p>

@endsection