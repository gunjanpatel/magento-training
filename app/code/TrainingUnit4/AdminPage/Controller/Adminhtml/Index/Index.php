<?php declare(strict_types=1);

namespace TrainingUnit4\AdminPage\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    const ADMIN_RESOURCE = 'TrainingUnit4_Adminpage::adminpage';
    private PageFactory $factory;

    public function __construct(
        Context $context,
        PageFactory $factory
    )
    {
        parent::__construct($context);

        $this->factory = $factory;
    }

    public function execute()
    {
        $result = $this->factory->create();
        $result->setActiveMenu('Magento_Sales::sales');

        return $result;
    }

    /**
     * Optional way to authorise the module
     */
    /*protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('TrainingUnit4_Adminpage::adminpage');
    }*/
}
