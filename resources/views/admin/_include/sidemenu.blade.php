<?php $ACTIVE_TAB = Request::path() ?>
  <nav id="sidebar">
    <ul class="list-unstyled components">
      <li class="{{ isset($ACTIVE_TAB) && ($ACTIVE_TAB !== 'admin/tree/view') && ($ACTIVE_TAB !== 'admin/equities/infos') ? 'active' : '' }}">
        <a href="{{ route('admin.index') }}" ><i class="fa fa-users mr-2"></i> Member Management</a>
      </li>
      <li class="{{ isset($ACTIVE_TAB) && ($ACTIVE_TAB === 'admin/tree/view') ? 'active' : '' }}">
        <a href="{{ route('admin.tree.view') }}" ><i class="fa fa-chart-bar mr-2"></i> Tree View </a>
      </li>
    </ul>
  </nav>