<?php

declare(strict_types=1);

include_once __DIR__ . '/stubs/Validator.php';

class LibraryTest extends TestCaseSymconValidation
{
    public function testValidateLibrary(): void
    {
        $this->validateLibrary(__DIR__ . '/..');
    }

    public function testValidateIO(): void
    {
        $this->validateModule(__DIR__ . '/../Bosch SmartHome IO');
    }

    public function testValidateConfigurator(): void
    {
        $this->validateModule(__DIR__ . '/../Bosch SmartHome Configurator');
    }

    public function testValidateDevice(): void
    {
        $this->validateModule(__DIR__ . '/../Bosch SmartHome Device');
    }
}