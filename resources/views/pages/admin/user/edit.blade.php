
@extends('layouts.template')

@section('content')
<div class="text-left">
    <h1>Dashboard</h1>
    <p>Home/Data User/Edit Data</p>
</div>
<div class="container">
    <div class="gird">
        <div class="head-title">
            <form action="{{ route('user.update', $user['id']) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input value="{{ $user->name }}" type="text" name="name" id="name" placeholder="Update Nama"
                        class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{ $user->email }}" type="email" name="email" id="email" placeholder="Update Email"
                        class="form-control">
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="role" class="form-select">
                        <option selected hidden disabled>Pilih</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="ps" {{ $user->role == 'ps' ? 'selected' : '' }}>Pembimbing Siswa</option>
                    </select>
                </div>
                <div class="mb-5">
                    <label for="password" class="form-label">Email</label>
                    <input value="" type="password" name="password" id="email" placeholder="Update Password"
                        class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Selesai</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
