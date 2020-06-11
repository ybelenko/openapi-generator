<?php

namespace OpenAPI\Server\Service;

use JMS\Serializer\Visitor\DeserializationVisitorInterface;
use JMS\Serializer\Visitor\Factory\DeserializationVisitorFactory;
use JMS\Serializer\Visitor\Factory\JsonDeserializationVisitorFactory;
use OpenAPI\Server\Service\StrictJsonDeserializationVisitor;

final class StrictJsonDeserializationVisitorFactory implements DeserializationVisitorFactory
{
    /** @var JsonDeserializationVisitorFactory */
    private $jsonDeserializationVisitorFactory;

    public function __construct(JsonDeserializationVisitorFactory $jsonDeserializationVisitorFactory)
    {
        $this->jsonDeserializationVisitorFactory = $jsonDeserializationVisitorFactory;
    }

    public function getVisitor(): DeserializationVisitorInterface
    {
        return new StrictJsonDeserializationVisitor($this->jsonDeserializationVisitorFactory->getVisitor());
    }
}
