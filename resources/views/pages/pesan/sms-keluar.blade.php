@extends('layout.layout')

@section('title')
    SMS Keluar
@endsection

@section('content')
    {{-- Table --}}
    <section>
        <x-table title="Data SMS Keluar" description="" id="" class="">
            <x-slot name="floatRight">
                <a class="btn btn-success" href="#modalTambahPesanKeluar" data-toggle="modal" role="button"><i class="feather icon-plus"></i> Tambah</a>
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

    {{-- Modal --}}
    <x-modal id="modalTambahPesanKeluar" title="Template Baru" class="">
        <div class="modal-body">
            <x-input-form label="Tujuan">
                <input type="text" class="form-control" placeholder="Nama">
            </x-input-form>
            <x-input-form label="Tulis Pesan">
                <textarea class="form-control" name="" id="" cols="30" rows="5" placeholder="Tulis Pesan"></textarea>
            </x-input-form>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
        </div>
    </x-modal>
@endsection