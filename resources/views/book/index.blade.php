@extends('layout.main')
@section('container')
<div class="table-responsive">
    <a href="{{ route('book.create') }}" class="btn btn-md btn-success mb-3">+ Book</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Categorie</th>
                <th scope="col">Stock</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>++1</td>
                <td>{{ $book->name }}</td>
                <td>{{ $book->name }}</td>
                <td>{{ $book->stock }}</td>
                <td>{{ $book->deskripsi }}</td>
                <td>
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('book.destroy', $book->id) }}" method="POST">
                        <a href="{{ route('book.edit', $book->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection