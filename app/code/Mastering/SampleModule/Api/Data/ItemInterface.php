<?php
namespace Mastering\SampleModule\Api\Data;
/**
 * @codeCoverageIgnore
 */
interface ItemInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string|null
     */
    public function getDescription();
}
