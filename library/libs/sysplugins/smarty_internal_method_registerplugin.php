<?php

/**
 * Smarty Method RegisterPlugin
 *
 * Smarty::registerPlugin() method
 *
 * @package    Smarty
 * @subpackage PluginsInternal
 * @author     Uwe Tews
 */
class Smarty_Internal_Method_RegisterPlugin
{
    /**
     * Valid for Smarty and template object
     *
     * @var int
     */
    public $objMap = 3;


    public function registerPlugin(Smarty_Internal_TemplateBase $obj, $type, $name, $callback, $cacheable = true,
                                   $cache_attr = null)
    {
        $smarty = isset($obj->smarty) ? $obj->smarty : $obj;
        if (isset($smarty->registered_plugins[ $type ][ $name ])) {
            throw new SmartyException("Plugin tag \"{$name}\" already registered");
        } elseif (!is_callable($callback)) {
            throw new SmartyException("Plugin \"{$name}\" not callable");
        } else {
            $smarty->registered_plugins[ $type ][ $name ] = array($callback, (bool) $cacheable, (array) $cache_attr);
        }
        return $obj;
    }
}