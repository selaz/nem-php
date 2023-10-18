<?php
/**
 * Part of the evias/nem-php package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under MIT License.
 *
 * This source file is subject to the MIT License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    evias/nem-php
 * @version    1.0.0
 * @author     Grégory Saive <greg@evias.be>
 * @license    MIT License
 * @copyright  (c) 2017-2018, Grégory Saive <greg@evias.be>
 * @link       http://github.com/evias/nem-php
 */
namespace NEM\Contracts;

/**
 * This is the Connector interface
 *
 * This interface defines a Contract for generic
 * Connector objects.
 *
 * A "Connector" object must define the properties
 * `use_ssl`, `host`, `port` and `endpoint`.
 */
interface Connector
{
    /**
     * Setter for `use_ssl` property.
     */
    public function setUseSsl($use_ssl);

    /**
     * Getter for the `use_ssl` property.
     *
     * @return bool
     */
    public function getUseSsl();

    /**
     * This method should implement a protocol
     * setter which will be used to determine
     * which Protocol is used in the Base URL.
     *
     * @param  string $protocol
     */
    public function setProtocol($protocol);

    /**
     * This method should implement a protocol
     * getter.
     *
     * @return string
     */
    public function getProtocol();

    /**
     * Setter for `host` property.
     *
     * @param  string $host
     */
    public function setHost($host);

    /**
     * Getter for the `host` property.
     *
     * @return string
     */
    public function getHost();

    /**
     * Setter for `port` property.
     *
     * @param  int $port
     */
    public function setPort($port);

    /**
     * Getter for the `port` property.
     *
     * @return int
     */
    public function getPort();

    /**
     * Setter for `endpoint` property.
     *
     * @param  string $endpoint
     */
    public function setEndpoint($endpoint);

    /**
     * Getter for the `endpoint` property.
     *
     * @return string
     */
    public function getEndpoint();

    /**
     * Getter for `scheme` property.
     *
     * @return string
     */
    public function getScheme();

    /**
     * Getter for `username` property.
     *
     * @return static
     */
    public function setUsername($username);

    /**
     * Getter for `username` property.
     *
     * @return ?string
     */
    public function getUsername();

    /**
     * Setter for `password` property.
     *
     * @return static
     */
    public function setPassword($password);

    /**
     * Getter for `password` property.
     *
     * @return ?string
     */
    public function getPassword();

    /**
     * Getter for `base_url` property.
     *
     * @return string
     */
    public function getBaseUrl();
}
