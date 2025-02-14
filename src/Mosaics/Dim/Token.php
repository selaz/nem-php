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
 * @author     Robin Pedersen (https://github.com/RobertoSnap)
 * @license    MIT License
 * @copyright  (c) 2017-2018, Grégory Saive <greg@evias.be>
 * @link       http://github.com/evias/nem-php
 */
namespace NEM\Mosaics\Dim;

use NEM\Models\MosaicDefinition;
use NEM\Models\MosaicProperties;
use NEM\Models\MosaicProperty;
use NEM\Models\MosaicLevy;
use NEM\Models\Mosaic;

/**
 * This is the Dim\Token class
 *
 * This class defines the parameters of mosaic
 * definition of the asset `dim:token` on the
 * NEM Mainnet Network.
 * 
 * @link https://dimcoin.io
 */
class Token
    extends MosaicDefinition
{
    /**
     * The `dim:token` Total Coins Supply
     * 
     * @var integer
     */
    const TOTAL_SUPPLY = 10000000;

    /**
     * The `dim:token` mosaics creator public key
     * in hexadecimal format.
     * 
     * @var string
     */
    public $creator = "a1df5306355766bd2f9a64efdc089eb294be265987b3359093ae474c051d7d5a";

    /**
     * Overload of the getTotalSupply() method for fast
     * tracking with preconfigured mosaics.
     * 
     * @return integer
     */
    public function getTotalSupply()
    {
        return self::TOTAL_SUPPLY;
    }

    /**
     * Mutator for `mosaic` relation.
     *
     * This will return a NIS compliant [MosaicId](https://bob.nem.ninja/docs/#mosaicId) object. 
     *
     * @param   array   $mosaicId       Array should contain offsets `namespaceId` and `name`.
     * @return  \NEM\Models\Mosaic
     */
    public function id(array $mosaicId = null)
    {
        return new Mosaic($mosaicId ?: ["namespaceId" => "dim", "name" => "token"]);
    }

    /**
     * Mutator for `levy` relation.
     *
     * This will return a NIS compliant [MosaicLevy](https://bob.nem.ninja/docs/#mosaicLevy) object. 
     *
     * @param   array   $levy       Array should contain offsets `type`, `recipient`, `mosaicId` and `fee`.
     * @return  \NEM\Models\MosaicLevy
     */
    public function levy(array $levy = null)
    {
        $data = $levy ?: [];
        return new MosaicLevy($data);
    }

    /**
     * Mutator for `properties` relation.
     *
     * This will return a NIS compliant collection of [MosaicProperties](https://bob.nem.ninja/docs/#mosaicProperties) object. 
     *
     * @param   array   $properties       Array of MosaicProperty instances
     * @return  \NEM\Models\MosaicProperties
     */
    public function properties(array $properties = null)
    {
        $data = $properties ?: [
            new MosaicProperty(["name" => "divisibility", "value" => 6]),
            new MosaicProperty(["name" => "initialSupply", "value" => 10000000]),
            new MosaicProperty(["name" => "supplyMutable", "value" => false]),
            new MosaicProperty(["name" => "transferable", "value" => true]),
        ];

        return new MosaicProperties($data);
    }
}
