[![Coverage Status](https://coveralls.io/repos/github/andela-badebiyi/Checkpoint-4/badge.svg?branch=develop)](https://coveralls.io/github/andela-badebiyi/Checkpoint-4?branch=develop)
[![Build Status](https://travis-ci.org/andela-badebiyi/Checkpoint-4.svg?branch=develop)](https://travis-ci.org/andela-badebiyi/Checkpoint-4)
[![StyleCI](https://styleci.io/repos/50294614/shield)](https://styleci.io/repos/50294614)
# Checkpoint-4 (CODEMAVEN)
CodeMaven is a learning management system that brings knowledge sharers (AKA Mavens) and Knowledge seekers together. A maven can register and upload video learning resources which will be made available to all visitors on the website. Visitors can also make video requests which will be broadcasted to the dashboard of all our Mavens for them to resolve. Visit the website [here](http://codemaven.herokuapp.com) to begin.

##Features
* Visitors can view uploaded videos
* Uploaded videos can be liked or unliked by authenticated users
* Comments can be posted under a video by visitors and authenticated users
* Signing up and uploading videos
* Editing already uploaded videos
* Deleting videos
* Authenticated users can customize their profile page
* Visitors can send messages to Authenticated users (Mavens)
* Authenticated users (Mavens) can reply messages sent to them
* Visitors can make request for vidoes that are currently unavailable on the site and recieve mail notifications upon resolving
* Authenticated users (Mavens) can resolve visitors video requests. 
* Authenticated users can customize and delete their accounts

##Requirements
* [PHP](http://php.net)
* [Apache](http://www.apache.org/)
* [PHPUnit](https://phpunit.de/)
* [Laravel](https://laravel.com)

##Installation
* Clone repository
* cd into `directory`
* run `composer install`
* rename `.env.example` file to `.env`
* run `php artisan migrate`
* run `php artisan key:generate`

##Testing
CD into the `root` directory and run `phpunit`
