@extends('layouts.app')
@section('title','Home')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            @forelse ($notes as $note)
            @include('notes.note',$note)
            @empty
            <p class="text-center">
                No results found
            </p>
            @endforelse
            {{ $notes->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection