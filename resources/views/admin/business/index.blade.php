@extends('layouts.admin')
@section('title','Gestión de empresa')
@section('styles')
{!! Html::style('fileinput/css/fileinput.min.css') !!}

<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
    }
</style>

@endsection
@section('create')
<li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal-2">
        <span class="btn btn-primary"><i class="far fa-edit"></i> Modificar información</span>
    </a>
</li>
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Gestión de empresa
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Gestión de empresa</li>
            </ol>
        </nav>
    </div>


    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body d-flex flex-column">
                    <h4 class="card-title">
                        <i class="fas fa-chart-pie"></i>
                        Información de la empresa
                    </h4>
                    <div class="flex-grow-1 d-flex flex-column justify-content-between">
                        <strong>Nombre </strong>
                        <p class="text-muted">
                            {{$business->name}}
                        </p>
                        <strong>Descripción</strong>
                        <p class="text-muted">
                            {{$business->description}}
                        </p>
                        <strong>Dirección</strong>
                        <p class="text-muted">
                            {{$business->address}}
                        </p>
                        <strong>RUC</strong>
                        <p class="text-muted">{{$business->ruc}}</p>
                        <strong>Correo electrónico</strong>
                        <p class="text-muted">{{$business->email}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body d-flex flex-column">
                    <h4 class="card-title">
                        <i class="fas fa-chart-pie"></i>
                        Información de contacto
                    </h4>
                    <div class="flex-grow-1 d-flex flex-column justify-content-between">
                        <strong>Contacta con nosotros</strong>
                        <p class="text-muted">
                            {{$business->contact_text}}
                        </p>
                        <strong>Número telefónico</strong>
                        <p class="text-muted">
                            {{$business->phone}}
                        </p>
                        <strong>Horario de atención</strong>
                        <p class="text-muted">
                            {{$business->hours_of_operation}}
                        </p>
                        <strong>Enlace de Google Maps</strong>
                        <p class="text-muted">
                            {{$business->google_maps_link}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body d-flex flex-column">
                    <h4 class="card-title">
                        <i class="fas fa-chart-pie"></i>
                        Ubicación de la empresa
                    </h4>

                    <div class="flex-grow-1 d-flex flex-column justify-content-between">

                        <div class="map-container">
                            <div id="map-with-marker" class="google-map"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-2">Actualizar datos de empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            {!! Form::model($business,['route'=>['business.update',$business], 'method'=>'PUT','files' => true]) !!}


            <div class="modal-body">

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$business->name}}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea class="form-control" name="description" id="description"
                                rows="3">{{$business->description}}</textarea>
                        </div>
                       
                        <div class="form-group">
                            <label for="address">Dirección</label>
                            <input type="text" class="form-control" name="address" id="address"
                                value="{{$business->address}}" required>
                        </div>
                        <div class="form-group">
                            <label for="ruc">Numero de RUC</label>
                            <input type="text" class="form-control" name="ruc" id="ruc" value="{{$business->ruc}}"
                                required>
                        </div>
                    </div>
                    <div class="col-md-4">

                      
                       
                        <div class="form-group">
                            <label for="contact_text">Contacta con nosotros</label>
                            <textarea class="form-control" name="contact_text" id="contact_text"
                                rows="3" required>{{$business->contact_text}}</textarea>
                        </div>

                        

                        <div class="form-group">
                            <label for="hours_of_operation">Horario de atención</label>
                            <input type="text" class="form-control" name="hours_of_operation" id="hours_of_operation"
                                value="{{$business->hours_of_operation}}" required>
                        </div>
                        <div class="form-group">
                            <label for="mail">Correo electrónico</label>
                            <input type="email" class="form-control" name="mail" id="mail" value="{{$business->email}}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="google_maps_link">Enlace de Google Maps</label>
                            <input type="url" class="form-control" name="google_maps_link" id="google_maps_link"
                                value="{{$business->google_maps_link}}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="phone">Número telefónico</label>
                            <input type="text" class="form-control" name="phone" id="phone"
                                value="{{$business->phone}}" required>
                        </div>
                        <div class="form-group">

                                    <label for="file">Logo</label>
                                    
                                        <div class="file-loading">
                                            <input id="file" name="file" type="file">
                                        </div>
                                 
                                
                        </div>


                  
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Ubicación de la empresa</label>

                            <div id="map_canvas" style="height:350px">
                            </div>

                        </div>
                    </div>
                </div>

                <input type="hidden" name="latitude" id="latitude" value="{{$business->latitude}}">
                <input type="hidden" name="length" id="longitude" value="{{$business->length}}">


            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Actualizar</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection
@section('scripts')



{!! Html::script('fileinput/js/fileinput.min.js') !!}
{!! Html::script('fileinput/js/locales/es.js') !!}
{!! Html::script('fileinput/themes/fas/theme.js') !!}

<script>
    $(document).ready(function() {
        $("#file").fileinput({
            language: "es",
            theme: "fas",
            browseOnZoneClick: true,
            overwriteInitial: true,
            maxFileSize: 2500,
            showClose: false,
            showCaption: false,
            browseLabel: '',
            removeLabel: '',
            browseIcon: '<i class="far fa-folder-open"></i>',
            removeIcon: '<i class="fas fa-times"></i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors-1',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: "<img src='{{$business->logo}}' style='width: 200px'>",

            layoutTemplates: {main2: '{preview} ' + ' {remove} {browse}'},
            allowedFileExtensions: ["jpg", "png", "gif"],
            maxImageWidth: 160,
            maxImageHeight: 65
        });
    });
</script>

{!! Html::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyBzi3S9cTrkjwYl6QcizSW2gLz4foG2HsA') !!}

{!! Html::script('map_icons/dist/js/map-icons.js') !!}

<script>
    function init(){
        var mapOption = {
          center: new google.maps.LatLng(<?php echo ''. $business->latitude.''; ?>, <?php echo ''. $business->length.''; ?>), 
          zoom: 19,
          mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map-with-marker"),mapOption);
        var marker = new google.maps.Marker({
           position: { lat:<?php echo ''. $business->latitude.''; ?>, lng: <?php echo ''. $business->length.''; ?> }, 
           title: "<?php echo ''. $business->name.''; ?>",
           icon: {
                path: mapIcons.shapes.MAP_PIN,
                fillColor: '#05a503',
                fillOpacity: 1,
                strokeColor: '',
                strokeWeight: 0
            },
            map_icon_label: '<span class="map-icon map-icon-grocery-or-supermarket"></span>'
        });
        marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', init);
</script>

<script>
    var vMarker
        var map
            map = new google.maps.Map(document.getElementById('map_canvas'), {
                zoom: 19,
                center: new google.maps.LatLng(-12.067996, -75.2100822),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            vMarker = new google.maps.Marker({
                position: new google.maps.LatLng({{$business->latitude}}, {{$business->length}}),
                draggable: true
            });
            google.maps.event.addListener(vMarker, 'dragend', function (evt) {

                $("#latitude").val(evt.latLng.lat().toFixed(6));
                $("#longitude").val(evt.latLng.lng().toFixed(6));

                map.panTo(evt.latLng);
            });
            map.setCenter(vMarker.position);
            vMarker.setMap(map);

            $("#txtCiudad, #txtEstado, #txtDireccion").change(function () {
                movePin();
            });

            function movePin() {
            var geocoder = new google.maps.Geocoder();
            var textSelectM = $("#txtCiudad").text();
            var textSelectE = $("#txtEstado").val();
            var inputAddress = $("#txtDireccion").val() + ' ' + textSelectM + ' ' + textSelectE;
            geocoder.geocode({
                "address": inputAddress
            }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    vMarker.setPosition(new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()));
                    map.panTo(new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()));
                    $("#txtLat").val(results[0].geometry.location.lat());
                    $("#txtLng").val(results[0].geometry.location.lng());
                }

            });
        }
</script>  

{!! Html::script('melody/js/data-table.js') !!}
{!! Html::script('melody/js/dropify.js') !!}
@endsection
