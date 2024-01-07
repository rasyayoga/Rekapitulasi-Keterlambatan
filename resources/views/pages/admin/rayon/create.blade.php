@extends('layouts.template')

@section('content')
<div class="text-left">
    <h1>Dashboard</h1>
    <p>Home/Data Rayon/Tambah Data</p>
</div>
<div class="container">
    <div class="grid">
        <div class="row">
            <div class="head-title">
                <div class="grid m-2">
            <form action="{{ route('rayon.store') }}" method="POST">
                @csrf
                @if ($errors->all())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                  </div>
                @endif
                <div class="mb-3">
                    <label for="rayon" class="from-label">Rayon</label>
                    <input type="text" name="rayon" id="rayon" placeholder="Masukan Rayon"
                        class="form-control">
                </div>
                <div class="mb-3">
                    <label for="user_id" class="form-label">Pembimbing Siswa</label>
                    <select name="user_id" id="user_id" class="form-control">
                        <option selected disabled hidden>Pilih</option>
                        @foreach ($user as $item)
                            @if($item->role == 'ps')
                                <option value="{{ $item->id }}">{{ $item->name}}</option>
                            @endif
                        @endforeach

                    </select>
                </div>
                <button type="submit"
                class="btn btn-info mb-4">Tambah</button>
            </form>
        </div>
    </div>
@endsection