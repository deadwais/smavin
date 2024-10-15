function myfunction() {
    document.querySelector('form').addEventListener('submit', (e) => {
        const unput = e.currentTarget
        const Data = new FormData(unput)
        const name = Data.get('username')
        if (name.length<2){
            e.preventDefault()
        }
        else if (name.length>0){
            document.getElementById("echec").innerHTML="Nom d'utilisateur ou mots de pass incorrect"
            }
        
    })
}