@extends('layouts.template')

@section('content')
<div class="text-left">
    <h1>Dashboard</h1>
    <p>Home/Data Siswa/Edit Data</p>
</div>
<div class="container">
    <div class="gird">
        <div class="head-title">
            <form action="{{ route('student.update', $students['id']) }}" method="POST">
                @csrf
                @method('PATCH')

                @if ($errors->all())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="mb-3">
                    <label for="name" class="form-label">Nis</label>
                    <input value="{{ $students->nis }}" type="number" name="nis" id="nis" placeholder="Update NIs"
                        class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{ $students->name }}" type="email" name="name" id="name" placeholder="Update Nama"
                        class="form-control">
                </div>
                <div class="mb-3">
                    <label for="rombel_id" class="form-label">ROmbel</label>
                    <select name="rombel_id" id="rombel_id" class="form-select">
                        <option value="{{$students->rombel['id']}}" selected hidden disabled>{{ $students->rombel['rombel'] }}</option>
                        @foreach ($rombel as $item)
                        <option value="{{$item->id }}" class="">{{ $item->rombel }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="rayon_id" class="form-label">ROmbel</label>
                    <select name="rayon_id" id="rayon_id" class="form-select">
                        <option value="{{$students->rayon['id']}}" selected hidden>{{ $students->rayon['rayon']  }}</option>
                        @foreach ($rayon as $item)
                            <option value="{{ $item->id }}" class="">{{ $item->rayon }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Selesai</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
