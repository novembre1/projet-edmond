
document.getElementById("inscription").addEventListener("submit" , function(e) {	

	var erreur;
	let nom= document.getElementById("nom");
	let mail= document.getElementById("mail");
	let login=document.getElementById("login");
	let mdp1=document.getElementById("mdp1");
	let mdp2= document.getElementById("mdp2");

	if (nom.value=="") {
		erreur="veuillez renseigner votre nom";
	}

	if (!mail.value) {
		erreur="veuillez renseigner votre mail";
	}

	if (!login.value) {
		erreur="veuillez renseigner votre login";
	}

	if (!mdp1.value) {
		erreur="veuillez renseigner votre mot de passe";
	}

	if (!mdp2.value) {
		erreur="veuillez confirmer votre mot de passe";
	}

	if (mdp1.value != mdp2.value) {
		erreur="votre mot de passe n'est pas conforme";
	}

	if (erreur) {
		e.preventDefault();
		document.getElementById('erreur').innerHTML=erreur;
		return false;

	}else{

		e.target.submit();
	}

})
