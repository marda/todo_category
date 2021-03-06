<?php

namespace Absolute\Module\Category\Entity;

class Category  
{

  private $id;
  private $name;
  private $default;
  private $created;

  private $image = null;
  private $users = [];

	public function __construct($id, $name, $default, $created) 
  {
    $this->id = $id;
		$this->name = $name;
    $this->default = ($default) ? true : false;
    $this->created = $created;
	}

  public function getId() 
  {
    return $this->id;
  }

  public function getName() 
  {
    return $this->name;
  }

  public function getDefault() 
  {
    return $this->default;
  }

  public function getCreated() 
  {
    return $this->created;
  }

  public function getImage() 
  {
    return $this->image;
  }

  public function getUsers()
  {
    return $this->users;
  }

  // SETTERS

  public function setImage($image) 
  {
    $this->image = $image;
  }

  // ADDERS

  public function addUser($user)
  {
    $this->users[] = $user;
  }

  // OTHER METHODS  

  public function toSelectJson() 
  {
    return array(
      "id" => $this->id,
      "text" => $this->name,
    );
  }

  public function toJson() 
  {
    return array(
      "id" => $this->getId(),
      "name" => $this->getName(),
      "imageUrl" => ($this->getImage()) ? $this->getImage()->getUrl() : "",
    );
  }

  public function toJsonString() 
  {
    return json_encode(array(
      "id" => $this->getId(),
      "name" => $this->getName(),
      "default" => $this->getDefault(),
      "users" => array_map(function($user) { return $user->toJson(); }, $this->users),
    ));
  }
}

