@extends('templates.master')

@section('title')
    Home
    @endsection

@section('body')
    <div class="container myContainer">
  <div id="map" style="width:400px;height:400px"></div>
    </div>
    @endsection

@section('script')
    <script>
function myMap() {
   var map = new google.maps.Map(document.getElementById('map'), {
       center: {lat: -34.397, lng: 150.644},
       zoom: 8
    });
}
</script>
    @endsection