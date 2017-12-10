<?php
/**
 * Part of the evias/php-nem-laravel package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under MIT License.
 *
 * This source file is subject to the MIT License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    evias/php-nem-laravel
 * @version    1.0.0
 * @author     Grégory Saive <greg@evias.be>
 * @author     Robin Pedersen (https://github.com/RobertoSnap)
 * @license    MIT License
 * @copyright  (c) 2017, Grégory Saive <greg@evias.be>
 * @link       http://github.com/evias/php-nem-laravel
 */
namespace NEM\Models;

class Amount
    extends Model
{
    /**
     * Define the value of 1 XEM in micro XEM.
     *
     * @var integer
     */
    public const XEM = 1000000;

    /**
     * Define the value of 1 micro XEM.
     *
     * @var integer
     */
    public const MICRO_XEM = 1;

    /**
     * List of fillable attributes
     *
     * @var array
     */
    protected $fillable = ["amount"];

    /**
     * Store the micro amount.
     *
     * @var integer
     */
    protected $micro;

    /**
     * The NEM Amount divisibility (Min. 0, Max. 6)
     *
     * @var integer
     */
    protected $divisibility = 6;

    /**
     * Factory for Amount models with MICRO amounts and provided
     * `divisibility`.
     *
     * @param   integer     $amount
     * @param   integer     $divisibility
     * @return  \NEM\Models\Amount
     */
    static public function fromMicro($amount, $divisibility = 6)
    {
        $amt = new Amount($amount);
        $amt->setDivisibility($divisibility);

        return $amt;
    }

    /**
     * Amount DTO automatically returns MICRO amount.
     *
     * @return  array       Associative array with key `address` containing a NIS *compliable* address representation.
     */
    public function toDTO()
    {
        return ["amount" => $this->toMicro()];
    }

    /**
     * Helper to return a MICRO amount. This means to get the smalles unit
     * of an Amount on the NEM Blockchain. Maximum Divisibility is up to 6
     * decimal places.
     *
     * @return integer
     */
    public function toMicro()
    {
        return ($this->micro = ((int)$this->attributes["amount"]) * pow(10, $this->getDivisibility()));
    }

    /**
     * Setter for the `divisibility` property.
     *
     * @param   integer     $divisibility
     * @return  \NEM\Models\Amount
     */
    public function setDivisibility($divisibility)
    {
        if (!is_integer($divisibility) || $divisibility < 0)
            $divisibility = 6; // default 6

        $this->divisibility = $divisibility;
        return $this;
    }

    /**
     * Getter for the `divisibility` property.
     *
     * @return  integer
     */
    public function getDivisibility()
    {
        return (int) $this->divisibility;
    }
}
