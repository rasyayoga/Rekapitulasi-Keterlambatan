@extends('layouts.template')

@section('content')
    <div class="mt-5 max-w-full mx-10">
        <div class="container mb-5">
            <h2 class="text-3xl font-semibold mb-2">Data Keterlambatan</h2>
            @if (Auth::user()->role == 'admin')
                <p>Admin / Data Keterlambatan</p>
            @else
                <p>Pembimbing / Data Keterlambatan</p>
            @endif
        </div>
        @if (Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}</div>
        @endif
        <div class="handle">
            @if (Auth::user()->role == 'admin')
                <a href="{{ route('late.create') }}"
                    class="btn btn-info">Tambah</a>
            @endif

            @if (Auth::user()->role == 'admin')
                <a href="{{ route('late.export') }}"
                    class="btn btn-secondary">Export
                    Data Keterlambatan</a>
            @else
                <a href="{{ route('pemb.late.export') }}"
                    class="btn btn-secondary">Export
                    Data Keterlambatan</a>
            @endif

        </div>
        <div class="relative top-6 overflow-x-auto overflow-y-auto shadow-md sm:rounded-lg">
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
                                Nama
                            </th>
                            <th scope="col">
                                Tanggal
                            </th>
                            <th scope="col">
                                Informasi
                            </th>

                            @if (Auth::user()->role == 'admin')
                                <th scope="col">
                                    Action
                                </th>
                            @endif
                        </tr>
                    </thead>
                    @php $no = 1 @endphp
                    @foreach ($lates as $item)
                        <tbody>
                            <tr>
                                <td>
                                    {{ $no++ }}
                                </td>
                                <td>
                                    {{ $item->student['name'] }}
                                </td>
                                <td>
                                    {{ $item->date_time_late }}
                                </td>
                                <td>
                                    {{ $item->information }}
                                </td>

                                @if (Auth::user()->role == 'admin')
                                    <td class="d-flex">
                                        <div class="mb-4">
                                            <a href="{{ route('late.edit', $item['id']) }}"
                                                class="btn btn-success">Edit</a>
                                        </div>
                                        ==
                                        <form method="POST" action="{{ route('late.delete', $item->id) }}"
                                            onsubmit="return confirm('Are You Sure Want To Delete This?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        </tbody>
                    @endforeach
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
                                NIS
                            </th>
                            <th scope="col">
                                Nama
                            </th>
                            <th scope="col">
                                Tanggal
                            </th>
                            <th scope="col">
                                Informasi
                            </th>
                        </tr>
                    </thead>
                    @php $no = 1 @endphp
                    @foreach ($lates as $item)
                        <tbody>
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
                                    {{ $item->date_time_late }}
                                </td>
                                <td>
                                    {{ $item->information }}
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
@endsection

<script></script>



