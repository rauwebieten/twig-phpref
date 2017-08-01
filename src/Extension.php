<?php
namespace RauweBieten\TwigPhpRef;

class Extension extends \Twig_Extension
{
    /** @var bool */
    private $debug;

    /**
     * @return bool
     */
    public function isDebug(): bool
    {
        return $this->debug;
    }

    /**
     * @param bool $debug
     */
    public function setDebug(bool $debug)
    {
        $this->debug = $debug;
    }

    /**
     * @param bool $debug
     */
    public function __construct($debug = true)
    {
        $this->debug = $debug;
    }

    public function getName()
    {
        return 'twig-phpref';
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('r',[$this,'r'],['is_safe'=>['html']]),
            new \Twig_SimpleFunction('rt',[$this,'r']),
        ];
    }

    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('r',[$this,'r'],['is_safe'=>['html']]),
            new \Twig_SimpleFilter('rt',[$this,'rt']),
        ];
    }

    public function r($var)
    {
        if ($this->debug == false) {
            return '';
        }
        return @r($var);
    }

    public function rt($var)
    {
        if ($this->debug == false) {
            return '';
        }
        return @rt($var);
    }
}