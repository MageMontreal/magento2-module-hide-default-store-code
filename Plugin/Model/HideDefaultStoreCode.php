<?php

namespace MageMontreal\HideDefaultStoreCode\Plugin\Model;

use MageMontreal\HideDefaultStoreCode\Helper\Data;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Store\Model\Store;

class HideDefaultStoreCode
{
    /**
     *
     * @var Data
     */
    protected $helper;
    
    /**
     *
     * @var StoreManagerInterface
     */
    protected $storeManager;
    
    /**
     * 
     * @param Data $helper
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        Data $helper,
        StoreManagerInterface $storeManager
    ){
        $this->helper = $helper;
        $this->storeManager = $storeManager;
    }

    /**
     * 
     * @param Store $subject
     * @param string $url
     * @return string
     */
    public function afterGetBaseUrl(Store $subject, $url)
    {
        if ($this->helper->isHideDefaultStoreCode()) {
            $url = str_replace('/'.$this->storeManager->getDefaultStoreView()->getCode().'/','/', $url);
        }
        return $url;
    }
}