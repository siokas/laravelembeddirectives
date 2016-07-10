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
        $this->createEmbedBladeDirectiveWithSizeOption('youtube', 'https://www.youtube.com/watch?');
        $this->createEmbedBladeDirectiveWithSizeOption('youtubeProfile', 'https://www.youtube.com/user/');
        $this->createEmbedBladeDirectiveWithSizeOption('vimeo', 'https://www.vimeo.com/');
        $this->createEmbedBladeDirectiveWithSizeOption('twitter', 'https://twitter.com/');
        $this->createEmbedBladeDirectiveWithSizeOption('facebook', 'https://web.facebook.com/');
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
    public function createEmbedBladeDirectiveWithSizeOption($embed, $baseURL = null)
    {
        Blade::directive($embed, function ($expression) use ($baseURL) {
            $url = $this->getParameters($expression)['url'];
            $width = $this->getParameters($expression)['width'];
            $height = $this->getParameters($expression)['height'];

            $code = $this->getEmbedCode($baseURL, $url);

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
    private function getEmbedCode($baseURL = null, $url)
    {
        $info = Embed::create($baseURL . $this->extractURL($url));

        return $info->code;
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
     * Get the parameters passed through blade directive.
     *
     * @return string or null
     */
    private function getParameters($expression)
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
