<?php
namespace CognitionHub\Mimir\Controller\Session;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Customer\Model\Session as CustomerSession;


class GetSessionId extends Action
{
    protected $resultJsonFactory;
    protected $customerSession; 

    public function __construct(
        Context $context,
        JsonFactory $resultJsonFactory,
        CustomerSession $customerSession
    ) {
        $this->resultJsonFactory = $resultJsonFactory;
        $this->customerSession = $customerSession;
        parent::__construct($context);
    }
    public function execute()
    {
        $result = $this->resultJsonFactory->create();
        if ($this->customerSession->isLoggedIn()) {
            return $result->setData(['mimir_customer_id' => $this->customerSession->getCustomer()->getEmail()]);
        } elseif (isset($_COOKIE['PHPSESSID'])) {
            return $result->setData(['mimir_customer_id' => $_COOKIE['PHPSESSID']]);
        }
        
    
        // Return random UID if not logged in and no session ID (unlikely)    
        $randomUid = uniqid("uid_", true);
        return $result->setData(['mimir_customer_id' => $randomUid]);
    }
}