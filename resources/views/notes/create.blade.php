@extends('layouts.app')
@section('title', 'Create Note')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <form action="{{ route('notes.store') }}" method="post">
                @include('notes.form',$note)
            </form>
        </div>
    </div>
</div>
@endsection