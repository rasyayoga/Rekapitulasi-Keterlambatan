@extends('layouts.template')

@section('content')
<div class="text-left">
    <h1>Dashboard</h1>
    <p>Home/Data Keterlambatan</p>
</div>
    <div class="mt-5 max-w-full mx-10">
        @if (Session::get('success'))
            <div class="alert alert-secondary" role="alert">
                {{ Session::get('success') }}</div>
        @endif
        @if (Session::get('printed'))
            <div class="alert alert-secondary" role="alert">
                {{ Session::get('printed') }}</div>
        @endif
        <div class="handle">
            @if (Auth::user()->role == 'admin')
                <a href="{{ route('late.create') }}"
                    class="btn btn-secondary">Tambah</a>
            @endif
            <a href="{{ route('late.export') }}"
                class="btn btn-secondary">Export
                Data Keterlambatan</a>
        </div>
        <div class="relative top-6 overflow-x-auto shadow-md sm:rounded-lg">
            <div class="mt-5 flex">
                @if (Auth::user()->role == 'admin')
                    <a href="{{ route('late.home') }}" id="all"
                        class="btn btn-secondary">Keseluruhan Data</a>
                    <a href="{{ route('late.rekap') }}" id="rekap" class="btn btn-secondary">Rekapitulasi Data</a>
                @endif

                @if (Auth::user()->role == 'ps')
                    <a href="{{ route('pemb.late.home') }}" id="all"
                        class="btn btn-secondary">Keseluruhan Data</a>
                    <a href="{{ route('pemb.late.rekap') }}" id="rekap" class="btn btn-secondary">Rekapitulasi
                        Data</a>
                @endif
            </div>
            @if (Auth::user()->role == 'admin')
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th scope="col">
                                No
                            </th>
                            <th scope="col">
                                Nis
                            </th>
                            <th scope="col">
                                Nama
                            </th>
                            <th scope="col">
                                Jumlah Keterlambatan
                            </th>
                            <th scope="col">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($rekap as $item)
                            <tr>
                                <td>
                                    {{ $no++ }}
                                </td>
                                <td>
                                    {{ $item->student['nis'] }}
                                </td>
                                <td>
                                    {{ $item->student['name'] }}
                                </td>
                                <td>
                                    {{ $item->total }}
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('late.show', ['id' => $item->student_id]) }}"
                                            class="btn btn-success">Lihat</a>
                                            --
                                            @if ($item->total >= 3)
                                                <a href="{{ route('late.print', $item->student_id) }}"
                                                    class="btn btn-success">Cetak
                                                    Surat Pernyataan</a>
                                            @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            @if (Auth::user()->role == 'ps')
            <table class="table mt-4">
                <thead>
                        <tr>
                            <th scope="col">
                                No
                            </th>
                            <th scope="col">
                                Nis
                            </th>
                            <th scope="col">
                                Nama
                            </th>
                            <th scope="col">
                                Jumlah Keterlambatan
                            </th>
                            <th scope="col">
                                Lainya
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($rekaps as $item)
                            <tr>
                                <td>
                                    {{ $no++ }}
                                </td>
                                <td>
                                    {{ $item->student->nis }}
                                </td>
                                <td>
                                    {{ $item->student->name }}
                                </td>
                                <td>
                                    {{ $item->total }}
                                </td>
                                <td>
                                    <a href="{{ route('pemb.late.show', ['id' => $item->student_id]) }}"
                                        class="btn btn-success">Lihat</a>

                                    @if ($item->total >= 3)
                                        @if (Auth::user()->role == 'admin')
                                            <a href="{{ route('late.print', $item->student_id) }}"
                                               class="btn btn-success">Cetak
                                                Surat Pernyataan</a>
                                        @else
                                            <a href="{{ route('pemb.late.print', $item->student_id) }}"
                                               class="btn btn-success">Cetak
                                                Surat Pernyataan</a>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>
    </div>
@endsection


