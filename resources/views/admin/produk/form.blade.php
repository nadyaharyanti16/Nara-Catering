
@php
    $isEdit = isset($produk);
@endphp

<form
    action="{{ $isEdit ? route('produk.update', $produk->id) : route('produk.store') }}"
    method="POST"
    enctype="multipart/form-data"
    style="background:white; padding:25px; border-radius:12px; max-width:700px;"
>
    @csrf

    @if($isEdit)
        @method('PUT')
    @endif

    <div style="margin-bottom:18px;">
        <label>Nama Produk</label>
        <input type="text" name="nama_produk"
               value="{{ old('nama_produk', $produk->nama_produk ?? '') }}"
               required maxlength="150"
               style="width:100%; padding:12px; margin-top:8px; border:1px solid #D8C3B2; border-radius:8px;">
        @error('nama_produk')
            <small style="color:red;">{{ $message }}</small>
        @enderror
    </div>

    <div style="margin-bottom:18px;">
        <label>Kategori</label>
        <select name="kategori_id" required
                style="width:100%; padding:12px; margin-top:8px; border:1px solid #D8C3B2; border-radius:8px;">
            <option value="">-- Pilih Kategori --</option>

            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}"
                    {{ old('kategori_id', $produk->kategori_id ?? '') == $kategori->id ? 'selected' : '' }}>
                    {{ $kategori->nama_kategori }}
                </option>
            @endforeach
        </select>
        @error('kategori_id')
            <small style="color:red;">{{ $message }}</small>
        @enderror
    </div>

    <div style="margin-bottom:18px;">
        <label>Harga (Rp)</label>
        <input type="number" name="harga"
               value="{{ old('harga', $produk->harga ?? '') }}"
               min="1" required
               style="width:100%; padding:12px; margin-top:8px; border:1px solid #D8C3B2; border-radius:8px;">
        @error('harga')
            <small style="color:red;">{{ $message }}</small>
        @enderror
    </div>

    <div style="margin-bottom:18px;">
        <label>Stok</label>
        <input type="number" name="stok"
               value="{{ old('stok', $produk->stok ?? 0) }}"
               min="0" required
               style="width:100%; padding:12px; margin-top:8px; border:1px solid #D8C3B2; border-radius:8px;">
        @error('stok')
            <small style="color:red;">{{ $message }}</small>
        @enderror
    </div>

    <div style="margin-bottom:18px;">
        <label>Deskripsi Produk</label>
        <textarea name="deskripsi" rows="4"
                  style="width:100%; padding:12px; margin-top:8px; border:1px solid #D8C3B2; border-radius:8px;">{{ old('deskripsi', $produk->deskripsi ?? '') }}</textarea>
        @error('deskripsi')
            <small style="color:red;">{{ $message }}</small>
        @enderror
    </div>

    <div style="margin-bottom:18px;">
        <label>Foto Produk</label>
        <input type="file" name="gambar" accept="image/*"
               style="display:block; margin-top:10px;">
        <small style="color:#887568;">Format JPG, JPEG, PNG, WEBP. Maksimal 2 MB.</small>

        @error('gambar')
            <br>
            <small style="color:red;">{{ $message }}</small>
        @enderror

        @if($isEdit && $produk->gambar)
            <div style="margin-top:15px;">
                <p>Foto saat ini:</p>
                <img src="{{ asset('storage/'.$produk->gambar) }}"
                     width="150"
                     style="border-radius:10px; margin-top:8px;">
            </div>
        @endif
    </div>

    <button type="submit" class="btn">
        {{ $isEdit ? 'Simpan Perubahan' : 'Tambah Produk' }}
    </button>

    <a href="{{ route('produk.index') }}"
       style="margin-left:12px; color:#A65F3F; text-decoration:none;">
        Batal
    </a>

</form>
