<?php

namespace App;

class Model
{
    private static mixed $instance = null;
    private $cache;

    public static function getInstance(): mixed
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    protected static function getField($entityId, $fieldName): mixed
    {
        $entity = self::getInstance();

        // Check if the data is already loaded in the cache
        if (isset($entity->cache[$entityId][$fieldName])) {
            return $entity->cache[$entityId][$fieldName];
        }

        // Get the table name from the class name using reflection
        try {
            $entityNameSingular = strtolower((new \ReflectionClass($entity))->getShortName());
            $entityNamePlural = $entityNameSingular . 's';
        } catch (\ReflectionException $e) {
            error_out($e->getMessage());
            exit();
        }

        // Load all the data for the entity
        $entity->cache[$entityId] = Db::getFirst("SELECT * FROM $entityNamePlural WHERE {$entityNameSingular}Id = '{$entityId}'");

        // Return the requested field
        return $entity->cache[$entityId][$fieldName];

    }
}