@extends('admin._layout.admin')


@section('PAGE_LEVEL_STYLES')
  <link href="{{asset('css/hierarchy-view.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('css/tree-css.css')}}" rel="stylesheet" type="text/css" />
@endsection


@section('PAGE_START')
@endsection


@section('content')
  <!-- Content -->
  <div style="background-color: #e3e3e3; width: 100%;">
    <div class="container mt-5">
      <div class="row d-flex justify-content-center">
          <!-- <div class="col-sm-2 form-group">
              <label>Username</label>
              <input class="form-control userFiller" type="text" placeholder="Username">
              <input type="hidden" name="filters[user_id]" id="user_id">
          </div> -->
          <div class="col-sm-10">
              {!! $content !!}
          </div>
      </div>
    </div>
  </div>
@endsection

@section('PAGE_LEVEL_SCRIPTS')

  <script src="{{ asset('plugin/panzoom/jquery.panzoom.min.js') }}" type="text/javascript"></script>
  <script type="text/javascript">
      'use strict';

      //Adjust dropdown position
      function adjustPosition(elem, target) {
          elem.width(target.outerWidth()).slideDown().offset({
              left: target.offset().left,
              top: (target.offset().top + target.outerHeight())
          });
      }

      //Get users
      function getUsers(data) {
          var options = {
              limit: 10,
              action: 'getUsers'
          };
          options.data = data;

          return $.post('{{ route("admin.members.filter") }}', options);
      }


  </script>
@endsection


@section('PAGE_END')
@endsection