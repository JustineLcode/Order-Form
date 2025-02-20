<?php

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);

// We are going to use session variables so we need to enable sessions
session_start();

// Use this function when you need to need an overview of these variables
function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}
whatIsHappening();
// TODO: provide some products (you may overwrite the example)
$products = [
        ['name' => 'Pacemaker Azure simple chambre', 'price' => 5000.0],
        ['name' => 'Pacemaker Accolade double chambre', 'price' => 5500.0],
        ['name' => 'Pacemaker Micra Transcatheter Pacing System', 'price' => 7000.0],
        ['name' => 'Pacemaker Assurity MRI simple chambre', 'price' => 5200.0],
        ['name' => 'Pacemaker Edora SR-T', 'price' => 5100.0],
        ['name' => 'Défibrillateur implantable Evera MRI', 'price' => 15000.0],
        ['name' => 'Défibrillateur implantable Resonate', 'price' => 15500.0],
        ['name' => 'Défibrillateur implantable Ilesto 7', 'price' => 14800.0],
        ['name' => 'Défibrillateur implantable Ellipse', 'price' => 15200.0],
        ['name' => 'Pacemaker Aveir VR Leadless', 'price' => 6800.0],
            ];

$totalValue = 0;

foreach ($_POST["products"] as $index => $value) {$totalValue += $products[$index]["price"];
};

// adresse de livraison:
$street = $_POST["street"];
$street_number = $_POST["streetnumber"];
$city = $_POST["city"];
$zipcode = $_POST["zipcode"];

$adress = $street . " " . $street_number . ", " . $zipcode . " " . $city;


function validate()
{
    // TODO: This function will send a list of invalid fields back
    return ["champ" => "msg"]; // copie ligne 24 (push dans array si pas correct)
}

function handleForm()
{
    // TODO: form related tasks (step 1)

    // Validation (step 2)
    $invalidFields = validate();
    if (!empty($invalidFields)) {
        // TODO: handle errors
    } else {
        // TODO: handle successful submission
    }
}

// TODO: replace this if by an actual check for the form to be submitted
$formSubmitted = false;
if ($formSubmitted) {
    handleForm();
}

require 'form-view.php';