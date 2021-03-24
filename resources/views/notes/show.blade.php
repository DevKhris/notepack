@extends('layouts.app')
@section('title', $note->title)
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            @include('notes.note',$note)
        </div>
    </div>
</div>
@endsection