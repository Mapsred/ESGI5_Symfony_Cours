<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Article
 *
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
    /**
	 * @var integer $id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     * @ORM\Id
     */
	private $id;

    /**
	 * @var string $title
     * @ORM\Column(type="string", length=100, unique=true)
     * @Assert\NotBlank(message="Veuillez choisir un titre !")
     */
	private $title;

    /**
	 * @var string $slug
     * @ORM\Column(type="string", nullable=true)
     */
	private $slug = null;

    /**
	 * @var string $content
     * @ORM\Column(type="text")
     */
	private $content = "";

    /**
     * @var Tag $tags
     * @ORM\ManyToMany(targetEntity="App\Entity\Tag", inversedBy="articles", cascade={"persist"})
     */
    private $tags;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle():? string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return Article
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     *
     * @return Article
     */
    public function setSlug(string $slug):? self
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     *
     * @return Article
     */
    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @param Tag $tag
     *
     * @return $this
     */
    public function addTag(Tag $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * @param Tag $tag
     */
    public function removeTag(Tag $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * @return ArrayCollection
     */
    public function getTags()
    {
        return $this->tags;
    }
}
