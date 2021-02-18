@extends('layout')
@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
@endsection
@section('content')

    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading has-text-weight-bold is-size-4">New Article</h1>

            <form action="/article" method="post">
                @csrf
                <div class="field">
                    <label class="label" for="title"> Title</label>

                    <div class="control">
                        <input
                            class="input @error('title') is-danger @enderror"
                            value="{{ old ('title') }}"
                            type="text"
                            name="title"
                            id="title">

                        @error('title')
                            <p class="help is-danger">
                                {{ $errors->first('title') }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="excerpt">Excerpt</label>

                    <div class="control">
                        <textarea class="textarea @error('excerpt') is-danger @enderror" name="excerpt" id="excerpt">
                            {{ old ('excerpt') }}
                        </textarea>
                        <p class="help is-danger">
                            {{ $errors->first('excerpt') }}
                        </p>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="body">Body</label>

                    <div class="control">
                        <textarea class="textarea @error('body') is-danger @enderror" name="body" id="body">
                            {{ old ('body') }}
                        </textarea>
                        <p class="help is-danger">
                            {{ $errors->first('body') }}
                        </p>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="body">Tags</label>

                    <div class="select is-multiple control">
                        <select
                            name="tags[]" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach

                        </select>
                        @error('tags')
                            <p class="help is-danger"> {{ $message }}</p>
                        @enderror

                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
