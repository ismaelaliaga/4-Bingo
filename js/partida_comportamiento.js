const cartonesContenedores = document.querySelectorAll(".cartonesContenedor");
const botonCerrarCartones = document.querySelectorAll(".botonCerrarCartones");
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