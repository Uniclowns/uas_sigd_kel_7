@extends('layouts.app')
@section('container')
    <div class="container h-100">
        <div class="py-8 text-base">
            <span><a href="/dashboard" class="text-[#5C59E8]">Beranda</a> > Kelola Pemetaan Fakultas Universitas
                Tanjungpura</span>
        </div>

        @if (session()->has('success'))
            <div class="text-white py-4 bg-primary rounded-xl px-6 font-semibold mb-4 w-[30%]" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-center">
            <div class="w-[50%] ">
                <form action="/maps">
                    <input type="text" name="search" id="search" placeholder="🔍   Cari"
                        class="block w-full rounded-full px-8 py-2 text-sm">
                </form>
            </div>
        </div>

        <div class="p-2 bg-white mt-4 rounded-xl w-full py-64 mb-32">
            <table class="items-center w-full mb-0 align-top">
                <thead>
                    <tr>
                        <th class="px-6 py-3 pl-2 font-bold text-center border-b text-sm">No</th>
                        <th class="px-6 py-3 pl-2 font-bold text-center  border-b text-sm">Name</th>
                        <th class="px-6 py-3 pl-2 font-bold text-center  border-b text-sm">Latitude</th>
                        <th class="px-6 py-3 pl-2 font-bold text-center  border-b text-sm">Longitude</th>
                        <th class="px-6 py-3 pl-2 font-bold text-center  border-b text-sm">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($places as $place)
                        <tr class="border-b">
                            <td class="p-2 text-center">{{ $loop->iteration }}</td>
                            <td class="p-2 font-semibold">{{ $place->name }}</td>
                            <td class="p-2 font-semibold">{{ $place->name }}</td>
                            <td class="p-2 font-semibold">{{ $place->name }}</td>
                            <td class="p-2 font-semibold text-center">
                                <div class="flex">
                                    <div class="bg-[#4AD989] flex justify-center px-2 py-0.5 rounded-lg mx-2 items-center">
                                        <a href="{{ route('maps.edit', $place) }}" class="bg-[#4AD989] shadow-xl">
                                            <img src="/img/edit.png" alt="">
                                        </a>
                                    </div>
                                    <div class="bg-red-500 flex justify-center px-2 py-0.5 rounded-xl mx-2 items-center">
                                        <form action="{{ route('maps.destroy', $place->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="bg-[#FF0000]"
                                                onclick="confirm('Apa kamu yakin ingin menghapus place berikut ?')">
                                                <img src="/img/delete.png" alt="">
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4 flex mx-4">
                {{ $places->links() }}
            </div>
        </div>
    </div>
@endsection
