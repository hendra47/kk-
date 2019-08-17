<li class="{{ Request::is('home') ? 'active' : '' }}">
    <a href="https://cariprogram.id/repositories/klinik/public/home"><i class="fa fa-home"></i><span>Home</span></a>
</li>

<li class="{{ Request::is('rekamMedis*') ? 'active' : '' }}">
    <a href="{!! route('rekamMedis.index') !!}"><i class="fa fa-user-md"></i><span>Rekam Medis</span></a>
</li>

<li class="{{ Request::is('apotek*') ? 'active' : '' }}">
            <a href="{!! route('apotek.index') !!}"><i class="fa fa-medkit"></i><span>Apotek</span></a>
</li>

<li class="{{ Request::is('pembayarans*') ? 'active kiri' : 'kiri' }}">
            <a href="{!! route('pembayarans.index') !!}"><i class="fa  fa-credit-card"></i><span>Pembayaran</span></a>
 </li>

 <li class="treeview">
        <a href="#"><i class="fa fa-database"></i> <span>Master Data</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li class="{{ Request::is('daftars*') ? 'active' : '' }}"><a href="{!! route('daftars.index') !!}">&nbsp;&nbsp;&nbsp;<i class="fa fa-bullseye"></i> Pendaftaran</a></li>
          <li class="{{ Request::is('pasiens*') ? 'active' : '' }}"><a href="{!! route('pasiens.index') !!}">&nbsp;&nbsp;&nbsp;<i class="fa fa-bullseye"></i> Pasien</a></li>
          <li class="{{ Request::is('obats*') ? 'active' : '' }}"><a href="{!! route('obats.index') !!}">&nbsp;&nbsp;&nbsp;<i class="fa fa-bullseye"></i> Obat</a></li>
          <li class="{{ Request::is('tindakan*') ? 'active' : '' }}"><a href="{!! route('tindakan.index') !!}">&nbsp;&nbsp;&nbsp;<i class="fa fa-bullseye"></i> Tindakan</a></li>
        </ul>
      </li>

 <li class="treeview">
        <a href="#"><i class="fa fa-bar-chart"></i> <span>Laporan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li class="{{ Request::is('laporandftr*') ? 'active' : '' }}"><a href="{!! route('laporandftr.index') !!}">&nbsp;&nbsp;&nbsp;<i class="fa fa-bullseye"></i> Pendaftaran</a></li>
          <li class="{{ Request::is('laporanobat*') ? 'active' : '' }}"><a href="{!! route('laporanobat.index') !!}">&nbsp;&nbsp;&nbsp;<i class="fa fa-bullseye"></i> Stock Obat</a></li>
          <li class="{{ Request::is('laporandpt*') ? 'active' : '' }}"><a href="{!! route('laporandpt.index') !!}">&nbsp;&nbsp;&nbsp;<i class="fa fa-bullseye"></i> Pendapatan</a></li>
        </ul>
      </li>

