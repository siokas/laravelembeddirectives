<?php

namespace Siokas\LaravelEmbedDirectives;

use Blade;
use Embed\Embed;
use Illuminate\Support\ServiceProvider;

class LaravelEmbedDirectivesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->createEmbedBladeDirectiveWithSizeOption('embed');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Create an embeded blade directive with the option to configure width and height.
     *
     * @return void
     */
    public function createEmbedBladeDirectiveWithSizeOption($embed)
    {
        Blade::directive($embed, function ($expression) {

            // Get all properties from the array
            $url = $this->getAttributes($expression)['url'];
            $width = $this->getAttributes($expression)['width'];
            $height = $this->getAttributes($expression)['height'];

            // Get the HTML code
            $code = $this->getEmbedCode($url);

            // Replace the width if nessesery
            if ($width) {
                $code = $this->replaceTag($code, 'width', $width);
            }

            if ($height) {
                $code = $this->replaceTag($code, 'height', $height);
            }

            return $code;
        });
    }

    /**
     * Get the HTML embed code.
     *
     * @return string
     */
    private function getEmbedCode($url)
    {

        $embeded = Embed::create($this->extractURL($url));

        return $embeded->code;
    }

    /**
     * Extract the url from the string.
     *
     * @return string
     */
    private function extractURL($url)
    {
        $charsToDelete = array("'", "(", ")");
        return str_replace($charsToDelete, "", $url);
    }

    /**
     * Get all the attributes passed through blade directive.
     *
     * @return string or null
     */
    private function getAttributes($expression)
    {

        $segments = explode(',', preg_replace("/[\(\)]/", '', $expression));

        $elements = array(
            'url' => with(trim(str_replace("'", "", $segments[0]))),
            'width' => null,
            'height' => null,
        );

        if (count($segments) > 2) {
            $elements['width'] = with(trim($segments[1]));
            $elements['height'] = with(trim($segments[2]));
        }

        return $elements;
    }

    /**
     * Replace the string with the given value.
     *
     * @return string
     */
    private function replaceTag($code, $tag, $value)
    {
        $pattern = "/" . $tag . "=\"[0-9]*\"/";
        return preg_replace($pattern, $tag . "='" . $value . "'", $code);
    }
}
