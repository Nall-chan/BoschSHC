<?php

declare(strict_types=1);

include_once __DIR__ . '/stubs/Validator.php';

class LibraryTest extends TestCaseSymconValidation
{
    public function testValidateLibrary(): void
    {
        $this->validateLibrary(__DIR__ . '/..');
    }

    public function testValidateDiscovery(): void
    {
        $this->validateModule(__DIR__ . '/../Bosch SmartHome Discovery');
    }

    public function testValidateIO(): void
    {
        $this->validateModule(__DIR__ . '/../Bosch SmartHome IO');
    }

    public function testValidateConfigurator(): void
    {
        $this->validateModule(__DIR__ . '/../Bosch SmartHome Configurator');
    }

    public function testValidateAutomation(): void
    {
        $this->validateModule(__DIR__ . '/../Bosch SmartHome Automation Rule');
    }
    public function testValidateDevice(): void
    {
        $this->validateModule(__DIR__ . '/../Bosch SmartHome Device');
    }
    public function testValidateScenarios(): void
    {
        $this->validateModule(__DIR__ . '/../Bosch SmartHome Scenarios');
    }
    public function testValidateSystem(): void
    {
        $this->validateModule(__DIR__ . '/../Bosch SmartHome System');
    }
    public function testValidateWateralarm(): void
    {
        $this->validateModule(__DIR__ . '/../Bosch SmartHome Wateralarm System');
    }
}
