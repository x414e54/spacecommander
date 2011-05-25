<?
	if (!isset($content) && empty($_SESSION["username"])){
		$content="help";
		require('./index.php');
	} else {
?>
<br>
<div class="header">Help</div>
<br>
<ul>
<li><a href="#intro">[Introduction]</a></li>
<li><a href="#start">[Quick Start]</a></li>
<li><a href="#ticks">[Ticks]</a></li>
<li><a href="#link">[Your Unique Link]</a></li>
<li><a href="#attack">[Attack]</a></li>
<li><a href="#defense">[Defense]</a></li>
<li><a href="./rules.php">[Rules]</a></li>
</ul><br><br>
<a name="intro" style="font-weight:bolder;font-size:12pt;text-decoration:underline;">Introduction:</a><br>
<br>
Space Commander is a web based Space War game. It was created using php and mysql and has a simple
html interface, this means it can be played without any installation and for the client it requires very little resources.<br>
<br>
When you join you will get to choose a "Clan" and a Species, for example there are three different Species, (Humans, Machines and Unknown) and each of these
has two "Clans". For Example Humans have, "Cloners" - these have cloning technologies and thus their units will increase every tick, and the second are "Humans" - these
have a 50% defense bonus on top of everything else.<br>
<br>
You will also get a choice to join a random planet, create a new one, or if you have been refered to this site by a current user's unique <a href="#link">[Link]</a> you will have the choice to join their planet.<br>
<br>
The planet you join or create will be restricted your particular Species (but not clan), co-operation between members of the same planet is vital. If you go rouge then you might end up with half a planet against you.
<br><br><br>
<a name="start" style="font-weight:bolder;font-size:12pt;text-decoration:underline;">Quick Start</a><br><br>
In Space Commander you will get to choose a "Clan" and a Species, each of these as a specific advantage over others thse are:
<ul>
<li><span class="bold">Species: Humans</a></li>
<li>Clan: Clones - Start with clone technology, this means their unit count will increase every tick. Your units go up, more money, more units can be equiped with weapons, thus more power.</li>
<li>Clan: Humans - 50% Extra defense over the other clans. This means your <a href="defense">[Effective Desfense]</a> will be 50% greater an advantage becuase you will not need to upgrade your defense technology as much to block incoming attacks</li>
<li><span class="bold">Species: Machines</a></li>
<li>Clan: Terminators - 50% Extra attack over the other clans. These are Terminators better at attacking, meaning they are able to over come peoples defense with greater ease.</li>
<li>Clan: Harvesters - 25% Extra credits per tick than other clans. These machines excel in Ore mining, and therefore can extract that extra little bit, more money, more stuff you can buy</li>
<li><span class="bold">Species: Unknown</a></li>
<li>Clan: Coverts - Covert centers, so you can spy on people, and saboutage their bases. These Unknown Species have developed hi-tech covert technology and are able to spy on other users and return details of their base, also sometimes they may saboutage units, poison them or steal money</li>
<li>Clan: Hackers - Hacking center, hack peoples bank accounts and return their messages. These Unknown Species have developed hacking technology, this will infect any computerised system, like the Galactic Bank details of users and their messaging system and return them to the hacker</li>
</ul>
<br>
<br>
Once you have decided on your Clan you are now ready to register.<Br>
<br>
If you already know people playing the game ask them for their unique link and then click on it and be recruited into their army, now go to the register page and you will have the choice to join their planet.<br>
<span class="bold">However - you must rember that only users of the same Species can be on a planet, this means that you will have to be the same species as your friend</span>.<br><Br>
If you would rather be a different Species, then you have the option to:
<ul>
<li>Join a Random Planet: - This will randomly choose a planet where the inhabitants are the same Species as you have chosen, if one cannot be found it will create a new planet with a random name</li>
<li>Create a New Planet: - This will create a new planet of a name you choose, so you can give your <a href="#link">[Link]</a> out to your friends and they can join it.</li>
</ul>
<span class="bold">However - you must rember that you do not own this planet, you are simply the creator therefore any user of the same Species may be Randomly assigned to your planet</span>.<br><br>
Now register and you will be sent an e-mail, if you do not receive it there is a section on the register page to resend the e-mail. Please disregard the old one if you receive it.<br>
You must click the link in the e-mail within about 30 minutes otherwise your pending user will be removed and you will have to register again.<br><br>
<span class="bold">Congratulations! You are now a member of Space Commander</span>
<br><br>
<span class="bold">Command Center</span><br>
Once you log in you will be presented with the Command Center, this displays overall statistics about your account. For example, Credits, Debt, <a href="attack">[Attack Credits]</a>, etc.<br>
You Uniquie <a href="#link">[Link]</a> is displayed on this page also</a><br><br>
<span class="bold">Messages/Inbox</span><br>
When you first login you will notice 3 new messages:<br>
These are one from the Admin welcoming you to the world and<br>
Two from the Galactic Bank telling you that they have created a new <a href="#bank">[Bank Account]</a> for you
and have given you a starting loan, to start you off.<br><br>
<span class="bold">Attack Log</span><br>
This will display information about incoming and outgoing attacks.<br><br>
<span class="bold">Planet</span><br>
This will list all the user on your planet<br><br>
<span class="bold">Solar System</span><br>
This will list all the planets in your solar system<br><br>
<span class="bold">Galaxy</span><br>
This will list all the Solar Systems in your galaxy.<br><br>
<span class="bold">Universe</span><br>
This will list all the Galaxies in the Universe of Space Commander.<br><br>
<span class="bold">Armory</span><br>
When you first log in you will have one unit, but this unit does not have any attack of defense weapons therefore your <a href="#attack">[Effective Attack]</a> and <a href="#defense">[Effective Defense]</a> will be pretty small.<br>
So the armory is where you go to buy new weapons for your units, repair weapons and sell weapons.<br><br>
<span class="bold">However - you must remember that a unit can only use one attack and one defense weapon, so buying 10 Temporal Canons when you only have one unit is a waste, they can only use one!</span><br><br>
Every tick, and every time you attack someone or someone attacks you, some of you weapons will get damaged, from use or old age. To combat this you can choose to repair weapons health, you type in the amount you want them to be repaired (they cannot have more than 100% health) and then click repair.<br>
The more damaged your weapons are the less you will be able to sell them for.<br>
If you get fed up of reparing your weapons every tick there is the choose to put auto repair on, this will mean that some of your credits will be used up repairing the weapons to full health for you.<br><br>
<span class="bold">However - you must rember that if your income is less than the amount it costs to repair the weapons to full health, it will repair the weapons from best to worst until you run out of income that turn.<br><br>
Therefore if you have 10 Temporal Canons and Auto-Repair is on, and you only get 100 Credits a turn you will not get any money that turn and your weapons will still get damaged a bit.</span>
<br><br>
<span class="bold">Research</span><br>
This is the area in which you can research new technologies.<br>
When you have enough credits you will get the option of a ONE TIME BONUS, this means you can only research one of the options
and then you will not be aloud to research any of the others.<br><br>
<span class="bold">Bank</span><br>
This is where you will be able to log in and manage your bank accounts, transfer money to users and so on.<br><Br>
<span class="bold">Intelligence</span><br>
This will display information about incoming and outgoing spy and hack attempts.<br><br>
<br><br>
<a name="ticks" style="font-weight:bolder;font-size:12pt;text-decoration:underline;">Ticks</a><br><br>
Aproximately every 30mins there is a tick.  This is vital to your survival as this is when you will gain new units, your credits will increase, transactions will progress, and so on.<br>
The time to the next tick is displayed in the "Server Status" box.
<br><br><br>
<a name="link" style="font-weight:bolder;font-size:12pt;text-decoration:underline;">You Unique Link</a><br>
<br>
Unless you are a "Cloner" or have cloning technology you may be wondering how to recruit more units. Well the answer to this is your "Unique Link". This link when clicked will recruit one more unit into your army, however it can only be clicked
by one person every 30 minutes. So how come there are people with thousands of units and they do not have cloning technology I hear you ask, well the answer is simple; if you give out your Link to your friends then can click it once every 30 minutes also.
So if you have 100 friends thats 100 units every half an hour.
<br><br><br>
<a name="attack" style="font-weight:bolder;font-size:12pt;text-decoration:underline;">Attack</a><br>
<br>
One of the main aspects of the game is attacking people and stealing their money. Your Effective Attack is the amount of damage you will do to other users when you attack them.<Br>
To increase your Effective Attack you need to buy weapons for your units, or research higher attack technologies. The technologies work as an extra ontop of all your
units' weapons.<br><br>
<span class="bold">However - you must remember that a unit can only use one attack and one defense weapon, so buying 10 Temporal Canons when you only have one unit is a waste, they can only use one!</span><br>
<br>
When you attack users a report is given, your damage (to them) must be greater than their damage (to you), for you to win the attack, if the attack is sucessful you will possibly kill some of their units and get some money from them.<br><br>
<span class="bold">However - you must remember that if your units are greater than the person you are attacking you will get less credits, and vice versa. So if you attack a person will siginificantly less units than you, you will get little or no credits. If you attack a user with alot more units than you, you may steal all of their credits.!</span><br><br>
If you attack and it is unsucessful, you will not steal any credits and you may lose one of your units.<br>
<br>
Please rember when attacking the health of your attack weapons will decrease slightly.
<br><br><br>
<a name="defense" style="font-weight:bolder;font-size:12pt;text-decoration:underline;">Defense</a><br>
<br>
Sometimes you may get attacked by other users, and you will need to defend against this. Your Effective Defense is the amount of damage you will do to other users when they attack you.<Br>
To increase your Effective Defense you need to buy weapons for your units, or research higher defense technologies. The technologies work as an extra ontop of all your
units' weapons.<br><br>
<span class="bold">However - you must remember that a unit can only use one attack and one defense weapon, so buying 10 Temporal Canons when you only have one unit is a waste, they can only use one!</span><br>
<br>
When a user attacks you it will be displayed in your attack log, it will be red if they had a sucessful attack and blue if it failed and it will display how many credits they stole if it was sucessful.<br>
<br>
Please rember when people attack you the health of your defensive weapons will decrease slightly.
<br>
<Br>
<br>
Thank you! Please enjoy playing commander<br><br>
<?
	}
?>