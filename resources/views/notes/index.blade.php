@extends('layouts.app')
@section('title','Manage Notes')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h3 class="text-center">Notes</h3>
            @if(session('status'))
            <div class="alert alert-primary">
                {{ session('status') }}
            </div>
            @endif
            <div class="button-group">
                <a href="{{ route('notes.create') }}" class="btn btn-primary">Add new Note</a>
                <a href="" class="btn btn-secondary">Update Notes</a>
            </div>
            <div class="shadow-sm shadow-lg">
                <table class="table">
                    <thead>
                        <th scope="col">
                            #
                        </th>
                        <th scope="col">
                            TItle
                        </th>
                        <th scope="col">
                            Content
                        </th>
                        <th scope="col">
                            Options
                        </th>
                    </thead>
                    <tbody>
                        @forelse ($notes as $note)
                        <tr>
                            <td>
                                {{ $note->id }}
                            </td>
                            <td>
                                <a href="{{ route('notes.show',$note->id) }}">
                                    {{ $note->title }}
                                </a>
                            </td>
                            <td>
                                {!! $note->content !!}
                            </td>
                            <td>
                                <a href="{{ route('notes.edit',$note) }}" class="btn btn-info btn-small">
                                    Edit
                                </a>
                                @include('notes.delete',$note)
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td class="text-center">Can't find any note</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection