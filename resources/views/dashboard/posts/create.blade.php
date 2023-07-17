@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Posts</h1>
</div>

<div class="col-lg-10">
<form method="post" action="/dashboard/posts">
    @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}  " autofocus>
    @error('title')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
  <div class="mb-3">
    <label for="slug" class="form-label">Slug</label>
    <input type="text" class="form-control" id="slug" name="slug" disabled readonly value="{{ old('title') }}">
</div>
    <div class="mb-3">
    <label for="category" class="form-label">Category</label>
        <select class="form-select" name="category_id">
            @foreach($categories as $category)
                @if(old('category_id') == $category->id)
            <option value=" {{ $category->id }}" selected>{{ $category->name }} </option>
                @else
                <option value=" {{ $category->id }}">{{ $category->name }} </option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="mb-3">
    <label for="body" class="form-label">Body</label>
    @error('body')
    <div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>
    {{ $message }}
    </div>
</div>
    @enderror
        <input id="body" type="hidden" name="body" value="{{ old('body') }} ">
        <trix-editor input="body"></trix-editor>
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function()
    {
        fetch ('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    });
</script>
@endsection