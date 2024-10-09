function evaluar(){
    $valor = $('#seleccion').val();
        $.ajax({
            url:'datos.php',
            type:'POST',
            data: {seleccion:$valor},
            success: function(res){
                $('#dato').html(res);
            }
        })
}