{{--
  Title: Demo module
  Description: Affiche une bannière pleine écran
  Category: client_slug
  Icon: admin-comments
  Keywords: a propos
  Mode: edit
  Align: full
  SupportsAlign: false
  SupportsMode: false
  SupportsMultiple: true
--}}



@php
    $demo_module_DataFromACF = get_fields();
@endphp

@if(!empty($demo_module_DataFromACF))
  @include('modules.demo_module', $demo_module_DataFromACF )
@endif
