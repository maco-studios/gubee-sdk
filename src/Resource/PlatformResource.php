<?php

declare (strict_types = 1);

namespace Gubee\SDK\Resource;

class PlatformResource extends AbstractResource {
    public function createdBlacklist() {
        return $this->get(
            '/integration/platforms/blacklist/created'
        );
    }
}
