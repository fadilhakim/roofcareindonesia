<?php 

function alert_danger($message) {
	$icon = "<strong>Error <span class='glyphicon glyphicon-ban-circle' aria-hidden='true'></strong>";
	return "<div class='alert alert-danger' role='alert' >$icon $message </div>";
}

function alert_warning($message) {
	$icon = "<strong>Warning <span class='glyphicon glyphicon-ban-circle' aria-hidden='true'></strong>";
	return "<div class='alert alert-warning' role='alert' >$icon $message </div>";
}

function alert_success($message) {
	$icon = "<strong>Success <span class='glyphicon glyphicon-ban-circle' aria-hidden='true'></strong>";
	return "<div class='alert alert-success' role='alert' >$icon $message </div>";
}

function alert_info($message) {
	$icon = "<strong>Info <span class='glyphicon glyphicon-ban-circle' aria-hidden='true'></strong>";
	return "<div class='alert alert-info' role='alert' >$icon $message </div>";
}
