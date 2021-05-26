<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="http://localhost/Datatables/jquery-3.5.1.js"></script>
        <script src="http://localhost/Datatables/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="http://localhost/Datatables/jquery.dataTables.min.css">
        <link href="css/bootstrap.min.css" rel="stylesheet"> 
        
        <title>Hola mundo</title>
        <style type="text/css"> 
        thead tr th { 
            position: sticky;
            top: 0;
            z-index: 100;
            background-color: #ffffff;
        }
    
        .table-responsive { 
            height:530px;
            overflow:scroll;
        }
        </style>
    </head>
    <body>
    <br>
    <center>LISTA DE POSTULANTES PARA PRACTICAS</center>
        <div class = "container mt-5">     
        <div class="col-12">
 


<div class="row">
<div class="col-12 grid-margin">
<div class="card">
<div class="card-body">
       
        <div class="table-responsive table-hover sticky"> 
        <h4 class="card-title">Filtros</h4>
       
        <form id="form2" name="form2" method="POST" action="">
        <div class="col-11">
                        <table class="table">
                                <thead>
                                        <tr class="filters">
                                                <th>
                                                        Area
                                                        <select id="assigned-tutor-filter" id="area" name="area" class="form-control mt-2" style="border: #bababa 1px solid; color:#000000;" >                                                                                                                    
                                                                
                                                                <?php if ($_POST["area"] != ''){ ?>
                                                                <option value="<?php echo $_POST["area"]; ?>"><?php echo $_POST["area"]; ?></option>
                                                                <?php }?>

                                                                <option value="Elegir">Elegir</option>
                                                                <option value="Administracion">Administracion</option>
                                                                <option value="Relaciones_publicas">Relaciones Públicas</option>
                                                                <option value="Community_Manager_Web">Community Manager Web</option>
                                                                <option value="Talento_Humano">Talento Humano</option>
                                                                <option value="Diseno_Grafico">Diseño Gráfico</option>  
                                                                <option value="Audio_Visual">Audio Visual</option> 
                                                                <option value="Content_Manager">Content Manager</option> 
                                                                <option value="Ventas">Ventas</option> 
                                                                <option value="Community_Manager">Community Manager</option> 
                                                                <option value="Big_Data">Big Data</option> 
                                                                <option value="Desarrollador_Web">Desarrollador Web</option> 
                                                                <option value="Disenador_Web">Diseñador Web</option>       
                                                                <option value="Soporte_Tecnico">Soporte Técnico</option>   
                                                        </select>
                                                </th>
                                                <th>
                                                         
                                                        Fecha desde:
                                                        <input type="date" id="buscafechadesde" name="buscafechadesde" class="form-control mt-2" value="<?php echo $_POST["buscafechadesde"]; ?>" style="border: #bababa 1px solid; color:#000000;" value="<?php echo $_POST["buscafechadesde"]; ?>">
                                                </th>
                                                <th>
                                                              
                                                        Fecha hasta:
                                                        <input type="date" id="buscafechahasta" name="buscafechahasta" class="form-control mt-2" value="<?php echo $_POST["buscafechahasta"]; ?>" style="border: #bababa 1px solid; color:#000000;" value="<?php echo $_POST["buscafechahasta"]; ?>">
                                                </th>
                                                <th>
                                                        Calificación:
                                                        <select id="subject-filter" id="calificacion" name="calificacion" class="form-control mt-2" style="border: #bababa 1px solid; color:#000000;">
                                                        
                                                                <?php if ($_POST["calificacion"] != ''){ ?>
                                                                <option value="<?php echo $_POST["calificacion"]; ?>"><?php echo $_POST["calificacion"]; ?></option>
                                                                <?php } ?>

                                                                <option value="Todos">Todos</option>
                                                                <option value="apto">Apto</option>
                                                                <option value="No apto">No apto</option>
                                                                
                                                        </select>
                                                </th>
                                                <th>
                                                <input type="submit" class="btn btn-secondary" value="Ver" style="margin-top: 38px;">
                                                </th>
                                        </tr>
                                </thead>
                        </table>
                </div>
            <?php            
            
            include("ar_filtro.php");
                      
            require("conexion.php");
            $conn=Conectar();
            $sql="select * from postulantes ".$filtro;
            $stmt=$conn->prepare($sql);
            $result = $stmt->execute();
            $rows=$stmt->fetchAll(\PDO::FETCH_OBJ);
        
            //echo $sql;
                                                              
            ?>                                                        
           
            </form>     

        <table id = "tabla" class="table" cellpsacing="0" width="100%">        
        <thead class="xthead-dark">
        <tr class="table-warning">
        <th scope="col">ID</th>               
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Dni</th>
                <th scope="col">Celular</th>
                <th scope="col">Correo</th>
                <th scope="col">Recursos</th>
                <th scope="col">Ciclo</th>
                <th scope="col">Carrera</th>
                <th scope="col">Institución</th>
                <th scope="col">Area</th>
                <th scope="col">Nombre de CV</th>
                <th scope="col">Fecha de postulacion</th>
                <th scope="col">Calificacion</th>
                <th scope="col">Nro Palabras clave encontradas</th>
                <th scope="col">Nro Palabras clave no encontradas</th>
                <th scope="col">Palabras clave encontradas</th>
                <th scope="col">Palabras clave no encontradas</th>              
                <!--<th scope="col">Acciones</th>-->
                
        </tr>
        </thead>
        <tbody>
            <?php
            /*require("conexion.php");
            $conn=Conectar();
            $sql="select * from postulantes";
            $stmt=$conn->prepare($sql);
            $result = $stmt->execute();
            $rows=$stmt->fetchAll(\PDO::FETCH_OBJ);
            <th><?php print(utf8_encode($row->nombre_archivo))?></th>
            */
            foreach($rows as $row){
                ?>
                <tr>
                    <th><?php print($row->id)?></th>
                    <th><?php print(utf8_encode($row->nombre))?></th>
                    <th><?php print(utf8_encode($row->apellido))?></th>
                    <th><?php print(utf8_encode($row->dni))?></th>
                    <th><?php print(utf8_encode($row->celular))?></th>
                    <th><?php print(utf8_encode($row->correo))?></th>
                    <th><?php print(utf8_encode($row->recursos))?></th>
                    <th><?php print(utf8_encode($row->ciclo))?></th>
                    <th><?php print(utf8_encode($row->carrera))?></th>
                    <th><?php print(utf8_encode($row->institucion))?></th>
                    <th><?php print(utf8_encode($row->area))?></th>      
                    <th><?php print(utf8_encode("<a href = 'http://localhost/Buscador/Documentos/".$row->nombre_archivo)."'>".$row->nombre_archivo)?></th>                                  
                    <th><?php print(utf8_encode($row->fecha))?></th>
                    <th><?php print(utf8_encode($row->resultado_busqueda))?></th>
                    <th><?php print($row->c_encontrado)?></th>
                    <th><?php print($row->c_noencontrado)?></th>
                    <th><?php print(utf8_encode($row->p_encontradas))?></th>
                    <th><?php print(utf8_encode($row->p_noencontradas))?></th> 
                                      
                </tr>
                <?php    
            }
            ?>
        </tbody>
        </table>
        </div>  
        </div> 
       </div> </div></div></div>

    </body>
    
<!--script type="text/javascript">
    $(document).ready(function() {
    $('#tabla').DataTable();
    } );
</script>-->

<script>

$(document).ready(function() {    
    $('#tabla').DataTable({
    //para cambiar el lenguaje a español
        "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            }
    }); 
/*
    //Creamos una fila en el head de la tabla y lo clonamos para cada columna
    $('#tabla thead tr').clone(true).appendTo( '#tabla thead' );

    $('#tabla thead tr:eq(1) th').each( function (i) {
        var title = $(this).text(); //es el nombre de la columna
        $(this).html( '<input type="text" placeholder="Buscar ...'+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );   

*/


});
</script>

</html>
