Kohana Multiple Sessions Module
===============================

Multiple Sessions module for Kohana PHP Framework

## Features

- Support for multiple sessions within an application
- Cookie and Database session drivers
- Possibility to regenerate/delete corrupted sessions (addresses [Kohana's issue #4669](http://dev.kohanaframework.org/issues/4669]))

## Installation



## Usage



## Q&A

### Why would I need support for multiple sessions?

- Different sessions for different areas within an application, e.g. at different URI paths.

### Why there's no native driver?

Why would there be? PHP supports only one native session, so this module's not
going to change it. If you want to use native session driver, use Kohana's
Session class instead.
