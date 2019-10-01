@extends('home')

@section('title', 'Cập nhật công viêc')


@section('content')

    <div class="row">

        <div class="col-md-12">

            <h2>Updated your Post List</h2>

        </div>

        <div class="col-md-12">

            <form method="post" action="{{ route('blogger.update', $blog->id) }}" enctype="multipart/form-data">

                @csrf

                <div class="form-group">

                    <label>Title</label>

                    <input type="text" class="form-control" name="title" value="{{ $blog->title }}" required>

                </div>

                <div class="form-group">

                    <label>Content</label>

                    <textarea class="form-control" rows="3" name="content"  required>{{ $blog->content }}</textarea>

                </div>

                <div class="form-group">

                    <label>Image</label>

                    <input type="file" name="image" class="form-control-file" >

                </div>

                <div class="form-group">

                    <label>Due-date</label>

                    <input type="date" name="due_date" class="form-control"  value="{{ $blog->due_date }}" required>

                </div>

                <button type="submit" class="btn btn-primary">Edit</button>

                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>

            </form>

        </div>

    </div>


@endsection
