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
		App\EventMedia::create(['eventID'=>16, 'mediaID'=>3]);
		App\EventMedia::create(['eventID'=>16, 'mediaID'=>15]);
		App\EventMedia::create(['eventID'=>21, 'mediaID'=>5]);
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
						'summary'=>"Humans make the discovery that all humanoid life in the galaxy originates from one single source: a race that was alone in the galaxy that decided to send their DNA out to other worlds so that life may form. The Romulans, Klingons, and Cardassians are also present during this discovery."]);
		/*4*/	App\Event::create(['name'=>'Earth/Malcor III First Contact',
						'timelineDate'=>2367,
						'summary'=>"The Federation (accidentally) makes first contact with the Malcorians, a race that is on the verge of developing a warp engine."]);
		/*5*/	App\Event::create(['name'=>'Sisko Promoted to Captain',
						'timelineDate'=>2371,
						'summary'=>"Sisko is promoted to the rank of Captain."]);				
		/*6*/	App\Event::create(['name'=>'Romulans Join War Against the Dominion',
						'timelineDate'=>0,
						'summary'=>"temp."]);
		/*7*/	App\Event::create(['name'=>'Senator Vreenak Murdered',
						'timelineDate'=>0,
						'summary'=>"temp."]);
		/*8*/	App\Event::create(['name'=>'Borg Queen Defeated',
						'timelineDate'=>0,
						'summary'=>"temp."]);
		/*9*/	App\Event::create(['name'=>'Picard is Shown the Beginning of Evolution on Earth',
						'timelineDate'=>0,
						'summary'=>"temp."]);
		/*10*/	App\Event::create(['name'=>'Cardassia Reforms into a Democracy',
						'timelineDate'=>0,
						'summary'=>"temp."]);
		/*11*/	App\Event::create(['name'=>'Dax Symbiont Moves from Curzon to Jadzia',
						'timelineDate'=>0,
						'summary'=>"temp."]);
		/*12*/	App\Event::create(['name'=>'Dax Symbiont Moves from Jadzia to Ezri',
						'timelineDate'=>0,
						'summary'=>"temp."]);
		/*13*/	App\Event::create(['name'=>'USS Enterprise 1701-A Commissioned',
						'timelineDate'=>0,
						'summary'=>"temp."]);
		/*14*/	App\Event::create(['name'=>'USS Enterprise 1701-E Commissioned',
						'timelineDate'=>0,
						'summary'=>"temp."]);
		/*15*/	App\Event::create(['name'=>'USS Enterprise 1701-B Commissioned',
						'timelineDate'=>0,
						'summary'=>"temp."]);
		/*16*/	App\Event::create(['name'=>'USS Enterprise 1701-D Destroyed',
						'timelineDate'=>0,
						'summary'=>"temp."]);
		/*17*/	App\Event::create(['name'=>'A Changeling Infant is brought to DS9',
						'timelineDate'=>0,
						'summary'=>"temp."]);
		/*18*/	App\Event::create(['name'=>'Genesis Planet Formed',
						'timelineDate'=>0,
						'summary'=>"temp."]);
		/*19*/	App\Event::create(['name'=>'The Enterprise Crew Find Spock After his Assumed Death',
						'timelineDate'=>0,
						'summary'=>"temp."]);
		/*20*/	App\Event::create(['name'=>'Spock Reveals His Suspicions of Common Vulcan/Romulan Ancestry',
						'timelineDate'=>0,
						'summary'=>"temp."]);
		/*21*/	App\Event::create(['name'=>'The Dominion Infiltrates the Defiant',
						'timelineDate'=>0,
						'summary'=>"temp."]);
		/*22*/	App\Event::create(['name'=>'Ancient Vulcan Weapon, Stoke of Gol, Unearthed',
						'timelineDate'=>0,
						'summary'=>"temp."]);
		/*23*/	App\Event::create(['name'=>'Ezri Offered Counselor Position on DS9',
						'timelineDate'=>0,
						'summary'=>"temp."]);
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
						'collection'=>'TNG TV Series',
						'numberInCollection'=>145,
						'summary'=>"Picard's old mentor, Richard Galen, requests he take a leave of absence from his duties to complete an archaeological expedition of vast importance to the galaxy. The Cardassians, Klingons, and Romulans catch wind of this expedition, and they all race eachother to uncover the secrets that Galen's findings had hinted at. They are all led to a planet where they discover a recording of an ancient humanoid, who explains how their race was alone in the galaxy until they seeded the Galaxy with their DNA codes, eventually leading to all other humanoid life to develop."]);
		/*2*/	App\Media::create(['name'=>'Star Trek: The Voyage Home',
						'credit'=>'Leonard Nimoy',
						'series'=>'TOS',
						'medium'=>'Film',
						'timelineDate'=>2286,
						'collection'=>'TOS Film Series',
						'numberInCollection'=>4,
						'summary'=>"Kirk and his crew steal the USS Enterprise so they can go rescue Spock, but on their way home they learn Earth is under attack by a giant probe. They learn the probe is searching for whales on Earth, that the probe had probably made contact with long before humans had evolved on Earth. Kirk takes the Enterprise back in time to fetch a (now extinct) whale to satisfy the probe and save the Earth."]);
		/*3*/	App\Media::create(['name'=>'Star Trek: First Contact',
						'credit'=>'Jonathan Frakes',
						'series'=>'TNG',
						'medium'=>'Film',
						'timelineDate'=>2373,
						'collection'=>'TNG Film Series',
						'numberInCollection'=>8,
						'summary'=>"During a battle between Earth and the Borg, the Borg make an attempt to travel back and time and prevent Humans from making first contact with the Vulcans. Picard and his crew follow them back to ensure the people of that time succeed in building the first warp engine."]);
		/*4*/	App\Media::create(['name'=>'First Contact',
						'credit'=>'Cliff Bole',
						'series'=>'TNG',
						'medium'=>'Television',
						'timelineDate'=>2367,
						'collection'=>'TNG TV Series',
						'numberInCollection'=>88,
						'summary'=>"During undercover surveillence of a world on the verge of developing warp technology, Riker gets injured and is brought to a hospital. The doctors there realize that he is not really a member of their race, and begin to expect that he is an alien. Keeping in line with the Federation's Non-Interference Policy, Riker must try to hide is true identity."]);
		/*5*/	App\Media::create(['name'=>'The Adversary',
						'credit'=>'Alexander Singer',
						'series'=>'DS9',
						'medium'=>'Television',
						'timelineDate'=>2371,
						'collection'=>'DS9 TV Series',
						'numberInCollection'=>71,
						'summary'=>"After Sisko is promoted to captain, he is ordered to take the Defiant on a mission along the Tzenkethi border. During their mission the crew discovers a changeling infiltrator on board, and it is revealed that their mission was fake and was set up by the Dominion. Odo is able to track down and kill the infiltrator (becoming the first changeling to harm another), but the changeling tells him, 'You are too late. We are everywhere'."]);				
		/*6*/	App\Media::create(['name'=>'Star Trek: The Wrath of Khan',
						'credit'=>'temp',
						'series'=>'temp',
						'medium'=>'temp',
						'timelineDate'=>0,
						'collection'=>'temp',
						'numberInCollection'=>0,
						'summary'=>"temp."]);
		/*7*/	App\Media::create(['name'=>'Carbon Creek',
						'credit'=>'temp',
						'series'=>'temp',
						'medium'=>'temp',
						'timelineDate'=>0,
						'collection'=>'temp',
						'numberInCollection'=>0,
						'summary'=>"temp."]);
		/*8*/	App\Media::create(['name'=>'In the Pale Moonlight',
						'credit'=>'temp',
						'series'=>'temp',
						'medium'=>'temp',
						'timelineDate'=>0,
						'collection'=>'temp',
						'numberInCollection'=>0,
						'summary'=>"temp."]);
		/*9*/	App\Media::create(['name'=>'Star Trek: The Search for Spock',
						'credit'=>'temp',
						'series'=>'temp',
						'medium'=>'temp',
						'timelineDate'=>0,
						'collection'=>'temp',
						'numberInCollection'=>0,
						'summary'=>"temp."]);
		/*10*/	App\Media::create(['name'=>'A Stitch in Time',
						'credit'=>'temp',
						'series'=>'temp',
						'medium'=>'temp',
						'timelineDate'=>0,
						'collection'=>'temp',
						'numberInCollection'=>0,
						'summary'=>"temp."]);
		/*11*/	App\Media::create(['name'=>'The Begotten',
						'credit'=>'temp',
						'series'=>'temp',
						'medium'=>'temp',
						'timelineDate'=>0,
						'collection'=>'temp',
						'numberInCollection'=>0,
						'summary'=>"temp."]);
		/*12*/	App\Media::create(['name'=>'Gambit Pt. I',
						'credit'=>'temp',
						'series'=>'temp',
						'medium'=>'temp',
						'timelineDate'=>0,
						'collection'=>'temp',
						'numberInCollection'=>0,
						'summary'=>"temp."]);
		/*13*/	App\Media::create(['name'=>'Gambit Pt. II',
						'credit'=>'temp',
						'series'=>'temp',
						'medium'=>'temp',
						'timelineDate'=>0,
						'collection'=>'temp',
						'numberInCollection'=>0,
						'summary'=>"temp."]);
		/*14*/	App\Media::create(['name'=>'Balance of Terror',
						'credit'=>'temp',
						'series'=>'temp',
						'medium'=>'temp',
						'timelineDate'=>0,
						'collection'=>'temp',
						'numberInCollection'=>0,
						'summary'=>"temp."]);
		/*15*/	App\Media::create(['name'=>'Star Trek First Contact',
						'credit'=>'temp',
						'series'=>'temp',
						'medium'=>'temp',
						'timelineDate'=>0,
						'collection'=>'temp',
						'numberInCollection'=>0,
						'summary'=>"temp."]);
		/*16*/	App\Media::create(['name'=>'Homefront',
						'credit'=>'temp',
						'series'=>'temp',
						'medium'=>'temp',
						'timelineDate'=>0,
						'collection'=>'temp',
						'numberInCollection'=>0,
						'summary'=>"temp."]);
		/*17*/	App\Media::create(['name'=>'Blood Oath',
						'credit'=>'temp',
						'series'=>'temp',
						'medium'=>'temp',
						'timelineDate'=>0,
						'collection'=>'temp',
						'numberInCollection'=>0,
						'summary'=>"temp."]);
		/*18*/	App\Media::create(['name'=>'Afterimage',
						'credit'=>'temp',
						'series'=>'temp',
						'medium'=>'temp',
						'timelineDate'=>0,
						'collection'=>'temp',
						'numberInCollection'=>0,
						'summary'=>"temp."]);
		/*19*/	App\Media::create(['name'=>'All Good Things',
						'credit'=>'temp',
						'series'=>'temp',
						'medium'=>'temp',
						'timelineDate'=>0,
						'collection'=>'temp',
						'numberInCollection'=>0,
						'summary'=>"temp."]);
		/*20*/	App\Media::create(['name'=>'Star Trek: Insurrection',
						'credit'=>'temp',
						'series'=>'temp',
						'medium'=>'temp',
						'timelineDate'=>0,
						'collection'=>'temp',
						'numberInCollection'=>0,
						'summary'=>"temp."]);
		/*21*/	App\Media::create(['name'=>'Star Trek: Generations',
						'credit'=>'temp',
						'series'=>'temp',
						'medium'=>'temp',
						'timelineDate'=>0,
						'collection'=>'temp',
						'numberInCollection'=>0,
						'summary'=>"temp."]);
	}
}
