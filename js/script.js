// para borrar jugadores o añadir
if(document.getElementById("mas"))
{
    const bottons = document.getElementById("mas");
    const jugador2=document.getElementById("jugador1");
    const jugador3=document.getElementById("jugador2");
    const jugador4=document.getElementById("jugador3");
    bottons.addEventListener('click',function()
    {       
        if(jugador2.style.display=="flow-root" && jugador3.style.display=="flow-root" && jugador4.style.display!="flow-root")
        {
            jugador4 .style.display="flow-root";
        }
        if(jugador3.style.display!="flow-root" && jugador2.style.display=="flow-root")
        {
            jugador3.style.display="flow-root";
        }
        if(jugador2.style.display!="flow-root")
        {
            jugador2.style.display="flow-root";
        }
        if(jugador2.style.display=="flow-root" && jugador3.style.display=="flow-root" && jugador4.style.display=="flow-root")
        {
            bottons.style.display="none";
        }
    });
}

if(document.getElementById("cerrar1"))
{
    const cerrar1 = document.getElementById("cerrar1");
    const jugador2=document.getElementById("jugador1");
    const bottons = document.getElementById("mas");
    cerrar1.addEventListener('click',function()
    {
        jugador2.style.display="none";
        bottons.style.display="flex";

    });
}

if(document.getElementById("cerrar2"))
{
    const cerrar2 = document.getElementById("cerrar2");
    const jugador3=document.getElementById("jugador2");
    const bottons = document.getElementById("mas");
    cerrar2.addEventListener('click',function()
    {
        jugador3.style.display="none";
        bottons.style.display="flex";
    });
}

if(document.getElementById("cerrar3"))
{
    const cerrar3 = document.getElementById("cerrar3");
    const jugador4=document.getElementById("jugador3");
    const bottons = document.getElementById("mas");
    cerrar3.addEventListener('click',function()
    {
        jugador4.style.display="none";
        bottons.style.display="flex";

    });
}

// para seleccionar imagen para el perfil del jugador

if(document.getElementById("seleccion1"))
{
    const seleccion1 = document.getElementById("seleccion1");
    let modal = document.getElementById("tvesModal");
    let btn = document.getElementById("btnModal");
    let span = document.getElementsByClassName("close")[0];
    let body = document.getElementsByTagName("body")[0];


    seleccion1.onclick = function() {
        modal.style.display = "block";
        body.style.position = "static";
        body.style.height = "100%";
        body.style.overflow = "hidden";
    }

    span.onclick = function() {
        modal.style.display = "none";
        body.style.position = "inherit";
        body.style.height = "auto";
        body.style.overflow = "visible";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            body.style.position = "inherit";
            body.style.height = "auto";
            body.style.overflow = "visible";
        }
    }
}

if(document.querySelector(".imagenes"))
{
    const imagens = document.querySelectorAll(".imagenes");
    const prueba= document.getElementById("prueba");
    imagens.forEach(function (imagen)
    {
        imagen.addEventListener('click',function()
        {
           let ruta=imagen.dataset['ruta'];

           prueba.setAttribute("src", ruta);
        });
    });

}