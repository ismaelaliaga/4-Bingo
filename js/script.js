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

// para seleccionar imagen para el perfil del jugador 1

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
    const prueba= document.getElementById("panel1");
    imagens.forEach(function (imagen)
    {
        imagen.addEventListener('click',function()
        {
           let ruta=imagen.dataset['ruta'];

           prueba.setAttribute("src", ruta);
        });
    });

}

// para seleccionar imagen para el perfil del jugador 2

if(document.getElementById("seleccion2"))
{
    const seleccion2 = document.getElementById("seleccion2");
    let modal = document.getElementById("tvesModal2");
    let span = document.getElementsByClassName("close2")[0];
    let body = document.getElementsByTagName("body")[0];


    seleccion2.onclick = function() {
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

if(document.querySelector(".imagenes2"))
{
    
    const imagens = document.querySelectorAll(".imagenes2");
    const prueba= document.getElementById("panel2");
    imagens.forEach(function (imagen)
    {
        imagen.addEventListener('click',function()
        {
           let ruta=imagen.dataset['ruta'];

           prueba.setAttribute("src", ruta);
        });
    });

}

// para seleccionar imagen para el perfil del jugador 3

if(document.getElementById("seleccion3"))
{
    const seleccion3 = document.getElementById("seleccion3");
    let modal = document.getElementById("tvesModal3");
    let span = document.getElementsByClassName("close3")[0];
    let body = document.getElementsByTagName("body")[0];


    seleccion3.onclick = function() {
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

if(document.querySelector(".imagenes3"))
{
    
    const imagens = document.querySelectorAll(".imagenes3");
    const prueba= document.getElementById("panel3");
    imagens.forEach(function (imagen)
    {
        imagen.addEventListener('click',function()
        {
           let ruta=imagen.dataset['ruta'];

           prueba.setAttribute("src", ruta);
        });
    });

}

// para seleccionar imagen para el perfil del jugador 4

if(document.getElementById("seleccion4"))
{
    const seleccion4 = document.getElementById("seleccion4");
    let modal = document.getElementById("tvesModal4");
    let span = document.getElementsByClassName("close4")[0];
    let body = document.getElementsByTagName("body")[0];


    seleccion4.onclick = function() {
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

if(document.querySelector(".imagenes4"))
{
    
    const imagens = document.querySelectorAll(".imagenes4");
    const prueba= document.getElementById("panel4");
    imagens.forEach(function (imagen)
    {
        imagen.addEventListener('click',function()
        {
           let ruta=imagen.dataset['ruta'];

           prueba.setAttribute("src", ruta);
        });
    });

}