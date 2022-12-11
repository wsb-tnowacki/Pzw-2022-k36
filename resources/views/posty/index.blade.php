@extends('start.layout')
@section('tytul')Posty
@endsection
@section('naglowek')
   Lista postów
@endsection
@section('tresc')
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tytuł</th>
        <th scope="col">Autor</th>
        <th scope="col">Data powstania</th>
        @auth
        <th scope="col">Akcja</th>  
        @endauth
      </tr>
    </thead>
    <tbody>
      @if($posty->count())
      @php 
      //$lp=1 ;
      $lp=$posty->firstItem();
      @endphp
      @foreach ($posty as $post)
      <tr>
        <th scope="row">{{ $lp++ }}</th>
        <td><a href="{{ route('posty.show', $post->id ) }}"> {{ $post->tytul }}</a></td>
        <td>{{ $post->autor }} / {{ $post->user->name }}</td>
        <td>{{ date('j F Y', strtotime($post->created_at)) }}</td>
        @auth
        <td>
          <form class="form-inline" method="POST" action="{{ route('posty.destroy', $post->id) }}">
            @csrf
            @method('DELETE')
          <a href="{{ route('posty.edit', $post->id) }}"><button type="button" class="btn btn-success m-1">E</button></a>
          <button type="submit" class="btn btn-danger m-1">U</button>
          </form>
        </td>  
        @endauth
      </tr>
      @endforeach
      @else
      <tr>
        <th scope="row" colspan="4">Nie ma żadnych postów</th>
      </tr>
      @endif
    </tbody>
  </table>
  {{ $posty->links() }}
  {{-- dump($posty) --}}
@endsection
