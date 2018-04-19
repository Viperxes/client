@extends('client::layouts.app')
@section('title', 'Item list')
@section('content')
    <div>
        {{ Form::open(['url' => route('items.index'), 'method' => 'GET']) }}
        {{ Form::select('amount', [
            'gt:0' => 'They are in stock',
            'eq:0' => 'They are not in stock',
            'gt:5' => 'There are more than 5'
            ], null, ['placeholder' => 'All']) }}
        {{ Form::submit('Search') }}
        {{ Form::close() }}
    </div>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Amount</th>
            <th colspan="3">Action</th>
        </tr>
        @forelse($items as $item)
            <tr>
                <td>{{ $item['id'] }}</td>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['amount'] }}</td>
                <td>
                    <a href="{{ route('items.show', ['id' => $item['id']]) }}">
                        <button>Show</button>
                    </a>
                </td>
                <td>
                    <a href="{{ route('items.edit', ['id' => $item['id']]) }}">
                        <button>Edit</button>
                    </a>
                </td>
                <td>
                    {{ Form::open(['url' => route('items.destroy', ['id' => $item['id']]),
                        'method' => 'POST', 'style' => 'margin-bottom:0;']) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete') }}
                    {{ Form::close() }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No records to display</td>
            </tr>
        @endforelse
    </table>
    <a href="{{ route('items.create') }}">
        <button>Add item</button>
    </a>
@endsection
