<ul class="sidebar-menu" data-widget="tree">
  <li class="header">MAIN NAVIGATION</li>
  <li class="{{ request()->is('/')? 'active':'' }}"><a href="/"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
  @if (auth()->user()->level==1)
    <li class="{{ request()->is('mobil')? 'active':'' }}"><a href="/mobil"><i class="fa fa-car"></i><span>Mobil</span></a></li>
    <li class="{{ request()->is('mobil/add')? 'active':'' }}"><a href="/mobil/add"><i class="fa fa-database"></i><span>Tambah Data</span></a></li>
    <li class="{{ request()->is('user')? 'active':'' }}"><a href="/pembeli"><i class="fa fa-dashboard"></i> <span>Data Pembeli</span></a></li>
  @elseif(auth()->user()->level==2)
    <li class="{{ request()->is('menuUser')? 'active':'' }}"><a href="/menuUser"><i class="fa fa-dashboard"></i> <span>User</span></a></li>
  @elseif(auth()->user()->level==3)
    <li class="{{ request()->is('pelanggan')? 'active':'' }}"><a href="/pelanggan"><i class="fa fa-dashboard"></i> <span>Pelanggan</span></a></li>
  @endif
</ul>