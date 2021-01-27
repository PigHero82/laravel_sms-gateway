@extends('layout.layout')

@section('title')
    List Kontak
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endsection

@section('content')
    {{-- Alert --}}
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert"><i class="feather icon-x"></i></button>
            {{ $message }}
        </div>
    @endif

    @if ($message = Session::get('danger'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert"><i class="feather icon-x"></i></button>
            {{ $message }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-block">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Table --}}
    <section>
        <div class="row">
            {{-- Data Kontak --}}
            <x-table title="Data Kontak" description="" id="customerTable" class="col-md-8">
                
                <x-slot name="floatRight">
                    <a class="btn btn-success" href="#modalTambahKontak" id="buttonCreate" data-toggle="modal" role="button" title="Tambah"><i class="feather icon-plus"></i> Tambah</a>
                    <a class="btn btn-primary" href="#modalImportKontak" id="buttonImport" data-toggle="modal" role="button" title="Import"><i class="feather icon-upload"></i> Import</a>
                </x-slot>
    
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Pelanggan</th>
                        <th>Nama</th>
                        <th>No. Telepon</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customer as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="#modalEdit" class="modal-popup" data-toggle="modal" data-value="{{ $item->customer_id }}">{{ $item->customer_id }}</a></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>
                                @if ($item->status == 1)
                                    <h4><i class="feather icon-eye text-primary"></i></h4>
                                @elseif ($item->status == 0)
                                    <h4><i class="feather icon-eye-off"></i></h4>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('kontak.destroy', $item->customer_id)}}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus {{ $item->name }}');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-icon btn-icon rounded-circle btn-primary mr-1 mb-1 waves-effect waves-light modal-popup" data-toggle="modal" data-target="#modalEdit" data-value="{{ $item->customer_id }}" title="Ubah"><i class="feather icon-edit-2"></i></button>
                                    <button type="submit" class="btn btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1 waves-effect waves-light" title="Hapus"><i class="feather icon-trash-2"></i></button>
                                </form>
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
    <x-modal id="modalTambahKontak" title="Tambah Kontak Pelanggan" class="">
        <form action="{{ route('kontak.store') }}" method="post">
            @csrf
            <div class="modal-body">
                <x-input-form label="No. Meter">
                    <input type="number" class="form-control" name="meter_no" placeholder="No. Meter" required>
                </x-input-form>
                
                <x-input-form label="ID Pelanggan">
                    <input type="number" class="form-control" name="customer_id" placeholder="ID Pelanggan" required>
                </x-input-form>

                <x-input-form label="Nama">
                    <input type="text" class="form-control" name="name" placeholder="Nama" required>
                </x-input-form>
                
                <x-input-form label="No. Telepon">
                    <input type="number" class="form-control" name="phone" placeholder="No. Telepon" required>
                </x-input-form>
                
                <x-input-form label="Alamat">
                    <textarea class="form-control" name="address" rows="3" placeholder="Alamat" required></textarea>
                </x-input-form>
            </div>
    
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </x-modal>

    {{-- Modal Ubah Kontak --}}
    <x-modal id="modalEdit" title="Ubah Kontak Pelanggan" class="">
        <form action="#" method="post" id="formEdit">
            @csrf
            @method('PATCH')
            <div class="modal-body">
                <x-input-form label="No. Meter">
                    <input type="number" class="form-control" name="meter_no" id="meterNoEdit" placeholder="No. Meter" required>
                </x-input-form>
                
                <x-input-form label="ID Pelanggan">
                    <input type="number" class="form-control" name="customer_id" id="customerIdEdit" placeholder="ID Pelanggan" required>
                </x-input-form>

                <x-input-form label="Nama">
                    <input type="text" class="form-control" name="name" id="nameEdit" placeholder="Nama" required>
                </x-input-form>
                
                <x-input-form label="No. Telepon">
                    <input type="number" class="form-control" name="phone" id="phoneEdit" placeholder="No. Telepon" required>
                </x-input-form>
                
                <x-input-form label="Alamat">
                    <textarea class="form-control" name="address" id="addressEdit" rows="3" placeholder="Alamat" required></textarea>
                </x-input-form>
    
                <x-input-form label="Status">
                    <br>
                    <li class="d-inline-block mr-2">
                        <fieldset>
                            <div class="vs-radio-con">
                                <input type="radio" name="status" id="statusEdit1" value="1">
                                <span class="vs-radio">
                                    <span class="vs-radio--border"></span>
                                    <span class="vs-radio--circle"></span>
                                </span>
                                <span class="">Aktif</span>
                            </div>
                        </fieldset>
                    </li>
                    <li class="d-inline-block mr-2">
                        <fieldset>
                            <div class="vs-radio-con">
                                <input type="radio" name="status" id="statusEdit0" value="0">
                                <span class="vs-radio">
                                    <span class="vs-radio--border"></span>
                                    <span class="vs-radio--circle"></span>
                                </span>
                                <span class="">Tidak aktif</span>
                            </div>
                        </fieldset>
                    </li>
                </x-input-form>
            </div>
    
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
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

@section('js')
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#customerTable').DataTable({
                columnDefs: [
                    { orderable: false, targets: 4 },
                ],
                initComplete: function() {
                    $(this.api().table().container()).find('input').parent().wrap('<form>').parent().attr('autocomplete', 'off');
                }
            });

            $(document).on('click', '.modal-popup', function () {
                let id = $(this).attr('data-value')
                $.get("/kontak/" + id, function( data ) {
                    var d = JSON.parse(data);
                    console.log(d)
                    $("#formEdit").attr("action", "{{ url('/kontak') }}/" + d.customer_id);
                    $('#meterNoEdit').val(d.meter_no);
                    $('#customerIdEdit').val(d.customer_id);
                    $('#nameEdit').val(d.name);
                    $('#phoneEdit').val(d.phone);
                    $('#addressEdit').val(d.address);
                    $('#statusEditGroup0').attr('checked', false);
                    $('#statusEditGroup1').attr('checked', false);
                    if (d.status == 0) {
                        $('#statusEdit0').attr('checked', true);
                    } else if (d.status == 1) {
                        $('#statusEdit1').attr('checked', true);
                    }
                });
            });
        })

        $(window).resize(function() {
            if (window.innerWidth < 480) {
                $('#buttonCreate').empty();
                $('#buttonImport').empty();
                $('#buttonCreate').append('<i class="feather icon-plus"></i>');
                $('#buttonImport').append('<i class="feather icon-upload"></i>');
            } else {
                $('#buttonCreate').empty();
                $('#buttonImport').empty();
                $('#buttonCreate').append('<i class="feather icon-plus"></i> Tambah');
                $('#buttonImport').append('<i class="feather icon-upload"></i> Upload');   
            }
        }).resize();

        document.addEventListener("DOMContentLoaded", function() {
            var elements = document.getElementsByTagName("INPUT");
            for (var i = 0; i < elements.length; i++) {
                elements[i].oninvalid = function(e) {
                    e.target.setCustomValidity("");
                    if (!e.target.validity.valid) {
                        e.target.setCustomValidity("Kolom ini tidak boleh kosong");
                    }
                };
                elements[i].oninput = function(e) {
                    e.target.setCustomValidity("");
                };
            }
        });
    </script>
@endsection