[![Latest Stable Version](https://poser.pugx.org/siokas/laravelembeddirectives/v/stable)](https://packagist.org/packages/siokas/laravelembeddirectives)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/7e0ec2f3e88f444082f599571680af25)](https://www.codacy.com/app/apostolossiokas/laravelembeddirectives?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=siokas/laravelembeddirectives&amp;utm_campaign=Badge_Grade)
[![Total Downloads](https://poser.pugx.org/siokas/laravelembeddirectives/downloads)](https://packagist.org/packages/siokas/laravelembeddirectives)
[![License](https://poser.pugx.org/siokas/laravelembeddirectives/license)](https://packagist.org/packages/siokas/laravelembeddirectives)
<!-- [![Latest Stable Version](https://poser.pugx.org/siokas/laravelembeddirectives/v/stable)](https://packagist.org/packages/siokas/laravelembeddirectives) -->


# Laravel Embed Directives

This package lets Laravel users embed any social media link in the views using a simple blade command. To install and use the package, complete the simple steps that are following.

To install the package:

1. Open your terminal
2. Navigate to your project's directory source path
3. Enter the following command

`composer require siokas/laravelembeddirectives`

To get access to the package:

1. Go to your project's folder and open the config/app.php file
2. Navigate to the *providers* section and add the following line

`Siokas\LaravelEmbedDirectives\LaravelEmbedDirectivesServiceProvider::class`

To use the package:

1. In any Blade file use the *embed* command

`@embed('your-link-goes-here')`

Option:

 - If you want to specify the width and height of the embed post, just pass them as parameters like this:

`@embed('https://www.youtube.com/watch?v=g4BbeHYCR1E', 500, 500)`

# Available Directives

~~~~ 
@embed('LINK-GOES-HERE') // for general use
@youtube('LINK-GOES-HERE') 
@youtubeProfile('LINK-GOES-HERE')
@vimeo('LINK-GOES-HERE')
@twitter('LINK-GOES-HERE')
@facebook('LINK-GOES-HERE')
~~~~

ex. @twitter('taylorotwell')
This code embeds the public profile of a user, but you can embed a specific tweet giving the id of the tweet. (ex. taylorotwell/status/751184223445381120) 

_Within the @youtube directive, you have to enter the link to the video but only the part after the *watch?*_


# Requirements

Embed package: [oscarotero/Embed](https://github.com/oscarotero/Embed)


# License (MIT)

The MIT License (MIT)
Copyright (c) 2016 Apostolos Siokas
