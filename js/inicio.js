window.onload=init;

function init()
{
    document.querySelector(".emergente .menor").addEventListener("click",menor);
    document.querySelector(".emergente .mayor").addEventListener("click",mayor);
}

function menor()
{
    location.href="https://www.youtube.com/watch?v=rI_lYJLkOL0";
}

function mayor()
{
    document.querySelector(".emergente").style.display="none";
    document.querySelector("#container").style.opacity="1";

}
