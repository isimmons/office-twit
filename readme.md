## OfficeTwit is a twitter clone built on Laravel PHP framework v 4.2
### Yes that's right. I said 4.2 -- "laravel/framework": "4.2.*" 
### UNSTABLE but works very well for now :-)

### Not ready for production (see TODO list)

#TODO
* Validate all the things - Working on it now that other things are working correctly.
* Check all endpoints for security (csrf, xss, auth required pages)
* Redo all styles for correct organization, deduplication, refactor, etc.
* Go through entire project checking for SOLID principles
* Allow search for public viewable profiles from user who is not logged in (not sure?)
* Create admin section for company IT administrator


##Notes:
* Responsive not fully implemented. Need to move twitter feed to side slide out for mobile. At the moment it just hides. 
* Unit tests since many changes to the application without testing. Oops I was bad :-( will fix 
* Not sure if want to list all signed up users at /users or just provide a search feature like Twitter does
* down the road but need to learn and use http://apigen.org or http://www.phpdoc.org/
* Yes the current background gradient is horrible

##Installation and usage
1. Download and extract or clone the repo
2. Run `composer update` to get the latest framework and install required packages
3. Create a database and fill in the required info in config/development/database.php
4. Run `php artisan migrate`
5. Run `php artisan db:seed` (comes with test users John and Sally)
6. Run `php artisan serve` (So far this app is simple enough to run on the built in server)
7. Open a browser to `http://localhost:8000`
8. Mess around with it and then come complain in the issues because this app is not ready for production and probably full of bugs :-)

You can register a new user (no verification implemented at this time) or use the test users provided in the seed file.


##Tests
I stink at TDD but have some basic starter tests in the tests directory and will be adding to and improving on them. 

## Official Documentation
For OfficeTwit? There is none. But I did just upload a gh-pages with twitter bootstrap theme :-)
http://isimmons.github.io/office-twit
There is no content there yet. Still no documentation

Documentation for the Laravel framework can be found on the [Laravel website](http://laravel.com/docs).

### Contributing To Laravel

**All issues and pull requests should be filed on the [laravel/framework](http://github.com/laravel/framework) repository.**

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
