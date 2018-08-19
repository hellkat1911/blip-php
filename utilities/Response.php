<?php

namespace Blip\Utilities;



use Blip\Utilities\Helper;


/**
 * Handles the assembly/return of views,
 * and injects HTML where necessary.
 * 
 */
class Response
{
    protected static $partials;

    protected static $html;


    /**
     * Sets $partials and $html properties, and gets the base partial
     * which requires any other partials for the view.
     * 
     * @param string|array $views  The partial or partials to be used
     * @param string|null  String containing new HTML to inject into the partial (if needed), else null
     * 
     * @return bool|Exception  '1' if partial is returned, Exception if not found
     */
    public static function render($views, $newhtml = null)
    {
        self::$partials = $views;

        if (!is_null($newhtml)) {

            self::$html = $newhtml;

        }

        $base = self::find('/views/base.php');

        return (require_once $base);

    }


    /**
     * Requires all partials specified in $partials property,
     * and adds the __DIR__ prefix to paths
     * 
     * @return bool|Exception '1' if partial is returned or Exception if not found
     */
    public static function assemble()
    {
        if (is_array(self::$partials)) {

            foreach ($self::$partials as $item) {

                return (require_once self::find($item));
    
            }

        }

        return (require_once self::find(self::$partials));

    }


    /**
     * Echos out any dynamically generated HTML to file if $html property is not null
     * 
     * @return void
     */
    public static function inject()
    {

        if (!is_null(self::$html)) {

            echo self::$html;

        }
    }


    /**
     * Append path prefixes to partial path strings.
     * 
     * @param string $template  The base path to partial.
     * 
     * @return string $template  The full path to partial.
     */
    public static function find($template)
    {

        $template = __DIR__ . '/..' . $template;

        return $template;

    }


    /**
     * Fetches the HTML from "message" partials as a string.
     * 
     * @param string $template  The base path to partial.
     * 
     * @return string $partial  The stringified message.
     */
    public static function fetch($template)
    {

        $partial = file_get_contents(self::find($template));

        return $partial;

    }


    /**
     * Handle JSON responses from AJAX calls.
     * 
     * @param array $arrayData
     * @return void
     */
    public static function handleJSON($arrayData)
    {

        $jsonify = json_encode($arrayData);

        echo $jsonify;

    }


    /**
     * Handle non-JSON responses from AJAX calls.
     * 
     * @param mixed $responseData
     * @return void
     */
    public static function handleAjax($responseData)
    {

        echo $responseData;

    }

}