<?php

namespace Helpers\Traits;

/**
 * Кеширует результат обёрнутого в колбек кода
 * @package Helpers\Traits
 */
trait Qache
{
    private $cached_values = [];
    private static $static_cached_classes_values = [];

    protected function remember($closure, $name=null, $diff_param=null, $must_update=false)
    {
        if ($name === null) {
            $name = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1]['function'];
        }

        if (array_key_exists($name, $this->cached_values) && !$must_update) {
            if ($diff_param === null) {
                return $this->cached_values[$name];
            }

            if (is_array($this->cached_values[$name]) && array_key_exists($diff_param, $this->cached_values[$name])) {
                return $this->cached_values[$name][$diff_param];
            }
        }

        $result = $closure();
        if ($diff_param === null) {
            $this->cached_values[$name] = $result;
        } else {
            $this->cached_values[$name][$diff_param] = $result;
        }

        return $result;
    }

    protected static function rememberStatic($closure, $name=null, $diff_param=null, $must_update=false)
    {
        $class = static::class;

        if ($name === null) {
            $name = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1]['function'];
        }

        if (!array_key_exists($class, self::$static_cached_classes_values)) {
            self::$static_cached_classes_values[$class] = [];
        }

        if (array_key_exists($name, self::$static_cached_classes_values[$class]) && !$must_update) {
            if ($diff_param === null) {
                return self::$static_cached_classes_values[$class][$name];
            }

            if (is_array(self::$static_cached_classes_values[$class][$name]) && array_key_exists($diff_param, self::$static_cached_classes_values[$class][$name])) {
                return self::$static_cached_classes_values[$class][$name][$diff_param];
            }
        }

        $result = $closure();
        if ($diff_param === null) {
            self::$static_cached_classes_values[$class][$name] = $result;
        } else {
            self::$static_cached_classes_values[$class][$name][$diff_param] = $result;
        }

        return $result;
    }
}