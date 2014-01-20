## OfficeTwit is a twitter clone built on Laravel PHP framework v 4.2
### Yes that's right. I said 4.2 -- "laravel/framework": "4.2.*" 
### UNSTABLE but works very well for now :-)

#TODO
* Go through entire project checking for SOLID principles
* Check all endpoints for security
* Do not remove the above two items until application is ready for deploy
* Figure out how I want to implement public viewable profiles
* Allow search for public viewable profiles from user who is not logged in (not sure?)
* Create admin section with many configs for company IT administrator to be a Twit Nazi
* Allow user config to show own personal twitter feed side by side with company feed
* Above reminds me, need user settings overridable by admin settings
* Allow user to RT personal onto company feed but not from company onto personal
* Allow company admin to enable afore mentioned retweeting of company twits onto users personal feed


##Notes:
* Switched to using UserPresenter to deal with user settings. Like the rest of the app it's a WIP
* Not sure if want to list all signed up users at /users or just provide a search feature like Twitter does
* down the road but need to learn and use http://apigen.org or http://www.phpdoc.org/
* Yes the current background gradient is horrible

##Installation and usage
This application has a development sqlite db pre-migrated with users and twits table. If you wish you can continue to use that for development. The two initial test users are "John" and "Sally". Both have a password of '1234'.

Download, run composer install and it should be ready to go using the development config settings unless the envrionment variable OFFICETWIT_ENV is set to production.

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
