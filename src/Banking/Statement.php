<?php

/*
 * This file is part of the CFONB Parser package.
 *
 * (c) Guillaume Sainthillier <hello@silarhi.fr>
 * (c) @fezfez <demonchaux.stephane@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Silarhi\Cfonb\Banking;

class Statement
{
    /** @var Balance|null */
    private $oldBalance;

    /** @var Balance|null */
    private $newBalance;

    /** @var Operation[] */
    private $operations = [];

    public function __construct()
    {
        $this->oldBalance = null;
        $this->newBalance = null;
    }

    public function addOperation(Operation $operation): self
    {
        $this->operations[] = $operation;

        return $this;
    }

    public function getOldBalance(): ?Balance
    {
        return $this->oldBalance;
    }

    public function getOldBalanceOrThrowException(): Balance
    {
        if ($this->oldBalance === null) {
            throw new \RuntimeException('old balance is null');
        }

        return $this->oldBalance;
    }

    public function setOldBalance(Balance $oldBalance): self
    {
        $this->oldBalance = $oldBalance;

        return $this;
    }

    public function getNewBalance(): ?Balance
    {
        return $this->newBalance;
    }

    public function getNewBalanceOrThrowException(): Balance
    {
        if ($this->newBalance === null) {
            throw new \RuntimeException('new balance is null');
        }

        return $this->newBalance;
    }

    public function setNewBalance(Balance $newBalance): self
    {
        $this->newBalance = $newBalance;

        return $this;
    }

    /**
     * @return Operation[]
     */
    public function getOperations(): array
    {
        return $this->operations;
    }
}
