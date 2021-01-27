{{-- Home --}}
<li class=" nav-item"><a href="{{ url('/') }}" title="Dasbor"><i class="feather icon-home"></i><span class="menu-title">Dasbor</span></a></li>
<li class=" nav-item"><a href="{{ route('sms.index') }}" title="Buat Pesan"><i class="feather icon-mail"></i><span class="menu-title">Buat Pesan</span></a></li>

{{-- Folder --}}
<li class=" navigation-header"><span>Folder</span></li>
<li class=" nav-item"><a href="{{ url('/sms-terkirim') }}" title="Pesan Keluar"><i class="feather icon-send"></i><span class="menu-title">Pesan Keluar</span></a></li>
<li class=" nav-item"><a href="{{ url('/sms-terjadwal') }}" title="Pesan Terjadwal"><i class="feather icon-clock"></i><span class="menu-title">Pesan Terjadwal</span></a></li>

{{-- Pengaturan --}}
<li class=" navigation-header"><span>Pengaturan</span></li>
<li class=" nav-item"><a href="#"><i class="feather icon-users" title="Kontak"></i><span class="menu-title">Kontak</span></a>
    <ul class="menu-content">
        <li><a href="{{ route('kontak.index') }}" title="Daftar Pelanggan"><i></i><span class="menu-item">Daftar Pelanggan</span></a></li>
        <li><a href="{{ url('/grup-kontak') }}" title="Grup Pelanggan"><i></i><span class="menu-item">Grup Pelanggan</span></a></li>
    </ul>
</li>
<li class=" nav-item"><a href="#"><i class="feather icon-printer" title="Laporan"></i><span class="menu-title">Laporan</span></a></li>
<li class=" nav-item"><a href="{{ route('template.index') }}" title="Template"><i class="feather icon-slack"></i><span class="menu-title">Template</span></a></li>
<li class=" nav-item"><a href="#"><i class="feather icon-power" title="Keluar"></i><span class="menu-title">Keluar</span></a></li>