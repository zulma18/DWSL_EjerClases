<?php
//$con = new mysqli("localhost", "root", "1234", "northwind");
//dnd esta el arch de conexion a la db -->
include_once("./conf/conf.php");

//para cuando se ingrese un # de puntos en el input del form
$puntos=isset($_POST["punto"]) ? $_POST["punto"]:"";


if($puntos == null){

//consulta
$consulta= "SELECT * FROM (
/**subconsulta */
select orderId, sum(quantity*unitPrice) as total 
from orderdetail 
group by (orderId) 
order by(orderId) 
desc limit 0,10
) AS subquery
ORDER BY orderId ASC";

$ejecutar= mysqli_query($con, $consulta);


}else {
    //consulta
    $consulta= "SELECT * FROM (
        /**subconsulta */
        select orderId, sum(quantity*unitPrice) as total 
        from orderdetail 
        group by (orderId) 
        order by(orderId) 
        desc limit 0,$puntos
        ) AS subquery
        ORDER BY orderId ASC";
        
        $ejecutar= mysqli_query($con, $consulta);
    
}
//para ver si esta enviando el # correcto
//echo $puntos;

if($puntos == NULL){
    
?>

<script>
    Highcharts.chart('container', {

title: {
    text: 'Grafica de ordenes de ventas',
    align: 'left'
},

subtitle: {
    text: 'Desarrollado por corpotation DEV.',
    align: 'left'
},

yAxis: {
    title: {
        text: 'Total en dollares'
    }
},

xAxis: {
    accessibility: {
        rangeDescription: 'Range: 10400 to 10500'
    }
},

legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle'
},

plotOptions: {
    series: {
        label: {
            connectorAllowed: false
        },
        //Para que muestre los puntos del ejeX segun los puntos a mostrar
        <?php
            $verificacion="SELECT * FROM (
            /**subconsulta */
            select orderId, sum(quantity*unitPrice) as total 
            from orderdetail 
            group by (orderId) 
            order by(orderId) 
            desc limit 0,10
            ) AS subquery
            ORDER BY orderId ASC
            limit 1";

            $exe= mysqli_query($con, $verificacion);
            $dato= mysqli_fetch_assoc($exe);
        ?>
        pointStart: <?php echo $dato['orderId']; ?>
    }
},

series: [{
    name: 'Ventas',
    data: [
        <?php
            foreach($ejecutar as $fila){
                echo $fila["total"].",";
            }
        ?>
    ]

}],

responsive: {
    rules: [{
        condition: {
            maxWidth: 500
        },
        chartOptions: {
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
            }
        }
    }]
}

});
</script>
<?php
}else{ ?> 
    <script>
    Highcharts.chart('container', {

title: {
    text: 'Grafica de ordenes de ventas con historial de <?php echo $puntos; ?> puntos',
    align: 'left'
},

subtitle: {
    text: 'Desarrollado por corpotation DEV.',
    align: 'left'
},

yAxis: {
    title: {
        text: 'Total en dollares'
    }
},

xAxis: {
    accessibility: {
        rangeDescription: 'Range: 10400 to 10500'
    }
},

legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle'
},

plotOptions: {
    series: {
        label: {
            connectorAllowed: false
        },
                //Para que muestre los puntos del ejeX segun los puntos a mostrar
                <?php
            $verificacion="SELECT * FROM (
            /**subconsulta */
            select orderId, sum(quantity*unitPrice) as total 
            from orderdetail 
            group by (orderId) 
            order by(orderId) 
            desc limit 0,$puntos /*0 - # que se indique */
            ) AS subquery
            ORDER BY orderId ASC
            limit 1";

            $exe= mysqli_query($con, $verificacion);
            $dato= mysqli_fetch_assoc($exe);
        ?>
        pointStart: <?php echo $dato['orderId']; ?>
    }
},

series: [{
    name: 'Ventas',
    data: [
        <?php
            foreach($ejecutar as $fila){
                echo $fila["total"].",";
            }
        ?>
    ]

}],

responsive: {
    rules: [{
        condition: {
            maxWidth: 500
        },
        chartOptions: {
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
            }
        }
    }]
}

});
</script>
<?php
}
?>