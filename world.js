window.onload = click;

function click(){
    
    document.getElementById("lookup").addEventListener("click", getCountry);
}

function getCountry(){
    var data = document.getElementById("country").value;
    
    fetch("world.php?country=" +data)
    .then(a => a.text())
    .then(x=>{
        document.getElementById("result").innerHTML = x;
    })
}
