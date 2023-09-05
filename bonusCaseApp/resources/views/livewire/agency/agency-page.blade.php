<div class="container mt-5">
    <h2>Data Instansi</h2>
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('agency.create') }}" class="btn btn-primary">Tambah</a>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Cari" wire:model.debounce.1000ms="search">
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Aksi</th>
                <th>Instansi</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($this->agency as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <a href="{{ route('agency.edit', $item->id) }}" class="btn btn-info">Edit</a>
                        <button type="button" class="btn btn-danger"
                            wire:click="deleteItem('{{ $item->id }}')">Hapus</button>
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    {{ $this->agency->links() }}
</div>
