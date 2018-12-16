
/* --------Fonction conversion html -> chaine de caractere--------------*/

function stripHtml(html){
    var temporalDivElement = document.createElement("div");
    temporalDivElement.innerHTML = html;
    return temporalDivElement.textContent || temporalDivElement.innerText || "";
}

/* --------Fonction on verifie que les champs sont bien remplis--------------*/

function checkTextArea(){

var myExtract=stripHtml(document.getElementById('myExtract').value)

if (myExtract.length>255){
		alert('Votre extrait doit comporter moins de 255 caractères')

}
}


function checkFormComm(){
	if(document.getElementById('author').value.length<2 ||document.getElementById('comment').value.length<2){

            document.getElementById('error').innerHTML=("<strong>Tous les champs doivent être renseignés!</strong>")// si champ mal renseigné message d'erreur
            return false
        }   
    }

function checkFormNewPost(){
	if(document.getElementById('myTitle').value.length<2 ||document.getElementById('myExtract').value.length<2 || tinyMCE.get('myPost').getContent().length<2){
            document.getElementById('error').innerHTML=("<strong>Tous les champs doivent être renseignés!</strong>")// si champ mal renseigné message d'erreur
            return false
        }   
    }
