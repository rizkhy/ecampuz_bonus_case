<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Instansi</div>
                <div class="card-body">
                    <form wire:submit.prevent="saved()">
                        <div class="form-group">
                            <label for="name">Instansi</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                wire:model="name" placeholder="Enter name" autocomplete="off">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" wire:model="description"
                                placeholder="Enter your description" autocomplete="off"></textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
