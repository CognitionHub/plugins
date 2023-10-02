<?php

namespace CognitionHub\Mimir\Block;

use \Magento\Framework\View\Element\Template\Context;
use Magento\Customer\Model\Session;
use Magento\Framework\Stdlib\CookieManagerInterface;

class Mimir extends \Magento\Framework\View\Element\Template
{
    protected $customerSession;
    protected $cookieManager;

    public function __construct(
        Context $context,
        Session $customerSession,
        CookieManagerInterface $cookieManager
    ) {
        $this->customerSession = $customerSession;
        $this->cookieManager = $cookieManager;
        parent::__construct($context, []);
    }

    public function getCustomerId()
    {
        if ($this->customerSession->isLoggedIn()) {
            return $this->customerSession->getCustomer()->getId();
        }
        return $this->cookieManager->getCookie('PHPSESSID');;
    }
}