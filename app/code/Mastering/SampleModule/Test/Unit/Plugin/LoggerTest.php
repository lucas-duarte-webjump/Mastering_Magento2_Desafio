<?php
namespace Mastering\SampleModule\Test\Unit\Plugin;

use Mastering\SampleModule\Console\Command\AddItem;
use Mastering\SampleModule\Plugin\Logger;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LoggerTest extends TestCase
{

    private $commandMock;
    private $inputMock;
    private $outputMock;

    private $logger;

    protected function setUp(): void
    {
        $this->commandMock = $this->createMock(AddItem::class);
        $this->inputMock = $this->createMock(InputInterface::class);
        $this->outputMock = $this->createMock(OutputInterface::class);

        $this->logger = new Logger($this->outputMock);
    }


    public function testBeforeRun()
    {
        $this->logger->beforeRun($this->commandMock, $this->inputMock, $this->outputMock);

        $this->outputMock->expects($this->any())->method('writeln')->with('beforeExecute');
        $this->assertInstanceOf(Logger::class, $this->logger);
    }

    public function testAfterRun()
    {
        $this->logger->afterRun($this->commandMock, [], $this->inputMock, $this->outputMock);

        $this->outputMock->expects($this->any())->method('writeln')->with('afterExecute');

        $this->assertInstanceOf(Logger::class, $this->logger);
    }
}
