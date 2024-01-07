

@extends('layouts.template')

@section('content')
<div class="text-left">
    <h1>Dashboard</h1>
    <p>Home/Data Rayon</p>
</div>
<div class="head-title">
    @if (Session::get('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    <div class="handle">
        <a href="{{ route('rayon.create') }}">
            <button type="button" class="btn btn-info mb-4">Tambah Data</button>
        </a>
    </div>
    <div class="relative top-6 overflow-x-auto shadow-md sm:rounded-lg">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Rayon</th>
                    <th scope="col">Pembimbing Siswa</th>
                    <th scope="col">aksi</th>
                </tr>
            </thead>
            @php $no = 1 @endphp
            @foreach ($rayon as $item)
            <tbody>
                <tr>
                    <td class="px-6 py-4">
                        {{ $no++ }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->rayon }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->user->name}}
                    </td>
                    <td class="flex gap-2 justify-center items-center">
                        <div class="d-flex">
                            <a href="{{ route('rayon.edit', $item['id']) }}" class="btn btn-success">Edit</a>
                            --
                        <form method="POST" action="{{ route('rayon.delete', $item->id) }}"
                                    onsubmit="return confirm('Are You Sure Want To Delete This?')">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection 



