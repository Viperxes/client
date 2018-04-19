@extends('client::layouts.app')
@section('title', 'Item')
@section('content')
    <h2>Show item (id: {{ $item['id'] }})</h2>
    <table>
        <tr>
            <td>Name:</td>
            <td>{{ $item['name'] }}</td>
        </tr>
        <tr>
            <td>Amount:</td>
            <td>{{ $item['amount'] }}</td>
        </tr>
    </table>
    <a href="{{ route('items.index') }}">
        <button>Back to list</button>
    </a>
@endsection
