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

// Aleatorio jugador 1

if(document.getElementById("aleatorio"))
{
    const aleatorio = document.getElementById("aleatorio");
    const prueba= document.getElementById("panel1");
    let nombres=["Antonio","Pedro","Ismael","Alberto","Andres","Rafa","Jose Carlos","Maria Jose","Pablo","Jesus","Samuel","Moises","Manolo","Alberto.O","Pepe","Rigoberto","Javi","Sara","Victor","Rojo","Verde"];
    aleatorio.addEventListener('click',function()
    {
        let valorOption=Math.floor(Math.random()*2)+1;
        let valorImagen=Math.floor(Math.random()*13);
        let valorNombres=Math.floor(Math.random()*20);
        let NombresAleatorios=nombres[valorNombres];
        document.getElementById("cartones").selectedIndex=valorOption;
        prueba.setAttribute("src", "../../img/jugadores/"+valorImagen+".jpg");
        document.getElementById("nombres").value=NombresAleatorios;
    })
}

// Aleatorio jugador 2

if(document.getElementById("aleatorio2"))
{
    const aleatorio = document.getElementById("aleatorio2");
    const prueba= document.getElementById("panel2");
    let nombres=["Antonio","Pedro","Ismael","Alberto","Andres","Rafa","Jose Carlos","Maria Jose","Pablo","Jesus","Samuel","Moises","Manolo","Alberto.O","Pepe","Rigoberto","Javi","Sara","Victor","Rojo","Verde"];
    aleatorio.addEventListener('click',function()
    {
        let valorOption=Math.floor(Math.random()*2)+1;
        let valorImagen=Math.floor(Math.random()*13);
        let valorNombres=Math.floor(Math.random()*20);
        let NombresAleatorios=nombres[valorNombres];
        document.getElementById("cartones2").selectedIndex=valorOption;
        prueba.setAttribute("src", "../../img/jugadores/"+valorImagen+".jpg");
        document.getElementById("nombres2").value=NombresAleatorios;
    })
}

// Aleatorio jugador 3

if(document.getElementById("aleatorio3"))
{
    const aleatorio = document.getElementById("aleatorio3");
    const prueba= document.getElementById("panel3");
    let nombres=["Antonio","Pedro","Ismael","Alberto","Andres","Rafa","Jose Carlos","Maria Jose","Pablo","Jesus","Samuel","Moises","Manolo","Alberto.O","Pepe","Rigoberto","Javi","Sara","Victor","Rojo","Verde"];
    aleatorio.addEventListener('click',function()
    {
        let valorOption=Math.floor(Math.random()*2)+1;
        let valorImagen=Math.floor(Math.random()*13);
        let valorNombres=Math.floor(Math.random()*20);
        let NombresAleatorios=nombres[valorNombres];
        document.getElementById("cartones3").selectedIndex=valorOption;
        prueba.setAttribute("src", "../../img/jugadores/"+valorImagen+".jpg");
        document.getElementById("nombres3").value=NombresAleatorios;
    })
}

// Aleatorio jugador 4

if(document.getElementById("aleatorio4"))
{
    const aleatorio = document.getElementById("aleatorio4");
    const prueba= document.getElementById("panel4");
    let nombres=["Antonio","Pedro","Ismael","Alberto","Andres","Rafa","Jose Carlos","Maria Jose","Pablo","Jesus","Samuel","Moises","Manolo","Alberto.O","Pepe","Rigoberto","Javi","Sara","Victor","Rojo","Verde"];
    aleatorio.addEventListener('click',function()
    {
        let valorOption=Math.floor(Math.random()*2)+1;
        let valorImagen=Math.floor(Math.random()*13);
        let valorNombres=Math.floor(Math.random()*20);
        let NombresAleatorios=nombres[valorNombres];
        document.getElementById("cartones4").selectedIndex=valorOption;
        prueba.setAttribute("src", "../../img/jugadores/"+valorImagen+".jpg");
        document.getElementById("nombres4").value=NombresAleatorios;
    })
}

//Aleatorios

if(document.getElementById("aleatorios"))
{
    const aleatorios = document.getElementById("aleatorios");
    const prueba= document.getElementById("panel1");
    const prueba1= document.getElementById("panel2");
    const prueba2= document.getElementById("panel3");
    const prueba3= document.getElementById("panel4");
    let nombres=["Antonio","Pedro","Ismael","Alberto","Andres","Rafa","Jose Carlos","Maria Jose","Pablo","Jesus","Samuel","Moises","Manolo","Alberto.O","Pepe","Rigoberto","Javi","Sara","Victor","Rojo","Verde"];
    aleatorios.addEventListener('click',function()
    {

        
        /*RANDOM PARA LAS IMAGENES DE CADA JUGADOR */
        let valorImagen=Math.floor(Math.random()*13);
        let valorImagen1=Math.floor(Math.random()*13);
        let valorImagen2=Math.floor(Math.random()*13);
        let valorImagen3=Math.floor(Math.random()*13);
        /*RANDOM PARA LOS NOMBRES ALEATORIOS DE CADA JUGADOR */
        let valorNombres=Math.floor(Math.random()*20);
        let valorNombres1=Math.floor(Math.random()*20);
        let valorNombres2=Math.floor(Math.random()*20);
        let valorNombres3=Math.floor(Math.random()*20);

        /*RANDOM PARA TODOS LOS CARTONES DE LOS JUGADORES */
        let valorOption=Math.floor(Math.random()*2)+1;
        let valorOption1=Math.floor(Math.random()*2)+1;
        let valorOption2=Math.floor(Math.random()*2)+1;
        let valorOption3=Math.floor(Math.random()*2)+1;

        let NombresAleatorios=nombres[valorNombres];
        let NombresAleatorios1=nombres[valorNombres1];
        let NombresAleatorios2=nombres[valorNombres2];
        let NombresAleatorios3=nombres[valorNombres3];

        document.getElementById("cartones").selectedIndex=valorOption;
        document.getElementById("cartones2").selectedIndex=valorOption1;
        document.getElementById("cartones3").selectedIndex=valorOption2;
        document.getElementById("cartones4").selectedIndex=valorOption3;
        prueba.setAttribute("src", "../../img/jugadores/"+valorImagen+".jpg");
        prueba1.setAttribute("src", "../../img/jugadores/"+valorImagen1+".jpg");
        prueba2.setAttribute("src", "../../img/jugadores/"+valorImagen2+".jpg");
        prueba3.setAttribute("src", "../../img/jugadores/"+valorImagen3+".jpg");
        document.getElementById("nombres").value=NombresAleatorios;
        document.getElementById("nombres2").value=NombresAleatorios1;
        document.getElementById("nombres3").value=NombresAleatorios2;
        document.getElementById("nombres4").value=NombresAleatorios3;
    })
}