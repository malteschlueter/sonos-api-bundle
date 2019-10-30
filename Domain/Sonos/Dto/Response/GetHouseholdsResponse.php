<?php

declare(strict_types=1);

namespace Mschlueter\Bundle\SonosApiBundle\Domain\Sonos\Dto\Response;

use Mschlueter\Bundle\SonosApiBundle\Domain\Sonos\Dto\Household;

final class GetHouseholdsResponse
{
    /**
     * @var Household[]
     */
    private $households;

    /**
     * @return Household[]
     */
    public function getHouseholds(): array
    {
        return $this->households;
    }

    /**
     * @param Household[] $households
     */
    public function setHouseholds(array $households): self
    {
        $this->households = $households;

        return $this;
    }
}
