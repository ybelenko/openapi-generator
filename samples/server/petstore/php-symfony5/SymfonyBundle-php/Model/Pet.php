<?php
/**
 * Pet
 *
 * PHP version 7.1.3
 *
 * @category Class
 * @package  OpenAPI\Server\Model
 * @author   OpenAPI Generator team
 * @link     https://github.com/openapitools/openapi-generator
 */

/**
 * OpenAPI Petstore
 *
 * This spec is mainly for testing Petstore server and contains fake endpoints, models. Please do not use this for any other purpose. Special characters: \" \\
 *
 * The version of the OpenAPI document: 1.0.0
 * 
 * Generated by: https://github.com/openapitools/openapi-generator.git
 *
 */

/**
 * NOTE: This class is auto generated by the openapi generator program.
 * https://github.com/openapitools/openapi-generator
 * Do not edit the class manually.
 */

namespace OpenAPI\Server\Model;

use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class representing the Pet model.
 *
 * @package OpenAPI\Server\Model
 * @author  OpenAPI Generator team
 */
class Pet 
{
        /**
     * @var int|null
     * @SerializedName("id")
     * @Assert\Type("int")
     * @Type("int")
     */
    protected $id;

    /**
     * @var OpenAPI\Server\Model\Category|null
     * @SerializedName("category")
     * @Assert\Type("OpenAPI\Server\Model\Category")
     * @Type("OpenAPI\Server\Model\Category")
     */
    protected $category;

    /**
     * @var string
     * @SerializedName("name")
     * @Assert\NotNull()
     * @Assert\Type("string")
     * @Type("string")
     */
    protected $name;

    /**
     * @var string[]
     * @SerializedName("photoUrls")
     * @Assert\NotNull()
     * @Assert\All({
     *   @Assert\Type("string")
     * })
     * @Type("array<string>")
     */
    protected $photoUrls;

    /**
     * @var OpenAPI\Server\Model\Tag[]|null
     * @SerializedName("tags")
     * @Assert\All({
     *   @Assert\Type("OpenAPI\Server\Model\Tag")
     * })
     * @Type("array<OpenAPI\Server\Model\Tag>")
     */
    protected $tags;

    /**
     * pet status in the store
     *
     * @var string|null
     * @SerializedName("status")
     * @Assert\Choice({ "available", "pending", "sold" })
     * @Assert\Type("string")
     * @Type("string")
     */
    protected $status;

    /**
     * Constructor
     * @param mixed[] $data Associated array of property values initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->id = isset($data['id']) ? $data['id'] : null;
        $this->category = isset($data['category']) ? $data['category'] : null;
        $this->name = isset($data['name']) ? $data['name'] : null;
        $this->photoUrls = isset($data['photoUrls']) ? $data['photoUrls'] : null;
        $this->tags = isset($data['tags']) ? $data['tags'] : null;
        $this->status = isset($data['status']) ? $data['status'] : null;
    }

    /**
     * Gets id.
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets id.
     *
     * @param int|null $id
     *
     * @return $this
     */
    public function setId($id = null)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets category.
     *
     * @return OpenAPI\Server\Model\Category|null
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * Sets category.
     *
     * @param OpenAPI\Server\Model\Category|null $category
     *
     * @return $this
     */
    public function setCategory(Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Gets name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets name.
     *
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets photoUrls.
     *
     * @return string[]
     */
    public function getPhotoUrls(): array
    {
        return $this->photoUrls;
    }

    /**
     * Sets photoUrls.
     *
     * @param string[] $photoUrls
     *
     * @return $this
     */
    public function setPhotoUrls(array $photoUrls)
    {
        $this->photoUrls = $photoUrls;

        return $this;
    }

    /**
     * Gets tags.
     *
     * @return OpenAPI\Server\Model\Tag[]|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }

    /**
     * Sets tags.
     *
     * @param OpenAPI\Server\Model\Tag[]|null $tags
     *
     * @return $this
     */
    public function setTags(array $tags = null)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Gets status.
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets status.
     *
     * @param string|null $status  pet status in the store
     *
     * @return $this
     */
    public function setStatus($status = null)
    {
        $this->status = $status;

        return $this;
    }
}


