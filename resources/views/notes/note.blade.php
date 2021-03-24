<div class="card my-3 shadow-sm shadow-lg border-primary">
    <div class="card-header">
        <p class="card-title">
            <a href="{{ route('notes.show',$note->id) }}" title="{{ $note->title }}">
                {{ $note->title }}</a>
        </p>
    </div>
    <div class="card-body">
        <p class="card-text">
            {!! $note->content !!}
        </p>
    </div>
    <div class="card-footer">
        <p class="text-muted">
            {{ $note->created_at->diffForHumans() }} by {{ $note->user->name }}
        </p>
    </div>
</div>