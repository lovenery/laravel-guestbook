@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">

    <div class="breadcrumb">{{ $message->name }}</div>
    <ul class="list-group">
        @foreach ($message->notes as $note)
            <li class="list-group-item">{{ $note->body }}</li>
        @endforeach
    </ul>

    <form method="POST" action="/messages/{{ $message->id}}/notes">
        {{ csrf_field() }}
        <div class="form-group">
            <textarea name="body" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add Comment</button>
        </div>
    </form>

</div>
</div>
</div>
@endsection
