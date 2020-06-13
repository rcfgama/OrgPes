<?php

/*
Arquivo PHP para tornar o site OrgPes. dinâmico
Autor: Ronaldo Gama: Versão 1.0
*/

$pag = 'home';

if (isset($_GET['b'])) {
	$pag = addslashes($_GET['b']);
}

include 'header.php';

switch ($pag) {
	case 'home':
		include 'home.php';
		break;

	case 'cprof':
		include 'cprof.php';
		break;

	case 'cpess':
		include 'cpess.php';
		break;

	case 'nlprof':
		include 'nlprof.php';
		break;

	case 'nlpess':
		include 'nlpess.php';
		break;

	case 'envprof':
		include 'envprof.php';
		break;

	case 'ediprof':
		include 'ediprof.php';
		break;	
	
	case 'salvprof':
		include 'salvprof.php';
		break;	
	
	case 'delprof':
		include 'delprof.php';
		break;

	case 'envpess':
		include 'envpess.php';
		break;

	case 'delpess':
		include 'delpess.php';
		break;

	case 'edipess':
		include 'edipess.php';
		break;	

	case 'salvpess':
		include 'salvpess.php';
		break;

	default:
		include 'home.php';
		break;
}

include 'footer.php';