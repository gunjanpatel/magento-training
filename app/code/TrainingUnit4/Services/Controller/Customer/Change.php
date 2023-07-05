<?php declare(strict_types=1);

namespace TrainingUnit4\Services\Controller\Customer;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\State\InputMismatchException;

class Change implements HttpGetActionInterface
{
    private JsonFactory $factory;
    private CustomerRepositoryInterface $customerRepository;
    private RequestInterface $request;

    public function __construct(
        JsonFactory $factory,
        CustomerRepositoryInterface $customerRepository,
        RequestInterface $request
    )
    {
        $this->factory = $factory;
        $this->customerRepository = $customerRepository;
        $this->request = $request;
    }

    public function execute()
    {
        $newName = $this->request->getParam('name');
        $id = $this->request->getParam('id');
        $result = $this->factory->create();
        $result->setHeader('Content-Type', 'application/json', true);

        if (!$newName) {
            return $result->setData(['error' => '`Name` is missing!']);
        }

        if (!$id) {
            return $result->setData(['error' => '`ID` is missing!']);
        }

        try {
            $customer = $this->customerRepository->getById($id);
        } catch (NoSuchEntityException $e) {
        } catch (LocalizedException $e) {
            return $result->setData(['error' => 'Customer data not found!']);
        }

        $customer->setFirstname($newName);

        try {
            $this->customerRepository->save($customer);
        } catch (InputException $e) {
        } catch (InputMismatchException $e) {
        } catch (LocalizedException $e) {
            return $result->setData(['error' => 'Customer data could not be saved!']);
        }

        $result->setData(
            [
                'success' => sprintf('Customer name `%s` saved for Id `%d', $newName, $id)
            ]
        );

        return $result;
    }
}
