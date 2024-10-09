
buscar = document.getElementById('buscar')
buscar.addEventListener('keyup', function(){
    const data = buscar.value;
                            $.ajax({
                                url:'info.php',
                                type:'POST',
                                data: {seleccion:data},
                                success: function(res){
                                    /*DEL div DEL HTML (dato) */
                                    $('#dato').html(res);
                                }
                            })
}
)


