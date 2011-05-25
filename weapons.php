<?
			$attarray = array( 	array( "amount" => $attacks['attack1'], "power" => 5, "name" => "Metal Fists", "health" => $attacks['hlattack1']),
						array( "amount" => $attacks['attack2'], "power" => 10, "name" => "Laser Sabre", "health" => $attacks['hlattack2']),
						array( "amount" => $attacks['attack3'], "power" => 20, "name" => "Laser", "health" => $attacks['hlattack3']),
						array( "amount" => $attacks['attack4'], "power" => 40, "name" => "RPG's", "health" => $attacks['hlattack4']),
						array( "amount" => $attacks['attack5'], "power" => 160, "name" => "Rail Gun", "health" => $attacks['hlattack5']),
						array( "amount" => $attacks['attack6'], "power" => 640, "name" => "Laser Cannon", "health" => $attacks['hlattack6']),
						array( "amount" => $attacks['attack7'], "power" => 2560, "name" => "Temporal Cannon", "health" => $attacks['hlattack7']),
						array( "amount" => $attacks['attack8'], "power" => 10240, "name" => "Inter-Dimensional Rift", "health" => $attacks['hlattack8'])
					);

			$attalength=count($attarray);

			$attackstotal=0;

			for($i = $attalength - 1; $i >=0; $i--)
			{
					if ((($unitstotal-$attarray[$i]['amount'])<0) && ($attarray[$i]['amount']>0))
					{	
						$percentagehealth=($attarray[$i]['health']/100)/$attarray[$i]['amount'];
						$attackstotal=$attackstotal+($attarray[$i]['power']*(5*$unitstotal)*($percentagehealth));
						$unitstotal=0;
					} else if ($attarray[$i]['amount']>0)
					{
						$percentagehealth=($attarray[$i]['health']/100)/$attarray[$i]['amount'];
						$attackstotal=$attackstotal+($attarray[$i]['power']*(5*$attarray[$i]['amount'])*($percentagehealth));
						$unitstotal=$unitstotal-$attarray[$i]['amount'];
					}
				//	$attackstotal=$attackstotal+($attarray[$attalength]['power']*5*($attarray[$attalength]['health']/100));
				//	$attackstotal=$attackstotal+(5*$unitstotal);
			}

			$attackstotal = $attackstotal + $unitstotal;




			$defarray = array( 	array( "amount" => $defenses['defense1'], "power" => 5, "name" => "Riot Shield", "health" => $defenses['hldefense1']),
						array( "amount" => $defenses['defense2'], "power" => 10, "name" => "Riot Armor", "health" => $defenses['hldefense2']),
						array( "amount" => $defenses['defense3'], "power" => 20, "name" => "T10k Protective Armor", "health" => $defenses['hldefense3']),
						array( "amount" => $defenses['defense4'], "power" => 40, "name" => "T40k Protective Suit", "health" => $defenses['hldefense4']),
						array( "amount" => $defenses['defense5'], "power" => 160, "name" => "Proton Shield", "health" => $defenses['hldefense5']),
						array( "amount" => $defenses['defense6'], "power" => 640, "name" => "Proton Armor", "health" => $defenses['hldefense6']),
						array( "amount" => $defenses['defense7'], "power" => 2560, "name" => "Temporal Shield", "health" => $defenses['hldefense7']),
						array( "amount" => $defenses['defense8'], "power" => 10240, "name" => "Inter-Dimensional Portal", "health" => $defenses['hldefense8'])
					);

			$defalength=count($defarray);

			$defensestotal=0;

			for($i = $defalength - 1; $i >=0; $i--)
			{
					if ((($unitstotal2-$defarray[$i]['amount'])<0) && ($defarray[$i]['amount']>0))
					{
						$percentagehealth=($defarray[$i]['health']/100)/$defarray[$i]['amount'];
						$defensestotal=$defensestotal+($defarray[$i]['power']*(5*$unitstotal2)*($percentagehealth));
						$unitstotal2=0;
					} else if ($defarray[$i]['amount']>0)
					{
						$percentagehealth=($defarray[$i]['health']/100)/$defarray[$i]['amount'];
						$defensestotal=$defensestotal+($defarray[$i]['power']*(5*$defarray[$i]['amount'])*($percentagehealth));
						$unitstotal2=$unitstotal2-$defarray[$i]['amount'];
					}
				//	$defensestotal=$defensestotal+($defarray[$defalength][1]*5*($defarray[$defalength][3]/100));
				//	$defensestotal=$defensestotal+(5*$unitstotal2);
			}

			$defensestotal = $defensestotal + $unitstotal2;
?>