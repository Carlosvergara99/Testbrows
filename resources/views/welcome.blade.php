<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="{{ asset('css/jquery-jvectormap-2.0.5.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.min.css" integrity="sha512-riZwnB8ebhwOVAUlYoILfran/fH0deyunXyJZ+yJGDyU0Y8gsDGtPHn1eh276aNADKgFERecHecJgkzcE9J3Lg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Styles -->
        <style>
          .map-container{
             height: 300px;
           }

          .jvmap-smart{
             width: 100%; 
             height: 100%;  
           }
          .text-center{
             text-align:center;
             font-weight: 300;
             font-size: 2rem;
           }
          .map-container:after, .clearfix{
             display: block;
             content: '';
             clear: both;
          }

           @media only screen and (min-width: 576px) {
             .map-container{
               height: 350px;
                }
             }
          @media only screen and (min-width: 768px) {
              .map-container{
                 height: 400px;
                 }
          }
          @media only screen and (min-width: 992px) {
              .map-container{
                height: 500px;
              }
           }         
         @media only screen and (min-width: 1200px) {
             .map-container{
               height: 600px;
             }
          }
       </style>
    </head>
    <body>
        <div class="map-container">
            <div id="map" class="jvmap-smart"></div>
       </div>
       <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <button class="btn btn-primary" data-bs-target="#CreateHumidity" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="fas fa-plus"></i></button>
                <br>
                <div class="d-flex justify-content-center"><h3>Historial de Humedad</h3></div>

                <table id="my_table" class="table table-striped" style="width: 100%">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">humedad</th>
                        <th scope="col">fecha</th>
                      </tr>
                    </thead>                   
                  </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    
      <div class="modal fade" id="CreateHumidity" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalToggleLabel2">Crear Registro </h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="clientsForm" name="clientsForm" class="form-horizontal">
                    <div class="form-group">
                        <label for="humidity" class="col-sm-2 control-label">Humedad</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="humidity" name="humidity"  required=""  placeholder="Valor">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="humidity" class="col-sm-2 control-label">fecha</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="date" name="date"  required="" placeholder="Fecha">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal" data-bs-target="#myModal" data-bs-toggle="modal" data-bs-dismiss="modal">Regresar</button>
                <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Guardar</button>  
            </div>
          </div>
        </div>
      </div>
     
        <div id="map"></div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
        <script src="{{ asset('js/jquery-jvectormap-2.0.5.min.js') }}"></script>
        <script src="{{ asset('js/jquery-jvectormap-us-lcc-en.js') }}"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>       
        <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.all.min.js" integrity="sha512-kW/Di7T8diljfKY9/VU2ybQZSQrbClTiUuk13fK/TIvlEB1XqEdhlUp9D+BHGYuEoS9ZQTd3D8fr9iE74LvCkA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('js/jquery-jvectormap-data-us-fl-lcc-en.js') }}"></script>

         <script>
            $(function(){
              var map,
                  markerIndex = 0,
                  markersCoords = {};
        
              map = new jvm.Map({
                  map: 'us_lcc_en',
                  container: $('#map'),
            //       mapUrlByCode: function (code, multiMap) {
            //     return 'js/jquery-jvectormap-data-us-fl-lcc' +
            //        code.toLowerCase() + '-' +
            //        multiMap.defaultProjection + '-en.js';
            // },
                  onRegionClick: function(event, code) {
                    if (code == "US-NY" || code =="US-FL") {
                        $('#myModal').modal('show')
                    $('h5').text(code);
                    var table =  $('#my_table').DataTable( {
                        
                        "ajax": {
                           "url": "api/cities/get",
                           "type": "POST",
                            "data": {
                              "name": code,
                              "_token":jQuery('meta[name="csrf-token"]').attr('content')
                            }
                         },
                         "columns": [
                           { "data": "id" },
                           { "data": "humidity" },
                           { "data": "date" }
                        ],
                        "language": {
                          "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                        },
                        'destroy': true,
                        "ordering": false,
                        "info": false,
                        "responsive": true,
                        "searching": false

                    }); 
                    }
                   

                   }
              });
              $('#saveBtn').click(function (e) {
                  if ($('#humidity').val() >100) {
                    Swal.fire({
                       icon: 'error',
                       title: 'Oops...',
                       text: 'la humedad no puede superar el 100 % !'
                   })
                  }else{
                    const data ={
                    'name': $('h5').text(), 
                    'humidity' :$('#humidity').val(),
                    'date':$('#date').val()
                  }
                  $.ajax({
                    data: data,
                    url: "api/cities/create",
                    type: "POST",
                    success: function (data) {
                        Swal.fire(
                        '',
                        'la información se ha registrado satisfactoriamente !',
                       'success'
                      )                        
                     $('#clientsForm').trigger("reset");
                     $('#CreateHumidity').modal('hide');
                     table.draw();
                    },
                    error: function (data) {
                        Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: data
                         })
                    }
                   });
         
                
                  }
                });
             
              $('#map').bind('');
            });
          </script>
    </body>
</html>
