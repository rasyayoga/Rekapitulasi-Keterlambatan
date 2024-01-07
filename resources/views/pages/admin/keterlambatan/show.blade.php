@extends('layouts.template')

@section('content')
<div class="text-left">
    <h1>Dashboard</h1>
    <p>Home/Data Keterlambatan/Detail Data Siswa/ <a href="{{ route('late.rekap') }}" class="btn btn-success">Back</a></p>
</div>
    <div class="text-gray-400">
        <span class="text-2xl font-medium text-gray-700">{{ $students->name }}</span>
        | {{ $students->nis }} | {{ $students->rombel->rombel }} | {{ $students->rayon->rayon }}
    </div>
        <div class="col-sm-5">
            @php
                $no = 1;
            @endphp
            @foreach ($lates as $item)
            <div class="card">
                    <img src="{{ asset('images/' . $item->bukti) }}"class="card-img-top">
                    <div class="card-body">
                      <h5 class="card-title">Terlambat Ke-{{ $no++ }}</h5>
                      <p class="card-text">{{ $item->date_time_late }}</p>
                      <p  class="btn btn-primary">Alasan: {{ $item->information }}</p>
                    </div>
            @endforeach
         </div>
    </div>
    
    @endsection


