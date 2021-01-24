{{-- Home --}}
<li class=" nav-item"><a href="{{ url('/') }}"><i class="feather icon-home"></i><span class="menu-title">Home</span></a></li>
<li class=" nav-item"><a href="{{ route('sms.index') }}"><i class="feather icon-mail"></i><span class="menu-title">Buat Pesan</span></a></li>

{{-- Folder --}}
<li class=" navigation-header"><span>Folder</span></li>
<li class=" nav-item"><a href="{{ url('/sms-terkirim') }}"><i class="feather icon-send"></i><span class="menu-title">Pesan Terkirim</span></a></li>
<li class=" nav-item"><a href="{{ url('/sms-terjadwal') }}"><i class="feather icon-clock"></i><span class="menu-title">Pesan Terjadwal</span></a></li>

{{-- Pengaturan --}}
<li class=" navigation-header"><span>Pengaturan</span></li>
<li class=" nav-item"><a href="#"><i class="feather icon-users"></i><span class="menu-title">Kontak</span></a>
    <ul class="menu-content">
        <li><a href="{{ route('kontak.index') }}"><i></i><span class="menu-item">List Kontak</span></a></li>
        <li><a href="{{ url('/grup-kontak') }}"><i></i><span class="menu-item">Grup Kontak</span></a></li>
    </ul>
</li>
<li class=" nav-item"><a href="#"><i class="feather icon-printer"></i><span class="menu-title">Laporan</span></a></li>
<li class=" nav-item"><a href="{{ url('/template-sms') }}"><i class="feather icon-slack"></i><span class="menu-title">Template</span></a></li>
<li class=" nav-item"><a href="#"><i class="feather icon-power"></i><span class="menu-title">Logout</span></a></li>