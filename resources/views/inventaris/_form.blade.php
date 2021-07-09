<div class="form-group">
    <label for="namaInventaris">Nama Inventaris</label>
    <input type="text" name="nama" class="form-control" id="namaInventaris" value="{{ $model->nama }}">
    @foreach ($errors->get('nama') as $message)
        <small class="text-danger">{{ $message }}</small>
    @endforeach
</div>
<div class="form-group">
    <label for="kodeInventaris">Kode Inventaris</label>
    <input type="text" name="kode_inventaris" maxlength="5" class="form-control" id="kodeInventaris"
        value="{{ $model->kode }}">
    @foreach ($errors->get('kode_inventaris') as $message)
        <small class="text-danger">{{ $message }}</small>
    @endforeach
</div>
<div class="form-group">
    <label for="kondisi">Kondisi</label>
    <select id="kondisi" name="kondisi" class="form-control">
        <option selected>Pilih Kondisi</option>
        @php
            $baik = '';
            $rusak_ringan = '';
            $rusak_berat = '';
        @endphp
        @switch($model->kondisi)
            @case('1')
                @php($baik = 'selected')
            @break

            @case('2')
                @php($rusak_ringan = 'selected')
            @break

            @case('3')
                @php($rusak_berat = 'selected')
            @break

            @default
                @php($baik = '')
                @php($rusak_ringan = '')
                @php($rusak_berat = '')
        @endswitch
        <option {{ $baik }} value="1">Baik</option>
        <option {{ $rusak_ringan }} value="2">Rusak Ringan</option>
        <option {{ $rusak_berat }} value="3">Rusak Berat</option>
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
    <input type="file" name="gambar" class="form-control-file border" id="gambar" value="{{ $model->gambar }}">
    @foreach ($errors->get('gambar') as $message)
        <small class="text-danger">{{ $message }}</small>
    @endforeach
    @if (strlen($model->gambar) > 0)
        <img src="{{ asset('image/' . $model->gambar) }}" width="80px" class="mt-1">
    @endif
</div>
<div class="form-group">
    <label for="id_ruang">Ruang</label>
    <select id="id_ruang" name="id_ruang" class="form-control">
        <option selected>Pilih Ruang</option>
        {{-- @foreach ($ruang as $dataRuang)
            <option value="{{ $dataRuang->id }}">{{ $dataRuang->nama }}</option>
        @endforeach --}}
        @foreach ($ruang as $dataRuang)
            @if ($dataRuang->id == $model->id_ruang)
                @php($select = 'selected')
            @else
                @php($select = '')
            @endif
            <option {{ $select }} value="{{ $dataRuang->id }}">{{ $dataRuang->nama }}</option>
        @endforeach
    </select>
    @foreach ($errors->get('id_ruang') as $message)
        <small class="text-danger">{{ $message }}</small>
    @endforeach
</div>
<a href="{{ url('inventaris') }}" class="btn btn-secondary">Back</a>
<button type="submit" class="btn btn-primary">Simpan</button>
