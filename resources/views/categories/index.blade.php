@extends('layout')

@section('content')
<h1>Wisata</h1>
<a href="{{ url('transaction-cetak') }}">cetak</a>
<a href="{{ route('categories.create') }}">Add New Wisata</a>
<table>
    <thead>
        <tr>
            <th>Photo</th>
            <th>Wisata</th>
            <th>Description</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td><img src="{{ Storage::url($category->photo) }}" width="100"></td>
            <td>{{ $category->categories }}</td>
            <td>{{ $category->description }}</td>
            <td>{{ $category->price }}</td>
            <td>
                <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
