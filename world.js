let lookup = document.getElementById("lookup");

lookup.addEventListener("click", function(){
    let country = encodeURIComponent(document.getElementById("country").value);
    fetch('world.php?country=' + country)
        .then(response => response.text())
        .then(data => {
            document.getElementById("result").innerHTML = data;
        })
});

let lookupcities = document.getElementById("lookupcities");

lookupcities.addEventListener("click", function(){
    let country = encodeURIComponent(document.getElementById("country").value);

    fetch('world.php?country=' + country + '&lookup=cities')
        .then(response => response.text())
        .then(data => {
            document.getElementById("result").innerHTML = data;
        })
});
