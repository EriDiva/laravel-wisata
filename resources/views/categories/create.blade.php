@extends('layout')
<link rel="stylesheet" href="{{ asset('/css/create.css') }}">

@section('content')
<h1>Add Wisata</h1>
<form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="categories">Wisata:</label>
    <input type="text" name="categories" required>
    <label for="description">Description:</label>
    <textarea name="description" required></textarea>
    <label for="price">Price:</label>
    <input type="number" name="price" required>
    <label for="photo">Photo:</label>
    <input type="file" name="photo" required>
    <button type="submit">Save</button>
</form>
@endsection
