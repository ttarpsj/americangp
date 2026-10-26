<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('agp:export {--output=static}', function () {
    $output = base_path($this->option('output'));
    File::ensureDirectoryExists($output);
    config(['app.asset_url' => '/americangp']);
    File::put($output.'/index.html', view('agp', [
        'rounds' => [
            ['n'=>'01','city'=>'ST. PETERSBURG','state'=>'FL','tone'=>'coast','intro'=>'A waterfront opening round designed for close, fast racing.','course'=>'Flat, technical and exposed to the bay breeze.'],
            ['n'=>'02','city'=>'AUSTIN','state'=>'TX','tone'=>'texas','intro'=>'Downtown energy meets a compact spectator-first circuit.','course'=>'Punchy turns, quick transitions and heat-ready tactics.'],
            ['n'=>'03','city'=>'MILWAUKEE','state'=>'WI','tone'=>'lake','intro'=>'A Great Lakes round built around rhythm and resilience.','course'=>'Open water, fast roads and a decisive final run.'],
            ['n'=>'04','city'=>'SAN DIEGO','state'=>'CA','tone'=>'pacific','intro'=>'A coastal test where every position can change the season.','course'=>'A flowing bike leg and sunlit boulevard finish.'],
            ['n'=>'05','city'=>'CHICAGO','state'=>'IL / GRAND FINAL','tone'=>'city','intro'=>'The proposed finale: one final score, one championship moment.','course'=>'Urban speed, lakefront wind and a championship finish.'],
        ],
        'teams' => [
            ['name'=>'Harborline Racing','city'=>'Boston','region'=>'Northeast','code'=>'HBR','color'=>'#C83C35'],['name'=>'Capitol Velocity','city'=>'Washington','region'=>'Mid-Atlantic','code'=>'CPV','color'=>'#172338'],['name'=>'Lakefront Endurance','city'=>'Chicago','region'=>'Great Lakes','code'=>'LFE','color'=>'#A2683B'],['name'=>'Mile High Collective','city'=>'Denver','region'=>'Mountain','code'=>'MHC','color'=>'#527B89'],['name'=>'Pacific Standard','city'=>'San Diego','region'=>'West','code'=>'PST','color'=>'#E5B04B'],['name'=>'Lone Star Tempo','city'=>'Austin','region'=>'South','code'=>'LST','color'=>'#38745F'],['name'=>'Gulf Coast Racing','city'=>'Tampa','region'=>'Southeast','code'=>'GCR','color'=>'#91606B'],['name'=>'Northstar Tri Club','city'=>'Minneapolis','region'=>'North','code'=>'NST','color'=>'#56606D'],
        ],
        'athletes' => [
            ['name'=>'MAYA KIM','state'=>'California','team'=>'Pacific Standard','category'=>'ELITE','specialty'=>'RUN'],['name'=>'JORDAN REED','state'=>'Colorado','team'=>'Mile High Collective','category'=>'U23','specialty'=>'BIKE'],['name'=>'ELENA TORRES','state'=>'Texas','team'=>'Lone Star Tempo','category'=>'ELITE','specialty'=>'SWIM'],['name'=>'MILES CARTER','state'=>'Illinois','team'=>'Lakefront Endurance','category'=>'COLLEGIATE','specialty'=>'RUN'],['name'=>'NORA JAMES','state'=>'Massachusetts','team'=>'Harborline Racing','category'=>'ELITE','specialty'=>'BIKE'],['name'=>'CAMERON PARK','state'=>'Minnesota','team'=>'Northstar Tri Club','category'=>'U23','specialty'=>'SWIM'],
        ],
    ])->render());
    File::deleteDirectory($output.'/build');
    File::copyDirectory(public_path('build'), $output.'/build');
    File::put($output.'/.nojekyll', '');
    $this->info('Static AGP site exported to '.$output);
})->purpose('Export the AGP Blade homepage for GitHub Pages');
