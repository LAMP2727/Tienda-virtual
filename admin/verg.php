<?php
if(empty($_GET['id'])){
    header('location: productos.php');
    }
    $iduser = $_GET['id'];

$con = new mysqli("localhost","root","","card"); // Conectar a la BD
$sql = "SELECT `orden_articulos`.`id`, 
`orden_articulos`.`order_id`, `orden_articulos`.`product_id`, 
`orden_articulos`.`quantity`, `productos`.`id`,
`productos`.`nombre`,`productos`.`precio_rebajado`
,`orden`.`id`,`orden`.`total_price`,`orden`.`created`
FROM `orden_articulos`
    , `productos`
    ,`orden`
WHERE
    `productos`.`id` = `orden_articulos`.`product_id` AND 
    `orden_articulos`.`order_id` =  `orden`.`id` AND
    `productos`.`id` = '$iduser'"; // Consulta SQL
$query = $con->query($sql); // Ejecutar la consulta SQL
$data = array(); // Array donde vamos a guardar los datos
while($r = $query->fetch_object()){ // Recorrer los resultados de Ejecutar la consulta SQL
    $data[]=$r; // Guardar los resultados en la variable $data


}

?>


    
    <script src="chart.min.js"></script>
<?php include("includes/header.php"); ?>
<!-- Custom JS validations -->
<script src="../libreria/validaciones.php"></script>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Registro de venta del producto</h1>
    </div>
<canvas id="chart1" style="width:100%;" height="100"></canvas>
<script>
var ctx = document.getElementById("chart1");
var data = {
        labels: [ 
        <?php foreach($data as $d):?>
        "<?php echo $d->created?>", 
        <?php endforeach; ?>
        ],
        datasets: [{
            label: '$ Ventas',
            data: [
        <?php foreach($data as $d):?>
        <?php echo $d->quantity;?>, 
        <?php endforeach; ?>
            ],
            backgroundColor: "#3898db",
            borderColor: "#9b59b6",
            borderWidth: 2
        }]
    };
var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    };
var chart1 = new Chart(ctx, {
    type: 'bar', /* valores: line, bar*/
    data: data,
    options: options
});
</script>
</body>
</html>
<?php include("includes/footer.php"); ?>