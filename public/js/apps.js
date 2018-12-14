
/* --------Fonction conversion html -> chaine de caractere--------------*/

function stripHtml(html){
    var temporalDivElement = document.createElement("div");
    temporalDivElement.innerHTML = html;
    return temporalDivElement.textContent || temporalDivElement.innerText || "";
}

/* --------Fonction on verifie que les champs sont bien remplis--------------*/

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


$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
