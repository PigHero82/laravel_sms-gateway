@extends('layout.layout')

@section('title')
    List Kontak
@endsection

@section('content')
    {{-- Table --}}
    <section>
        <div class="row">
            {{-- Data Kontak --}}
            <x-table title="Data Kontak" description="" id="" class="col-md-8">
                <x-slot name="floatRight">
                    <a class="btn btn-success" href="#modalTambahKontak" data-toggle="modal" role="button"><i class="feather icon-plus"></i> Tambah</a>
                    <a class="btn btn-primary" href="#modalImportKontak" data-toggle="modal" role="button"><i class="feather icon-upload"></i> Import</a>
                </x-slot>
    
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Pelanggan</th>
                        <th>Nama</th>
                        <th>No. Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customer as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="#modalUbahKontak" data-toggle="modal" data-value="{{ $item->customer_id }}">{{ $item->customer_id }}</a></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>
                                <button type="button" class="btn btn-icon btn-icon rounded-circle btn-primary mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-target="#modalUbahKontak" data-value="{{ $item->customer_id }}"><i class="feather icon-edit-2"></i></button>
                                <button type="button" class="btn btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1 waves-effect waves-light"><i class="feather icon-trash-2"></i></button>
                            </td>
                        </tr>
                    @empty
                        <h4>Tidak ada data</h4>
                    @endforelse
                </tbody>
            </x-table>

            {{-- Data Grup --}}
            <x-table title="Data Grup" description="" id="" class="col-md-4">
                <x-slot name="floatRight"></x-slot>
                <thead>
                    <tr>
                        <th>Grup</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </x-table>
        </div>
    </section>

    {{-- Modal Tambah Kontak --}}
    <x-modal id="modalTambahKontak" title="Ubah Kontak" class="">
        <div class="modal-body">
            <x-input-form label="Nama">
                <input type="text" class="form-control" name="" id="" placeholder="Nama">
            </x-input-form>
            
            <x-input-form label="Email">
                <input type="email" class="form-control" name="" id="" placeholder="Email">
            </x-input-form>

            <select class="" id="exampleFormControlSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            
            <x-input-form label="Negara">
                <select name="" class="form-control" id="">
                    <option value="" hidden>-- Pilih Negara --</option>
                    <option value="">Indonesia</option>
                    <option value="">Malaysia</option>
                </select>
            </x-input-form>
            
            <x-input-form label="Kode Negara">
                <input type="number" class="form-control" name="" id="" placeholder="Kode Negara">
            </x-input-form>
            
            <x-input-form label="Nomor HP">
                <input type="number" class="form-control" name="" id="" placeholder="Nomor HP">
            </x-input-form>

            <x-input-form label="Grup">
                <select name="" class="form-control" id="">
                    <option value="" hidden>-- Pilih Grup --</option>
                    <option value="">Default</option>
                    <option value="">Modem</option>
                </select>
            </x-input-form>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Submit</button>
        </div>
    </x-modal>

    {{-- Modal Ubah Kontak --}}
    <x-modal id="modalUbahKontak" title="Ubah Kontak" class="">
        <div class="modal-body">
            <x-input-form label="Nama">
                <input type="text" class="form-control" name="" id="" placeholder="Nama">
            </x-input-form>
            
            <x-input-form label="Email">
                <input type="email" class="form-control" name="" id="" placeholder="Email">
            </x-input-form>

            <select class="" id="exampleFormControlSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            
            <x-input-form label="Negara">
                <select name="" class="form-control" id="">
                    <option value="" hidden>-- Pilih Negara --</option>
                    <option value="">Indonesia</option>
                    <option value="">Malaysia</option>
                </select>
            </x-input-form>
            
            <x-input-form label="Kode Negara">
                <input type="number" class="form-control" name="" id="" placeholder="Kode Negara">
            </x-input-form>
            
            <x-input-form label="Nomor HP">
                <input type="number" class="form-control" name="" id="" placeholder="Nomor HP">
            </x-input-form>

            <x-input-form label="Grup">
                <select name="" class="form-control" id="">
                    <option value="" hidden>-- Pilih Grup --</option>
                    <option value="">Default</option>
                    <option value="">Modem</option>
                </select>
            </x-input-form>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Submit</button>
        </div>
    </x-modal>

    {{-- Modal Import Kontak --}}
    <x-modal id="modalImportKontak" title="Import Kontak" class="">
        <div class="modal-body">
            <x-input-form  label="File Excel (.xlsx)">
                <input type="file" class="form-control" name="" id="">
            </x-input-form>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Upload</button>
        </div>
    </x-modal>
@endsection