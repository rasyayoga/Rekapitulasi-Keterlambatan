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
                    <form action="{{ route('student.store') }}" method="POST">
                        @csrf
                        @if ($errors->all())
                            <ul class="bg-red-500 rounded-md max-w-sm py-2 mx-2  bg-opacity-60">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="mb-3">
                            <label for="nis" class="form-label">Nis</label>
                            <input type="Number" name="nis" id="nis" placeholder="Masukan nis"
                                class="form-control">
                        </div>
                        <div class="mb-5">
                            <label for="name" class="form-label">name</label>
                            <input type="text" name="name" id="name" placeholder="Masulkan Nama"
                                class="form-control">
                        </div>
                        <div class="mb-5">
                            <label for="rombel_id" class="form-label">Rombel</label>
                            <select name="rombel_id" id="rombel_id" class="form-select">
                                <option selected disabled hidden>Pilh Rombel</option>
                                @foreach ($rombel as $item)
                                <option value="{{$item->id}}" class="">{{$item->rombel}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="rayon_id" class="form-label">Rayon</label>
                            <select name="rayon_id" id="rayon_id" class="form-select">
                                <option selected disabled hidden>Pilh Rayon</option>
                                @foreach ($rayon as $item)
                            <option value="{{$item->id}}" class="">{{$item->rayon}}</option>
                        @endforeach
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
