@extends('layout.layout')

@section('title')
    Pesan Baru
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
            {{ $message }}
        </div>
    @endif

    @if ($message = Session::get('danger'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
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
    
    <x-card-basic title="Pesan Baru" class="">
        <x-slot name="floatRight"></x-slot>
        
        <x-tab class="">
            <x-slot name="menu">
                <li class="nav-item">
                    <a class="nav-link active" id="pesan-tab" data-toggle="tab" href="#pesan" role="tab" aria-controls="pesan" aria-selected="true">Pesan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="grup-tab" data-toggle="tab" href="#grup" role="tab" aria-controls="grup" aria-selected="false">Grup</a>
                  </li>
            </x-slot>
            <div class="tab-pane fade show active" id="pesan" role="tabpanel" aria-labelledby="pesan-tab">
                <form action="{{ route('sms.send') }}" method="post">
                    @csrf
                    <!-- Receiever -->
                    <section>
                        <x-input-form label="Penerima">
                            <select name="customer_id" class="form-control" required>
                                @if (count($customer))
                                    <option value="" hidden>--Pilih pelanggan</option>
                                    @foreach ($customer as $item)
                                        <option value="{{ $item->customer_id }}">{{ $item->name . ' - ' . $item->phone }}</option>
                                    @endforeach
                                @else
                                    <option value="">Data pelanggan kosong</option>
                                @endif
                            </select>
                        </x-input-form>
                    </section>
                    <!--/ Receiever -->
            
                    <!-- Template -->
                    <section>
                        <x-input-form label="Template">
                            @if (count($template))
                                <select name="template" class="form-control" id="messageTemplate">
                                    <option value="" hidden>--Pilih template</option>
                                    @foreach ($template as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            @else
                                <input type="text" class="form-control" value="Data pelanggan kosong" disabled>
                            @endif
                        </x-input-form>
                    </section>
                    <!--/ Template -->
            
                    <!-- Message -->
                    <section>
                        <x-input-form label="Tulis Pesan">
                            <p class="font-small-1 mb-0">Atribut yang dapat digunakan:</p>
                            <p><code>[no_meter]</code> <code>[id_pelanggan]</code> <code>[nama]</code> <code>[alamat]</code> <code>[no_telepon]</code></p>
                            <textarea class="form-control" name="message" id="messageMessage" cols="30" rows="5" placeholder="Tulis Pesan" required></textarea>
                        </x-input-form>
                    </section>
                    <!--/ Message -->
                            
                    @if (count($group))
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    @else
                        <button type="submit" class="btn btn-outline-primary" disabled>Kirim</button>
                    @endif
                </form>
            </div>
            <div class="tab-pane fade" id="grup" role="tabpanel" aria-labelledby="grup-tab">
                <div class="row">
                    <div class="col col-md-8">
                        <form action="{{ route('sms.group') }}" method="post">
                            @csrf
                            <!-- Receiever -->
                            <section>
                                <x-input-form label="Penerima">
                                    @if (count($group))
                                        <select name="group_id" class="form-control" id="group" required>
                                            <option value="" hidden>--Pilih grup pelanggan</option>
                                            @foreach ($group as $item)
                                                <option value="{{ $item->id }}">{{ $item->title . ' - ' . $item->numbers_of_member . ' pelanggan' }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <input type="text" class="form-control" value="Data grup pelanggan kosong" disabled>
                                    @endif
                                </x-input-form>
                            </section>
                            <!--/ Receiever -->
                    
                            <!-- Template -->
                            <section>
                                <x-input-form label="Template">
                                    <select name="template" class="form-control" id="groupTemplate">
                                        <option value="" hidden>--Pilih template</option>
                                        @foreach ($template as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                </x-input-form>
                            </section>
                            <!--/ Template -->
                    
                            <!-- Message -->
                            <section>
                                <x-input-form label="Tulis Pesan">
                                    <p class="font-small-1 mb-0">Atribut yang dapat digunakan:</p>
                                    <p><code>[no_meter]</code> <code>[id_pelanggan]</code> <code>[nama]</code> <code>[alamat]</code> <code>[no_telepon]</code></p>
                                    <textarea class="form-control" name="message" id="groupMessage" cols="30" rows="5" placeholder="Tulis Pesan" required></textarea>
                                </x-input-form>
                            </section>
                            <!--/ Message -->
                            
                            @if (count($group))
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            @else
                                <button type="submit" class="btn btn-outline-primary" disabled>Kirim</button>
                            @endif
                        </form>
                    </div>
                    <div class="col col-md-4 hidden" id="groupCol">
                        <h4 class="mt-2 mt-md-0" id="groupTitle"></h4>
                        <p id="groupDescription"></p>
                        <div class="table-responsive">
                            <table class="table table-striped" id="groupTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No. Telepon</th>
                                        <th>Nama</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </x-tab>
    </x-card-basic>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#messageTemplate').change(function () {
                let id = $('#messageTemplate option:selected').val()
                $.get("/template/" + id, function( data ) {
                    var d = JSON.parse(data);
                    $('#messageMessage').val(d.message);
                });
            });

            $('#groupTemplate').change(function () {
                let id = $('#groupTemplate option:selected').val()
                $.get("/template/" + id, function( data ) {
                    var d = JSON.parse(data);
                    $('#groupMessage').val(d.message);
                });
            });

            $('#group').change(function () {
                let id = $('#group option:selected').val()
                $.get("/grup-kontak/" + id, function( data ) {
                    var d = JSON.parse(data);
                    console.log(d)
                    $('#groupCol').removeClass('hidden');
                    $('#groupTitle').text('');
                    $('#groupTitle').text(d.title);
                    $('#groupDescription').text('');
                    $('#groupDescription').text(d.description);
                    $('#groupTable tbody tr').remove();
                    for (let index = 0; index < d.member.length; index++) {
                        i = index+1
                        $('#groupTable > tbody').append('<tr><td>' + i + '</td><td>' + d.member[index].phone + '</td><td>' + d.member[index].name + '</td></tr>');
                    }
                });
            });
        });
    </script>
@endsection