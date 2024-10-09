punto = document.getElementById('punto')
punto.addEventListener('keyup', function(){ //cap cuando el usuario ingresa el #
    const data = punto.value;
                            $.ajax({
                                url:'grafico.php',
                                type:'POST',
                                data: {punto:data}, //del id html
                                success: function(res){
                                    $('#container').html(res); //id del grafico
                                }
                            })
}
)