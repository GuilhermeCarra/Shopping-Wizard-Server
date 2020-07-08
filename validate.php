<?php

if (isset($_POST['firstname'])) {
    
    $response = [];

    if (preg_match('/^[a-zA-Z]{1,20}$/', $_POST['firstname'])) {
        array_push($response, True);
    } else {
        array_push($response, False);
    }

    if (preg_match('/^[a-zA-Z]{1,20}$/', $_POST['lastname'])) {
        array_push($response, True);
    } else {
        array_push($response, False);
    }

    if (preg_match('/^\s*\S+(?:\s+\S+){1,50}/', $_POST['address'])) {
        array_push($response, True);
    } else {
        array_push($response, False);
    }

    if (preg_match('/^[0-9]{5}$/', $_POST['postal'])) {
        array_push($response, True);
    } else {
        array_push($response, False);
    }

    if (preg_match('/^[0-9]{9}$/', $_POST['phone'])) {
        array_push($response, True);
    } else {
        array_push($response, False);
    }

    echo json_encode($response);
    
} elseif (isset($_POST['username'])) {

    $response = [];

    if (preg_match('/^[a-zA-Z0-9]{5,20}$/', $_POST['username'])) {
        array_push($response, True);
    } else {
        array_push($response, False);
    }

    if (preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $_POST['email'])) {
        array_push($response, True);
    } else {
        array_push($response, False);
    }

    if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,20}$/', $_POST['password'])) {
        array_push($response, True);
    } else {
        array_push($response, False);
    }

    if ($_POST['password2'] == $_POST['password']) {
        array_push($response, True);
    } else {
        array_push($response, False);
    }

    echo json_encode($response);

}