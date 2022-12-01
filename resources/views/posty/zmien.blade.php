@extends('start.layout')
@section('tytul')Posty
@endsection
@section('naglowek')
   Uaktualnij post
@endsection
@section('tresc')
<form method="POST" action="{{ route('posty.update', $post->id) }}">
    @csrf
    @method('PUT')
    @if ($errors->any())
    <div class="alert alert-danger">
        Uzupełnij błędne dane w poniższych polach
    </div>
    @endif
    <div class="form-group">
        <label for="tytul">Tytuł</label>
        <input type="text" class="form-control" value="@if(old('tytul') !== null){{old('tytul')}}@else{{$post->tytul}}@endif" id="tytul" name="tytul" placeholder="Podaj tytuł posta">
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
        <input type="text" class="form-control" value="@if(old('autor') !== null){{ old('autor') }}@else{{ $post->autor }}@endif" id="autor" name="autor" placeholder="Podaj autora posta">
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
        <input type="text" class="form-control" value="@if(old('email') !== null){{ old('email') }}@else{{ $post->email }}@endif" id="email" name="email" placeholder="Podaj email">
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
      <textarea class="form-control" id="tresc" name="tresc" rows="4">@if(old('tresc') !== null){{ old('tresc') }}@else{{ $post->tresc }}@endif</textarea>
    </div>
    @if ($errors->has('tresc'))
    <div class="alert alert-danger">
            @foreach ($errors->get('tresc') as $error)
                <div>{{ $error }}</div>
            @endforeach
    </div>
    @endif
    <a href="{{ route('posty.index') }}"><button type="button" class="btn btn-primary m-1">Powrót do listy</button></a>
    <button type="submit" class="btn btn-success m-1">Zmień post</button>
  </form>
@endsection
