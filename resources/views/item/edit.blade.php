@extends('client::layouts.app')
@section('title', 'Edit item')
@section('content')
    <h2>Edit item (id: {{ $item['id'] }})</h2>
    <div >
        {{ Form::open(['url' => route('items.update', ['id' => $item['id']])]) }}
        {{ Form::hidden('_method', 'PUT') }}
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', $item['name']) }}
        {{ Form::label('amount', 'Amount') }}
        {{ Form::number('amount', $item['amount']) }}
        {{ Form::submit('Save') }}
        {{ Form::close() }}
        <a href="{{ route('items.index') }}">
            <button>Back to list</button>
        </a>
    </div>
@endsection
