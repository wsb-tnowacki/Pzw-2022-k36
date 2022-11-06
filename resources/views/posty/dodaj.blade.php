@extends('start.layout')
@section('tytul')Posty
@endsection
@section('naglowek')
   Dodaj post
@endsection
@section('tresc')
<form method="POST" action="{{ route('posty.store') }}">
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        Uzupełnij błędne dane w poniższych polach
    </div>
    @endif
    <div class="form-group">
        <label for="tytul">Tytuł</label>
        <input type="text" class="form-control" value="{{ old('tytul') }}" id="tytul" name="tytul" placeholder="Podaj tytuł posta">
    </div>
    @if ($errors->has('tytul'))
    <div class="alert alert-danger">
            @foreach ($errors->get('tytul') as $error)
                <div>{{ $error }}</div>
            @endforeach
    </div>
    @endif
    <div class="form-group">
        <label for="autor">Autor</label>
        <input type="text" class="form-control" value="{{ old('autor') }}" id="autor" name="autor" placeholder="Podaj autora posta">
    </div>
    @if ($errors->has('autor'))
    <div class="alert alert-danger">
            @foreach ($errors->get('autor') as $error)
                <div>{{ $error }}</div>
            @endforeach
    </div>
    @endif
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" value="{{ old('email') }}" id="email" name="email" placeholder="Podaj email">
    </div>
    @if ($errors->has('email'))
    <div class="alert alert-danger">
            @foreach ($errors->get('email') as $error)
                <div>{{ $error }}</div>
            @endforeach
    </div>
    @endif
    <div class="form-group">
      <label for="tresc">Treść</label>
      <textarea class="form-control" id="tresc" name="tresc" rows="4">{{ old('tresc') }}</textarea>
    </div>
    @if ($errors->has('tresc'))
    <div class="alert alert-danger">
            @foreach ($errors->get('tresc') as $error)
                <div>{{ $error }}</div>
            @endforeach
    </div>
    @endif
    <button type="submit" class="btn btn-primary">Dodaj post</button>
  </form>
@endsection
