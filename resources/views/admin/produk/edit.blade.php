
@extends('layouts.app')

@section('title', 'Edit Produk | NARA CATERING')

@section('content')

<div class="container" style="padding-top:40px; padding-bottom:40px;">

    <h1 style="font-family:'Playfair Display',serif; margin-bottom:10px;">
        Edit Produk
    </h1>

    <p style="color:#887568; margin-bottom:25px;">
        Perbarui informasi produk NARA CATERING.
    </p>

    @include('admin.produk.form')

</div>

@endsection
