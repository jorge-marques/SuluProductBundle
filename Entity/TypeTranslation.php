<?php
/*
 * This file is part of the Sulu CMS.
 *
 * (c) MASSIVE ART WebServices GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Sulu\Bundle\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeTranslation
 */
class TypeTranslation
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $locale;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Sulu\Bundle\ProductBundle\Entity\Type
     */
    private $type;

    /**
     * Set name
     *
     * @param string $name
     * @return TypeTranslation
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set languageCode
     *
     * @param string $languageCode
     * @return TypeTranslation
     */
    public function setLocale($languageCode)
    {
        $this->locale = $languageCode;
    
        return $this;
    }

    /**
     * Get languageCode
     *
     * @return string 
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param \Sulu\Bundle\ProductBundle\Entity\Type $type
     * @return TypeTranslation
     */
    public function setType(\Sulu\Bundle\ProductBundle\Entity\Type $type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return \Sulu\Bundle\ProductBundle\Entity\Type
     */
    public function getType()
    {
        return $this->type;
    }
}
