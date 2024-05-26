@extends('layouts.app')
@section('container')
    <div class="flex items-center justify-center">
        <div class="mx-12 ">
            <h1 class="text-3xl font-bold text-center">Pemetaan Fakultas Universitas Tanjungpura</h1>
            @foreach ($places as $place)
                <div><i class="fa-solid fa-location-dot"></i> {{ $place->nama }}</div>
            @endforeach
            <a href="{{ route('maps.create') }}" class="bg-yellow-400 px-2 py-6 mt-12 text-white rounded-xl">
                Tambah Data Fakultas
            </a>
        </div>
        <div id="map"></div>
    </div>
@endsection
