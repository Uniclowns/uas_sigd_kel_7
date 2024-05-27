@extends('layouts.app')
@section('container')
    <div class="flex items-center justify-center">
        <div class="mx-12 bg-white shadow-xl rounded-xl p-4">
            <h1 class="text-3xl font-bold text-center">Penambahan Data Fakultas Universitas Tanjungpura</h1>
            <form class="mt-4 px-4" method="post" action="{{ route('maps.store') }}">
              @csrf
              <label for="name" class="block font-bold ">Nama Fakultas</label>
              <input type="text" name="name" id="name" class="shadow-xl p-2 rounded-lg w-full mt-2 mb-4" value="{{ old('name') }}">
              @error('name')
                  <div class="text-red-500">
                      {{ $message }}
                  </div>
              @enderror
              <label for="latitude" class="block font-bold ">Latitude</label>
              <input type="text" name="latitude" id="latitude" class="shadow-xl p-2 rounded-lg w-full mt-2 mb-4" value="{{ old('latitude') }}">
              @error('latitude')
                  <div class="text-red-500">
                      {{ $message }}
                  </div>
              @enderror
              <label for="longitude" class="block font-bold ">Longitude</label>
              <input type="text" name="longitude" id="longitude" class="shadow-xl p-2 rounded-lg w-full mt-2 mb-4" value="{{ old('longitude') }}">
              @error('nama')
                  <div class="text-red-500">
                      {{ $message }}
                  </div>
              @enderror
              <button type="submit" class="bg-yellow-400 px-3 py-4 mt-4 text-white rounded-xl font-bold w-full">Tambahkan data</button>
            </form>
        </div>
        <div id="map"></div>
    </div>
@endsection
