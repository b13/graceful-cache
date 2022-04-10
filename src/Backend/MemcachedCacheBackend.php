<?php
declare(strict_types=1);

/*
 * This file is part of TYPO3 CMS-based extension "graceful_cache" by b13.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 */

namespace B13\GracefulCache\Backend;

use Psr\Log\LoggerAwareInterface;
use TYPO3\CMS\Core\Cache\Backend\MemcachedBackend;

/**
 * A wrapper for TYPO3's Memcached Backend
 */
class MemcachedCacheBackend extends MemcachedBackend implements LoggerAwareInterface
{
    public function initializeObject()
    {
        try {
            parent::initializeObject();
        } catch (\Throwable $e) {
            $this->logger->error('Could not initialize Memcached Backend', [
                'message' => $e->getMessage(),
                'error' => $e
            ]);
        }
    }

    public function set($entryIdentifier, $data, array $tags = [], $lifetime = null)
    {
        try {
            parent::set($entryIdentifier, $data, $tags, $lifetime);
        } catch (\Throwable $e) {
            $this->logger->error('Error while setting data into Memcached Cache', [
                'message' => $e->getMessage(),
                'error' => $e
            ]);
        }
    }

    public function get($entryIdentifier)
    {
        try {
            return parent::get($entryIdentifier);
        } catch (\Throwable $e) {
            $this->logger->error('Error while fetching from Memcached Cache', [
                'message' => $e->getMessage(),
                'error' => $e
            ]);
        }
        return false;
    }

    public function has($entryIdentifier)
    {
        try {
            return parent::has($entryIdentifier);
        } catch (\Throwable $e) {
            $this->logger->error('Error while fetching from Memcached Cache', [
                'message' => $e->getMessage(),
                'error' => $e
            ]);
        }
        return false;
    }

    public function remove($entryIdentifier)
    {
        try {
            return parent::remove($entryIdentifier);
        } catch (\Throwable $e) {
            $this->logger->error('Error while removing data from Memcached Cache', [
                'message' => $e->getMessage(),
                'error' => $e
            ]);
        }
        return false;
    }

    public function findIdentifiersByTag($tag)
    {
        try {
            return parent::findIdentifiersByTag($tag);
        } catch (\Throwable $e) {
            $this->logger->error('Error while fetching from Memcached Cache', [
                'message' => $e->getMessage(),
                'error' => $e
            ]);
        }
        return [];
    }

    public function flush()
    {
        try {
            parent::flush();
        } catch (\Throwable $e) {
            $this->logger->error('Error while flush cache in Memcached Cache', [
                'message' => $e->getMessage(),
                'error' => $e
            ]);
        }
    }

    public function flushByTag($tag)
    {
        try {
            parent::flushByTag($tag);
        } catch (\Throwable $e) {
            $this->logger->error('Error while flush cache tag in Memcached Cache', [
                'message' => $e->getMessage(),
                'error' => $e
            ]);
        }
    }
}

