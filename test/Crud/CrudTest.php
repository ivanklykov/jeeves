<?php

namespace Crud;

use Mygento\Jeeves\Console\Command\ModelCrud;
use Symfony\Component\Console\Tester\CommandTester;

class CrudTest extends \PHPUnit\Framework\TestCase
{
    protected function setUp()
    {
        $application = new \Symfony\Component\Console\Application();
        $application->add(new ModelCrud());
        $command = $application->find('generate_model_crud');
        $this->commandTester = new CommandTester($command);
    }

    public function testCrudBasic()
    {
        $this->commandTester->execute([]);
        $this->checkInterfaces();
        $this->checkModels();
        $this->checkRepository();
        $this->checkGui();
        $this->checkXml('etc/di.xml');
    }

    private function checkInterfaces()
    {
        $this->checkFile('Api/CustomeraddressRepositoryInterface.php');
        $this->checkFile('Api/Data/CustomeraddressInterface.php');
        $this->checkFile('Api/Data/CustomeraddressSearchResultsInterface.php');

        $this->checkFile('Api/BannerRepositoryInterface.php');
        $this->checkFile('Api/Data/BannerInterface.php');
        $this->checkFile('Api/Data/BannerSearchResultsInterface.php');
    }

    private function checkModels()
    {
        $this->checkFile('Model/Customeraddress.php');
        $this->checkFile('Model/ResourceModel/Customeraddress.php');
        $this->checkFile('Model/ResourceModel/Customeraddress/Collection.php');

        $this->checkFile('Model/Banner.php');
        $this->checkFile('Model/ResourceModel/Banner.php');
        $this->checkFile('Model/ResourceModel/Banner/Collection.php');
    }

    private function checkRepository()
    {
        $this->checkFile('Model/CustomeraddressRepository.php');

        $this->checkFile('Model/BannerRepository.php');
    }

    private function checkGui()
    {
        $this->checkControllers();
        $this->checkLayout();
        $this->checkUi();
        $this->checkXml('etc/acl.xml');
        $this->checkXml('etc/adminhtml/routes.xml');
        $this->checkXml('etc/adminhtml/menu.xml');
        $this->checkXml('etc/db_schema.xml');
    }

    private function checkControllers()
    {
        $this->checkFile('Controller/Adminhtml/Customeraddress.php');
        $this->checkFile('Controller/Adminhtml/Customeraddress/Delete.php');
        $this->checkFile('Controller/Adminhtml/Customeraddress/Edit.php');
        $this->checkFile('Controller/Adminhtml/Customeraddress/Index.php');
        $this->checkFile('Controller/Adminhtml/Customeraddress/InlineEdit.php');
        $this->checkFile('Controller/Adminhtml/Customeraddress/MassDelete.php');
        $this->checkFile('Controller/Adminhtml/Customeraddress/NewAction.php');
        $this->checkFile('Controller/Adminhtml/Customeraddress/Save.php');

        $this->checkFile('Controller/Adminhtml/Banner.php');
        $this->checkFile('Controller/Adminhtml/Banner/Delete.php');
        $this->checkFile('Controller/Adminhtml/Banner/Edit.php');
        $this->checkFile('Controller/Adminhtml/Banner/Index.php');
        $this->checkFile('Controller/Adminhtml/Banner/InlineEdit.php');
        $this->checkFile('Controller/Adminhtml/Banner/MassDelete.php');
        $this->checkFile('Controller/Adminhtml/Banner/NewAction.php');
        $this->checkFile('Controller/Adminhtml/Banner/Save.php');
    }

    private function checkLayout()
    {
        $this->checkXml('view/adminhtml/layout/sample_customeraddress_edit.xml');
        $this->checkXml('view/adminhtml/layout/sample_customeraddress_index.xml');
        $this->checkXml('view/adminhtml/layout/sample_customeraddress_new.xml');

        $this->checkXml('view/adminhtml/layout/sample_banner_edit.xml');
        $this->checkXml('view/adminhtml/layout/sample_banner_index.xml');
        $this->checkXml('view/adminhtml/layout/sample_banner_new.xml');
    }

    private function checkUi()
    {
        $this->checkFile('Ui/Component/Listing/CustomeraddressActions.php');
        $this->checkFile('Model/Customeraddress/DataProvider.php');
        $this->checkXml('view/adminhtml/ui_component/sample_customeraddress_listing.xml');
        $this->checkXml('view/adminhtml/ui_component/sample_customeraddress_edit.xml');
        $this->checkFile('Model/ResourceModel/Customeraddress/Grid/Collection.php');

        $this->checkFile('Ui/Component/Listing/BannerActions.php');
        $this->checkFile('Model/Banner/DataProvider.php');
        $this->checkXml('view/adminhtml/ui_component/sample_banner_listing.xml');
        $this->checkXml('view/adminhtml/ui_component/sample_banner_edit.xml');
        $this->checkFile('Model/ResourceModel/Banner/Grid/Collection.php');
    }

    private function checkFile($file)
    {
        $this->assertFileEquals(
            \Mygento\Jeeves\Console\Application::GEN.'/'.$file,
            'test/Expectations/Crud/'.$file,
            '',
            false,
            false
        );
    }

    private function checkXml($file)
    {
        $this->assertXmlFileEqualsXmlFile(
            \Mygento\Jeeves\Console\Application::GEN.'/'.$file,
            'test/Expectations/Crud/'.$file
        );
    }
}
