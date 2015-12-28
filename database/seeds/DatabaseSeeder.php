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
		App\Series::create(['seriesAbbreviation'=>'DS9', 'seriesName'=>'Star Trek: Deep Space 9']);
		App\Series::create(['seriesAbbreviation'=>'VOY', 'seriesName'=>'Star Trek: Voyager']);
		App\Series::create(['seriesAbbreviation'=>'ENT', 'seriesName'=>'Star Trek: Enterprise']);
	}
}

class EventsTableSeeder extends Seeder
{
	public function run() {
		App\Event::create(['name'=>'Romulans join war against the Dominion',
						'timelineDate'=>date('2100-1-1'),
						'summary'=>'temp']);
		App\Event::create(['name'=>'Earth makes first contact with the Vulcans',
						'timelineDate'=>date('2100-1-1'),
						'summary'=>'temp']);
	}
}

class EventTagsTableSeeder extends Seeder
{
	public function run() {
		App\EventTag::create(['eventID'=>1, 'tag'=>'Dominion War']);
		App\EventTag::create(['eventID'=>2, 'tag'=>'First Contact']);
		App\EventTag::create(['eventID'=>2, 'tag'=>'Earth History']);
	}
}

class EventMediaTableSeeder extends Seeder
{
	public function run() {
		App\EventMedia::create(['eventID'=>1, 'mediaID'=>1]);
		App\EventMedia::create(['eventID'=>2, 'mediaID'=>7]);
	}
}

class MediaTableSeeder extends Seeder
{
	public function run()
	{
		/* Television Shows */
		App\Media::create(['name'=>'In the Pale Moonlight',
						'credit'=>'temp',
						'series'=>'DS9',
						'medium'=>'Television',
						'summary'=>'temp',
						'timelineDate'=>date('2200-1-10'),
						'collection'=>'ds9 tv series',
						'numberInSeries'=>1]);
		App\Media::create(['name'=>'Amok Time',
						'credit'=>'temp',
						'series'=>'TOS',
						'medium'=>'Television',
						'summary'=>'temp', 
						'timelineDate'=>date('2100-1-1'),
						'collection'=>'tos tv series',
						'numberInSeries'=>1]);
		App\Media::create(['name'=>"It's Only a Paper Moon",
						'credit'=>'temp',
						'series'=>'DS9',
						'medium'=>'Television',
						'summary'=>'temp',
						'timelineDate'=>date('2000-1-1'),
						'collection'=>'ds9 tv series',
						'numberInSeries'=>1]);
		App\Media::create(['name'=>'Measure of a Man',
						'credit'=>'temp',
						'series'=>'TNG',
						'medium'=>'Television',
						'summary'=>'temp',
						'timelineDate'=>date('2100-12-1'),
						'collection'=>'tng tv series',
						'numberInSeries'=>1]);
		App\Media::create(['name'=>'Arsenal of Freedom',
						'credit'=>'temp',
						'series'=>'TNG',
						'medium'=>'Television',
						'summary'=>'temp',
						'timelineDate'=>date('2100-1-1'),
						'collection'=>'tng tv series',
						'numberInSeries'=>1]);
		App\Media::create(['name'=>'The Cage',
						'credit'=>'temp',
						'series'=>'TOS',
						'medium'=>'Television',
						'summary'=>'temp',
						'timelineDate'=>date('2100-5-1'),
						'collection'=>'tos tv series',
						'numberInSeries'=>1]);
						
		/* Films */
		App\Media::create(['name'=>'First Contact',
						'credit'=>'temp',
						'series'=>'TNG',
						'medium'=>'Film',
						'summary'=>'temp',
						'timelineDate'=>date('2100-10-1'),
						'collection'=>'tng films',
						'numberInSeries'=>1]);
		App\Media::create(['name'=>'The Wrath of Khan',
						'credit'=>'temp',
						'series'=>'TOS',
						'medium'=>'Film',
						'summary'=>'temp',
						'timelineDate'=>date('2100-1-10'),
						'collection'=>'tos films',
						'numberInSeries'=>1]);
	}
}
