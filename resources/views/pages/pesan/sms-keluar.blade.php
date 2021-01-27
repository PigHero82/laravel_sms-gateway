@extends('layout.layout')

@section('title', 'Pesan Keluar')

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
        <x-table title="Data Pesan Keluar" description="" id="outboxesTable" class="">
            <x-slot name="floatRight">
                <a class="btn btn-success" href="{{ url('sms/pesan-baru') }}" id="buttonCreate" title="Tambah"><i class="feather icon-plus"></i> Tambah</a>
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
                @foreach ($outboxes as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="#modal" class="modal-popup" data-value="{{ $item->id }}" data-toggle="modal" role="button">{{ $item->customer_id }}</a></td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>
                            @if ($item->status == 1)
                                <h4><i class="feather icon-check text-success"></i></h4>
                            @elseif ($item->status == 0)
                                <h4><i class="feather icon-clock text-warning"></i></h4>
                            @endif
                        </td>
                        <td><button type="button" class="btn btn-icon btn-icon rounded-circle btn-primary mr-1 mb-1 waves-effect waves-light modal-popup" data-toggle="modal" data-target="#modal" data-value="{{ $item->id }}" title="Lihat"><i class="feather icon-eye"></i></button></td>
                    </tr>
                @endforeach
            </tbody>
        </x-table>
    </section>

    {{-- Modal --}}
    <x-modal id="modal" title="Detail" class="">
        <div class="modal-body">
            <dl class="row">
                <dt class="col-sm-4 text-sm-right">ID Pelanggan</dt>
                <dd class="col-sm-8" id="customerId"></dd>
            </dl>
            
            <dl class="row">
                <dt class="col-sm-4 text-sm-right">Nama</dt>
                <dd class="col-sm-8" id="name"></dd>
            </dl>
            
            <dl class="row">
                <dt class="col-sm-4 text-sm-right">No. Telepon</dt>
                <dd class="col-sm-8" id="phone"></dd>
            </dl>
            
            <dl class="row">
                <dt class="col-sm-4 text-sm-right">Status</dt>
                <dd class="col-sm-8" id="status"></dd>
            </dl>
            
            <dl class="row">
                <dt class="col-sm-4 text-sm-right">Pesan</dt>
                <dd class="col-sm-8" id="message"></dd>
            </dl>
        </div>
    </x-modal>
@endsection

@section('js')
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#outboxesTable').DataTable({
                otherOptions: {},
                initComplete: function() {
                    $(this.api().table().container()).find('input').parent().wrap('<form>').parent().attr('autocomplete', 'off');
                },
                columnDefs: [
                    { orderable: false, targets: 4 }
                ]
            });

            $(document).on('click', '.modal-popup', function () {
                let id = $(this).attr('data-value')
                $.get("/pesan/" + id, function( data ) {
                    let d = JSON.parse(data);
                    console.log(d)
                    $('#customerId').text(d.customer_id);
                    $('#name').text(d.name);
                    $('#phone').text(d.phone);
                    $('#message').text(d.message);
                    $('#status').empty();
                    if (d.status == 0) {
                        $('#status').append('<ul class="nav nav-pills nav-pill-warning m-0"><li class="nav-item"><p class="nav-link active m-0"><i class="feather icon-clock"></i> Sedang mengirim</p></li></ul>');
                    } else if (d.status == 0) {
                        $('#status').append('<ul class="nav nav-pills nav-pill-success m-0"><li class="nav-item"><p class="nav-link active m-0"><i class="feather icon-check"></i> Terkirim</p></li></ul>');
                    }
                });
            })
        });

        $(window).resize(function() {
            if (window.innerWidth < 480) {
                $('#buttonCreate').empty();
                $('#buttonCreate').append('<i class="feather icon-plus"></i>');
            } else {
                $('#buttonCreate').empty();
                $('#buttonCreate').append('<i class="feather icon-plus"></i> Tambah');
            }
        }).resize();
    </script>
@endsection