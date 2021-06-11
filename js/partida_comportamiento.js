const cartonesContenedores = document.querySelectorAll(".cartonesContenedor");
const botonCerrarCartones = document.querySelectorAll(".botonCerrarCartones");
const botonCerrarMensajeFinal = document.querySelectorAll(".botonCerrarMensajeFinal");
cartonesContenedores.forEach(function(contenedor){
    contenedor.addEventListener('click', function(){
        document.getElementById("cartonesModalContenedor").style.display="flex";
        document.getElementById(-contenedor.id).style.display="flex";
    })
})
botonCerrarCartones.forEach(function(boton){
    boton.addEventListener('click', function(){
        document.getElementById("cartonesModalContenedor").style.display="none";
        boton.parentNode.style.display="none";
    })
})
botonCerrarMensajeFinal[0].addEventListener(`click`, function(){
    botonCerrarMensajeFinal[0].parentNode.parentNode.parentNode.style.display="none";
})