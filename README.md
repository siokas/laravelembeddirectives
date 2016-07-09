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

# License (MIT)

The MIT License (MIT)
Copyright (c) 2016 Apostolos Siokas

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
