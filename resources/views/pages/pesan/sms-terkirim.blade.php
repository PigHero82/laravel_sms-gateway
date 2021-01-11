@extends('layout.layout')

@section('title')
    SMS Terkirim
@endsection

@section('content')
    {{-- Table --}}
    <section>
        <x-table title="Data SMS Terkirim" description="" id="" class="">
            <x-slot name="floatRight">
                <div class="form-check d-inline">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue">
                    Hapus Semua
                  </label>
                </div>
                <button type="button" class="btn btn-danger d-inline"><i class="feather icon-trash"></i> Hapus SMS</button>
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