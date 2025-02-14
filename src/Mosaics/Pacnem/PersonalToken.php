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
namespace NEM\Mosaics\Pacnem;

use NEM\Models\MosaicDefinition;
use NEM\Models\MosaicProperties;
use NEM\Models\MosaicProperty;
use NEM\Models\MosaicLevy;
use NEM\Models\Mosaic;

/**
 * This is the Pacnem\PersonalToken class
 *
 * This class defines the parameters of mosaic
 * definition of the asset `pacnem:personal-token` 
 * on the NEM Testnet Network.
 * 
 * The `pacnem:personal-token` asset is integrated as a 
 * Utility Token in the PacNEM game. This token is used
 * for authentication on the blockchain. It is clearly
 * not recommended to use this in any *business* integration
 * but for the matter of the showcase that PacNEM is, it
 * was integrated for user authentication.
 * 
 * @link https://www.pacnem.com
 */
class PersonalToken
    extends MosaicDefinition
{
    public $creator = "d33a1f38cb1241f77d3786a2c8547b894ec903a864ae745bd628b81b0c35deec";

    /**
     * Overload of the getTotalSupply() method for fast
     * tracking with preconfigured mosaics.
     * 
     * @return integer
     */
    public function getTotalSupply()
    {
        //XXX mutable supply
        return 290888;
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
        return new Mosaic($mosaicId ?: ["namespaceId" => "pacnem", "name" => "personal-token"]);
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
        $data = [
            new MosaicProperty(["name" => "divisibility", "value" => 0]),
            new MosaicProperty(["name" => "initialSupply", "value" => 290888]),
            new MosaicProperty(["name" => "supplyMutable", "value" => true]),
            new MosaicProperty(["name" => "transferable", "value" => false]),
        ];

        return new MosaicProperties($data);
    }
}
