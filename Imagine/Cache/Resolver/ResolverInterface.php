<?php

namespace Liip\ImagineBundle\Imagine\Cache\Resolver;

use Liip\ImagineBundle\Exception\Imagine\Cache\Resolver\NotResolvableException;
use Symfony\Component\HttpFoundation\Response;

interface ResolverInterface
{
    /**
     * Checks whether the given path is stored within this Resolver.
     *
     * @param string $path
     * @param string $filter
     *
     * @return bool
     */
    public function isStored($path, $filter);

    /**
     * Resolves filtered path for rendering in the browser.
     *
     * @param string $path   The path where the original file is expected to be.
     * @param string $filter The name of the imagine filter in effect.
     *
     * @return string The URL of the cached image.
     *
     * @throws NotResolvableException
     */
    public function resolve($path, $filter);

    /**
     * Stores the content of the given Response.
     *
     * @param Response $response The response provided by the _imagine_* filter route.
     * @param string   $path     The path where the original file is expected to be.
     * @param string   $filter   The name of the imagine filter in effect.
     *
     * @return Response The (modified) response to be sent to the browser.
     */
    public function store(Response $response, $path, $filter);

    /**
     * Removes a stored image resource.
     *
     * @param string $path   The path where the original file is expected to be.
     * @param string $filter The name of the imagine filter in effect.
     *
     * @return bool Whether the file has been removed successfully.
     */
    public function remove($path, $filter);

    /**
     * Clear the CacheResolver cache.
     *
     * @param string $cachePrefix The cache prefix as defined in the configuration.
     *
     * @return void
     */
    public function clear($cachePrefix);
}
