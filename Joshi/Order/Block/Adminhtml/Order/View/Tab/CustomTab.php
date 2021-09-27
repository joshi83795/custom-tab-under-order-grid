<?php

namespace Joshi\Order\Block\Adminhtml\Order\View\Tab;

class CustomTab extends \Magento\Backend\Block\Template implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
   protected $_template = 'Joshi_Order::order/view/tab/customtab.phtml';
   /**
    * @var \Magento\Framework\Registry
    */
   private $_coreRegistry;

   /**
    * View constructor.
    * @param \Magento\Backend\Block\Template\Context $context
    * @param \Magento\Framework\Registry $registry
    * @param array $data
    */
   public function __construct(
       \Magento\Backend\Block\Template\Context $context,
       \Magento\Framework\Registry $registry,
       \Magento\Store\Model\StoreManagerInterface $storeManager,
       \Magento\Backend\Model\Url $backendUrlManager,
       array $data = []
   ) {
       $this->_coreRegistry = $registry;
       $this->_storeManager = $storeManager;
       $this->backendUrlManager  = $backendUrlManager;
       parent::__construct($context, $data);
   }

   /**
    * Retrieve order model instance
    * 
    * @return \Magento\Sales\Model\Order
    */
   public function getOrder()
   {
       return $this->_coreRegistry->registry('current_order');
   }
   /**
    * Retrieve order model instance
    *
    * @return int
    *Get current id order
    */
   public function getOrderId()
   {
       return $this->getOrder()->getEntityId();
   }

   /**
    * Retrieve order increment id
    *
    * @return string
    */
   public function getOrderIncrementId()
   {
       return $this->getOrder()->getIncrementId();
   }
   /**
    * {@inheritdoc}
    */
   public function getTabLabel()
   {
       return __('Custom Field Tab');
   }

   /**
    * {@inheritdoc}
    */
   public function getTabTitle()
   {
       return __('Custom Field Tab');
   }

   /**
    * {@inheritdoc}
    */
   public function canShowTab()
   {
       return true;
   }

   /**
    * {@inheritdoc}
    */
   public function isHidden()
   {
       return false;
   }

    public function getBaseUrl() {
        return $this->backendUrlManager->getUrl('joshi_order/index/index');
    }

    public function getCustomField() {
        return $this->getOrder()->getCustomField() ? $this->getOrder()->getCustomField() : "";
    }
}