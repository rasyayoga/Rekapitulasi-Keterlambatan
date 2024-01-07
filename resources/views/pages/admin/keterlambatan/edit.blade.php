@extends('layouts.template')

@section('content')
<div class="text-left">
    <h1>Dashboard</h1>
    <p>Home/Data Keterlambatan/Edit Data</p>
</div>
<div class="container">
    <div class="gird">
        <div class="head-title">
            <form action="{{ route('late.update', $lates->id) }}" method="POST" enctype="multipart/form-data">
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
                    <label for="student_id" class="form-label">Siswa</label>
                    <select name="student_id" id="student_id" class="form-select">
                        <option value="{{ $lates->student->id }}" selected hidden disabled>{{ $lates->student->name }}</option>
                        @foreach ($students as $item)
                        <option value="{{ $item->id }}" class="">{{ $item->name }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="date_time_late" class="form-label">Tanggal</label>
                    <input value="{{ $lates->date_time_latel }}" type="datetime-local" name="data_time_late" id="data_time_late" 
                        class="form-control">
                </div>
                <div class="mb-3">
                    <label for="information" class="form-label">informasi</label>
                    <input value="{{ $lates->information }}" type="text" name="information" id="message" 
                        class="form-control" placeholder="Masukan Keterangan">
                </div>

                <div class="mb-3"> 
                        <img src="{{ asset('images/' . $lates->bukti) }}" alt="" width="200" class="mb-5">
                    <input
                        class="form-control"
                        aria-describedby="user_avatar_help" id="user_avatar" name="bukti" type="file" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary">Selesai</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
