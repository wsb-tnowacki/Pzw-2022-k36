@extends('layout')
@section('naglowek')
    Kontakt dane
@endsection
@section('tresc1')
Do wyświetlenia:
@isset($id,$tekst)
Id: {{ $id }} tekst: {{ $tekst }}
@endisset
@endsection
@section('tresc2')
    Tekst treści 2
@endsection
@section('tresc3')
    Tekst treści 3
@endsection
