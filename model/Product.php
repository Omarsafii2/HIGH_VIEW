<?php

class Product {
    private $id;
    private $name;
    private $price;
    private $description;
    private $category;
    private $created_by;
    private $is_package;
    private $stock;
    private $total_rating;
    private $width;
    private $height;
    private $weight;
    private $quality_checking;
    private $status;
    private $subtype_id;
    private $created_at;

    public function __construct($name, $price, $description, $category, $created_by, $is_package, $stock, $total_rating, $width, $height, $weight, $quality_checking, $status, $subtype_id, $created_at) {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->category = $category;
        $this->created_by = $created_by;
        $this->is_package = $is_package;
        $this->stock = $stock;
        $this->total_rating = $total_rating;
        $this->width = $width;
        $this->height = $height;
        $this->weight = $weight;
        $this->quality_checking = $quality_checking;
        $this->status = $status;
        $this->subtype_id = $subtype_id;
        $this->created_at = $created_at;
    }

 
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function getCreatedBy() {
        return $this->created_by;
    }

    public function setCreatedBy($created_by) {
        $this->created_by = $created_by;
    }

    public function getIsPackage() {
        return $this->is_package;
    }

    public function setIsPackage($is_package) {
        $this->is_package = $is_package;
    }

    public function getStock() {
        return $this->stock;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }

    public function getTotalRating() {
        return $this->total_rating;
    }

    public function setTotalRating($total_rating) {
        $this->total_rating = $total_rating;
    }

    public function getWidth() {
        return $this->width;
    }

    public function setWidth($width) {
        $this->width = $width;
    }

    public function getHeight() {
        return $this->height;
    }

    public function setHeight($height) {
        $this->height = $height;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }

    public function getQualityChecking() {
        return $this->quality_checking;
    }

    public function setQualityChecking($quality_checking) {
        $this->quality_checking = $quality_checking;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getSubtypeId() {
        return $this->subtype_id;
    }

    public function setSubtypeId($subtype_id) {
        $this->subtype_id = $subtype_id;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }
}
