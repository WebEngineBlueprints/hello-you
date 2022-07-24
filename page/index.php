<?php
use Gt\DomTemplate\DocumentBinder;
use Gt\Input\Input;
use Gt\Session\Session;

function go(Session $session, DocumentBinder $binder):void {
	if($name = $session->getString("name")) {
		$binder->bindKeyValue("your-name", $name);
	}
}

function do_greet(Input $input, Session $session):void {
	$session->set("name", $input->getString("your-name"));
	header("Location: /");
	exit;
}

function do_reset(Session $session):void {
	$session->remove("name");
	header("Location: /");
	exit;
}
