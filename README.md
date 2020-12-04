# TYPO3 Extension with Graceful Cache Backends

We don't want our websites to be down because the cache
backend used, e.g. "redis" or "memcached" has a temporary
issue. Instead, the page should be loaded, but trigger
warnings and errors and such, but still render a page
without active caches.

For this reason, we provide Cache Backends which simply
catch all Exceptions.


## Installation

`composer req b13/graceful-cache` and

## License

The extension is licensed under GPL v2+, same as the TYPO3 Core. For details see the LICENSE file in this repository.

### Credits

This extension was created by [Benni Mack](https://github.com/bmack) in 2020 for [b13 GmbH](https://b13.com).

[Find more TYPO3 extensions we have developed](https://b13.com/useful-typo3-extensions-from-b13-to-you) that help us deliver value in client projects. As part of the way we work, we focus on testing and best practices to ensure long-term performance, reliability, and results in all our code.
