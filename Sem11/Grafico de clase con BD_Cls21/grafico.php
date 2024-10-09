<?php
//conexion incrustada
$con = new mysqli("localhost", "root", "1234", "northwind");
//consulta de la db
$consulta="select count(shipName) as conteo, CONCAT(firstname, ' ',lastname) as empleado from salesorder
inner join employee on salesorder.employeeId = employee.employeeId
group by salesorder.employeeId";

$ejecutar=mysqli_query($con, $consulta);

?>

<script>
    // Data retrieved from https://gs.statcounter.com/browser-market-share#monthly-202201-202201-bar

// Create the chart
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        align: 'left',
        text: 'Zulma Vanessa Cruz Guevara - U20210476'
    },
    subtitle: {
        align: 'left',
        text: 'Ventas realizas por empleados'
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category' 
    },
    yAxis: {
        title: {
            text: 'Total de ventas'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: ' +
            '<b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [
        {
            name: 'Employee',
            colorByPoint: true,
            data: [
                <?php
                    //para que se multiplique para mostrar cada empleado
                    foreach($ejecutar as $filas)
                    {
                ?>
                {
                    //solo llevan comillas los string, NO los int
                    name: <?php echo "'".$filas["empleado"]."'" ?>, //automatico, muestra lo que devuelve el bucle
                    y: <?php echo $filas["conteo"] ?>, //dinamico con la consulta
                    drilldown: <?php echo "'".$filas["empleado"]."'" ?>
                },

                <?php
                    //cerrando llave del bucle
                    }
                ?>

            ]
        }
    ],

});

</script>