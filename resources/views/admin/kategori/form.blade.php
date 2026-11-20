
@php
    $isEdit = isset($kategori);
@endphp

<form
    action="{{ $isEdit ? route('kategori.update', $kategori->id) : route('kategori.store') }}"
    method="POST"
>
    @csrf

    @if($isEdit)
        @method('PUT')
    @endif

    <div style="margin-bottom: 20px;">
        <label for="nama_kategori" style="display: block; margin-bottom: 8px;">
            Nama Kategori
        </label>

        <input
            type="text"
            id="nama_kategori"
            name="nama_kategori"
            value="{{ old('nama_kategori', $isEdit ? $kategori->nama_kategori : '') }}"
            placeholder="Contoh: Nasi Box"
            required
            style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 6px;"
        >

        @error('nama_kategori')
            <small style="color: red;">{{ $message }}</small>
        @enderror
    </div>

    <div style="margin-bottom: 20px;">
        <label for="deskripsi" style="display: block; margin-bottom: 8px;">
            Deskripsi Kategori
        </label>

        <textarea
            id="deskripsi"
            name="deskripsi"
            rows="5"
            placeholder="Masukkan deskripsi kategori..."
            style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 6px;"
        >{{ old('deskripsi', $isEdit ? $kategori->deskripsi : '') }}</textarea>

        @error('deskripsi')
            <small style="color: red;">{{ $message }}</small>
        @enderror
    </div>

    <button
        type="submit"
        style="background: #8b4513; color: white; padding: 12px 20px; border: none; border-radius: 6px; cursor: pointer;"
    >
        {{ $isEdit ? 'Update Kategori' : 'Simpan Kategori' }}
    </button>

    <a
        href="{{ route('kategori.index') }}"
        style="margin-left: 10px; color: #8b4513; text-decoration: none;"
    >
        Kembali
    </a>
</form>
