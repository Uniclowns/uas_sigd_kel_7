@extends('layouts.app')
@section('container')
    <div class="container bg-[#DDE4FF] h-[200vh]">
        <div class="py-8 text-base">
            <span><a href="/dashboard" class="text-[#5C59E8]">Beranda</a> > Kelola Driver</span>
        </div>

        @if (session()->has('success'))
            <div class="text-white py-4 bg-primary rounded-xl px-6 font-semibold mb-4 w-[30%]" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-center">
            <div class="w-[50%] ">
                <form action="/driver">
                    <input type="text" name="search" id="search" placeholder="🔍   Cari"
                           class="block w-full bg-[#F6F6F6] rounded-full px-8 py-2 focus:ring-[##4880FF] focus:border-[##4880FF] text-[#202224] text-sm border border-[#D5D5D5] placeholder-[#202224]">
                </form>
            </div>

            <div class="bg-primary rounded-xl">
                <a class="flex items-center p-2" href="/driver/create">
                    <img src="/img/plus.png" > <span class="text-white font-sans font-bold"> Terima Driver</span>
                </a>
            </div>
        </div>

        <div class="p-2 bg-white mt-4 rounded-xl w-full py-64 mb-32">
            <table class="items-center w-full mb-0 align-top">
                <thead>
                <tr>
                    <th class="px-6 py-3 pl-2 font-bold text-center border-b text-sm">No</th>
                    <th class="px-6 py-3 pl-2 font-bold text-center  border-b text-sm">Nama</th>
                    <th class="px-6 py-3 pl-2 font-bold text-center  border-b text-sm">Alamat</th>
                    <th class="px-6 py-3 pl-2 font-bold text-center  border-b text-sm">No. Handphone</th>
                    <th class="px-6 py-3 pl-2 font-bold text-center  border-b text-sm">Foto Profil</th>
                    <th class="px-6 py-3 pl-2 font-bold text-center  border-b text-sm">Plat Kendaraan</th>
                    <th class="px-6 py-3 pl-2 font-bold text-center  border-b text-sm">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($places as $place)
                    <tr class="border-b">
                        <td class="p-2 text-center">{{ $loop->iteration }}</td>
                        <td class="p-2 font-semibold">{{ $place->nama }}</td>
                        <td class="p-2 font-semibold">{{ $place->alamat }}</td>
                        <td class="p-2 font-semibold text-center">{{ $place->no_hp }}</td>
                        <td class="p-2 font-semibold text-center">{{ $place->foto_profil }}</td>
                        <td class="p-2 font-semibold text-center">{{ $place->plat_kendaraan }}</td>
                        <td class="p-2 font-semibold text-center">
                            <div class="flex">
                                <div class="bg-[#4AD989] flex justify-center px-2 py-0.5 rounded-lg mx-2 items-center">
                                    <a href="/driver/{{ $driver->id }}/edit" class="bg-[#4AD989] shadow-xl">
                                        <img src="/img/edit.png" alt="">
                                    </a>
                                </div>
                                <div class="bg-red-500 flex justify-center px-2 py-0.5 rounded-xl mx-2 items-center">
                                    <form action="{{ route('driver.destroy', $driver->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="bg-[#FF0000]" onclick="confirm('Apa kamu yakin ingin menghapus driver berikut ?')">
                                            <img src="/img/delete.png" alt="">
                                        </button>
                                    </form>
                                </div>
                                <div class="flex justify-center px-2 py-0.5 rounded-xl items-center" style="background-color: #FCBE2D;">
                                    <a href="/driver/{{ $driver->id }}" class="shadow-xl bg-yellow-400" style="background-color: #FCBE2D;">
                                        <img src="/img/show.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-4 flex mx-4">
                {{ $drivers->links() }}
            </div>
        </div>
    </div>
@endsection
