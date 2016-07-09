# Laravel Embed Directives

This package lets Laravel users embed any social media link in the views using a simple blade command. To install and use the package, complete the simple steps that are following.

To install the package:

1. Open your terminal
2. Navigate to your project's directory source path
3. Enter the following command

`composer require siokas/laravelembeddirectives:v1.0-beta`

To get access to the package:
1. Go to your project's folder and open the config/app.php file
2. Navigate to the *providers* section and add the following line

`Siokas\LaravelEmbedDirectives\LaravelEmbedDirectivesServiceProvider::class`

To use the package:

1. In any Blade file use the *embed* command

`@embed('your-link-goes-here')`

Option:

 - If you want to specify the width and height of the embed post, just enter the numbers as parameters inside the command like this:

`@embed('https://www.youtube.com/watch?v=g4BbeHYCR1E', 500, 500)`

# Requirements

Embed package: [oscarotero/Embed](https://github.com/oscarotero/Embed)


# License (MIT)

The MIT License (MIT)
Copyright (c) 2016 Apostolos Siokas