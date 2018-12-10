
function stripHtml(html){
    var temporalDivElement = document.createElement("div");
    temporalDivElement.innerHTML = html;
    return temporalDivElement.textContent || temporalDivElement.innerText || "";
}

function checkTextArea(){

var myPost=stripHtml(tinyMCE.get('myPost').getContent())
var myExtract=stripHtml(tinyMCE.get('myExtract').getContent())

if (myPost.length<2 || myExtract.length<2){
	console.log (myExtract)
	alert('Veuillez remplir tous les champs')
}

if (tinyMCE.get('myExtract').getContent().length>255){
		alert('Votre extrait doit comporter moins de 255 caractères')

}
}


