@extends('layouts.app')
@section('content')
<div class="card-body">
   
    
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Bet</th>
            <th>Horse</th>
            <th>Actions</th>

        </tr>
        @foreach ($betters as $bet)
        <tr>
            <td>{{ $bet->name }}</td>
            <td>{{ $bet->surname }}</td>
            <td>{{ $bet->bet }}</td>
            <td>{{ 'arklys' }}</td>

            <td>
                <form action={{ route('betters.destroy', $bet->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('betters.edit', $bet->id) }}>Redaguoti</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Trinti"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('betters.create') }}" class="btn btn-success">Pridėti</a>
    </div>
</div>
@endsection
