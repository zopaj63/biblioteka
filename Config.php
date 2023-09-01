<?php

    class Config
    {
        private $config;

        public function __construct($file)
        {
            $this->config=parse_ini_file($file, true);
        }

        public function get($key, $section=null)
        {
            if ($section===null)
            {
                return isset($this->config[$key]) ? $this->config[$key] : null;
            }
            else
            {
                return isset($this->config[$section][$key]) ? $this->config[$section][$key] : null;
            }
        }
    }


?>