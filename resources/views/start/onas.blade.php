@extends('start.layout')
@section('tytul') O nas @endsection
@section('naglowek')
    O nas
@endsection
@section('tresc')
    Tekst treści 1 @isset($tekster)
        {{ $tekster }}
    @endisset
@isset($zadania)
<ol>
   @foreach ($zadania as $zadanie)
       <li>{{ $zadanie }}
   @endforeach
</ol>
@endisset
@isset($taski)
<ol>
   @foreach ($taski as $task)
       <li>{{ $task }}
   @endforeach
</ol>
@endisset
@endsection


