<?php
namespace Mastering\SampleModule\Api;

/**
 * @codeCoverageIgnore
 */
interface ItemRepositoryInterface
{

    /**
     * @return \Mastering\SampleModule\Api\Data\ItemInterface[]
     */
    public function getList();
}
