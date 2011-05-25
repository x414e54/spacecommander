<?php

//Basic weapon information

$attarray = array( 	array( "cost" => 1000, "power" => 5, "name" => "Metal Fists"),
			array( "cost" => 1800, "power" => 10, "name" => "Laser Sabre"),
			array( "cost" => 3200, "power" => 20, "name" => "Laser"),
			array( "cost" => 5100, "power" => 40, "name" => "RPG's"),
			array( "cost" => 16400, "power" => 160, "name" => "Rail Gun"),
			array( "cost" => 52400, "power" => 640, "name" => "Laser Cannon"),
			array( "cost" => 167800, "power" => 2560, "name" => "Temporal Cannon"),
			array( "cost" => 471600, "power" => 10240, "name" => "Inter-Dimensional Rift")
		);

$defarray = array( 	array( "cost" => 1000, "power" => 5, "name" => "Riot Shield"),
			array( "cost" => 1800, "power" => 10, "name" => "Riot Armor"),
			array( "cost" => 3200, "power" => 20, "name" => "T10k Protective Armor"),
			array( "cost" => 5100, "power" => 40, "name" => "T40k Protective Suit"),
			array( "cost" => 16400, "power" => 160, "name" => "Proton Shield"),
			array( "cost" => 52400, "power" => 640, "name" => "Proton Armor"),
			array( "cost" => 167800, "power" => 2560, "name" => "Temporal Shield"),
			array( "cost" => 471600, "power" => 10240, "name" => "Inter-Dimensional Portal")
		);

//Research armory effects
$cheapweaponfactor=0.5;
$cheapmaintainfactor=0.5;

//Important armory numbers
$salefactor=0.75;

//Research costings
$basicspyrate=12000;
$basichackrate=12000;
$basicorerate=12000;
$basicdefrate=40000;
$basicattrate=40000;

$techpurchase=6000000;

// First Item Is the "infinite value" name
$attacktec = array("ULTIMATE POWER X", "None", "Dune Buggies", "Armored Exoskeletos", "APCs", "Laser Tanks", "Mammoth Tanks", "Temporal Tanks", "Ion Cannon", "Nuclear Bomb", "Quantum Bomb", "Temporal Storm", "POWER OF GOD");

// First Item Is the "infinite value" name
$deftec = array("ULTIMATE POWER X", "Tents", "Lasers", "Armored Barracks", "Command Centre", "Nuclear Bunker", "Underground Caverns", "Temporal Fence", "Temporal Cannons", "Space Station", "Planet", "Temporal Domain", "POWER OF GOD");

// Races
$racename =array("Unselected", "Terminators[MACHINES]", "Humans[HUMANS]", "Cloners[HUMANS]", "Havervesters[MACHINES]", "Inter-spacial beings[UNKNOWN]", "Hackers[UNKNOWN]");
?>