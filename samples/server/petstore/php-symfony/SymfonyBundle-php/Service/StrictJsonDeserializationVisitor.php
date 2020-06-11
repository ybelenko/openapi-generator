<?php
/*
 * Copyright 2017 Dmitriy Simushev
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace OpenAPI\Server\Service;

use JMS\Serializer\Exception\RuntimeException;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\Metadata\ClassMetadata;
use JMS\Serializer\Metadata\PropertyMetadata;
use JMS\Serializer\Visitor\DeserializationVisitorInterface;

final class StrictJsonDeserializationVisitor implements DeserializationVisitorInterface
{
    /** @var JsonDeserializationVisitor */
    private $visitor;

    public function __construct(DeserializationVisitorInterface $visitor)
    {
        $this->visitor = $visitor;
    }

    public function getInnerVisitor()
    {
        return $this->visitor;
    }

    public function visitProperty(PropertyMetadata $metadata, $data)
    {
        try {
            return $this->visitor->visitProperty($metadata, $data);
        } catch (RuntimeException $e) {
            throw new DeserializationException($metadata->serializedName, $e->getMessage(), $e->getCode(), $e);
        }
    }

    public function visitNull($data, array $type): void
    {
        $this->visitor->visitNull($data, $type);
    }

    /**
     * {@inheritdoc}
     */
    public function visitString($data, array $type): string
    {
        if (!is_string($data)) {
            throw TypeMismatchException::fromValue('string', $data);
        }

        return $this->visitor->visitString($data, $type);
    }

    /**
     * {@inheritdoc}
     */
    public function visitBoolean($data, array $type): bool
    {
        if (!is_bool($data)) {
            throw TypeMismatchException::fromValue('boolean', $data);
        }

        return $this->visitor->visitBoolean($data, $type);
    }

    /**
     * {@inheritdoc}
     */
    public function visitInteger($data, array $type): int
    {
        if (!is_int($data)) {
            throw TypeMismatchException::fromValue('integer', $data);
        }

        return $this->visitor->visitInteger($data, $type);
    }

    /**
     * {@inheritdoc}
     */
    public function visitDouble($data, array $type): float
    {
        if (!is_float($data) && !is_integer($data)) {
            throw TypeMismatchException::fromValue('double', $data);
        }

        return $this->visitor->visitDouble($data, $type);
    }

    public function visitDiscriminatorMapProperty($data, ClassMetadata $metadata): string
    {
        return $this->visitor->visitDiscriminatorMapProperty($data, $metadata);
    }

    public function visitArray($data, array $type): array
    {
        return $this->visitor->visitArray($data, $type);
    }

    public function startVisitingObject(ClassMetadata $metadata, object $data, array $type): void
    {
        $this->visitor->startVisitingObject($metadata, $data, $type);
    }

    public function endVisitingObject(ClassMetadata $metadata, $data, array $type): object
    {
        return $this->visitor->endVisitingObject($metadata, $data, $type);
    }

    public function getResult($data)
    {
        return $this->visitor->getResult($data);
    }

    public function prepare($data)
    {
        return $this->visitor->prepare($data);
    }

    public function setNavigator(GraphNavigatorInterface $navigator): void
    {
        $this->visitor->setNavigator($navigator);
    }
}
