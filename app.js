function delet(id) {
    const n = confirm("vous voulez vraiment supprimer cette eleve ♠☻♠")
    if (n) {
        fetch("delete.php", { method: "post", body: new URLSearchParams({ id }) })
            .then(() => {
                const t = document.getElementById('tr-' + id)
                t.parentElement.removeChild(t)
            }).catch((e) => {
                console.error(e);
                alert('probleme serveur')

            })
    }
}
function srx(z) {
    if (z.length == 0) {
        document.getElementById('result').innerHTML = '';
    } else {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('result').innerHTML = this.responseText;
            }
        }
        xhr.open("GET", 'recherche.php?search=' + z, true)
        xhr.send()
    }
}


function mentionfunction tout() {

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('result').innerHTML = this.responseText;
        }
    }
    xhr.open("GET", 'recherche.php?tout=tout', true)
    xhr.send()
}
tout()(e) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('result').innerHTML = this.responseText;
        }
    }
    xhr.open("GET", 'recherche.php?mention=' + e, true)
    xhr.send()
}
