@extends('layouts.template')

@section('content')
<div class="text-left">
    <h1>Dashboard</h1>
    <p>Home/Data Siswa</p>
</div>
<div class="head-title">
    @if (Session::get('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
        <div class="handle">
            <a href="{{ route('student.create') }}">
                <button class="btn btn-info mb-4">Tambah Data SISwa</button></a>
        </div>
        <div class="relative top-6 overflow-x-auto shadow-md sm:rounded-lg" id="table">
                <div class="input-group mb-3">
                    <input type="text" id="search" onkeyup="tableSearch()" placeholder="Cari data..." title="Type in a name"
                class="form-control">
                  </div>
            <div id="not-found-message" role="alert">
            </div> 
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nis</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Rombel</th>
                    <th scope="col">Rayon</th>
                    @if (Auth::user()->role == 'admin')
                    <th scope="col">
                        Action
                    </th>
                @endif
                  </tr>
                </thead>
                @php $no = 1 @endphp
                @foreach ($student as $item)
                <tbody>
                  <tr>
                    <th scope="row">  {{ $no++ }}</th>
                    <td>    {{ $item['nis'] }}</td>
                    <td>  {{ $item['name'] }}</td>
                    <td>  {{ $item->rombel['rombel'] }}</td>
                    <td>  {{ $item->rayon['rayon'] }}</td>
                    @if (Auth::user()->role == 'admin')
                    <td>
                      <div class="d-flex">
                        <a href="{{ route('student.edit', $item['id']) }}" class="btn btn-success">Edit</a>
                        --
                        <form method="POST" action="{{ route('student.delete', $item->id) }}"
                            onsubmit="return confirm('Are You Sure Want To Delete This?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                      </div>
                    </td>
                @endif
                  </tr>
                </tbody>
                @endforeach
              </table>
        </div>
    </div>
@endsection

<script>
    function tableSearch() {
        const input = document.getElementById('search');
        const filter = input.value.toUpperCase();
        const table = document.getElementById("table");
        const tr = table.getElementsByTagName("tr");

        for (let i = 0; i < tr.length; i++) {
            const tds = tr[i].getElementsByTagName("td");
            let found = false;

            for (let j = 1; j < tds.length - 1; j++) { // Skip the first and last column (No and Action)
                const td = tds[j];
                if (td) {
                    const txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        found = true;
                        break;
                    }
                }
            }

            tr[i].style.display = found ? "" : "none";
            const notFoundMessage = document.getElementById('not-found-message');
            if (!found) {
                notFoundMessage.classList.remove('hidden');
            } else {
                notFoundMessage.classList.add('hidden');
            }
        }
    }
</script>


