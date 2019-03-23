<?php
/**
 * Options Class
 *
 * @package RocketLazyloadPlugin
 */

namespace RocketLazyLoadPlugin\Options;

defined('ABSPATH') || die('Cheatin\' uh?');

/**
 * Interact with the WordPress Options API
 */
class Options extends AbstractOptions
{
    /**
     * The prefix used by Rocket Lazyload options.
     *
     * @since 2.0
     * @author Remy Perona
     *
     * @var string
     */
    private $prefix;

    /**
     * Constructor
     *
     * @since 2.0
     * @author Remy Perona
     *
     * @param string $prefix options prefix.
     */
    public function __construct($prefix = '')
    {
        $this->prefix = $prefix;
    }

    /**
     * Gets the option name used to store the option in the WordPress database.
     *
     * @since 2.0
     * @author Remy Perona
     *
     * @param string $name Unprefixed name of the option.
     *
     * @return string
     */
    public function getOptionName($name)
    {
        return $this->prefix . $name;
    }

    /**
     * Gets the option for the given name. Returns the default value if the value does not exist.
     *
     * @since 2.0
     * @author Remy Perona
     *
     * @param string $name    Name of the option to get.
     * @param mixed  $default Default value to return if the value does not exist.
     *
     * @return mixed
     */
    public function get($name, $default = null)
    {
        $option = get_option($this->getOptionName($name), $default);

        if (is_array($default) && ! is_array($option)) {
            $option = (array) $option;
        }

        return $option;
    }

    /**
     * Sets the value of an option. Update the value if the option for the given name already exists.
     *
     * @since 2.0
     * @author Remy Perona
     * @param string $name  Name of the option to set.
     * @param mixed  $value Value to set for the option.
     *
     * @return void
     */
    public function set($name, $value)
    {
        update_option($this->getOptionName($name), $value);
    }

    /**
     * Deletes the option with the given name.
     *
     * @since 2.0
     * @author Remy Perona
     *
     * @param string $name Name of the option to delete.
     *
     * @return void
     */
    public function delete($name)
    {
        delete_option($this->getOptionName($name));
    }
}
