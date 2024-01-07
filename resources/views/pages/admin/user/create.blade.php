@extends('layouts.template')

@section('content')
<div class="text-left">
    <h1>Dashboard</h1>
    <p>Home/Data User/Tambah Data User</p>
</div>
<div class="container">
    <div class="grid">
        <div class="row">
            <div class="head-title">
                <div class="grid m-2">
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        @if ($errors->all())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                          </div>
                        @endif
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" id="name" placeholder="Masukan Nama"
                                class="form-control">
                        </div>
                        <div class="mb-5">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" placeholder="Masulkan Email"
                                class="form-control">
                        </div>
                        <div class="mb-5">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role" class="form-select">
                                <option selected disabled hidden>Pilih Role</option>
                                <option value="admin">Admin</option>
                                <option value="ps">Pembimbing Siswa</option>
                            </select>
                        </div>
                        <button type="submit"
                            class="btn btn-info mb-4">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
