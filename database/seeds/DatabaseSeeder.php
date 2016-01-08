<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		/* Clear tables */
		DB::table('media')->delete();
		DB::table('events')->delete();
		DB::table('event_tags')->delete();
		DB::table('event_media')->delete();
		DB::table('series')->delete();
		
		/* Seed tables */
		$this->call(SeriesTableSeeder::class);
		$this->call(MediaTableSeeder::class);
		$this->call(EventsTableSeeder::class);
		$this->call(EventTagsTableSeeder::class);
		$this->call(EventMediaTableSeeder::class);
    }
}

class SeriesTableSeeder extends Seeder
{
	public function run()
	{
		App\Series::create(['seriesAbbreviation'=>'TOS', 'seriesName'=>'Star Trek: The Original Series']);
		App\Series::create(['seriesAbbreviation'=>'TNG', 'seriesName'=>'Star Trek: The Next Generation']);
		App\Series::create(['seriesAbbreviation'=>'DS9', 'seriesName'=>'Star Trek: Deep Space Nine']);
		App\Series::create(['seriesAbbreviation'=>'temp', 'seriesName'=>'StSpace Nine']);
	}
}

class EventTagsTableSeeder extends Seeder
{
	public function run() {
		App\EventTag::create(['eventID'=>1, 'tag'=>'First Contact']);
		App\EventTag::create(['eventID'=>4, 'tag'=>'First Contact']);
		App\EventTag::create(['eventID'=>5, 'tag'=>'Promotions']);
		App\EventTag::create(['eventID'=>2, 'tag'=>'Promotions']);
		App\EventTag::create(['eventID'=>23, 'tag'=>'Promotions']);
		App\EventTag::create(['eventID'=>18, 'tag'=>'Scientific Research']);
		App\EventTag::create(['eventID'=>17, 'tag'=>'Scientific Research']);
		App\EventTag::create(['eventID'=>6, 'tag'=>'Dominion War']);
		App\EventTag::create(['eventID'=>7, 'tag'=>'Dominion War']);
		App\EventTag::create(['eventID'=>21, 'tag'=>'Dominion War']);
		App\EventTag::create(['eventID'=>10, 'tag'=>'Dominion War']);
		App\EventTag::create(['eventID'=>3, 'tag'=>'Galaxy Formation']);
		App\EventTag::create(['eventID'=>9, 'tag'=>'Galaxy Formation']);
		App\EventTag::create(['eventID'=>18, 'tag'=>'Galaxy Formation']);
		App\EventTag::create(['eventID'=>11, 'tag'=>'Dax Lifecycles']);
		App\EventTag::create(['eventID'=>12, 'tag'=>'Dax Lifecycles']);
		App\EventTag::create(['eventID'=>13, 'tag'=>'Enterprise Progression']);
		App\EventTag::create(['eventID'=>14, 'tag'=>'Enterprise Progression']);
		App\EventTag::create(['eventID'=>15, 'tag'=>'Enterprise Progression']);
		App\EventTag::create(['eventID'=>16, 'tag'=>'Enterprise Progression']);
		App\EventTag::create(['eventID'=>19, 'tag'=>'Vulcan History']);
		App\EventTag::create(['eventID'=>20, 'tag'=>'Vulcan History']);
		App\EventTag::create(['eventID'=>22, 'tag'=>'Vulcan History']);
		App\EventTag::create(['eventID'=>8, 'tag'=>'Borg']);
		App\EventTag::create(['eventID'=>1, 'tag'=>'Borg']);
	}
}

class EventMediaTableSeeder extends Seeder
{
	public function run() {
		App\EventMedia::create(['eventID'=>1, 'mediaID'=>3]);
		App\EventMedia::create(['eventID'=>1, 'mediaID'=>7]);
		App\EventMedia::create(['eventID'=>1, 'mediaID'=>15]);
		App\EventMedia::create(['eventID'=>8, 'mediaID'=>3]);
		App\EventMedia::create(['eventID'=>8, 'mediaID'=>15]);
		App\EventMedia::create(['eventID'=>4, 'mediaID'=>4]);
		App\EventMedia::create(['eventID'=>6, 'mediaID'=>8]);
		App\EventMedia::create(['eventID'=>7, 'mediaID'=>8]);
		App\EventMedia::create(['eventID'=>5, 'mediaID'=>5]);
		App\EventMedia::create(['eventID'=>21, 'mediaID'=>5]);
		App\EventMedia::create(['eventID'=>21, 'mediaID'=>16]);
		App\EventMedia::create(['eventID'=>11, 'mediaID'=>17]);
		App\EventMedia::create(['eventID'=>12, 'mediaID'=>18]);
		App\EventMedia::create(['eventID'=>2, 'mediaID'=>2]);
		App\EventMedia::create(['eventID'=>3, 'mediaID'=>1]);
		App\EventMedia::create(['eventID'=>9, 'mediaID'=>19]);
		App\EventMedia::create(['eventID'=>18, 'mediaID'=>9]);
		App\EventMedia::create(['eventID'=>18, 'mediaID'=>6]);
		App\EventMedia::create(['eventID'=>19, 'mediaID'=>2]);
		App\EventMedia::create(['eventID'=>19, 'mediaID'=>9]);
		App\EventMedia::create(['eventID'=>13, 'mediaID'=>2]);
		App\EventMedia::create(['eventID'=>14, 'mediaID'=>20]);
		App\EventMedia::create(['eventID'=>14, 'mediaID'=>3]);
		App\EventMedia::create(['eventID'=>14, 'mediaID'=>15]);
		App\EventMedia::create(['eventID'=>10, 'mediaID'=>10]);
		App\EventMedia::create(['eventID'=>17, 'mediaID'=>11]);
		App\EventMedia::create(['eventID'=>15, 'mediaID'=>21]);
		App\EventMedia::create(['eventID'=>16, 'mediaID'=>21]);
		App\EventMedia::create(['eventID'=>20, 'mediaID'=>14]);
		App\EventMedia::create(['eventID'=>22, 'mediaID'=>12]);
		App\EventMedia::create(['eventID'=>22, 'mediaID'=>13]);
		App\EventMedia::create(['eventID'=>23, 'mediaID'=>18]);
	}
}

class EventsTableSeeder extends Seeder
{
	public function run() {
		/*1*/	App\Event::create(['name'=>'Earth/Vulcan First Contact',
						'timelineDate'=>2063,
						'summary'=>"Zefram Cochrane completes his construction of The Phoenix, the first ship on Earth with warp speed capabilities. During the ship's first flight, it is detected by the Vulcan ship T'Plana Hath. A peaceful first contact with the Vulcans is made."]);
		/*2*/	App\Event::create(['name'=>'Kirk Demoted to Captain',
						'timelineDate'=>2286,
						'summary'=>"When Kirk and his crew return home after saving Earth from a giant probe, they go to trial facing many charges including the theft and damage of the USS Enterprise, and disobeying orders from the Starfleet commander. Kirk's punishment is to be demoted from the rank of Admiral to Captain, and as a result he is given the duty of commanding a starship."]);
		/*3*/	App\Event::create(['name'=>'Origin of Humanoid Life Discovered',
						'timelineDate'=>2369,
						'summary'=>"Humans, Klingons, Cardassians, and Romulans make the discovery that all humanoid life in the galaxy originates from one single source: an ancient race that decided to send their DNA out to other worlds so that life could form throughout the galaxy."]);
		/*4*/	App\Event::create(['name'=>'Earth/Malcor III First Contact',
						'timelineDate'=>2367,
						'summary'=>"The Federation (accidentally) makes first contact with the Malcorians, a race that is on the verge of developing a warp engine."]);
		/*5*/	App\Event::create(['name'=>'Sisko Promoted to Captain',
						'timelineDate'=>2371,
						'summary'=>"Sisko is promoted to the rank of Captain."]);				
		/*6*/	App\Event::create(['name'=>'Romulans Join War Against the Dominion',
						'timelineDate'=>2374,
						'summary'=>"After the Dominion discovers one of their senators was murdered by the Dominion, they break their non-agression pact and wage war against the Dominion, finally joining the war on the side of the Federation."]);
		/*7*/	App\Event::create(['name'=>'Senator Vreenak Murdered',
						'timelineDate'=>2374,
						'summary'=>"In an attempt to trick the Romulans into thinking the Dominion is plotting against them, Sisko invites Vreenak to DS9 to discuss the war. While there, a bomb is planted on the senator's ship, killing him when he leaves the station."]);
		/*8*/	App\Event::create(['name'=>'Borg Queen Defeated',
						'timelineDate'=>2373,
						'summary'=>"When the Borg, led by the Borg Queen, travelled back in time to prevent humans from making the first warp speed flight into space, they were stopped and the Borg Queen killed by Captain Picard."]);
		/*9*/	App\Event::create(['name'=>'Picard is Shown the Beginning of Evolution on Earth',
						'timelineDate'=>2364,
						'summary'=>"While the USS Enterprise was in the middle of researching a dangerous spatial anomaly, Q takes Picard back in time to show him the moment in time when life on Earth began to develop. This was done to give Picard a clue about the formation of the anomaly they were studying."]);
		/*10*/	App\Event::create(['name'=>'Cardassia Reforms into a Democracy',
						'timelineDate'=>2376,
						'summary'=>"During the war with the Dominion, the Cardassian government made many decisions that were unpoplar among civilians. This led to many Cardassians wanting reform once the war ended, after they had seen how easily their leaders fell to corruption."]);
		/*11*/	App\Event::create(['name'=>'Dax Symbiont Moves from Curzon to Jadzia',
						'timelineDate'=>2367,
						'summary'=>"After Dax's host Curzon died, the symbiont moved to Jadzia. Because of her poor performance during her training, her joining with Dax was controversial. Jadzia was the only Trill in history to be joined after being rejected from the training program."]);
		/*12*/	App\Event::create(['name'=>'Dax Symbiont Moves from Jadzia to Ezri',
						'timelineDate'=>2374,
						'summary'=>"When Jadzia died during the Dominion War the Dax synbiont was passed onto Ezri, who had a hard time adjusting to being joined."]);
		/*13*/	App\Event::create(['name'=>'USS Enterprise 1701-A Commissioned',
						'timelineDate'=>2286,
						'summary'=>"When the original Enterprise is decommissioned, Kirk and his crew are assigned to a new Enterprise ship."]);
		/*14*/	App\Event::create(['name'=>'USS Enterprise 1701-E Commissioned',
						'timelineDate'=>2374,
						'summary'=>"After the Enterprise-D was destroyed when it crashed to the ground, the Enterprise-E was built to replace it. Picard and his old crew were reassigned to this ship."]);
		/*15*/	App\Event::create(['name'=>'USS Enterprise 1701-B Commissioned',
						'timelineDate'=>2371,
						'summary'=>"The crew of the original Enterprise is present during the Enterprise-B's maiden voyage. When they are just about to get under way, they are forced to answer a distress beacon from a ship being pulled into an energy ribbon. During the rescue the ship is destroyed and needs to be repaired."]);
		/*16*/	App\Event::create(['name'=>'USS Enterprise 1701-D Destroyed',
						'timelineDate'=>2373,
						'summary'=>"After combat with a Klingon ship, the Enterprise is badly damaged and crash lands on the surface of Veridian III. The ship is beyond repair."]);
		/*17*/	App\Event::create(['name'=>'A Changeling Infant is brought to DS9',
						'timelineDate'=>2373,
						'summary'=>"A changeling infant is found on the space station and Odo takes on the responsibility of caring for it."]);
		/*18*/	App\Event::create(['name'=>'Genesis Planet Formed',
						'timelineDate'=>2285,
						'summary'=>"The goal of the Genesis Project was to transform previously uninhabitable planets so they may be suitable to support life."]);
		/*19*/	App\Event::create(['name'=>'The Enterprise Crew Find Spock After his Assumed Death',
						'timelineDate'=>2285,
						'summary'=>"Spock had died at the end of Star Trek II, but because his body was left on the Genesis planet he was able to survive. The Enterprise crew learned of this and came back to rescue him."]);
		/*20*/	App\Event::create(['name'=>'Spock Reveals His Suspicions of Common Vulcan/Romulan Ancestry',
						'timelineDate'=>2266,
						'summary'=>"During the Enterprise's first encounter with the Romulans, Spock learns of the common ancestry he shares with the Romulans."]);
		/*21*/	App\Event::create(['name'=>'The Dominion Infiltrates the Defiant',
						'timelineDate'=>2371,
						'summary'=>"A changeling is discovered abord the USS Defiant, who is able to disguise itself by taking the form of various crew members. Later, the Dominion is able to infiltrate planet Earth as well."]);
		/*22*/	App\Event::create(['name'=>'Ancient Vulcan Weapon, Stoke of Gol, Unearthed',
						'timelineDate'=>2370,
						'summary'=>"An ancient Vulcan weapon with special properties is discovered. The weapon is special because it can only affect those with aggressive emotions."]);
		/*23*/	App\Event::create(['name'=>'Ezri Offered Counselor Position on DS9',
						'timelineDate'=>2375,
						'summary'=>"Captain Sisko offers Dax's new host a permanent position on the space station, but Ezri has a hard time deciding if she should accept."]);
	}
}

class MediaTableSeeder extends Seeder
{
	public function run()
	{
		/*1*/	App\Media::create(['name'=>'The Chase',
						'credit'=>'Jonathan Frakes',
						'series'=>'TNG',
						'medium'=>'Television',
						'timelineDate'=>2369,
						'collection'=>'TV Series',
						'numberInCollection'=>145,
						'summary'=>"Picard's old mentor, Richard Galen, requests he take a leave of absence to complete an archaeological expedition of vast importance to the galaxy. The Cardassians, Klingons, and Romulans catch wind of this expedition, and they all race eachother to uncover the secrets that Galen's findings had hinted at. They are all led to a planet where they discover a recording of an ancient humanoid, who explains how their race was alone in the galaxy until they seeded out their DNA codes, eventually leading to the evolution of all other humanoid life."]);
		/*2*/	App\Media::create(['name'=>'Star Trek: The Voyage Home',
						'credit'=>'Leonard Nimoy',
						'series'=>'TOS',
						'medium'=>'Film',
						'timelineDate'=>2286,
						'collection'=>'Film Series',
						'numberInCollection'=>4,
						'summary'=>"Kirk and his crew steal the USS Enterprise so they can go rescue Spock, but on their way home they learn Earth is under attack by a giant probe. They learn the probe is searching for whales on Earth, that the probe had probably made contact with long before humans had evolved. Kirk takes the Enterprise back in time to fetch a (now extinct) whale to satisfy the probe and save the Earth."]);
		/*3*/	App\Media::create(['name'=>'Star Trek: First Contact',
						'credit'=>'Jonathan Frakes',
						'series'=>'TNG',
						'medium'=>'Film',
						'timelineDate'=>2373,
						'collection'=>'Film Series',
						'numberInCollection'=>8,
						'summary'=>"During a battle between Earth and the Borg, the Borg make an attempt to travel back in time and prevent Humans from making first contact with the Vulcans. Picard and his crew follow them back to ensure the people of that time succeed in building the first warp engine."]);
		/*4*/	App\Media::create(['name'=>'First Contact',
						'credit'=>'Cliff Bole',
						'series'=>'TNG',
						'medium'=>'Television',
						'timelineDate'=>2367,
						'collection'=>'TV Series',
						'numberInCollection'=>88,
						'summary'=>"During undercover surveillence of a world on the verge of developing warp technology, Riker gets injured and is brought to a hospital. The doctors there realize that he is not really a member of their race, and begin to expect that he is an alien. Keeping in line with the Federation's Non-Interference Policy, Riker must try to hide is true identity."]);
		/*5*/	App\Media::create(['name'=>'The Adversary',
						'credit'=>'Alexander Singer',
						'series'=>'DS9',
						'medium'=>'Television',
						'timelineDate'=>2371,
						'collection'=>'TV Series',
						'numberInCollection'=>71,
						'summary'=>"After Sisko is promoted to captain, he is ordered to take the Defiant on a mission along the Tzenkethi border. During their mission the crew discovers a changeling infiltrator on board, and it is revealed that their mission was fake and was set up by the Dominion. Odo is able to track down and kill the infiltrator (becoming the first changeling to harm another), but the changeling tells him, 'You are too late. We are everywhere'."]);				
		/*6*/	App\Media::create(['name'=>'Star Trek: The Wrath of Khan',
						'credit'=>'Nicholas Meyer',
						'series'=>'TOS',
						'medium'=>'Film',
						'timelineDate'=>2285,
						'collection'=>'Film Series',
						'numberInCollection'=>2,
						'summary'=>"Admiral Kirk faces an old foe, Khan Noonien Singh, who has obtained the Genesis Device. The device was built with the purpose of treating planets so they can sustain life, but Khan plans to use it as a weapon."]);
		/*7*/	App\Media::create(['name'=>'Carbon Creek',
						'credit'=>'James Contner',
						'series'=>'ENT',
						'medium'=>'Television',
						'timelineDate'=>2152,
						'collection'=>'TV Series',
						'numberInCollection'=>27,
						'summary'=>"T'Pol tells a story about her great-grandmother who served on a scouting ship that had crash-landed on Earth in 1957. The crew was forced to seek help from the inhabitants of the planet, meaning that first contact with Earth might have been made before Humans developed warp technology."]);
		/*8*/	App\Media::create(['name'=>'In the Pale Moonlight',
						'credit'=>'Victor Lobl',
						'series'=>'DS9',
						'medium'=>'Television',
						'timelineDate'=>2374,
						'collection'=>'TV Series',
						'numberInCollection'=>141,
						'summary'=>"Sisko is convinced the only way they can win the war against the Dominion is if the Romulans end their non-aggression pact with the Dominion and join the war on the side of the Federation. Sisko is willing to go to great lengths to accomplish this task, including asking Garak for help. Him and Garak device a questionable plan to trick the Romulans into waging war against the Dominion."]);
		/*9*/	App\Media::create(['name'=>'Star Trek: The Search for Spock',
						'credit'=>'Leonard Nimoy',
						'series'=>'TOS',
						'medium'=>'Film',
						'timelineDate'=>2285,
						'collection'=>'Film Series',
						'numberInCollection'=>3,
						'summary'=>"After Spock's death the Enterprise and her crew return to Earth, only to learn that the Enterprise is to be decommissioned. But once McCoy reveals that Spock may still be alive, Kirk decides to steal back the Enterprise and go on a mission to save Spock and return him to Vulcan. They are intercepted by the Klingons along the way, who have learned of the Genesis project and want to interfere."]);
		/*10*/	App\Media::create(['name'=>'A Stitch in Time',
						'credit'=>'Andrew Robinson',
						'series'=>'TNG',
						'medium'=>'Book',
						'timelineDate'=>2376,
						'collection'=>'Pocket DS9',
						'numberInCollection'=>27,
						'summary'=>"In a series of letters to Dr. Bashir, Garak tells the story of his childhood and how he began working for the Obsidian Order. Many previously unknown facts about his past are finally revealed."]);
		/*11*/	App\Media::create(['name'=>'The Begotten',
						'credit'=>'Jesus Salvador Trevino',
						'series'=>'DS9',
						'medium'=>'Television',
						'timelineDate'=>2373,
						'collection'=>'TV Series',
						'numberInCollection'=>108,
						'summary'=>"When an infant changeling is discovered on the space station, Odo takes on the resposibility of training and raising it. Because he believes the way he was raised (by the scientist Dr. Mora) was unethical, he aims to take a kinder approach in his techniques. When his methods fail, he is forced to recruit help from Dr. Mora. They eventually succeed in teaching the changeling to shape-shift."]);
		/*12*/	App\Media::create(['name'=>'Gambit Pt. I',
						'credit'=>'Peter Lauritson',
						'series'=>'TNG',
						'medium'=>'Television',
						'timelineDate'=>2370,
						'collection'=>'TV Series',
						'numberInCollection'=>155,
						'summary'=>"Captain Picard goes missing, and after a long search Riker and the rest of the crew begin to suspect he is dead. They eventually track him down to a planet where him and a group of archaeological thieves are researching an ancient Romulan device that potentially could be used for torture. Picard reveals that he was kidnapped by the theives, on account of his skills in archeology."]);
		/*13*/	App\Media::create(['name'=>'Gambit Pt. II',
						'credit'=>'Alexander Singer',
						'series'=>'TNG',
						'medium'=>'Television',
						'timelineDate'=>2370,
						'collection'=>'TV Series',
						'numberInCollection'=>156,
						'summary'=>"Picard learns that the Romulan artifact his kidnappers were after is actually an ancient Vulcan weapon. He discovers that the weapon only works against those with negative emotions, and he and his crew can only avoid being killed if they can clear their minds of any aggressive thoughts."]);
		/*14*/	App\Media::create(['name'=>'Balance of Terror',
						'credit'=>'Vincent McEveety',
						'series'=>'TOS',
						'medium'=>'Television',
						'timelineDate'=>2266,
						'collection'=>'TV Series',
						'numberInCollection'=>14,
						'summary'=>"The Enterprise detects a distress signal coming from an Outpost along the neutral zone between the Federation and the Romulan Empire. The Romulans seem to be testing new weapons against the Federation, and it also appears they have cloaking technology. This is the first time anyone on the Enterprise has ever seen a Romulan, and their resemblance to the Vulcans leads some crew members to suspect Spock of treachery."]);
		/*15*/	App\Media::create(['name'=>'First Contact (novel)',
						'credit'=>'J.M. Dillard',
						'series'=>'TNG',
						'medium'=>'Book',
						'timelineDate'=>2373,
						'collection'=>'Pocket TNG',
						'summary'=>"Novelization of the film 'Star Trek: First Contact'."]);
		/*16*/	App\Media::create(['name'=>'Homefront',
						'credit'=>'David Livingston',
						'series'=>'DS9',
						'medium'=>'Television',
						'timelineDate'=>2372,
						'collection'=>'TV Series',
						'numberInCollection'=>81,
						'summary'=>"Captain Sisko and the DS9 crew are called to Earth when suspicions arise that the Dominion has infiltrated Earth. The Federation is ill-equipped to handle the potential infiltration, and have to fall back on blood-testing to ensure no officer is a changeling in disguise."]);
		/*17*/	App\Media::create(['name'=>'Blood Oath',
						'credit'=>'Winrich Kolbe',
						'series'=>'DS9',
						'medium'=>'Television',
						'timelineDate'=>2370,
						'collection'=>'TV Series',
						'numberInCollection'=>38,
						'summary'=>"A group of Klingons board the station looking for Curzon Dax, to enlist him in a quest to kill an old enemy that they had tracked down. They are upset to learn that Curzon has died, and are relunctant to take Jadzia with them when she offers to honor Curzon's oath to help them kill their target."]);
		/*18*/	App\Media::create(['name'=>'Afterimage',
						'credit'=>'Les Landau',
						'series'=>'DS9',
						'medium'=>'Television',
						'timelineDate'=>2375,
						'collection'=>'TV Series',
						'numberInCollection'=>151,
						'summary'=>"Ezri has to decide if she should remain on DS9 as the station's councelor. In this episode, she gets to know Jadzia's old friends on the station, and also tries to help Garak with an extreme case of claustrophobia he has been dealing with."]);
		/*19*/	App\Media::create(['name'=>'All Good Things...',
						'credit'=>'Winrich Kolbe',
						'series'=>'TNG',
						'medium'=>'Television',
						'timelineDate'=>2364,
						'collection'=>'TV Series',
						'numberInCollection'=>176,
						'summary'=>"A spatial anomaly is threatening to prevent the evolution of humanity, and Picard must stop it. Q helps Picard realize that the anomaly is growing backwards in time by transporting him to different times in his life, and eventually Picard realizes how the anomaly can be stopped. Q realizes there may be hope for humanity after all."]);
		/*20*/	App\Media::create(['name'=>'Star Trek: Insurrection',
						'credit'=>'Jonathan Frakes',
						'series'=>'TNG',
						'medium'=>'Film',
						'timelineDate'=>2375,
						'collection'=>'Film Series',
						'numberInCollection'=>3,
						'summary'=>"Picard and his crew observe the peaceful Ba'ku race, who live in harmony with nature and reject using technology in their daily lives. When it is discovered that the planet has magical properties that allows its inhabitants to be immortal, forces within Starfleet decide to take over the planet. Picard, believing this to be out of line with Federation ideals, tries to stop them."]);
		/*21*/	App\Media::create(['name'=>'Star Trek: Generations',
						'credit'=>'David Carson',
						'series'=>'TNG',
						'medium'=>'Film',
						'timelineDate'=>2371,
						'collection'=>'Film Series',
						'numberInCollection'=>1,
						'summary'=>"Captain Picard enlists help from the previously assumed dead Captain Kirk. Their mission is to stop a crazed scientist who is destroying entire planetary systems."]);
	}
}
