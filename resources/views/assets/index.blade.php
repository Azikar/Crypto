@extends('dashboard')

@section('content')
    <table>
        <tr>
            <th>id</th>
            <th>label</th>
            <th>value</th>
            <th>currency</th>
            <th>USD</th>
            <th>actions</th>
        </tr>
{{--        @dd($assets)--}}
    @foreach($assets['assets'] as $asset)
        <tr>
            <td> {{ $asset['id'] }} </td>
            <td> {{ $asset['label'] }} </td>
            <td> {{ $asset['value'] }} </td>
            <td> {{ $asset['currency'] }} </td>
            <td> {{ $asset['converted'] }}</td>
            <td>
                <form action="{{ url('/dashboard', ['id' => $asset['id']]) }}" method="post">
                    <input class="btn btn-default" type="submit" value="Delete" />
                    @csrf
                    {{ method_field('DELETE') }}
                </form>
            </td>
        </tr>
    @endforeach
    </table>
    <div>Total assets worth: {{$assets['total']['total']}} </div>
@endsection
