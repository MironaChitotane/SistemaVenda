document.getElementById('btn-saldo-inicial').addEventListener("click",function(){
    var msg = confirm("ATENÇÃO as alterações feitas no campo seguinte são IRREVERCIVEIS! Deseja continuar?")
    if(msg){
        document.getElementById('saldo-inicial').style.display="none"
        document.getElementById('forme-saldo-inicial').style.display="block"
    }
})

document.getElementById('btn-fechar').addEventListener("click",function(){
        document.getElementById('saldo-inicial').style.display="block"
        document.getElementById('forme-saldo-inicial').style.display="none"

})