@extends('client::layouts.app')
@section('title', 'Add item')
@section('content')
    <h2>Add new item</h2>
    <div >
        {{ Form::open(['url' => route('items.store')]) }}
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name') }}
        {{ Form::label('amount', 'Amount') }}
        {{ Form::number('amount') }}
        {{ Form::submit('Add') }}
        {{ Form::close() }}
    </div>
    <a href="{{ route('items.index') }}">
        <button>Back to list</button>
    </a>
@endsection
