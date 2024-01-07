@extends('layouts.template')

@section('content')
<div class="text-left">
    <h1>Dashboard</h1>
    <p>Home/Data Rombel/Edit Data</p>
</div>
    <div class="mt-5 max-w-full mx-10">
        <div class="container px-2 py-8 bg-slate-100 rounded-md shadow-md">
            <form action="{{ route('rombel.update', $rombel['id']) }}" method="POST">
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
                    <label for="rombel" class="form-label">Rombel</label>
                    <input value="{{ $rombel->rombel }}" type="text" name="rombel" id="rombel" placeholder="Masukan Rombel"
                        class="form-control">
                </div>
                <button type="submit"
                    class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
@endsection




