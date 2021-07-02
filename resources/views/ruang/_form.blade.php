<div class="form-group">
    <label for="namaRuang">Nama Ruang</label>
    <input type="text" name="nama" class="form-control" id="namaRuang" value="{{$model->nama}}">
    @foreach($errors->get('nama') as $message)
        <small class="text-danger">{{ $message }}</small>
    @endforeach
</div>
<div class="form-group">
    <label for="kodeRuang">Kode Ruang</label>
    <input type="text" name="kode_ruang" class="form-control" id="kodeRuang" value="{{$model->kode_ruang}}">
    @foreach($errors->get('kode_ruang') as $message)
        <small class="text-danger">{{ $message }}</small>
    @endforeach
</div>
<div class="form-group">
    <label for="keterangan">Keterangan</label>
    <input type="text" name="keterangan" class="form-control" id="keterangan" value="{{$model->keterangan}}">
    @foreach($errors->get('keterangan') as $message)
        <small class="text-danger">{{ $message }}</small>
    @endforeach
</div>
<a href="{{ url('ruang') }}" class="btn btn-secondary">Back</a>
<button type="submit" class="btn btn-primary">Simpan</button>