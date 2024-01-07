@extends('layouts.template')

@section('content')
<div class="text-left">
    <h1>Dashboard</h1>
    <p>Home/Data Rombel/Tambah Data</p>
</div>
<div class="container">
    <div class="grid">
        <div class="row">
            <div class="head-title">
                <div class="grid m-2">
            <form action="{{ route('rombel.store') }}" method="POST">
                @csrf
                @if ($errors->all())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                  </div>
                @endif
                <div class="mb-3">
                    <label for="rombel" class="from-label">Rombel</label>
                    <input type="text" name="rombel" id="rombel" placeholder="Masukan Rombel"
                        class="form-control">
                </div>
                <button type="submit"
                class="btn btn-info mb-4">Tambah</button>
            </form>
        </div>
    </div>
@endsection