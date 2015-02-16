<?php

namespace Travis;

class YAML {

    /**
     * String containing YAML code.
     *
     * @var string
     */
    public $string;

    /**
     * Load YAML from file.
     *
     * @param   string  $path
     * @return  void
     */
    public static function from_file($path)
    {
        // class
        $class = __CLASS__;

        // return object
        return new $class(file_get_contents($path));
    }

    /**
     * Load YAML from string.
     *
     * @param   string  $string
     * @return  void
     */
    public static function from_string($string)
    {
        // class
        $class = __CLASS__;

        // return object
        return new $class($string);
    }

    /**
     * Constructor method.
     *
     * @param   string  $string
     * @return  object
     */
    public function __construct($string)
    {
        $this->string = $string;
    }

    /**
     * Convert the YAML string to an array.
     *
     * @return  array
     */
    public function to_array()
    {
        // catch error
        if (!$this->string) return false;

        // return parsed string
        return spyc_load(static::filter($this->string));
    }

    /**
     * Filter the YAML to bump all dashes.
     *
     * @param   string  $string
     * @return  string
     */
    protected static function filter($string)
    {
        // For whatever reason, multi-dimensional arrays won't parse
        // properly unless a space is added before each dash in the string.

        // iterate thru string
        $lines = explode("\n", $string);
        foreach ($lines as $key => $line)
        {
            // check for dash...
            if (substr(ltrim($line), 0, 1) === '-')
            {
                // bump space
                $lines[$key] = ' '.$line;
            }
        }

        // return
        return implode("\n", $lines);
    }

}