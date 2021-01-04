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
use TYPO3\CMS\Core\Cache\Backend\RedisBackend;

/**
 * A wrapper for TYPO3's Redis Cache Backend
 */
class RedisCacheBackend extends RedisBackend implements LoggerAwareInterface
{
    public function initializeObject()
    {
        try {
            parent::initializeObject();
        } catch (\Throwable $e) {
            $this->logger->error('Could not initialize Redis Cache Backend', [
                'message' => $e->getMessage(),
                'error' => $e
            ]);
        }
    }

    public function get($entryIdentifier)
    {
        if ($this->connected) {
            try {
                return parent::get($entryIdentifier);
            } catch (\Throwable $e) {
                $this->logger->error('Error while fetching from Redis Cache', [
                    'message' => $e->getMessage(),
                    'error' => $e
                ]);
            }
        }
        return false;
    }

    public function has($entryIdentifier)
    {
        if ($this->connected) {
            try {
                return parent::has($entryIdentifier);
            } catch (\Throwable $e) {
                $this->logger->error('Error while fetching from Redis Cache', [
                    'message' => $e->getMessage(),
                    'error' => $e
                ]);
            }
        }
        return false;
    }

    public function findIdentifiersByTag($tag)
    {
        if ($this->connected) {
            try {
                return parent::findIdentifiersByTag($tag);
            } catch (\Throwable $e) {
                $this->logger->error('Error while fetching from Redis Cache', [
                    'message' => $e->getMessage(),
                    'error' => $e
                ]);
            }
        }
        return [];
    }

    public function set($entryIdentifier, $data, array $tags = [], $lifetime = null)
    {
        if ($this->connected) {
            try {
                parent::set($entryIdentifier, $data, $tags, $lifetime);
            } catch (\Throwable $e) {
                $this->logger->error('Error while setting data into Redis Cache', [
                    'message' => $e->getMessage(),
                    'error' => $e
                ]);
            }
        }
    }

    public function remove($entryIdentifier)
    {
        if ($this->connected) {
            try {
                return parent::remove($entryIdentifier);
            } catch (\Throwable $e) {
                $this->logger->error('Error while removing data from Redis Cache', [
                    'message' => $e->getMessage(),
                    'error' => $e
                ]);
            }
        }
        return false;
    }

    public function collectGarbage()
    {
        if ($this->connected) {
            try {
                parent::collectGarbage();
            } catch (\Throwable $e) {
                $this->logger->error('Error while collecting garbage in Redis Cache', [
                    'message' => $e->getMessage(),
                    'error' => $e
                ]);
            }
        }
    }
}

