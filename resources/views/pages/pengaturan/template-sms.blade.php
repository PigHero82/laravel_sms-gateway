@extends('layout.layout')

@section('title')
    Template SMS
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
    <x-table title="Data Template SMS" class="" description="" id="myTable">
        <x-slot name="floatRight">
            <a href="#modalCreateTemplate" class="btn btn-success" data-toggle="modal"><i class="feather icon-plus"></i> Tambah</a>
        </x-slot>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($template as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="#modalEditTemplate" class="modal-popup" data-toggle="modal" data-value="{{ $item->id }}">{{ $item->title }}</a></td>
                    <td>{{ $item->message }}</td>
                    <td>
                        <form action="{{ route('template.destroy', $item->id)}}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus {{ $item->title }}');">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-icon btn-icon rounded-circle btn-primary mr-1 mb-1 waves-effect waves-light modal-popup" data-toggle="modal" data-target="#modalEditTemplate" data-value="{{ $item->id }}"><i class="feather icon-edit-2"></i></button>
                            <button type="submit" class="btn btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1 waves-effect waves-light"><i class="feather icon-trash-2"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>

    {{-- Modal --}}
    <x-modal title="Tambah Template" class="" id="modalCreateTemplate">
        <form action="{{ route('template.store') }}" method="post">
            @csrf
            <div class="modal-body">
                <x-input-form label="Judul">
                    <input type="text" class="form-control" name="title" placeholder="Judul">
                </x-input-form>
                <x-input-form label="Template SMS">
                    <p class="font-small-1 mb-0">Atribut yang dapat digunakan:</p>
                    <p><code>[no_meter]</code> <code>[id_pelanggan]</code> <code>[nama]</code> <code>[alamat]</code> <code>[no_telepon]</code></p>
                    <textarea class="form-control" name="message" cols="30" rows="10" placeholder="Isi"></textarea>
                </x-input-form>
            </div>
    
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </x-modal>

    {{-- Modal --}}
    <x-modal title="Ubah Template" class="" id="modalEditTemplate">
        <form action="#" method="post" id="formEditTemplate">
            @csrf
            @method('PATCH')
            <div class="modal-body">
                <x-input-form label="Judul">
                    <input type="text" class="form-control" name="title" id="titleEditTemplate" placeholder="Judul">
                </x-input-form>
                <x-input-form label="Template SMS">
                    <p class="font-small-1 mb-0">Atribut yang dapat digunakan:</p>
                    <p><code>[no_meter]</code> <code>[id_pelanggan]</code> <code>[nama]</code> <code>[alamat]</code> <code>[no_telepon]</code></p>
                    <textarea class="form-control" name="message" id="messageEditTemplate" cols="30" rows="10" placeholder="Isi"></textarea>
                </x-input-form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </x-modal>
@endsection

@section('js')
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                otherOptions: {},
                initComplete: function() {
                    $(this.api().table().container()).find('input').parent().wrap('<form>').parent().attr('autocomplete', 'off');
                },
                columnDefs: [
                    { orderable: false, targets: 3 }
                ]
            });

            $(document).on('click', '.modal-popup', function () {
                let id = $(this).attr('data-value')

                
                $.get("/template/" + id, function( data ) {
                    var d = JSON.parse(data);
                    $("#formEditTemplate").attr("action", "{{ url('/template') }}/" + d.id);
                    $('#messageEditTemplate').val(d.message);
                    $('#titleEditTemplate').val(d.title);
                });
            })
        });
    </script>
@endsection