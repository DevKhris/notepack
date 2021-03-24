@extends('layouts.app')
@section('title', 'Edit Note')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <form action="{{ route('notes.update',$note->id) }}" method="post">
                @method('PUT')
                @include('notes.form',$note)
            </form>
        </div>
    </div>
</div>
@endsection