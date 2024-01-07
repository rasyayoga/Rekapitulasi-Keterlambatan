@extends('layouts.template')

@section('content')
<div class="text-left">
    <h1>Dashboard</h1>
    <p>Home/Data User</p>
</div>
<div class="head-title">
    @if (Session::get('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    <div class="handle">
        <a href="{{route('user.create')}}">
            <button type="button" class="btn btn-info mb-4">Tambah Data</button>
        </a>
    </div>
    <div class="relative top-6 overflow-x-auto shadow-md sm:rounded-lg">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="table-dark">ID</th>
                    <th scope="col" class="table-dark">Nama</th>
                    <th scope="col" class="table-dark">Email</th>
                    <th scope="col" class="table-dark">Role</th>
                    <th scope="col" class="table-dark">aksi</th>
                </tr>
            </thead>
            @php $no = 1 @endphp
            @foreach ($user as $item)
            <tbody>
                <tr>
                    <td class="table-success">
                        {{ $no++ }}
                    </td>
                    <td class="table-success">
                        {{ $item['name'] }}
                    </td>
                    <td class="table-success">
                        {{ $item['email'] }}
                    </td>
                    <td class="table-success">
                        {{ $item['role'] === 'ps' ? 'Pembimbing Siswa' : 'Admin' }}
                    </td>
                    <td class="table-success">
                        <div class="d-flex">
                            <a href="{{ route('user.edit', $item['id']) }}" class="btn btn-success">Edit</a>
                            --
                            <form method="POST" action="{{ route('user.delete', $item->id) }}"
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