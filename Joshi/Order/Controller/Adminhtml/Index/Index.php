<?php
namespace Joshi\Order\Controller\Adminhtml\Index;
use Magento\Sales\Model\Order;
class Index extends \Magento\Backend\App\Action
{

    const ADMIN_RESOURCE = 'Joshi_Order::joshi_order_menu';

    protected $resultPageFactory;
    private $_order;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        Order $order,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->_order = $order;
        parent::__construct($context);
    }

    public function execute()
    {  
        $request  = $this->_request->getParams();
        $order = $this->_order->load($request['order_id']);
        $order->setData('custom_field', $request['custom_field']);
        $order->save();
        return $this->resultPageFactory->create();
    }
}
