@extends('layout.layout')

@section('title')
    SMS Terjadwal
@endsection

@section('content')
    {{-- Table --}}
    <section>
        <x-table title="Data Pesan Scheduler" description="" id="" class="">
            <x-slot name="floatRight">
                <a class="btn btn-success" href="#modalTambahPesanTerjadwal" data-toggle="modal" role="button"><i class="feather icon-plus"></i> Tambah</a>
            </x-slot>

            <thead>
                <tr>
                    <th>No</th>
                    <th>No Tujuan</th>
                    <th>Isi SMS</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </x-table>
    </section>

    {{-- Modal --}}
    <x-modal id="modalTambahPesanTerjadwal" title="Schedule Baru" class="">
        <div class="modal-body">
            <x-input-form label="Nomor HP">
                <input type="number" class="form-control" name="" id="" placeholder="Cari Nomor">
            </x-input-form>

            <x-input-form label="Pesan">
                <textarea class="form-control" name="" id="" cols="30" rows="5" placeholder="Tulis Pesan"></textarea>
            </x-input-form>

            <x-input-form label="Tanggal">
                <input type="date" class="form-control" name="" id="">
            </x-input-form>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Submit</button>
        </div>
    </x-modal>
@endsection