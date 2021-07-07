<div class="form-group">
    <label for="namaInventaris">Nama Inventaris</label>
    <input type="text" name="nama" class="form-control" id="namaInventaris" value="{{ $model->nama }}">
    @foreach ($errors->get('nama') as $message)
        <small class="text-danger">{{ $message }}</small>
    @endforeach
</div>
<div class="form-group">
    <label for="kodeInventaris">Kode Inventaris</label>
    <input type="text" name="kode_Inventaris" class="form-control" id="kodeInventaris"
        value="{{ $model->kode_Inventaris }}">
    @foreach ($errors->get('kode_Inventaris') as $message)
        <small class="text-danger">{{ $message }}</small>
    @endforeach
</div>
<div class="form-group">
    <label for="kondisi">Kondisi</label>
    <select id="kondisi" name="kondisi" class="form-control">
        <option selected>Pilih Kondisi</option>
        <option value="1">Baik</option>
        <option value="2">Rusak Ringan</option>
        <option value="3">Rusak Berat</option>
    </select>
    @foreach ($errors->get('kondisi') as $message)
        <small class="text-danger">{{ $message }}</small>
    @endforeach
</div>
<div class="form-group">
    <label for="keterangan">Keterangan</label>
    <input type="text" name="keterangan" class="form-control" id="keterangan" value="{{ $model->keterangan }}">
    @foreach ($errors->get('keterangan') as $message)
        <small class="text-danger">{{ $message }}</small>
    @endforeach
</div>
<div class="form-group">
    <label for="jumlah">Jumlah</label>
    <input type="number" name="jumlah" class="form-control" id="jumlah" value="{{ $model->jumlah }}">
    @foreach ($errors->get('jumlah') as $message)
        <small class="text-danger">{{ $message }}</small>
    @endforeach
</div>
<div class="form-group">
    <label for="gambar">Gambar</label>
    <div class="custom-file">
        <input type="file" name="gambar" class="custom-file-input" id="gambar">
        <label class="custom-file-label" for="gambar">Choose file</label>
    </div>
    @foreach ($errors->get('gambar') as $message)
        <small class="text-danger">{{ $message }}</small>
    @endforeach
</div>
<div class="form-group">
    <label for="id_ruang">Ruang</label>
    <select id="id_ruang" name="id_ruang" class="form-control">
        <option selected>Pilih Ruang</option>
        @foreach ($ruang as $dataRuang)
            <option value="{{ $dataRuang->id }}">{{ $dataRuang->nama }}</option>
        @endforeach
    </select>
    @foreach ($errors->get('kondisi') as $message)
        <small class="text-danger">{{ $message }}</small>
    @endforeach
</div>
<a href="{{ url('inventaris') }}" class="btn btn-secondary">Back</a>
<button type="submit" class="btn btn-primary">Simpan</button>
