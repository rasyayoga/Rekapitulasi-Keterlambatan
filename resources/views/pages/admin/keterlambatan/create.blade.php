@extends('layouts.template')

@section('content')
<div class="text-left">
    <h1>Dashboard</h1>
    <p>Home/Data User/Tambah Data User</p>
</div>
    <div class="container">
        <div class="grid">
            <form action="{{ route('late.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @if ($errors->all())
                    <ul class="alert alert-secondary" role="alert">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="mb-3">
                    <label for="student_id" class="bform-label">Siswa</label>
                    <select name="student_id" id="student_id" class="form-select">
                        <option selected disabled hidden>Pilih</option>
                        @foreach ($student as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div> 

                <div class="mb-3">
                    <label for="date_time_late" class="form-label">Tanggal Keterlambatan</label>
                    <input type="datetime-local" name="date_time_late" id="date_time_late" class="form-control">
                </div>
                
                <div class="mb-3">
                    <label for="information" class="form-label">Information</label>
                    <textarea id="message" rows="4" name="information"
                        class="form-control"
                        placeholder="Masukan Informasi..."></textarea>
                </div>


                <div class="mb-3">
                    <label class="form-label" for="user_avatar">Upload
                        file</label>
                    <input
                        class="form-control"
                        aria-describedby="user_avatar_help" id="user_avatar" name="bukti" type="file" accept="image/*">
                </div>

                <button type="submit"
                    class="btn btn-info mb-4">Tambah</button>
            </form>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dateInput = document.getElementById('date_time_late');
        const currentDate = new Date().toISOString().slice(0, 16);
        dateInput.value = currentDate;
    });
</script>