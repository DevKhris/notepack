<form action="{{ route('notes.destroy',$note->id) }}" method="POST">
    @method('delete')
    @csrf
    <div class="form-group">
        <button class="btn btn-danger btn-small" type="submit">Delete</button>
    </div>
</form>