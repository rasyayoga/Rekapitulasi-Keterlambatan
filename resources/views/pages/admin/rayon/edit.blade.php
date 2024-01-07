@extends('layouts.template')

@section('content')
<div class="text-left">
    <h1>Dashboard</h1>
    <p>Home/Data Rayon/Edit Data</p>
</div>
    <div class="mt-5 max-w-full mx-10">
        <div class="container px-2 py-8 bg-slate-100 rounded-md shadow-md">
            <form action="{{ route('rayon.update', $rayon['id']) }}" method="POST">
                @csrf
                @method('PATCH')

                @if ($errors->all())
                    <ul class="bg-red-500 rounded-md max-w-sm py-2 mx-2  bg-opacity-60">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="mb-3">
                    <label for="rayon" class="form-label">Rayon</label>
                    <input value="{{ $rayon->rayon }}" type="text" name="rayon" id="rayon" placeholder="Masukan rayon"
                        class="form-control">
                </div>
                <div class="mb-5">
                    <label for="user_id" class="form-label">Pembimbing Siswa</label>
                    <select name="user_id" id="user_id" class="form-select">
                        <option selected hidden value="{{ $rayon->user->id }}">{{ $rayon->user->name }}</option>
                            @if ($rayon->user->role === 'ps')
                                <option value="{{ $rayon->user->id }}">{{ $rayon->user->name }}</option>
                            @endif
                    </select>
                </div>
                <button type="submit"
                    class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
@endsection




