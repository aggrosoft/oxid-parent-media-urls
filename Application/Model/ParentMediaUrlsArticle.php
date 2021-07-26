<?php

namespace Aggrosoft\ParentMediaUrls\Application\Model;

use OxidEsales\Eshop\Core\TableViewNameGenerator;

class ParentMediaUrlsArticle extends ParentMediaUrlsArticle_parent
{
    public function getMediaUrls()
    {
        if ($this->_aMediaUrls === null) {
            $this->_aMediaUrls = oxNew(\OxidEsales\Eshop\Core\Model\ListModel::class);
            $this->_aMediaUrls->init("oxmediaurl");
            $this->_aMediaUrls->getBaseObject()->setLanguage($this->getLanguage());

            $tableViewNameGenerator = oxNew(TableViewNameGenerator::class);
            $sViewName = $tableViewNameGenerator->getViewName("oxmediaurls", $this->getLanguage());
            $sQ = "select * from {$sViewName} where oxobjectid = :oxobjectid or oxobjectid = :oxparentid";
            $this->_aMediaUrls->selectString($sQ, [
                ':oxobjectid' => $this->getId(),
                ':oxparentid' => $this->oxarticles__oxparentid->value
            ]);
        }

        return $this->_aMediaUrls;
    }
}