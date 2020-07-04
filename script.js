//Arquivo JavaScript para função de deletar na página cprof do programa OrgPes. Desencolvido por Ronaldo Gama - versão 1.0
function verifica(recid) {
	if(confirm("Tem certeza que deseja excluir permanentemente este item?")) {
	
		var formulario = document.createElement("form");
		formulario.action = "?b=delprof";
		formulario.method = "post";

		var inputId = document.createElement("input");
		inputId.type = "hidden";
		inputId.value = recid;
		inputId.name = "id";
		formulario.appendChild(inputId);

		document.body.appendChild(formulario);

		formulario.submit();	

	}
}

function verificx(rexid) {
	if(confirm("Tem certeza que deseja excluir permanentemente este item?")) {
	
		var formulx = document.createElement("form");
		formulx.action = "?b=delpess";
		formulx.method = "post";

		var inptxId = document.createElement("input");
		inptxId.type = "hidden";
		inptxId.value = rexid;
		inptxId.name = "id";
		formulx.appendChild(inptxId);

		document.body.appendChild(formulx);

		formulx.submit();	

	}
}

function editx(edxid) {
	
		var formdex = document.createElement("form");
		formdex.action = "?b=edipess";
		formdex.method = "post";

		var inxedId = document.createElement("input");
		inxedId.type = "hidden";
		inxedId.value = edxid;
		inxedId.name = "id";
		formdex.appendChild(inxedId);

		document.body.appendChild(formdex);

		formdex.submit();	

}

function copix(copid) {
	
		var formcopex = document.createElement("form");
		formcopex.action = "?b=coppes";
		formcopex.method = "post";

		var incopId = document.createElement("input");
		incopId.type = "hidden";
		incopId.value = copid;
		incopId.name = "id";
		formcopex.appendChild(incopId);

		document.body.appendChild(formcopex);

		formcopex.submit();	

}
