@csrf
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="form-group">
    <label for="title">Title</label>
    <input class="form-control @error('title')
        border-danger
    @enderror" name="title" id="title_input" type="text" value="{{ $note->title }}"
        onchange="slugify('title_input','slug_input')" required>
    @if ($errors->has('title'))
    <span class="">
        <i class="fa fa-exclamation-triangle"></i>
        <p class="text-danger">{{ $errors->first('title') }}</p>
    </span>
    @endif
</div>
<div class="form-group">
    <label for="content">Content</label>
    <textarea name="content" id="" cols="30" rows="10" class="ckeditor form-control @error('content')
        border-danger
    @enderror" required>{{ old('content', $note->content) }}</textarea>
    @if ($errors->has('content'))
    <span class="">
        <i class="fa fa-exclamation-triangle"></i>
        <p class="text-danger">{{ $errors->first('content') }}</p>
    </span>
    @endif
</div>
<div class="form-group">
    <button class="btn btn-primary" type="submit">Publish</button>
</div>