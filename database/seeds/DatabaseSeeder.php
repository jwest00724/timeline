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
		DB::table('items')->delete();
		DB::table('events')->delete();
		DB::table('event_tags')->delete();
		DB::table('event_items')->delete();
		DB::table('abbreviations')->delete();
		
		/* Seed tables */
		$this->call(AbbreviationsTableSeeder::class);
		$this->call(ItemsTableSeeder::class);
		$this->call(EventsTableSeeder::class);
		$this->call(EventTagsTableSeeder::class);
		$this->call(EventItemsTableSeeder::class);
    }
}

class AbbreviationsTableSeeder extends Seeder
{
	public function run()
	{
		App\Abbreviation::create(['seriesAbbreviation'=>'TOS', 'seriesName'=>'Star Trek: The Original Series']);
		App\Abbreviation::create(['seriesAbbreviation'=>'TNG', 'seriesName'=>'Star Trek: The Next Generation']);
		App\Abbreviation::create(['seriesAbbreviation'=>'DS9', 'seriesName'=>'Star Trek: Deep Space 9']);
		App\Abbreviation::create(['seriesAbbreviation'=>'VOY', 'seriesName'=>'Star Trek: Voyager']);
		App\Abbreviation::create(['seriesAbbreviation'=>'ENT', 'seriesName'=>'Star Trek: Enterprise']);
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

class EventItemsTableSeeder extends Seeder
{
	public function run() {
		App\EventItem::create(['eventID'=>1, 'itemID'=>1]);
		App\EventItem::create(['eventID'=>2, 'itemID'=>7]);
	}
}

class ItemsTableSeeder extends Seeder
{
	public function run()
	{
		/* Television Shows */
		App\Item::create(['name'=>'In the Pale Moonlight',
						'credit'=>'temp',
						'series'=>'DS9',
						'medium'=>'Television',
						'summary'=>'temp',
						'timelineDate'=>date('2100-1-1'),
						'numberInSeries'=>1]);
		App\Item::create(['name'=>'Amok Time',
						'credit'=>'TOS',
						'medium'=>'Television',
						'summary'=>'temp', 
						'timelineDate'=>date('2100-1-1'),
						'numberInSeries'=>1]);
		App\Item::create(['name'=>"It's Only a Paper Moon",
						'credit'=>'temp',
						'series'=>'DS9',
						'medium'=>'Television',
						'summary'=>'temp',
						'timelineDate'=>date('2100-1-1'),
						'numberInSeries'=>1]);
		App\Item::create(['name'=>'Measure of a Man',
						'credit'=>'temp',
						'series'=>'TNG',
						'medium'=>'Television',
						'summary'=>'temp',
						'timelineDate'=>date('2100-1-1'),
						'numberInSeries'=>1]);
		App\Item::create(['name'=>'Arsenal of Freedom',
						'credit'=>'temp',
						'series'=>'TNG',
						'medium'=>'Television',
						'summary'=>'temp',
						'timelineDate'=>date('2100-1-1'),
						'numberInSeries'=>1]);
		App\Item::create(['name'=>'The Cage',
						'credit'=>'temp',
						'series'=>'TOS',
						'medium'=>'Television',
						'summary'=>'temp',
						'timelineDate'=>date('2100-1-1'),
						'numberInSeries'=>1]);
						
		/* Films */
		App\Item::create(['name'=>'First Contact',
						'credit'=>'temp',
						'series'=>'TNG',
						'medium'=>'Film',
						'summary'=>'temp',
						'timelineDate'=>date('2100-1-1'),
						'numberInSeries'=>1]);
		App\Item::create(['name'=>'The Wrath of Khan',
						'credit'=>'temp',
						'series'=>'TOS',
						'medium'=>'Film',
						'summary'=>'temp',
						'timelineDate'=>date('2100-1-1'),
						'numberInSeries'=>1]);
	}
}
