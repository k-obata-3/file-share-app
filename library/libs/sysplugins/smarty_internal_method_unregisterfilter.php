<?php

/**
 * Smarty Method UnregisterFilter
 *
 * Smarty::unregisterFilter() method
 *
 * @package    Smarty
 * @subpackage PluginsInternal
 * @author     Uwe Tews
 */
class Smarty_Internal_Method_UnregisterFilter extends Smarty_Internal_Method_RegisterFilter
{

    public function unregisterFilter(Smarty_Internal_TemplateBase $obj, $type, $callback)
    {
        $smarty = isset($obj->smarty) ? $obj->smarty : $obj;
        $this->_checkFilterType($type);
        if (isset($smarty->registered_filters[ $type ])) {
            $name = is_string($callback) ? $callback : $this->_getFilterName($callback);
            if (isset($smarty->registered_filters[ $type ][ $name ])) {
                unset($smarty->registered_filters[ $type ][ $name ]);
                if (empty($smarty->registered_filters[ $type ])) {
                    unset($smarty->registered_filters[ $type ]);
                }
            }
        }
        return $obj;
    }
}