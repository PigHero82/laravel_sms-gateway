@extends('layout.layout')

@section('title')
    SMS Masuk
@endsection

@section('content')
    {{-- Table --}}
    <section>
        <x-table title="Data SMS Masuk" description="" id="" class="">
            <x-slot name="floatRight">
                <button type="button" class="btn btn-danger"><i class="feather icon-trash"></i> Hapus SMS</button>
            </x-slot>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Pilih</th>
                    <th>Pengirim</th>
                    <th>Teks</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </x-table>
    </section>
@endsection