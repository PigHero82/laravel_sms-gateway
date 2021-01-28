@extends('layout.layout')

@section('title')
    Grup Kontak
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
        <x-table title="Data Grup" description="" id="groupTable" class="">
            <x-slot name="floatRight">
                <a class="btn btn-success" href="#modalCreateGroup" data-toggle="modal" role="button"><i class="feather icon-plus"></i> Tambah</a>
            </x-slot>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Grup</th>
                    <th>Jumlah Pelanggan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($group as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="#modalEditGroup" class="modal-popup" data-toggle="modal" data-value="{{ $item->id }}">{{ $item->title }}</a></td>
                        <td>{{ $item->numbers_of_member }}</td>
                        <td>
                            @if ($item->status == 1)
                                <h4><i class="feather icon-eye text-primary"></i></h4>
                            @elseif ($item->status == 0)
                                <h4><i class="feather icon-eye-off"></i></h4>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('grup-kontak.destroy', $item->id)}}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus {{ $item->title }}');">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-icon btn-icon rounded-circle btn-primary mr-1 mb-1 waves-effect waves-light modal-popup" data-toggle="modal" data-target="#modalEditGroup" data-value="{{ $item->id }}"><i class="feather icon-edit-2"></i></button>
                                <button type="submit" class="btn btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1 waves-effect waves-light"><i class="feather icon-trash-2"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-table>
    </section>

    {{-- Modal Create --}}
    <x-modal id="modalCreateGroup" title="Tambah Grup" class="">
        <form action="{{ route('grup-kontak.store') }}" method="post" id="formCreateGroup">
            @csrf
            <div class="modal-body">
                <x-input-form label="Nama">
                    <input type="text" class="form-control" name="title" placeholder="Nama" required>
                </x-input-form>
    
                <x-input-form label="Deskripsi">
                    <input type="text" class="form-control" name="description" placeholder="Deskripsi">
                </x-input-form>
    
                <x-input-form label="Anggota">
                    <table class="table table-striped modal-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>ID Pelanggan</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($customer as $item)
                                <tr>
                                    <td><input type="checkbox" name="meter_id[]" value="{{ $item->meter_id }}"></td>
                                    <td>{{ $item->meter_id }}</td>
                                    <td>{{ $item->name }}</td>
                                </tr>
                            @empty
                                Data pelanggan kosong
                            @endforelse
                        </tbody>
                    </table>
                </x-input-form>
            </div>
    
            <div class="modal-footer">
                <button type="submit" id="#submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </x-modal>

    {{-- Modal Edit --}}
    <x-modal id="modalEditGroup" title="Ubah Grup" class="">
        <form action="#" method="post" id="formEditGroup">
            @csrf
            @method('PATCH')
            <div class="modal-body">
                <x-input-form label="Nama">
                    <input type="text" class="form-control" name="title" id="titleEditGroup" placeholder="Nama" required>
                </x-input-form>
    
                <x-input-form label="Deskripsi">
                    <input type="text" class="form-control" name="description" id="descriptionEditGroup" placeholder="Deskripsi">
                </x-input-form>
    
                <x-input-form label="Status">
                    <br>
                    <li class="d-inline-block mr-2">
                        <fieldset>
                            <div class="vs-radio-con">
                                <input type="radio" name="status" id="statusEditGroup1" value="1">
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
                                <input type="radio" name="status" id="statusEditGroup0" value="0">
                                <span class="vs-radio">
                                    <span class="vs-radio--border"></span>
                                    <span class="vs-radio--circle"></span>
                                </span>
                                <span class="">Tidak aktif</span>
                            </div>
                        </fieldset>
                    </li>
                </x-input-form>
    
                <x-input-form label="Anggota">
                    <table class="table table-striped modal-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>ID Pelanggan</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($customer as $item)
                                <tr>
                                    <td><input class="checkbox" type="checkbox" name="meter_id[]" id="member-{{ $item->meter_id }}" value="{{ $item->meter_id }}" selected></td>
                                    <td>{{ $item->meter_id }}</td>
                                    <td>{{ $item->name }}</td>
                                </tr>
                            @empty
                                Data pelanggan kosong
                            @endforelse
                        </tbody>
                    </table>
                </x-input-form>
            </div>
    
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </x-modal>
@endsection

@section('js')
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#groupTable').DataTable({
                columnDefs: [
                    { orderable: false, targets: 3 },
                ],
                initComplete: function() {
                    $(this.api().table().container()).find('input').parent().wrap('<form>').parent().attr('autocomplete', 'off');
                }
            });
            
            $('.modal-table').DataTable({
                columnDefs: [
                    { orderable: false, targets: 0 }
                ]
            });

            $(document).on('click', '.modal-popup', function () {
                let id = $(this).attr('data-value')
                $.get("/grup-kontak/" + id, function( data ) {
                    var d = JSON.parse(data);
                    $("#formEditGroup").attr("action", "{{ url('/grup-kontak') }}/" + d.id);
                    $('#titleEditGroup').val(d.title);
                    $('#descriptionEditGroup').val(d.description);
                    $('#statusEditGroup0').attr('checked', false);
                    $('#statusEditGroup1').attr('checked', false);
                    if (d.status == 0) {
                        $('#statusEditGroup0').attr('checked', true);
                    } else if (d.status == 1) {
                        $('#statusEditGroup1').attr('checked', true);
                    }
                    $('.checkbox').attr('checked', false);
                    for (let index = 0; index < d.member.length; index++) {
                        $('#member-'+ d['member'][index].meter_id).attr('checked', true);
                    }
                });
            });

            $(document).on('submit', '#formCreateGroup', function (e) {
                console.log(("#formCreateGroup input:checkbox:checked").length);
                if ($("#formCreateGroup input:checkbox:checked").length == 0)
                {
                    alert('Grup wajib memiliki minimal satu anggota');
                    e.preventDefault();
                }
            });
        });

        // (function() {
        //     const form = document.querySelector('#formCreateGroup');
        //     if ($("#formCreateGroup input:checkbox:checked").length == 0)
        //     {
        //         alert('Grup wajib memiliki minimal satu anggota');
        //     }
        //     const checkboxes = form.querySelectorAll('input[type=checkbox]');
        //     const checkboxLength = checkboxes.length;
        //     const firstCheckbox = checkboxLength > 0 ? checkboxes[0] : null;

        //     function init() {
        //         if (firstCheckbox) {
        //             for (let i = 0; i < checkboxLength; i++) {
        //                 checkboxes[i].addEventListener('change', checkValidity);
        //             }

        //             checkValidity();
        //         }
        //     }

        //     function isChecked() {
        //         for (let i = 0; i < checkboxLength; i++) {
        //             if (checkboxes[i].checked) return true;
        //         }

        //         return false;
        //     }

        //     function checkValidity() {
        //         const errorMessage = !isChecked() ? 'Grup wajib memiliki minimal satu anggota' : '';
        //         firstCheckbox.setCustomValidity(errorMessage);
        //     }

        //     init();
        // })();

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